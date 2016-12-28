<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Cloudder;
use Hash;
use App\Models\Transaction;

class UserController extends Controller
{
    //
    public function __construct()
    {

    }


    public function getActivateAccount()
    {
        return view('auth.activate-account');
    }
    public function postActivateAccount(Request $request)
    {

        $inputs = $request->all();
        $validator = Validator::make($inputs,['verification_code'=>'required']);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($this);
        }
        $user = Auth::user();
        if($user->verification_code != $inputs['verification_code']){
            $this->setFlashMessage("Incorrect verification code!",2);
        }
        $user->verification_code = "";
        $user->account_verified = true;
        $user->active = true;
        $user->save();
        $this->setFlashMessage("Your account has been verified!",1);
        return redirect('/profile');
    }

    public function getProfile()
{
    $user = Auth::user();
    return view('frontend.pages.user.profile',compact('user'));
}
    public function postProfile(Request $request)
    {

        $inputs = $request->all();
        unset($inputs['_token']);
        User::where('id', Auth::user()->id)->update($inputs);
        $this->setFlashMessage("Your details has been updated!",1);
        return redirect('/profile');
    }
    public function postAvatar(Request $request)
    {

        $inputs = $request->all();
        unset($inputs['_token']);
        if($request->hasFile('avatar'))
        {
            $image = $request->file('avatar');
            unset($inputs['avatar']);
            if(substr($image->getMimeType(), 0, 5) == 'image') {
                $filename = $image->getClientOriginalName();
                $path = public_path('uploads/temp'.$filename);
                Image::make($image->getRealPath())->resize(600,500)->save($path);
                $old_public_id = Auth::user()->avatar_public_id;
                $update = [];
                if(isset($old_public_id) && !empty($old_public_id)){
                    Cloudder::upload($path,$old_public_id,array('use_filename'=>true,'version'=>true));
                }
                else{
                    Cloudder::upload($path,null,array('use_filename'=>true,'version'=>true));
                }
                $result = Cloudder::getResult();
                $update['avatar_url'] = $result['url'];
                if(!isset($old_public_id) || empty($old_public_id))
                    $update['avatar_public_id']= $result['public_id'];
                User::where('id', Auth::user()->id)->update($update);
                unlink($path);
                $this->setFlashMessage("Your avatar has been updated!",1);
            }

        }
        return redirect('/profile');
    }
    public function getChangePassword()
    {
        $user = Auth::user();
        return view('frontend.pages.user.change-password',compact('user'));
    }
    public function postChangePassword(Request $request)
    {
        $inputs = $request->all();
        $validator =  Validator::make($inputs, [
            'current_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $user = Auth::user();
        if(Hash::check($inputs['current_password'],$user->password)) {
            // The passwords match...
            $user->password = bcrypt($inputs['password']);
            $user->save();
            $this->setFlashMessage("You changed your password!",1);
        }
        else
        {
            $this->setFlashMessage("You entered an incorrect current password!",2);
        }
        return redirect()->back();
    }

    public function getUserTransactions()
    {
        $user = Auth::user();
        $transactions = Transaction::where('buyer_id',$user->id)
            ->orWhere('seller_id',$user->id)
            ->with('seller')
            ->with('buyer')
            ->with('item')
            ->get();
        return view('frontend.pages.user.transactions',compact('transactions'));
    }

    public function getUserItems()
    {
        $user = Auth::user();
        $items = Item::where('user_id',$user->id)
            ->with('category')
            ->with('images')
            ->with('state')
            ->get();
        return view('frontend.pages.user.items',compact('items'));
    }
}
