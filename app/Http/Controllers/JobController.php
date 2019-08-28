<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Jobapply;
use Illuminate\Http\Request;
use App\Job;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
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

   public function index(Request $r){

       $allZone=DB::table('zone')->where('status',1)->get();


       $jobs=Job::select('job.jobId','job.title','job.details','job.details','job.deadline','job.pdflink')
                    ->where('job.status',1)
                    ->where('job.deadline','>=',date('Y-m-d'));

       if($r->search !=""){
           $jobs=$jobs->where('job.title', 'like', '%' . $r->search . '%');
       }
       if ($r->zonefilter){
           $jobs= $jobs->where('job.fkzoneId',$r->zonefilter);
       }
       $jobs=$jobs->paginate(10);


       $empId1=Employee::where('fkuserId',Auth::user()->userId)->first();

       if ($empId1 != null ){

           $cvStatus=$empId1->cvStatus;

           $applyjob = Jobapply::select('fkjobId')
               ->where('fkemployeeId' , $empId1->employeeId)
               ->get();

       }else {
           $cvStatus=null;

           $applyjob = null;
       }

       if ($r->ajax()) {
           return view('job.getAllJob',compact('jobs','cvStatus', 'applyjob','allZone'));
       }

       return view('job.all',compact('allZone','applyjob'));

   }

   public function guestAvailablejob()
   {
       $allZone=DB::table('zone')->where('status',1)->get();
       return view('guest.availableJob',compact('allZone'));
   }

   public function guestGetJobData(Request $r)
   {
       $allZone=DB::table('zone')->where('status',1)->get();

       $jobs=Job::select('job.jobId','job.title','job.details','job.details','job.deadline','job.pdflink')
           ->where('job.status',1)
           ->where('job.deadline','>=',date('Y-m-d'));
       if($r->search !=""){
           $jobs=$jobs->where('job.title', 'like', '%' . $r->search . '%');
       }
       if ($r->zonefilter){
           $jobs= $jobs->where('job.fkzoneId',$r->zonefilter);
       }


       $jobs=$jobs->paginate(10);

//       $cvStatus=Employee::where('fkuserId',Auth::user()->userId)->first()->cvStatus;

//       $empId1=Employee::where('fkuserId',Auth::user()->userId)->first();
//
//
//       if ($empId1 != null ){
//
//           $cvStatus=$empId1->cvStatus;
//
//           $applyjob = Jobapply::select('fkjobId')
//               ->where('fkemployeeId' , $empId1->employeeId)
//               ->get();
//
//
//
//       }else {
//           $cvStatus=null;
//
//           $applyjob = null;
//       }

       return view('job.getAllJob',compact('jobs','allZone'));
   }

   public function getJobData(Request $r){

       $allZone=DB::table('zone')->where('status',1)->get();

       $jobs=Job::select('job.jobId','job.title','job.details','job.details','job.deadline','job.pdflink')
           ->where('job.status',1)
           ->where('job.deadline','>=',date('Y-m-d'));
       if($r->search !=""){
           $jobs=$jobs->where('job.title', 'like', '%' . $r->search . '%');
       }
       if ($r->zonefilter){
           $jobs= $jobs->where('job.fkzoneId',$r->zonefilter);
       }
//       $empId=Employee::where('fkuserId',Auth::user()->userId)->first()->employeeId;
//
//       $applyjob = Jobapply::select('fkjobId')
//           ->where('fkemployeeId' , $empId)
//           ->get();


       $jobs=$jobs->paginate(10);

//       $cvStatus=Employee::where('fkuserId',Auth::user()->userId)->first()->cvStatus;

       $empId1=Employee::where('fkuserId',Auth::user()->userId)->first();


       if ($empId1 != null ){

           $cvStatus=$empId1->cvStatus;

           $applyjob = Jobapply::select('fkjobId')
               ->where('fkemployeeId' , $empId1->employeeId)
               ->get();



       }else {
           $cvStatus=null;

           $applyjob = null;
       }

       return view('job.getAllJob',compact('jobs','cvStatus','applyjob','allZone'));
   }

   public function applyJobModal(Request $r){
        $jobId = $r->jobId;
        $jobTitle = $r->jobTitle;
        return view('job.jobModal',compact('jobId'));
   }
}
