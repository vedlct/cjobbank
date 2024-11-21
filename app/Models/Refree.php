<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refree extends Model
{

    protected $table = 'referee';
    protected $primaryKey = 'refereeId';
    public $timestamps = false;
}
