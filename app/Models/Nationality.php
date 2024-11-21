<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $table = 'nationality';
    protected $primaryKey = 'nationalityId';
    public $timestamps = false;
}
