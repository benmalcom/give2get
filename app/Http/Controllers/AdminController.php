<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Vinkla\Hashids\HashidsManager;
use App\Models\Item;
use App\Models\Category;
use App\User;
use App\Models\Transaction;
use App\Models\Review;
use Carbon\Carbon;

class AdminController extends Controller
{
    //

    public function __construct(HashidsManager $hashids)
    {
        $this->hashids = $hashids;
    }

    public function getDashboard()
    {
        $categories_count = Category::all()->count();
        $categories_today_count = Category::where('created_at', '>=', Carbon::today())->count();

        $users = User::orderBy('created_at','desc')->take(10)->get();
        $users_count = User::all()->count();
        $users_today_count = User::where('created_at', '>=', Carbon::today())->count();

        $items = Item::with('state')->with('poster')->orderBy('created_at','desc')->take(10)->get();
        $items_count = Item::all()->count();
        $items_today_count = Item::where('created_at', '>=', Carbon::today())->count();

        $transactions_count = Transaction::all()->count();
        $transactions_today_count = Transaction::where('created_at', '>=', Carbon::today())->count();


        return view('admin.dashboard',
            compact('users','items','categories_count','users_count','users_today_count','items_count','items_today_count','transactions_count','transactions_today_count','categories_today_count'));
    }

    public function getCategories()
    {
        $categories = Category::withCount(['items'])->get();
        $count = Category::all()->count();
        return view('admin.category.list',compact('categories','count'));
    }

    public function postCategories(Request $request)
    {

        $inputs = $request->all();
        $validator = Validator::make($inputs,Category::createRules());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $category = new Category();
        $category->name = $inputs['name'];
        $category->hashed_id = $this->hashids->encode(time());
        $category->save();
        $this->setFlashMessage("You added a new category",1);
        return redirect()->back();
    }

    public function deleteCategory($hashed_id)
    {
        $id = $this->hashids->decode($hashed_id);
        Category::destroy($id);
        $this->setFlashMessage("Category deleted",1);
        return redirect()->back();
    }
    public function editCategory($hashed_id)
    {
        $id = $this->hashids->decode($hashed_id)[0];
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function postEditCategory(Request $request)
    {
        $inputs = $request->all();
        $id = $this->hashids->decode($inputs['hashed_id']);
        unset($inputs['_token']);
        Category::where('id',$id)->update($inputs);
        $this->setFlashMessage("Category updated",1);
        return redirect('/a/categories');
    }

    public function getItems()
    {
        $items = Item::with('category')->with('state')->take(10)->get();
        $count = Item::all()->count();
        return view('admin.items',compact('items','count'));
    }

    public function deleteItem($hashed_id)
    {
        $id = $this->hashids->decode($hashed_id);
        Item::destroy($id);
        $this->setFlashMessage("Item deleted",1);
        return redirect()->back();
    }


    public function getUsers()
    {
        $users = User::take(10)->get();
        $count = User::all()->count();
        return view('admin.users',compact('users','count'));
    }

    public function deleteUser($hashed_id)
    {
        $id = $this->hashids->decode($hashed_id);
        User::destroy($id);
        $this->setFlashMessage("User deleted",1);
        return redirect()->back();
    }

    public function getTransactions()
    {
        $transactions = Transaction::with('seller')->with('buyer')->take(10)->get();
        $count = Transaction::all()->count();
        return view('admin.transactions',compact('transactions','count'));
    }

    public function deleteTransaction($hashed_id)
    {
        $id = $this->hashids->decode($hashed_id);
        Transaction::destroy($id);
        $this->setFlashMessage("Transaction deleted",1);
        return redirect()->back();
    }

}