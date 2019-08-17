<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class email extends Model
{
    protected $table='email';
    protected $primaryKey='email_id';
    public $timestamps=false;

}
