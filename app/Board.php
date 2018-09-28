<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

    protected $table = 'board';
    public $timestamps = false;
    public $primaryKey = 'boardId';
}
