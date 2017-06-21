<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('state')->with('category')->with('images')->orderBy('created_at','desc')->get();
        return view('frontend.pages.home',compact('items'));
    }

    public function getFaqs()
    {
        return view('frontend.pages.faqs');
    }


    public function getHowItWorks()
    {
        return view('frontend.pages.how-it-works');
    }

    public function getContactUs()
    {
        return view('frontend.pages.contact-us');
    }

    public function postContactUs(Request $request)
    {
        $inputs = $request->all();
        Mail::send('email.contact', ['message_body'=>$inputs['message_body'], 'name'=>$inputs['name']], function($message) use($inputs) {
            $message->from($inputs['email'], $inputs['name']);
            $message->subject("Request For Support");
            $message->to('benjaminikeji@gmail.com');
        });
        if (count(Mail::failures()) > 0) {
            $this->setFlashMessage("An error occured! Plesae try again.",1);
        } else {
            $this->setFlashMessage("Message sent successfully!",2);
        }
        return redirect()->back();
    }


    public function getAboutUs()
    {
        return view('frontend.pages.about-us');
    }
    public function getPrivacyPolicy()
    {
        return view('frontend.pages.privacy-policy');
    }
}
