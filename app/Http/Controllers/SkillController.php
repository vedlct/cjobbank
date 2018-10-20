<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmpOtherSkill;
use App\OtherSkillInformation;
use Illuminate\Http\Request;
use Auth;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (Auth::check()){

                return $next($request);


            }else{

                return redirect('/');
            }


        });
    }
    public function index(){

        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
        $empSkills=EmpOtherSkill::where('fkemployeeId',$employee->employeeId)->get();
        $skills=OtherSkillInformation::where('status',1)->get();
//        return $skills;
        if($empSkills->isEmpty()){

            return view('userCv.insert.otherSkill',compact('skills'));
        }

        return view('userCv.update.otherSkill',compact('empSkills','skills'));


    }

    public function insert(Request $r){
        return $r;
    }
}
