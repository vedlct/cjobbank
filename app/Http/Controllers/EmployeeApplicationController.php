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
       // return view('home');
    }

    public function getAllApplication()
    {

        $empId=Employee::where('fkuserId',Auth::user()->userId)->first();

        if ($empId != null ){

            $jobApplyList=Jobapply::select('job.title','job.pdflink','zone.zoneName','jobapply.applydate')->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')->where('fkemployeeId',$empId->employeeId)->get();

        }else {
            $jobApplyList= null;
        }

        return view('job.jobApplyList',compact('jobApplyList'));


    }



}
