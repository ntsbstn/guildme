<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;
use Sentinel;

class PasswordController extends Controller
{
    public function forgotPassword(){
        return view('authentication.forgot-password');
    }
    public function postForgotPassword(Request $request)
    {
        //Target the user
        $user = User::whereEmail($request->email)->first();

        
        //In case of brute force attack
        if(count($user) == 0)
            return redirect()->back()->with(['success' => 'Reset code was sent to your email']);

        //To collect the right instance
        $sentinelUser = Sentinel::findById($user->id);

        //Create a reminder code
        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);
        
        //Send it by email
        $this->sendEmail($user, $reminder->code);

        //redirect
        return redirect()->back()->with(['success' => 'Reset code was sent to your email']);

    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.forgot-password', [
            'user' => $user,
            'code' => $code
        ], function($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->username , reset your password. ");
        });

    }
    public function resetPassword($uid, $resetCode)
    {
       
       //Get a sentinel object of that id
        $sentinelUser = Sentinel::findById($uid);
        
        if(count($sentinelUser) == 0)
            abort(404);

        if($reminder = Reminder::exists($sentinelUser))
        {
            if($resetCode == $reminder->code)
                return view('authentication.reset-password');
            else
                return redirect('/');
        }else{
            return redirect('/');
        }        
    }
    public function postResetPassword(Request $request, $uid, $resetCode){
          
          //Validate the input
          $this->validate($request, [
              'password' => 'confirmed|required|min:5',
              'password_confirmation' => 'required|min:5'
          ]);

          //Get a sentinel object of the user
        $sentinelUser = Sentinel::findById($uid);
        
        //If user doesn't exists'
        if(count($sentinelUser) == 0)
            abort(404);
        
        //if a resetcode has been created
        if($reminder = Reminder::exists($sentinelUser))
        {
            //if it's the same as the one of the user
            if($resetCode == $reminder->code){
                Reminder::complete($sentinelUser, $resetCode, $request->password);
                
                //success
                return redirect()->route('loginform')->with('success', 'Please login with your new password');
                }
            else
                return redirect('/');
        }else{
            return redirect('/');
        }   
    }
}
