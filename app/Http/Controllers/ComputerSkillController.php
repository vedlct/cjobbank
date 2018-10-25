<?php

namespace App\Http\Controllers;

use App\ComputerSkill;
use App\Employee;
use App\EmployeeComputerSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class ComputerSkillController extends Controller
{
    public function index(){

        $computerSkills=ComputerSkill::where('status',1)
            ->get();
        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
        $empComputerSkills=EmployeeComputerSkill::where('fk_empId',$employee->employeeId)->get();

        if ($empComputerSkills->isEmpty()) {
            return view('userCv.insert.computerSkill',compact('computerSkills'));
        }
        else{
            return view('userCv.update.computerSkill',compact('computerSkills','empComputerSkills'));
        }


    }

    public function insert(Request $r){

        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

        for($i=0;$i<count($r->computerSkillId);$i++){
            $empComputerSkill=new EmployeeComputerSkill();
            $empComputerSkill->computerSkillId=$r->computerSkillId[$i];
            $empComputerSkill->SkillAchievement=$r->SkillAchievement[$i];
            $empComputerSkill->fk_empId=$employee->employeeId;
            $empComputerSkill->save();
        }

        Session::flash('message', 'Computer Skill Added Successfully');



        return Redirect()->route('candidate.computerSkill.index');
    }
}
