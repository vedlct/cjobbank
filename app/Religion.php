<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    //
    protected $table = 'religion';
    public $timestamps = false;
    public $primaryKey = 'religionId';
}
