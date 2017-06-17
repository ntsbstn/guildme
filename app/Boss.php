<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    public function raid()
    {
       return $this->belongsTo('App\Raid');
    }
    public function kill()
    {
        return $this->hasMany('App\Kill');
    }

     public static function getBoss($boss_id){
        return Boss::where('api_id', $boss_id)->first();
    }
}
