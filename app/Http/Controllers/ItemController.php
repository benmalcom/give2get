<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Item;
use App\Models\ItemImage;
use Vinkla\Hashids\HashidsManager;
use App\Models\Category;
use App\Models\State;
use Cloudder;
use Intervention\Image\ImageManagerStatic as Image;
use Uuid;



class ItemController extends Controller
{
    protected $hashids;

    public function __construct(HashidsManager $hashids)
    {
        $this->hashids = $hashids;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states = State::all();
        $categories = Category::all();
        return view('frontend.pages.item.add',compact('states','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inputs = $request->all();
        $validator = Validator::make($inputs,Item::createRules());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $inputs['user_id'] = \Auth::user()->id;
        $inputs['hashed_id'] = $this->hashids->encode(time());
        $images = [];
        $item = Item::create($inputs);

        if($request->hasFile('images'))
            $images = array();
            foreach($request->file('images') as $file)
            {
                $filename = $file->getClientOriginalName();
                $path = public_path('uploads/temp'.$filename);
                Image::make($file->getRealPath())->resize(600,500)->save($path);
                Cloudder::upload($path,null,array('use_filename'=>true,'version'=>true));
                $result = Cloudder::getResult();
                $item_image = new ItemImage();
                $item_image->public_id = $result['public_id'];
                $item_image->url = $result['url'];
                array_push($images,$item_image);
                unlink($path);
            }
        if(!empty($images))
            $item->images()->saveMany($images);
        $this->setFlashMessage("You added a new item",1);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $hashed_id
     * @return \Illuminate\Http\Response
     */
    public function show($hashed_id)
    {
        //
        $item = Item::where('hashed_id',$hashed_id)->with('state')->with('poster')->with('images')->first();
        if(!is_null($item)){
            $item = $item->incrementViews();
        }
        $similar = Item::where('category_id',$item->category->id)
            ->with('state')->with('poster')->with('images')
            ->take(4)->get();
        return view('frontend.pages.item.details',compact('item','similar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $hashed_id
     * @return \Illuminate\Http\Response
     */
    public function edit($hashed_id)
    {
        //

        $states = State::all();
        $categories = Category::all();
        $item = Item::where('hashed_id',$hashed_id)->with('category')->with('state')->with('poster')->with('images')->first();
        return view('frontend.pages.item.edit',compact('item','categories','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $inputs = $request->all();
        $validator = Validator::make($inputs,Item::createRules());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $hashed_id =  $inputs['hashed_id'];
        $item = Item::where('hashed_id',$hashed_id)->first();
        if(is_null($item))
        {
            $this->setFlashMessage("Item not found!",2);
            return redirect('/');
        }
        Item::updateOrCreate(['id'=>$item->id],$inputs);
        $this->setFlashMessage("Item details updated",1);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $hashed_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hashed_id)
    {
        //

        $item = Item::where('hashed_id',$hashed_id)->first();
        $user = \Auth::user();
        if($user->id != $item->user_id || !$user->isAdmin())
        {
            $this->setFlashMessage("You don't have the permission to delete this item!",2);
            return redirect('/');
        }

        if(is_null($item))
        {
            $this->setFlashMessage("Item not found!",2);
            return redirect('/');
        }
        $item_id = $item->id;
        Item::destroy($item->id);
        if(!is_null($item_id)){
            $public_ids = [];
            $images = ItemImage::where('item_id',$item_id)->get(array('public_id'));
            foreach($images as $image){
                array_push($public_ids,$image->public_id);
            }
            Cloudder::destroyImages($public_ids);
        }
        $this->setFlashMessage("Item deleted!",1);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $hashed_id
     * @return \Illuminate\Http\Response
     */
    public function getItemsByCategory($hashed_id)
    {
        //
        $categories = Category::withCount(['items'])->get();
        $category = Category::where('hashed_id',$hashed_id)->first();
        $info = ucwords($category->name);
        $items = Item::where('category_id',$category->id)->with('category')->with('state')->with('poster')->with('images')->get();
        return view('frontend.pages.item.search-results',compact('items','categories','info'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function getItemSearchResult(Request $request)
    {
        //
        $term = $request->get('s_t','');
        $category_hashed_id = $request->get('s_c','');
        $query = Item::where('name','LIKE','%'.$term.'%');
        if(isset($category_hashed_id) && strtolower($category_hashed_id) !="all"){
            $category = Category::where('hashed_id',$category_hashed_id)->first();
            if(!is_null($category)) $query->where('category_id',$category->id);
        }

        $items = $query->orderBy('created_at','desc')->get();
        $categories = Category::withCount(['items'])->get();
        return view('frontend.pages.item.search-results',compact('items','categories'));
    }
}
