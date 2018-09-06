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
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){


   }

   public function addNewJob(){

       $allZone=DB::table('zone')->get();

       return view('Admin.job.addJob',compact('allZone'));

   }

   public function manageJob(){

       $allJobList=Job::select('job.jobId','job.title as jobTitle','job.position as jobPosition','job.deadline','u1.name as createBy','job.createDate','u2.name as updateBy','job.updateTime','job.status','job.pdflink','zone.zoneName')
           ->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')
           ->leftJoin('user as u1', 'u1.userId', '=', 'job.createBy')
           ->leftJoin('user as u2', 'u2.userId', '=', 'job.updateBy')
           ->where('job.status', '!=',0)
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
           ->update(['status' => $r->status]);



   }
   public function jobDelete(Request $r){

       DB::table('job')
           ->where('jobId',$r->id)
           ->update(['status' => 0]);



   }

   public function jobUpdate(Request $r){

       $rules = [

           'title' => 'required|max:255',
           'position' => 'required|max:45',
           'salary' => 'required|max:45',
           'jobStatus' => 'required',
           'deadline' => 'required|date',
           'zone' => 'required',


       ];

       $customMessages = [
//            'unique' => 'This User is already been registered.Please Login !'
       ];

       $this->validate($r, $rules, $customMessages);

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
   public function jobInsert(Request $r){

       $rules = [

           'title' => 'required|max:255',
           'position' => 'required|max:45',
           'salary' => 'required|max:45',
           'jobStatus' => 'required',
           'deadline' => 'required|date',
           'zone' => 'required',


       ];

       $customMessages = [
//            'unique' => 'This User is already been registered.Please Login !'
       ];

       $this->validate($r, $rules, $customMessages);



       $jobInfo= new Job();

       $jobInfo->title=$r->title;
       $jobInfo->position=$r->position;
       $jobInfo->salary=$r->salary;
       $jobInfo->deadline=$r->deadline;
       $jobInfo->details=$r->jobDetails;
       $jobInfo->status=$r->status;
       $jobInfo->jobstatus=$r->jobStatus;
       $jobInfo->fkzoneId=$r->zone;
       $jobInfo->createBy=Auth::user()->userId;
       $jobInfo->createDate=Carbon::now();


       $jobInfo->updateBy=Auth::user()->userId;
       $jobInfo->updateTime=Carbon::now();

       if ($r->status == '1'){
           $jobInfo->postBy=Auth::user()->userId;
           $jobInfo->postDate=Carbon::now();
       }
       $jobInfo->save();

       if($r->hasFile('jobPdf')){
           $img = $r->file('jobPdf');
           $filename= $jobInfo->jobId.'jobPdf'.'.'.$img->getClientOriginalExtension();
           $jobInfo->pdflink=$filename;
           $location = public_path('jobPdf'.'/');
           $upload_success = $img->move($location, $filename);
       }

       $jobInfo->save();

       Session::flash('message', 'Job Added Successfully');
       return redirect()->route('job.admin.manage');

   }
}
