<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HR extends Model
{
    protected $table="hr";
    protected $primaryKey="hrId";
    public $timestamps=false;
}
