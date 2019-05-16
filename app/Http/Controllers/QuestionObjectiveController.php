<?php

namespace App\Http\Controllers;


use App\Employee;

use App\EmployeeOtherInfo;
use App\QuestionObjective;
use App\QuestionObjectiveAndInfo;
use App\QuestionObjectiveAns;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;

class QuestionObjectiveController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
    }

    public function getEmployeeCvQuesTionObjective()
    {
        $userId=Auth::user()->userId;

        $employee=Employee::where('fkuserId', '=',$userId)->first()->employeeId;

        $employeeCvQuesObjInfo=QuestionObjective::where('empId','=',$employee)->first();

//        return $employeeCvQuesObjInfo;

        if ($employeeCvQuesObjInfo){
            $employeeCvQuesObjQues=QuestionObjectiveAndInfo::where('status',1)->orderBy('serial', 'ASC')->get();

            $employeeCvQuesObjQuesAns=QuestionObjectiveAns::select('emp_ques_objective_and_info_ans.*','emp_ques_objective_and_info.ques')
                ->leftJoin('emp_ques_objective_and_info', 'emp_ques_objective_and_info.id', '=', 'emp_ques_objective_and_info_ans.fkqusId')
                ->where('fkemployeeId',$employee)
                ->get();

          //  return $employeeCvQuesObjQuesAns;

            return view('userCv.update.objAndQuesInfo',compact('employeeCvQuesObjInfo','employee','employeeCvQuesObjQuesAns','employeeCvQuesObjQues'));

        }
        else{
            $employeeCvQuesObjQues=QuestionObjectiveAndInfo::where('status',1)->orderBy('serial', 'ASC')->get();

            return view('userCv.insert.objAndQuesInfo',compact('employeeCvQuesObjInfo','employeeCvQuesObjQues'));
        }

    }
    public function insertObjectiveAndQuestion(Request $r)
    {
       // return $r->CareerQues[$i];


        $rules = [

            'objective' => 'max:2500',


        ];

        $customMessages = [
//            'unique' => 'This User is already been registered.Please Login !'
        ];

        $this->validate($r, $rules, $customMessages);

        $userId=Auth::user()->userId;

        $employee=Employee::where('fkuserId', '=',$userId)->first()->employeeId;

        $employeeCvQuesObjQues=QuestionObjectiveAndInfo::where('status',1)->orderBy('serial', 'ASC')->count();


        $employeeCareerInfo=new QuestionObjective();

        $employeeCareerInfo->objective=$r->objective;

        if ($r->freshers){


            $employeeCareerInfo->currentSalary=$r->currentSalary;

            for ($i=1;$i<=$employeeCvQuesObjQues;$i++){



                $userAggrement=new QuestionObjectiveAns();

                $userAggrement->fkemployeeId=$employee;
                $userAggrement->fkqusId=$r['qesId'.$i];
                $userAggrement->ans=$r['CareerQues'.$i];
                $userAggrement->save();

            }

        }


//        $employeeCareerInfo->ques_1=$r->CareerQues1;
//        $employeeCareerInfo->ques_2=$r->CareerQues2;


        $employeeCareerInfo->expectedSalary=$r->expectedSalary;
        $employeeCareerInfo->readyToJoinAfter=$r->readyToJoinAfter;

        $employeeCareerInfo->empId=$employee;


        $employeeCareerInfo->save();

        Session::flash('message', 'Career Info Added Successfully');

        return redirect()->route('candidate.cvQuesObj');


    }

    public function getQuestionObjectiveEdit(Request $r)
    {

        $employeeCareerInfo=QuestionObjective::findOrFail($r->id);

        $userId=Auth::user()->userId;

        $employee=Employee::where('fkuserId', '=',$userId)->first()->employeeId;


            $employeeCvQuesObjQuesAns=QuestionObjectiveAns::select('emp_ques_objective_and_info.ques','emp_ques_objective_and_info_ans.*')
                ->leftJoin('emp_ques_objective_and_info', 'emp_ques_objective_and_info.id', '=', 'emp_ques_objective_and_info_ans.fkqusId')->where('fkemployeeId',$employee)
                ->where('emp_ques_objective_and_info.status', 1)->get();

            $employeeCvQuesObjQues=QuestionObjectiveAndInfo::where('status',1)->orderBy('serial', 'ASC')->get();



        return view('userCv.edit.objAndQuesInfo',compact('employeeCareerInfo','employeeCvQuesObjQues','employeeCvQuesObjQuesAns'));


    }

    public function updateQuesObj(Request $r)
    {



        $rules = [

            'objective' => 'max:2500',


        ];

        $customMessages = [
//            'objective' => 'This User is already been registered.Please Login !'
        ];

        $this->validate($r, $rules, $customMessages);

        $userId=Auth::user()->userId;
//        return $r;

        $employee=Employee::where('fkuserId', '=',$userId)->first()->employeeId;

        $employeeCvQuesObjQues=QuestionObjectiveAndInfo::where('status',1)->orderBy('serial', 'ASC')->count();


        $employeeCareerInfo=QuestionObjective::findOrFail($r->empQuesObjId);
        $employeeCareerInfo->objective=$r->objective;


        if ($r->freshers==1){
            $employeeCareerInfo->currentSalary=$r->currentSalary;


            for ($i=1;$i<=$employeeCvQuesObjQues;$i++){

                try
                {
                    $userAggrement=QuestionObjectiveAns::findOrFail($r['id'.$i]);
                    $userAggrement->ans=$r['CareerQues'.$i];
                    $userAggrement->save();
                }
                    // catch(Exception $e) catch any exception
                catch(ModelNotFoundException $e)
                {
                   // return 'qesId'.$i;

                    $userAggrement=new QuestionObjectiveAns();

                    $userAggrement->fkemployeeId=$employee;
                    $userAggrement->fkqusId=$r['qesId'.$i];
                    $userAggrement->ans=$r['CareerQues'.$i];
                    $userAggrement->save();

                }


            }



        }

        else if($r->freshers==0){
            QuestionObjectiveAns::where('fkemployeeId',$employee)->delete();
        }

        $employeeCareerInfo->expectedSalary=$r->expectedSalary;
        $employeeCareerInfo->readyToJoinAfter=$r->readyToJoinAfter;

        $employeeCareerInfo->empId=$employee;


        $employeeCareerInfo->save();



        Session::flash('message', 'Career Info Updated Successfully');

        return redirect()->route('candidate.cvQuesObj');



    }


}
