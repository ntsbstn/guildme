<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
   
    public static function getFaction($faction_id){
        return Faction::where('api_id', $faction_id)->first();
    }
}
