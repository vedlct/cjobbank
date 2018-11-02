<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeComputerSkill extends Model
{
    protected $table = 'empcomputerskill';
    public $timestamps = false;
    public $primaryKey = 'id';
}
