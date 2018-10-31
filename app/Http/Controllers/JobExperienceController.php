<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;

use App\JobExperience;
use App\Employee;

class JobExperienceController extends Controller
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
   public function index(){

       $employee=Employee::select('employeeId','hasProfCertificate')->where('fkuserId',Auth::user()->userId)->first();


       $companyType=DB::table('organizationtype')->where('status',1)->get();

       if (is_null($employee->hasProfCertificate)) {

           $hasProfCertificate = null;

           return view('userCv.insert.jobExperience',compact('companyType','hasProfCertificate'));


       }
       elseif ($employee->hasProfCertificate == 0){

           $hasProfCertificate=0;

           return view('userCv.insert.jobExperience',compact('companyType','hasProfCertificate'));

       }elseif ($employee->hasProfCertificate == 1){

           $hasProfCertificate=1;

           $experiences=JobExperience::where('fkemployeeId',$employee->employeeId)
               ->leftJoin('organizationtype','organizationtype.organizationTypeId','jobexperience.fkOrganizationType')
               ->get();



           if($experiences->isEmpty()){

               return view('userCv.insert.jobExperience',compact('companyType','hasProfCertificate'));
           }

           else{
               return view('userCv.update.jobExperience',compact('experiences','companyType','hasProfCertificate'));
           }


       }

   }

   public function submitJobExperience(Request $r){

      // return $r;

       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

       for($i=0;$i<count($r->organization);$i++){

           $experience=new JobExperience();
           $experience->organization=$r->organization[$i];
           $experience->degisnation=$r->degisnation[$i];
           $experience->startDate=$r->startDate[$i];
           $experience->endDate=$r->endDate[$i];
           $experience->address=$r->address[$i];
           $experience->fkemployeeId=$employee->employeeId;
           $experience->fkOrganizationType=$r->organizationType[$i];

           $experience->majorResponsibilities=$r->majorResponsibilities[$i];
           $experience->keyAchivement=$r->keyAchivement[$i];
           $experience->supervisorName=$r->supervisorName[$i];
           $experience->reservationContactingEmployer=$r->reservationContactingEmployer[$i];

           $experience->employmentType=$r->employmentType[$i];
           $experience->employmentTypeText=$r->employmentTypeText[$i];

           $experience->save();
       }

       Session::flash('message', 'Experience Added Successfully');

       return redirect()->route('JobExperience.index');
   }

   public function editJobExperience(Request $r){

       $experience=JobExperience::leftJoin('organizationtype','organizationtype.organizationTypeId','jobexperience.fkOrganizationType')->findOrFail($r->jobExperienceId);
       $companyType=DB::table('organizationtype')->where('status',1)->get();

       return view('userCv.edit.editJobExperience',compact('experience','companyType'));
//       return $r;
   }

   public function updateJobExperience(Request $r){

       $experience=JobExperience::findOrFail($r->jobExperienceId);
       $experience->organization=$r->organization;
       $experience->degisnation=$r->degisnation;
       $experience->startDate=$r->startDate;
       $experience->endDate=$r->endDate;
       $experience->address=$r->address;
       $experience->fkOrganizationType=$r->organizationType;

       $experience->majorResponsibilities=$r->majorResponsibilities;
       $experience->keyAchivement=$r->keyAchivement;
       $experience->supervisorName=$r->supervisorName;
       $experience->reservationContactingEmployer=$r->reservationContactingEmployer;

       $experience->employmentType=$r->employmentType;
       $experience->employmentTypeText=$r->employmentTypeText;

       $experience->save();

       Session::flash('message', 'Experience Edited Successfully');
       return redirect()->route('JobExperience.index');
   }

   public function deleteJobExperience(Request $r){
       JobExperience::destroy($r->jobExperienceId);
       Session::flash('message', 'Experience Deleted Successfully');
   }
}
