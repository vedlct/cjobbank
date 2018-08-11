<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
   public function index(Request $r){


       $jobs=Job::select('job.jobId','job.title','job.details','job.details','job.deadline');
       if($r->search !=""){
           $jobs=$jobs->where('job.title', 'like', '%' . $r->search . '%');
       }
       $jobs=$jobs->paginate(10);


       if ($r->ajax()) {
           return view('job.getAllJob',compact('jobs'));
       }
       return view('job.all');

   }

   public function getJobData(Request $r){

       $jobs=Job::select('job.jobId','job.title','job.details','job.details','job.deadline');
       if($r->search !=""){
           $jobs=$jobs->where('job.title', 'like', '%' . $r->search . '%');
       }
       $jobs=$jobs->paginate(10);

       return view('job.getAllJob',compact('jobs'));
   }
}
