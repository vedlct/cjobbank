<?php

namespace App\Http\Controllers;

use App\Refree;
use App\RelativeInCb;
use App\User;
use Illuminate\Http\Request;

use App\Employee;

use Auth;
use Session;

class RelativeInCbController extends Controller
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

    public function index()
    {

        $this->getRelationInfo();

    }

    public function getRelationInfo()
    {

        $employee = Employee::select('employeeId','cvStatus')->where('fkuserId', Auth::user()->userId)->first();
        $relativeInCB = Employee::select('relativeInCB')->where('employeeId',$employee->employeeId)->first();

        $relativeInCaritas = RelativeInCb::where('fkemployeeId', $employee->employeeId)->get();


        if ($relativeInCaritas->isEmpty()) {
            return view('userCv.insert.relativeInCaritas' , compact('relativeInCB','employee'));
        } else {
            return view('userCv.update.relativeInCaritas', compact('relativeInCaritas', 'relativeInCB','employee'));
        }


    }

    public function submitRelativeInCb(Request $r)
    {


        $employee = Employee::select('employeeId')->where('fkuserId', Auth::user()->userId)->first();



        for ($i = 0; $i < count($r->firstName); $i++) {

            $relative = new RelativeInCb();
            $relative->firstName = $r->firstName[$i];
            $relative->lastName = $r->lastName[$i];
            $relative->degisnation = $r->degisnation[$i];
            $relative->fkemployeeId = $employee->employeeId;
            $relative->save();
        }


        $refrees=Refree::where('fkemployeeId',$employee->employeeId)
            ->count();
        if ($refrees>=2){

            Employee::where('fkuserId',Auth::user()->userId)
                ->update(['cvStatus'=>1]);

            Employee::where('fkuserId',Auth::user()->userId)
                ->update(['cvCompletedDate'=>date('Y-m-d')]);
            Session::flash('CVcomplete', 'done');

        }else{

            Employee::where('fkuserId',Auth::user()->userId)
                ->update(['cvStatus'=>null]);

            Employee::where('fkuserId',Auth::user()->userId)
                ->update(['cvCompletedDate'=>null]);
            Session::flash('CVcomplete', 'notDone');
        }



        Employee::where('fkuserId', Auth::user()->userId)
            ->update(['relativeInCB' => 1]);

        Session::flash('message', 'Relative Added Successfully');


        return redirect()->route('relativeInCaritas.getRelationInfo');
    }


    public function  submitRelativeInCbYesOrNo(Request $r){

        $empId=Employee::where('fkuserId',Auth::user()->userId)->first()->employeeId;

        if ($r->relativeincb == "1") {

            Employee::where('employeeId',$empId)
                ->update(['cvStatus'=>1,'cvCompletedDate' =>date('Y-m-d'),'relativeInCB'=>1]);

            Employee::where('fkuserId', Auth::user()->userId)
                ->update(['relativeInCB' => 1]);
            Session::flash('CVcomplete', 'done');

            return redirect()->route('relativeInCaritas.getRelationInfo');
        }else{

            Employee::where('employeeId',$empId)
                ->update(['cvStatus'=>1,'cvCompletedDate' =>date('Y-m-d'),'relativeInCB'=>0]);

//            Employee::where('fkuserId',Auth::user()->userId)
//                ->update(['cvStatus'=>1]);
//
//            Employee::where('fkuserId',Auth::user()->userId)
//                ->update(['cvCompletedDate'=>date('Y-m-d')]);

            Session::flash('message', 'Relative Information Added Successfully');
            Session::flash('CVcomplete', 'done');
            return redirect()->route('relativeInCaritas.getRelationInfo');
        }
    }

    public function editRelative(Request $r)
    {
        $relative = RelativeInCb::findOrFail($r->relativeId);

        return view('userCv.edit.editRelativeInCB', compact('relative'));
    }

    public function updateRelative(Request $r)
    {
        $relative = RelativeInCb::findOrFail($r->relativeId);
        $relative->firstName = $r->firstName;
        $relative->lastName = $r->lastName;
        $relative->degisnation = $r->degisnation;
        $relative->save();

        Session::flash('message', 'Relative In CB Updated Successfully');

        return redirect()->route('relativeInCaritas.getRelationInfo');

    }

    public function deleteRelative(Request $r){

        $empId=Employee::where('fkuserId',Auth::user()->userId)->first()->employeeId;

        RelativeInCb::destroy($r->relativeId);



        $count=RelativeInCb::where('relativeincb.fkemployeeId',$empId)
//            ->leftJoin('employee','employee.employeeId','relativeincb.fkemployeeId')
            ->count();

        if($count<1){
            Employee::where('employeeId',$empId)
                ->update(['cvCompletedDate' =>date('Y-m-d'),'relativeInCB'=>0]);



        }

        Session::flash('message', 'Relative In CB Deleted Successfully');

        return redirect()->route('relativeInCaritas.getRelationInfo');
    }
}

