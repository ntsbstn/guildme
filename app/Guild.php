<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $fillable = [
        'name',
        'realm_id',
        'region',
        'level',
        'language',
        'side',
        'players',
    ];

    public function user()
        {
            return $this->belongsToMany('App\User');
        }
    public function realm()
        {
            return $this->belongsTo('App\Realm');
        }
}
