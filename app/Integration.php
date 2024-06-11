<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{


    public function allStatus()
    {
        return $this->hasMany('App\IntegrationStatus');
    }

    public function latestStatus()
    {
        return $this->hasOne('App\IntegrationStatus')->latest()->limit(1);
    }

}
