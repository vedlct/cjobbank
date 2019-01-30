<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmpOtherSkill;
use App\OtherSkillInformation;
use Illuminate\Http\Request;
use Auth;
use Session;

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

        $employee=Employee::select('employeeId','hasOtherSkill')->where('fkuserId',Auth::user()->userId)->first();


        $skills=OtherSkillInformation::where('status',1)->whereNotIn('id', function ($query) use ($employee){
            $query->select('otherSkillId')
                ->from('emp_otherskill_achievement')
                ->where('fkemployeeId',$employee->employeeId);
        })->get();

        if (is_null($employee->hasOtherSkill)) {
            $hasOtherSkill = null;
            return view('userCv.insert.otherSkill',compact('skills','hasOtherSkill'));

        }
        elseif ($employee->hasOtherSkill == 0){

            $hasOtherSkill=0;

            return view('userCv.insert.otherSkill',compact('skills','hasOtherSkill'));

        }elseif ($employee->hasOtherSkill == 1){

            $empSkills=EmpOtherSkill::select('emp_otherskill_achievement.id','emp_otherskill_achievement.ratiing',
                'otherskillsinformation.skillName')
                ->where('fkemployeeId',$employee->employeeId)
                ->leftJoin('otherskillsinformation','otherskillsinformation.id','emp_otherskill_achievement.otherSkillId')
                ->get();



            if($empSkills->isEmpty()){

                $hasOtherSkill=0;

                return view('userCv.insert.otherSkill',compact('skills','hasOtherSkill'));
            }

            else{

                $hasOtherSkill=1;

                return view('userCv.update.otherSkill',compact('empSkills','skills','hasOtherSkill'));
            }


        }



    }

    public function insert(Request $r){

        //return $r;


        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

        $emp=Employee::findOrFail($employee->employeeId);

        if ($r->hasOtherSkill==0){

            $emp->hasOtherSkill=0;
            $emp->save();

        }else{
            $emp->hasOtherSkill=1;
            $emp->save();

            for($i=0;$i<count($r->skill);$i++){


                $otherSkill=new EmpOtherSkill();

                if ($r->skill[$i] == OTHERS){
                    $newOtherSkill=new OtherSkillInformation();
                    $newOtherSkill->skillName=$r->otherSkillName[$i];
                    $newOtherSkill->status=1;
                    $newOtherSkill->save();

                    $otherSkill->otherSkillId=$newOtherSkill->id;

                }else{
                    $otherSkill->otherSkillId=$r->skill[$i];
                }


                $otherSkill->fkemployeeId=$employee->employeeId;
                $otherSkill->ratiing=$r->skillPercentage[$i];

                $otherSkill->save();
            }

        }



        Session::flash('message', 'Other Skill Added Successfully');

        return redirect()->route('candidate.skill.index');

    }
    public function update(Request $r){

//        return $r;
        $otherSkill=EmpOtherSkill::findOrFail($r->skillId);

        if ($r->skill == OTHERS){

            $newOtherSkill=new OtherSkillInformation();

            $newOtherSkill->skillName=$r->otherSkillName;
            $newOtherSkill->status=1;
            $newOtherSkill->save();

            $otherSkill->otherSkillId=$newOtherSkill->id;

        }else{
            $otherSkill->otherSkillId=$r->skill;
        }


//            $otherSkill=EmpOtherSkill::findOrFail($r->skillId);


            $otherSkill->ratiing=$r->skillPercentage;

            $otherSkill->save();


        Session::flash('message', 'Other Skill Updated Successfully');

        return redirect()->route('candidate.skill.index');

    }

    public function edit(Request $r){

        $empSkills=EmpOtherSkill::select('emp_otherskill_achievement.id','emp_otherskill_achievement.otherSkillId','emp_otherskill_achievement.ratiing',
            'otherskillsinformation.skillName')

            ->leftJoin('otherskillsinformation','otherskillsinformation.id','emp_otherskill_achievement.otherSkillId')
            ->where('emp_otherskill_achievement.id',$r->skillId)
            ->first();
        $skills=OtherSkillInformation::where('status',1)->get();

        return view('userCv.edit.otherSkill',compact('empSkills','skills'));

    }

    public function delete(Request $r){

        EmpOtherSkill::destroy($r->skillId);

        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
        $count=EmpOtherSkill::where('fkemployeeId',$employee->employeeId)
            ->count();

        if ($count == 0){
            $emp=Employee::findOrFail($employee->employeeId);

            $emp->hasOtherSkill=0;
            $emp->save();

        }

        Session::flash('message', 'Other Skill Deleted Successfully');
    }
}
