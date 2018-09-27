<?php

namespace App\Http\Controllers;


use App\Education;
use App\Employee;
use App\Ethnicity;
use App\Jobapply;
use App\JobExperience;
use App\Nationality;
use App\ProfessionalQualification;
use App\Refree;
use App\RelativeInCb;
use App\Religion;

use App\Traning;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;
use PDF;

class EmployeeController extends Controller
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
    public function getEmployeeshowFullCv()
    {

        $empId=Employee::select('employeeId','cvStatus')->where('fkuserId',Auth::user()->userId)->first();

        if ($empId->cvStatus==0){

            $allEmp=$empId;

            Session::flash('message', 'Your CV is not Completed yet,Please Complete First');

            return view('userCv.cvPdf.userCvPdf',compact('allEmp'));

        }else{

            $allEmp=$empId;


            $empId=$empId->employeeId;

            $personalInfo = Employee::select('firstName','lastName',
                'fathersName','mothersName','gender','personalMobile',
                'dateOfBirth','email','presentAddress','image','religionName','nationalityName','nationalId','parmanentAddress')
                ->leftJoin('religion','religion.religionId','fkreligionId')
                ->leftJoin('nationality','nationality.nationalityId','fknationalityId')
                ->findOrFail($empId);

            $education=Education::select('degreeName','education.institutionName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
                'educationmajor.educationMajorName','education.fkMajorId','passingYear')
                ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
                ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
                ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
                ->where('fkemployeeId',$empId)
                ->orderBy('passingYear','desc')
                ->get();

            $professionalCertificate=ProfessionalQualification::where('fkemployeeId',$empId)
                ->get();

            $jobExperience=JobExperience::where('fkemployeeId',$empId)
                ->orderBy('startDate','desc')
                ->get();

            $trainingCertificate=Traning::where('fkemployeeId',$empId)
                ->orderBy('startDate','desc')
                ->get();
            $refree=Refree::where('fkemployeeId',$empId)
                ->get();
            $relativeCb=RelativeInCb::where('fkemployeeId',$empId)
                ->get();

            return view('userCv.cvPdf.userCvPdf',compact('allEmp','personalInfo','education','professionalCertificate','jobExperience','trainingCertificate','refree','relativeCb'));


        }






    }



}
