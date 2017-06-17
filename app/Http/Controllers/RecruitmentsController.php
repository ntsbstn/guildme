<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Sentinel;
use App\Guild;
use App\Realm;

class RecruitmentsController extends Controller
{
    
    public function create()
    {
        $user = Sentinel::getUser();
        $guilds = Sentinel::getUser()->guilds->pluck('name', 'id');
        $realms = Realm::pluck('displayName', 'id');

        return view('recruitments.create', compact('user','guilds','realms'));
    }
    public function store(Request $request)
    {
        //Validate the input
        $this->validate($request, [
            'guild_id' => 'numeric',
            'title'=> 'required|min:15',
            'body' => 'required|min:50',
            'number' => 'numeric',
            'class_id' => 'numeric',
            'classrole_id' => 'numeric',
        ]);
        //$request['realm_id'] = Realm::where('',)
        $request['user_id'] = Sentinel::getUser()->id;
        $request['created_at'] = Carbon::now();

        dd($request);
    }
}
