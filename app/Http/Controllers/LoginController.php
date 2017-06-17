<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{

    // Login view
    public function login()
    {
        $environment = App::environment();
         return view('authentication.login', compact('environment'));
    }

    //Post login
    public function postlogin(Request $request)
    {
       try
       {
        //If the credentials are entered try to connect
        if(Sentinel::authenticate($request->all())){
            
            //If the user is connected redirect to his page 
            if( Sentinel::check())
                return redirect()->route('my')->with('success', 'Lok\'tar !');
            
            //else return to form
            else
                return redirect()->route('loginform')->with(['error' => 'Please connect']);
        
        //If submission isn't correct
        }else{
            return redirect()->back()->with(['error' => 'Login or password incorrect']);
        }

       } // End of TRY
       
       // If Ban
       catch(ThrottlingException $e)
       {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "You're banned for $delay seconds"]);

       }
       // If Not yet activated
       catch(NotActivatedException $e)
       {
           return redirect()->back()->with(['error' => "Your account is not activated, please check your mailbox"]);
       }

        

    }

    // Login view
    public function logout()
    {
         Sentinel::logout();
         return redirect('/login');
    }


}
