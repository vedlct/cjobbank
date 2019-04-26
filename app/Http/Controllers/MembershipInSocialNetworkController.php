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

       $socialMembership=MembershipInSocialNetwork::findOrFail($r->id);

       return view('userCv.edit.SocialMembership',compact('socialMembership'));
   }

   public function update(Request $r){

       $socialMembership=MembershipInSocialNetwork::findOrFail($r->membershipId);

       $socialMembership->networkName=$r->networkName;
       $socialMembership->membershipType=$r->membershipType;
       $socialMembership->duration=$r->duration;

       $socialMembership->save();

       Session::flash('message', 'SocialMembership Updated Successfully');

       return redirect()->route('candidate.membershipInSocialNetwork.index');
   }

   public function delete(Request $r){
       MembershipInSocialNetwork::destroy($r->id);


       Session::flash('message', 'SocialMembership Deleted Successfully');
   }
}
