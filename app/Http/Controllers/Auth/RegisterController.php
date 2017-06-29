<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Mail;
use Vinkla\Hashids\HashidsManager;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/activate-account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HashidsManager $hashids)
    {
        $this->middleware('guest');
        $this->hashids = $hashids;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verification_code' => strtoupper(str_random(6))
        ]);

        $data = ['verification_code'=>$user->verification_code,'first_name'=>$user->first_name];
        Mail::send('email.verify',$data, function($message) use ($user) {
            $message->to($user->email)
                ->subject('Account confirmation code');
        });

        /*try{
            $data = ['verification_code'=>$user->verification_code,'first_name'=>$user->first_name];
             Mail::send('email.verify',$data, function($message) use ($user) {
                 $message->to($user->email)
                     ->subject('Account confirmation code');
             });
        }
        catch(\Exception $e){
            // catch code
        }*/

        return $user;
    }


}
