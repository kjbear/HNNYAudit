<?php

namespace App\Cognition;

use Illuminate\Database\Eloquent\Model;
use App\Cognition\CognitionBase;

class Author extends CognitionBase
{

    public function documents()
    {
        return $this->hasMany('App\Cognition\Document');
    }



}
