<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    public function monitor()
    {
        return $this->belongsTo('App\Monitor');
    } 
}
