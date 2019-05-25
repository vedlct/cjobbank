<?php

namespace App\Http\Controllers;

use App\PreviousWorkInCB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;

use App\Traning;
use App\Country;
use App\Employee;


class PreviousWorkInCBController extends Controller
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

       $employee=Employee::select('employeeId','hasWorkedInCB')->where('fkuserId',Auth::user()->userId)->first();


       if (is_null($employee->hasWorkedInCB)) {

           $hasWorkedInCB = null;

           return view('userCv.insert.previousWorkInCB',compact('hasWorkedInCB'));
       }
       elseif ($employee->hasWorkedInCB == 0){

           $hasWorkedInCB=0;

           return view('userCv.insert.previousWorkInCB',compact('hasWorkedInCB'));

       }elseif ($employee->hasWorkedInCB == 1){

           $hasWorkedInCB=1;

           $previousWorkInCB=PreviousWorkInCB::select('previous_work_in_caritasbd.*')
               ->addSelect(DB::raw("(CASE WHEN `previous_work_in_caritasbd`.`endDate` IS NOT null AND `previous_work_in_caritasbd`.`startDate` IS NOT null THEN TIMESTAMPDIFF(YEAR,`previous_work_in_caritasbd`.`startDate`,`previous_work_in_caritasbd`.`endDate`) WHEN `previous_work_in_caritasbd`.`startDate` IS NOT null AND `previous_work_in_caritasbd`.`endDate` IS null THEN TIMESTAMPDIFF(YEAR,`previous_work_in_caritasbd`.`startDate`,CURDATE()) ELSE 0 END) AS expYear"),
                   DB::raw("(CASE WHEN `previous_work_in_caritasbd`.`endDate` IS NOT null AND `previous_work_in_caritasbd`.`startDate` IS NOT null THEN TIMESTAMPDIFF(MONTH,`previous_work_in_caritasbd`.`startDate`,`previous_work_in_caritasbd`.`endDate`) WHEN `previous_work_in_caritasbd`.`startDate` IS NOT null AND `previous_work_in_caritasbd`.`endDate` IS null THEN TIMESTAMPDIFF(MONTH,`previous_work_in_caritasbd`.`startDate`,CURDATE()) ELSE 0 END) AS expMonth"),
                   DB::raw("(CASE WHEN `previous_work_in_caritasbd`.`endDate` IS NOT null AND `previous_work_in_caritasbd`.`startDate` IS NOT null THEN TIMESTAMPDIFF(DAY,`previous_work_in_caritasbd`.`startDate`,`previous_work_in_caritasbd`.`endDate`) WHEN `previous_work_in_caritasbd`.`startDate` IS NOT null AND `previous_work_in_caritasbd`.`endDate` IS null THEN TIMESTAMPDIFF(DAY,`previous_work_in_caritasbd`.`startDate`,CURDATE()) ELSE 0 END) AS expDay"))

           ->where('fkemployeeId',$employee->employeeId)
               ->get();



           if($previousWorkInCB->isEmpty()){
               return view('userCv.insert.previousWorkInCB',compact('hasWorkedInCB'));
           }

           else{
               return view('userCv.update.previousWorkInCB',compact('hasWorkedInCB','previousWorkInCB'));
           }


       }


   }
   public function insert(Request $r){

       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)
           ->first();

       $emp=Employee::findOrFail($employee->employeeId);
       if ($r->hasWorkedInCB==0){

           $emp->hasWorkedInCB=0;
           $emp->save();

       }
       else {
           $emp->hasWorkedInCB = 1;
           $emp->save();

           for($i=0;$i<count($r->degisnation);$i++){
               $preWorkCB=new PreviousWorkInCB();

               $preWorkCB->designation=$r->degisnation[$i];
               $preWorkCB->startDate=$r->startDate[$i];

               if ($r->currentlyRunning){
                   $preWorkCB->currentlyRunning=$r->currentlyRunning[$i];
               }else{
                   $preWorkCB->endDate=$r->endDate[$i];
               }


               $preWorkCB->fkemployeeId=$employee->employeeId;

               $preWorkCB->save();
           }
       }



       Session::flash('message', 'Previous Work Added Successfully');
       return redirect()->route('candidate.previousWorkInCB.index');

   }

   public function edit(Request $r){

       $previousWorkInCB=PreviousWorkInCB::findOrFail($r->id);

       return view('userCv.edit.previousWorkInCB',compact('previousWorkInCB'));
   }

   public function update(Request $r){

       $preWorkCB=PreviousWorkInCB::findOrFail($r->id);

       $preWorkCB->designation=$r->degisnation;
       $preWorkCB->startDate=$r->startDate;

       if ($r->currentlyRunning){
           $preWorkCB->currentlyRunning=$r->currentlyRunning;
       }else{
           $preWorkCB->endDate=$r->endDate;
       }


       $preWorkCB->save();

       Session::flash('message', 'Previous Work In CB Updated Successfully');

       return redirect()->route('candidate.previousWorkInCB.index');
   }

   public function delete(Request $r){
       PreviousWorkInCB::destroy($r->id);

       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

       $count=PreviousWorkInCB::where('fkemployeeId',$employee->employeeId)
           ->count();

       if ($count == 0){
           $emp=Employee::findOrFail($employee->employeeId);

           $emp->hasWorkedInCB=0;
           $emp->save();

       }

       Session::flash('message', 'Previous Work In CB Deleted Successfully');
   }
}
