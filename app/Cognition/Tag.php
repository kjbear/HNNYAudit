<?php

namespace App\Cognition;

use Illuminate\Database\Eloquent\Model;
use App\Cognition\CognitionBase;

class Tag extends CognitionBase
{
    public function documents()
    {
        //return $this->morphedByMany('App\Cognition\Document','taggable');
        return $this->morphTo();
    } 
}
