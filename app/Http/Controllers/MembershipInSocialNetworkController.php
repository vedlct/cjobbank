<?php

namespace App\Http\Controllers;

use App\MembershipInSocialNetwork;
use App\PreviousWorkInCB;
use Illuminate\Http\Request;
use Auth;
use Session;

use App\Traning;
use App\Country;
use App\Employee;


class MembershipInSocialNetworkController extends Controller
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

       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

       $socialMembership=MembershipInSocialNetwork::where('fkemployeeId',$employee->employeeId)
           ->get();

       if($socialMembership->isEmpty()){
           return view('userCv.insert.SocialMembership');
       }

       else{
           return view('userCv.update.SocialMembership',compact('socialMembership'));
       }


   }
   public function insert(Request $r){



       $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)
           ->first();

       for($i=0;$i<count($r->networkName);$i++){

           $socialMembership=new MembershipInSocialNetwork();

           $socialMembership->networkName=$r->networkName[$i];
           $socialMembership->membershipType=$r->membershipType[$i];
           $socialMembership->duration=$r->duration[$i];

           $socialMembership->fkemployeeId=$employee->employeeId;

           $socialMembership->save();
       }



       Session::flash('message', 'SocialMembership Added Successfully');
       return redirect()->route('candidate.membershipInSocialNetwork.index');

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
