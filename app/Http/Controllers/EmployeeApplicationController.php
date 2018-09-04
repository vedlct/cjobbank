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

class EmployeeApplicationController extends Controller
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
       // return view('home');
    }

    public function getAllApplication()
    {

        $empId=Employee::where('fkuserId',Auth::user()->userId)->first()->employeeId;

        $jobApplyList=Jobapply::select('job.title','job.pdflink','zone.zoneName','jobapply.applydate')->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')->where('fkemployeeId',$empId)->get();

        return view('job.jobApplyList',compact('jobApplyList'));


    }



}
