<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KillsController extends Controller
{
    public function boss()
    {
        return $this->belongsTo('App\Boss');
    }
}
