<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Jobapply;
use Illuminate\Http\Request;
use App\Job;
use Auth;
class JobController extends Controller
{
   public function index(Request $r){


       $jobs=Job::select('job.jobId','job.title','job.details','job.details','job.deadline')
                    ->where('job.status',1);

       if($r->search !=""){
           $jobs=$jobs->where('job.title', 'like', '%' . $r->search . '%');
       }
       $jobs=$jobs->paginate(10);

       $cvStatus=Employee::where('fkuserId',Auth::user()->userId)->first()->cvStatus;


       if ($r->ajax()) {
           return view('job.getAllJob',compact('jobs','cvStatus'));
       }
       return view('job.all');

   }

   public function getJobData(Request $r){

       $jobs=Job::select('job.jobId','job.title','job.details','job.details','job.deadline')
           ->where('job.status',1);
       if($r->search !=""){
           $jobs=$jobs->where('job.title', 'like', '%' . $r->search . '%');
       }
       $jobs=$jobs->paginate(10);

       $cvStatus=Employee::where('fkuserId',Auth::user()->userId)->first()->cvStatus;

       return view('job.getAllJob',compact('jobs','cvStatus'));
   }

   public function applyJobModal(Request $r){

       return view('job.jobModal')->with('jobId',$r->jobId);
   }
}
