<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use Mail;

class RegistrationController extends Controller
{
    public function register()
    {
       return view('authentication.register');
    }

    public function postregister(Request $request)
    {
        //Validate the input
        $this->validate($request, [
            'username' => 'alpha|required|min:3',
            'email' => 'email|unique:users|required',
            'password' => 'required|min:5'
        ]);

       //Register in DB
       $user = Sentinel::register($request->all());
       
       //Give the role user
       $role = Sentinel::findRoleBySlug('user');
       $role->users()->attach($user);

       //Create the activation row
       $activation = Activation::create($user);

       //Send email
       $this->sendEmail($user, $activation->code);

       //Redirect to page
       return view('authentication.thanksforregistration');
       
       // dd($user);
    }
    private function sendEmail($user, $code){
        Mail::send('emails.activation', [
            'user' => $user,
            'code' => $code
        ], function($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->username , activate your account. ");
        });

    } 
}