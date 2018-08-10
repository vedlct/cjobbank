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
   public function index(){
       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
       $trainings=Traning::where('fkemployeeId',$employee->employeeId)
           ->leftJoin('country','country.countryId','traning.countryId')
           ->get();

       $countries=Country::get();
       if($trainings->isEmpty()){
           return view('userCv.insert.TrainingCertificate',compact('countries'));
       }

       else{
           return view('userCv.update.TrainingCertificate',compact('countries','trainings'));
       }


   }
   public function insert(Request $r){

       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)
           ->first();

       for($i=0;$i<count($r->trainingName);$i++){
          $training=new Traning();
          $training->trainingName=$r->trainingName[$i];
          $training->startDate=$r->startDate[$i];
          $training->endDate=$r->endDate[$i];
          $training->vanue=$r->vanue[$i];
          $training->countryId=$r->countryId[$i];
          $training->fkemployeeId=$employee->employeeId;

          $training->save();
       }

       Session::flash('message', 'Traning Added Successfully');
       return redirect()->route('candidate.cvTrainingCertificate');

   }

   public function editTrainingCertificate(Request $r){
       $training=Traning::findOrFail($r->traningId);
       $countries=Country::get();
       return view('userCv.edit.editTrainingCertificate',compact('training','countries'));
   }

   public function updateCvTraning(Request $r){
       $training=Traning::findOrFail($r->traningId);
       $training->trainingName=$r->trainingName;
       $training->startDate=$r->startDate;
       $training->endDate=$r->endDate;
       $training->vanue=$r->vanue;
       $training->countryId=$r->countryId;

       $training->save();

       Session::flash('message', 'Traning Updated Successfully');

       return redirect()->route('candidate.cvTrainingCertificate');
   }

   public function deleteCvTraning(Request $r){
       Traning::destroy($r->traningId);
       Session::flash('message', 'Traning Deleted Successfully');
   }
}
