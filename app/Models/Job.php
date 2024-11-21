<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';
    protected $primaryKey = 'jobId';
    public $timestamps = false;
}
