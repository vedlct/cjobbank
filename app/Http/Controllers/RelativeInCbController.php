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

        $this->getRelationInfo();

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

    public function submitRelativeInCb(Request $r){


        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();



        for($i=0;$i<count($r->firstName);$i++){
            $relative=new RelativeInCb();
            $relative->firstName=$r->firstName[$i];
            $relative->lastName=$r->lastName[$i];
            $relative->degisnation=$r->degisnation[$i];
            $relative->fkemployeeId=$employee->employeeId;
            $relative->save();
        }



        Session::flash('message', 'Realative Added Successfully');

        return redirect()->route('relativeInCaritas.getRelationInfo');
    }

}
