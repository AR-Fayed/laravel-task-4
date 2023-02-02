<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
function view(Request $request){
        //$categories = Category::all();
        
        if($user =$request->user()){
            $token = $user['api_token'];
            $name=$user['name'];
        } else {
            $token = 0;
            $name = 0;
        }
        return view('contact',compact('token','name'));
}

function sendMessage(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Mail::send('mail.contact', $request->all(), function ($message) {
            $message->to('abdelrahman-fayed@hotmail.com', 'Fayed')->subject('contact message');
            $message->from(); //sending email is set in the env file
            //for attaching files
            //$message->attach(Storage::disk('public')->path('categories/3vAPQgLdXn77TnK6nbJBonPEoAJoyk8K045wGFrU.jpg'));  
            return redirect()->route('contact')->with('success', 'E-mail sent!');
        }); 
}
}
