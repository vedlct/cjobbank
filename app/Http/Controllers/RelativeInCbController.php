<?php

namespace App\Http\Controllers;

use App\RelativeInCb;
use App\User;
use Illuminate\Http\Request;

use App\Employee;

use Auth;
use Session;

class RelativeInCbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){



    }
    public function getRelationInfo(){

        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

        $relativeInCaritas=RelativeInCb::where('fkemployeeId',$employee->employeeId)->get();



        if($relativeInCaritas->isEmpty()){
            return view('userCv.insert.relativeInCaritas');
        }

        else{
            return view('userCv.update.relativeInCaritas',compact('relativeInCaritas'));
        }


    }

}
