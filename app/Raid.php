<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raid extends Model
{
    public function achievement()
    {
        return $this->hasMany('App\Boss');
    }
}
