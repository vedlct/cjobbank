<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeOtherInfo extends Model
{
    protected $table = 'emp_other_info';
    public $timestamps = false;
    public $primaryKey = 'id';
}
