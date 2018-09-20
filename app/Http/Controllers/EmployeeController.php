<?php

namespace App\Http\Controllers;


use App\Employee;
use App\Ethnicity;
use App\Jobapply;
use App\Nationality;
use App\Religion;

use Illuminate\Http\Request;
use Session;
use Auth;
use Image;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getEmployeeCvCareerObjective()
    {
        $userId=Auth::user()->userId;
        return view('userCv.careerObjective');


    }
    public function applyJob($jobId,Request $r)
    {

        $empId=Employee::where('fkuserId',Auth::user()->userId)->first()->employeeId;



        $jobApply=new Jobapply();
        $jobApply->applydate=date('Y-m-d');
        $jobApply->fkjobId=$jobId;
        $jobApply->fkemployeeId=$empId;
        $jobApply->currentSalary=$r->currentSalary;
        $jobApply->expectedSalary=$r->expectedSalary;
//        $jobApply->status=JOB_STATUS['Pending'];
        $jobApply->save();

        return redirect()->route('job.all');


    }
    public function getEmployeeshowFullCv($jobId,Request $r)
    {

        $empId=Employee::select('employeeId','cvStatus')->where('fkuserId',Auth::user()->userId)->first();

        if ($empId->cvStatus == 0){
            return 0;
        }elseif($empId->cvStatus == 1){
            
            return 1;
        }



    }



}
