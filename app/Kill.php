<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kill extends Model
{
    protected $fillable = [
        'character_id',
        'boss_id',
        'raid_id',
        'lfrKills',
        'lfrTimestamp',
        'normalKills',
        'normalTimestamp',
        'heroicKills',
        'heroicTimestamp',
        'mythicKills',
        'mythicTimestamp'
    ];

    public function character()
    {
        return $this->belongsTo('App\Character');
    }
}
