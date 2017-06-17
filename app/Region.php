<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
     public function realm()
    {
        return $this->hasMany('App\Realm');
    }

    public static function getRegion($region_id){
        return Region::find($region_id);
    }
}
