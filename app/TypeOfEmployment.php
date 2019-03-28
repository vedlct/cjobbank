<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfEmployment extends Model
{
    //
    protected $table = 'type_of_employment';
    public $timestamps = false;
    public $primaryKey = 'id';
}
