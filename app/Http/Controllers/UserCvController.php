<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class UserCvController extends Controller
{
    //

    public function index(){


    }

    public function getFullInfo($id){

        $personalInfo = Employee::where()
            ->get();
    }
}
