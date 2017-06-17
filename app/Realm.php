<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realm extends Model
{
    protected $fillable = [
        'id',
        'name',
        'displayName',
        'region_id',
        'type',
        'locale',
        'population',
    ];

    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}
