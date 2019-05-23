<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Traning;
use App\Country;
use App\Employee;


class TrainingController extends Controller
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

       $employee=Employee::select('employeeId','hasTrainingInfo')->where('fkuserId',Auth::user()->userId)->first();
       $countries=Country::get();



       if (is_null($employee->hasTrainingInfo)) {

           $hasTrainingInfo = null;

           return view('userCv.insert.TrainingCertificate',compact('countries','hasTrainingInfo'));
       }
       elseif ($employee->hasTrainingInfo == 0){

           $hasTrainingInfo=0;

           return view('userCv.insert.TrainingCertificate',compact('countries','hasTrainingInfo'));

       }elseif ($employee->hasTrainingInfo == 1){

           $hasTrainingInfo=1;

           $trainings=Traning::where('fkemployeeId',$employee->employeeId)
               ->leftJoin('country','country.countryId','traning.countryId')
               ->get();



           if($trainings->isEmpty()){
               return view('userCv.insert.TrainingCertificate',compact('countries','hasTrainingInfo'));
           }

           else{
               return view('userCv.update.TrainingCertificate',compact('countries','trainings','hasTrainingInfo'));
           }


       }


   }
   public function insert(Request $r){

       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)
           ->first();

       $emp=Employee::findOrFail($employee->employeeId);
       if ($r->hasTrainingInfo==0){

           $emp->hasTrainingInfo=0;
           $emp->save();

       }
       else {
           $emp->hasTrainingInfo = 1;
           $emp->save();

           for($i=0;$i<count($r->trainingName);$i++){
               $training=new Traning();
               $training->trainingName=$r->trainingName[$i];
               $training->startDate=$r->startDate[$i];
               $training->endDate=$r->endDate[$i];
               $training->vanue=$r->vanue[$i];
               $training->countryId=$r->countryId[$i];
               $training->fkemployeeId=$employee->employeeId;

               $training->status=$r->status[$i];
               $training->hour=$r->hour[$i];
               $training->day=$r->day[$i];
               $training->week=$r->week[$i];
               $training->month=$r->month[$i];
               $training->year=$r->year[$i];

               $training->save();
           }
       }



       Session::flash('message', 'Training Added Successfully');
       return redirect()->route('candidate.cvTrainingCertificate');

   }

   public function editTrainingCertificate(Request $r){
       $training=Traning::findOrFail($r->traningId);
       $countries=Country::get();
       return view('userCv.edit.editTrainingCertificate',compact('training','countries'));
   }

   public function updateCvTraning(Request $r){
//        return $r;

       $training=Traning::findOrFail($r->traningId);
       $training->trainingName=$r->trainingName;
       $training->startDate=$r->startDate;
       $training->endDate=$r->endDate;
       $training->vanue=$r->venue;
       $training->countryId=$r->countryId;
       $training->status=$r->status;
       $training->hour=$r->hour;
       $training->day=$r->day;
       $training->week=$r->week;
       $training->month=$r->month;
       $training->year=$r->year;

       $training->save();

       Session::flash('message', 'Training Updated Successfully');

       return redirect()->route('candidate.cvTrainingCertificate');
   }

   public function deleteCvTraning(Request $r){
       Traning::destroy($r->traningId);

       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

       $count=Traning::where('fkemployeeId',$employee->employeeId)
           ->count();

       if ($count == 0){
           $emp=Employee::findOrFail($employee->employeeId);

           $emp->hasTrainingInfo=0;
           $emp->save();

       }

       Session::flash('message', 'Training Deleted Successfully');
   }
}
