<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';
    public $timestamps = false;
    public $primaryKey = 'jobId';
}
