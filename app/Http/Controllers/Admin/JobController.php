<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;


class JobController extends Controller
{
   public function index(Request $r){



   }

   public function manageJob(){

       $allJobList=Job::select('job.jobId','job.title as jobTitle','job.position as jobPosition','job.deadline','job.createBy','job.createDate','job.updateBy','job.updateTime','job.status','job.pdflink','zone.zoneName')
           ->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')
           ->get();


       return view('Admin.job.managejob',compact('allJobList'));
   }
   public function jobEdit($jobId){

       $jobInfo=Job::leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')->where('jobId',$jobId)
           ->get();

       $allZone=DB::table('zone')->get();

       return view('Admin.job.editJob',compact('jobInfo','allZone'));

   }
   public function jobStatusUpdate(Request $r){

       DB::table('job')
           ->where('jobId',$r->id)
           ->update(['jobStatus' => $r->jobStatus]);



   }
   public function jobUpdate(Request $r){

       $jobInfo=Job::findOrFail($r->jobId);
       $jobInfo->title=$r->title;
       $jobInfo->position=$r->position;
       $jobInfo->salary=$r->salary;
       $jobInfo->deadline=$r->deadline;
       $jobInfo->details=$r->jobDetails;
       $jobInfo->status=$r->status;
       $jobInfo->jobstatus=$r->jobStatus;
       $jobInfo->fkzoneId=$r->zone;

       $jobInfo->updateBy=Auth::user()->userId;
       $jobInfo->updateTime=Carbon::now();

       if ($r->status == '1'){
           $jobInfo->postBy=Auth::user()->userId;
           $jobInfo->postDate=Carbon::now();
       }

       if($r->hasFile('jobPdf')){
           $img = $r->file('jobPdf');
           $filename= $r->jobId.'jobPdf'.'.'.$img->getClientOriginalExtension();
           $jobInfo->pdflink=$filename;
           $location = public_path('jobPdf'.'/');
           $upload_success = $img->move($location, $filename);
       }

       $jobInfo->save();

       Session::flash('message', 'Job Edited Successfully');
       return redirect()->route('job.admin.manage');

   }
}
