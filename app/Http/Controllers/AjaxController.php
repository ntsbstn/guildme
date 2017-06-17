<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Carbon\Carbon;
use App\Character;
use App\User;


class AjaxController extends Controller
{
     public function updateCharacterList(Request $request)
    {
        $user = new User;
        
        $myCharacters = $user->find(Sentinel::getUser()->id)->characters->pluck('name')->toArray();
        //dd($myCharacters);

        $character = new Character();
        $characters = $character->fetchCharacters(Sentinel::getUser()->battlenet_token);

        //dd($characters);


        foreach($characters as $character){
           if($character['level'] > 80){
                if (!in_array($character['name'], $myCharacters)) { // <= a débugger


            $addCharacter = new Character();
            
            $addCharacter['user_id'] = Sentinel::getUser()->id;
            $addCharacter['region_id'] = null;
            $addCharacter['name'] = $character['name'];
            $addCharacter['gender'] = $character['gender'];
            $addCharacter['level'] = $character['level'];
            $addCharacter['race'] = $character['race'];
            $addCharacter['faction'] = '0';
            $addCharacter['achievementPoints'] = $character['achievementPoints'];
            $addCharacter['averageItemLevelEquipped'] = '0';
            $addCharacter['realm'] = $character['realm'];
            $addCharacter['class_character'] = $character['class'];
            $addCharacter['thumbnail'] = $character['thumbnail'];
            $addCharacter['main'] = str_replace('avatar', 'main', $character['thumbnail']);
    
            $addCharacter['created_at'] = Carbon::now();
            //$addCharacter['region'] = $character['region'];

            $addCharacter->save();

                }// if not in_array
           } // /if > 80






        }
        
        return view('characters.partials._grid-characters',compact('characters'));
    }
}
