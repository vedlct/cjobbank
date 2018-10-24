<?php

namespace App\Http\Controllers;


use App\Employee;

use App\EmployeeOtherInfo;
use App\QuestionObjective;
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


        if ($employeeCvQuesObjInfo){

            return view('userCv.update.objAndQuesInfo',compact('employeeCvQuesObjInfo','employee'));


        }else{

            return view('userCv.insert.objAndQuesInfo',compact('employeeCvQuesObjInfo'));
        }

    }
    public function insertObjectiveAndQuestion(Request $r)
    {
        //return $r;

        $rules = [

            'objective' => 'required|max:200',
            'CareerQues1' => 'required|max:200',
            'CareerQues2' => 'required|max:200',

        ];

        $customMessages = [
//            'unique' => 'This User is already been registered.Please Login !'
        ];

        $this->validate($r, $rules, $customMessages);

        $userId=Auth::user()->userId;

        $employee=Employee::where('fkuserId', '=',$userId)->first()->employeeId;


        $employeeCareerInfo=new QuestionObjective();

        $employeeCareerInfo->objective=$r->objective;
        $employeeCareerInfo->ques_1=$r->CareerQues1;
        $employeeCareerInfo->ques_2=$r->CareerQues2;

        $employeeCareerInfo->currentSalary=$r->currentSalary;
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

        return view('userCv.edit.objAndQuesInfo',compact('employeeCareerInfo'));


    }

    public function updateQuesObj(Request $r)
    {

        //return $r;

        $rules = [

            'objective' => 'required|max:200',
            'CareerQues1' => 'required|max:200',
            'CareerQues2' => 'required|max:200',

        ];

        $customMessages = [
//            'unique' => 'This User is already been registered.Please Login !'
        ];

        $this->validate($r, $rules, $customMessages);


        $employeeCareerInfo=QuestionObjective::findOrFail($r->empQuesObjId);

        $employeeCareerInfo->objective=$r->objective;
        $employeeCareerInfo->ques_1=$r->CareerQues1;
        $employeeCareerInfo->ques_2=$r->CareerQues2;


        $employeeCareerInfo->currentSalary=$r->currentSalary;
        $employeeCareerInfo->expectedSalary=$r->expectedSalary;
        $employeeCareerInfo->readyToJoinAfter=$r->readyToJoinAfter;


        $employeeCareerInfo->save();


        Session::flash('message', 'Career Info Updated Successfully');

        return redirect()->route('candidate.cvQuesObj');


    }


}
