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
        $id = $this->getHashIds()->decode($hashed_id)[0];
        $item = Item::where('id',$id)->with('state')->with('poster')->with('images')->first();
        if(!is_null($item)){
            $item = $item->incrementViews();
        }
        $similar = Item::where('category_id',$item->category->id)->where('id', '!=' , $item->id)
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
        $id = $this->getHashIds()->decode($hashed_id)[0];
        $states = State::all();
        $categories = Category::all();
        $item = Item::where('id',$id)->with('category')->with('state')->with('poster')->with('images')->first();
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
        $id = $this->getHashIds()->decode($hashed_id)[0];
        unset($inputs['hashed_id']);
        $item = Item::find($id)->update($inputs);
        if(is_null($item))
        {
            $this->setFlashMessage("Item not found!",2);
            return redirect('/');
        }
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
        $id = $this->getHashIds()->decode($hashed_id)[0];
        $item = Item::find($id);
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
        $id = $this->getHashIds()->decode($hashed_id)[0];
        $category = Category::find($id);
        $items = Item::where('category_id',$category->id)->with('category','state','poster','images')->take(10)->get();
        $count = Item::where('category_id',$category->id)->count();
        return view('frontend.pages.item.category-items',compact('items','category','count'));
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
        $term = $request->get('term','');
        $category_id = $request->get('category_id');
        $state_id = $request->get('state_id');
        $query = Item::where('name','LIKE','%'.$term.'%');
        if(isset($category_id) && !empty($category_id)){
            $query->where('category_id',$category_id);
            //$category = Category::find($category_id);
        }
        if(isset($state_id) && !empty($state_id)){
            $query->where('state_id',$state_id);
            //$category = Category::find($category_id);
        }

        $items = $query->orderBy('created_at','desc')->get();
        $categories = Category::withCount(['items'])->get();
        return view('frontend.pages.item.search-results',compact('items','categories'));
    }
}
