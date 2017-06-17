<?php

namespace App;

 use Cartalyst\Sentinel\Users\EloquentUser;
 use Illuminate\Database\Eloquent\SoftDeletes;

    class User extends EloquentUser {
        
        use SoftDeletes;
        
        protected $dates = ['deleted_at'];
        
        protected $fillable = [
            'email',
            'password',
            'username',
            'permissions',
            'status',
            'daysPerWeek',
            'interest_fun',
            'interest_rp',
            'interest_pvp',
            'interest_pve',
            'battlenet_id',
            'battlenet_token'
        ];

        public function characters()
        {
            return $this->hasMany('App\Character');
        }

        public function guilds()
        {
            return $this->belongsToMany('App\Guild');
        }
    }