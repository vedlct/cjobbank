<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\JobExperience;
use App\Employee;

class JobExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function index(){
       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
       $experiences=JobExperience::where('fkemployeeId',$employee->employeeId)
           ->get();

       if($experiences->isEmpty()){

           return view('userCv.insert.jobExperience');
       }

       return view('userCv.update.jobExperience',compact('experiences'));

   }

   public function submitJobExperience(Request $r){
       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

       for($i=0;$i<count($r->organization);$i++){

           $experience=new JobExperience();
           $experience->organization=$r->organization[$i];
           $experience->degisnation=$r->degisnation[$i];
           $experience->startDate=$r->startDate[$i];
           $experience->endDate=$r->endDate[$i];
           $experience->address=$r->address[$i];
           $experience->fkemployeeId=$employee->employeeId;
           $experience->save();
       }
       Session::flash('message', 'Experience Added Successfully');

       return redirect()->route('JobExperience.index');
   }

   public function editJobExperience(Request $r){
       $experience=JobExperience::findOrFail($r->jobExperienceId);

       return view('userCv.edit.editJobExperience',compact('experience'));
//       return $r;
   }

   public function updateJobExperience(Request $r){

       $experience=JobExperience::findOrFail($r->jobExperienceId);
       $experience->organization=$r->organization;
       $experience->degisnation=$r->degisnation;
       $experience->startDate=$r->startDate;
       $experience->endDate=$r->endDate;
       $experience->address=$r->address;
       $experience->save();

       Session::flash('message', 'Experience Edited Successfully');
       return redirect()->route('JobExperience.index');
   }

   public function deleteJobExperience(Request $r){
       JobExperience::destroy($r->jobExperienceId);
       Session::flash('message', 'Experience Deleted Successfully');
   }
}
