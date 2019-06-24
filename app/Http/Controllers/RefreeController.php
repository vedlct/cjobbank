<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Refree;
use App\Employee;

use Auth;
use Session;

class RefreeController extends Controller
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
        $refrees=Refree::where('fkemployeeId',$employee->employeeId)
            ->get();

        $count=Refree::where('fkemployeeId',$employee->employeeId)
                ->count();

        if($count>=2){

            Employee::where('fkuserId',Auth::user()->userId)
                ->update(['cvStatus'=>1]);

            Employee::where('fkuserId',Auth::user()->userId)
                ->update(['cvCompletedDate'=>date('Y-m-d')]);


            //Session::flash('error-message', 'Candidate must have atleast 2 reference');

        }else{

            Employee::where('fkuserId',Auth::user()->userId)
                ->update(['cvStatus'=>null]);

            Employee::where('fkuserId',Auth::user()->userId)
                ->update(['cvCompletedDate'=>null]);
        }



        if($refrees->isEmpty()){
            return view('userCv.insert.refree');
        }

        else{
            return view('userCv.update.refree',compact('refrees'));
        }


    }
    public function submitRefree(Request $r){

        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

        for($i=0;$i<count($r->firstName);$i++){
            $refree=new Refree();
            $refree->firstName=$r->firstName[$i];
//            $refree->lastName=$r->lastName[$i];
            $refree->presentposition=$r->presentposition[$i];
            $refree->organization=$r->organization[$i];
            $refree->email=$r->email[$i];
            $refree->phone=$r->phone[$i];
            $refree->relation=$r->relation[$i];
            $refree->fkemployeeId=$employee->employeeId;
            $refree->save();
        }

//        Employee::where('fkuserId',Auth::user()->userId)
//            ->update(['cvStatus'=>1]);

        Session::flash('message', 'Reference Added Successfully');

        return redirect()->route('refree.index');
    }

    public function editRefree(Request $r){
        $refree=Refree::findOrFail($r->refereeId);

        return view('userCv.edit.editRefree',compact('refree'));
    }

    public function updateRefree(Request $r){
        $refree=Refree::findOrFail($r->refereeId);
        $refree->firstName=$r->firstName;
//        $refree->lastName=$r->lastName;
        $refree->presentposition=$r->presentposition;
        $refree->organization=$r->organization;
        $refree->email=$r->email;
        $refree->phone=$r->phone;
        $refree->relation=$r->relation;
        $refree->save();

        Session::flash('message', 'Reference Updated Successfully');

        return redirect()->route('refree.index');
    }

    public function deleteRefree(Request $r){


        $count=Refree::where('employee.fkuserId',Auth::user()->userId)
            ->leftJoin('employee','employee.employeeId','referee.fkemployeeId')
            ->count();

        if($count<=2){

            Session::flash('error-message', 'Candidate must have atleast 2 reference');

        }else{
            Refree::destroy($r->refereeId);

            Session::flash('message', 'Reference Deleted Successfully');
        }


      //  Session::flash('message', 'Reference Deleted Successfully');
        //return redirect()->route('refree.index');
    }
}
