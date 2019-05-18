<?php

namespace App\Http\Controllers;

use App\ComputerSkill;
use App\Employee;
use App\EmployeeComputerSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ComputerSkillController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
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
        $computerSkills=ComputerSkill::where('status',1)->whereNotIn('id', function ($query) use ($employee){
            $query->select('computerSkillId')
                ->from('empcomputerskill')
                ->where('fk_empId',$employee->employeeId);
        })
            ->get();

        $empComputerSkills=EmployeeComputerSkill::select('computerskill.computerSkillName','empcomputerskill.*')->leftJoin('computerskill','computerskill.id','empcomputerskill.computerSkillId')->where('fk_empId',$employee->employeeId)->get();

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

            if ($r->computerSkillId[$i] == OTHERS){

                $newComputerSkill=new ComputerSkill();
                $newComputerSkill->computerSkillName=$r->computerSkillName[$i];
                $newComputerSkill->status=1;
                $newComputerSkill->save();

                $empComputerSkill->computerSkillId=$newComputerSkill->id;

            }else{
                $empComputerSkill->computerSkillId=$r->computerSkillId[$i];
            }


            $empComputerSkill->SkillAchievement=$r->SkillAchievement[$i];
            $empComputerSkill->fk_empId=$employee->employeeId;
            $empComputerSkill->save();
        }

        Session::flash('message', 'Computer Skill Added Successfully');



        return Redirect()->route('candidate.computerSkill.index');
    }

public function deleteSkill(Request $r){

        EmployeeComputerSkill::destroy($r->id);
}

public function update(Request $r){

     //   return $r;
    $empComputerSkill=EmployeeComputerSkill::findOrFail($r->id);

    if ($r->computerSkillId == OTHERS){

        $newComputerSkill=new ComputerSkill();
        $newComputerSkill->computerSkillName=$r->computerSkillName;
        $newComputerSkill->status=1;
        $newComputerSkill->save();

        $empComputerSkill->computerSkillId=$newComputerSkill->id;

    }else{
        $empComputerSkill->computerSkillId=$r->computerSkillId;
    }


//    $empComputerSkill->computerSkillId=$r->computerSkillId;
    $empComputerSkill->SkillAchievement=$r->SkillAchievement;

    $empComputerSkill->save();


    Session::flash('message', 'Computer SKill Updated Successfully!');

    return redirect()->route('candidate.computerSkill.index');
//    return redirect()->route('manage.skill');
}

    public function edit(Request $r){

        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
        $computerSkill=EmployeeComputerSkill::findOrFail($r->id);

        $allComputerSkills=ComputerSkill::where('status',1)->whereNotIn('id', function ($query) use ($employee,$computerSkill){
            $query->select('computerSkillId')
                ->from('empcomputerskill')
                ->where('fk_empId',$employee->employeeId)
                ->whereNotIn('id',[$computerSkill->id]);
        })->get();


        return view('userCv.edit.computerSkill',compact('computerSkill','allComputerSkills'));
//       return $r;
    }
}
