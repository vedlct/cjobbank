<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    //
    protected $table = 'degree';
    public $timestamps = false;
    public $primaryKey = 'degreeId';
}
