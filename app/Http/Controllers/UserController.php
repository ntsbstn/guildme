<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guild;

use Sentinel;

class UserController extends Controller
{
    public function index(){
        $user = User::findOrFail(Sentinel::getUser()->id);
        return view('users.home', compact('user'));

    }

    public function edit()
    {
        $user = User::findOrFail(Sentinel::getUser()->id);
        return view('users.edit', compact('user'));
    }
    public function storeAccount(Request $request)
    {

        //Validate the input
        $this->validate($request, [
            'email' => 'email',
            'password' => 'confirmed',
        ]);
        
        $input = $request->all();
        return $input;
    }
     public function storePreferences(Request $request)
    {

        $this->validate($request, [
            'status' => 'numeric',
        ]);
        $user = User::findOrFail(Sentinel::getUser()->id);
        $user->status = $request['status'];
        $user->save();

        return redirect()->back()->with('success','Preferences udpated');
    }
     public function storeGameplay(Request $request)
    {
        $this->validate($request, [
            'daysPerWeek' => 'numeric',
            'interest_fun' => 'numeric',
            'interest_rp' => 'numeric',
            'interest_pvp' => 'numeric',
            'interest_pve' => 'numeric',
            'about' => 'min:50',
        ]);

        $user = User::findOrFail(Sentinel::getUser()->id);
        $user->daysPerWeek = $request['daysPerWeek'];
        $user->interest_fun = $request['interest_fun'];
        $user->interest_rp = $request['interest_rp'];
        $user->interest_pvp = $request['interest_pvp'];
        $user->interest_pve = $request['interest_pve'];
        $user->about = $request['about'];
        $user->save();

        return redirect()->back()->with('success','Gameplay udpated');
    }
}
