<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function character()
    {
        return $this->hasMany('App\Character');
    }
}
