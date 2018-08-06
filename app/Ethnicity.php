<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ethnicity extends Model
{
    //
    protected $table = 'ethnicity';
    public $timestamps = false;
    public $primaryKey = 'ethnicityId';
}
