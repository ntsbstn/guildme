<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Activation;
use Sentinel;

class ActivationController extends Controller
{
    public function activate($uid, $resetCode)
    {
       
       //Get a sentinel object of the id
        $sentinelUser = Sentinel::findById($uid);
        
        //Compare with activation table
        if( Activation::complete($sentinelUser, $resetCode) )
        {
            return redirect()->route('loginform');
        }else
        {

        }
    }
}
