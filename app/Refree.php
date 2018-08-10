<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refree extends Model
{

    protected $table='referee';
    protected $primaryKey='refereeId';
    public $timestamps=false;
}
