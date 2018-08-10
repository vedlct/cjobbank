<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
   public function index(Request $r){

       $jobs=Job::paginate(1);

       if ($r->ajax()) {
           return view('job.getAllJob',compact('jobs'));
       }
       return view('job.all');

   }

   public function getJobData(Request $r){

       $jobs=Job::paginate(1);

       return view('job.getAllJob',compact('jobs'));
   }
}
