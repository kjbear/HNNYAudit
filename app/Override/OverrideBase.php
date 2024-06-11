<?php

namespace App\Override;

use Illuminate\Database\Eloquent\Model;

class OverrideBase extends Model
{
    protected $connection = 'override'; 
}
