<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionObjectiveAns extends Model
{
    //
    protected $table = 'emp_ques_objective_and_info_ans';
    public $timestamps = false;
    public $primaryKey = 'id';
}
