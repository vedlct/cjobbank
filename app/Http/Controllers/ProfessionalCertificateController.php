<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Ethnicity;
use App\Nationality;
use App\Religion;
use App\ProfessionalQualification;
use Illuminate\Http\Request;
use Session;
use Auth;
//use Image;


class ProfessionalCertificateController extends Controller
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
    public function getEmployeeCvProfessionalCertificate()
    {
        $employee=Employee::select('employeeId','hasProfCertificate')->where('fkuserId',Auth::user()->userId)->first();

      // return $employee;


        if (is_null($employee->hasProfCertificate)) {

           // return $employee->hasProfCertificate;

            $hasProfCertificate = null;


            return view('userCv.insert.professionalCertificate', compact('hasProfCertificate'));
        }
        elseif ($employee->hasProfCertificate == 0){

            $hasProfCertificate=0;

            return view('userCv.insert.professionalCertificate',compact('hasProfCertificate'));

        }elseif ($employee->hasProfCertificate == 1){

            $professional=ProfessionalQualification::where('fkemployeeId',$employee->employeeId)->get();



            if($professional->isEmpty()){

                $hasProfCertificate=0;

                return view('userCv.insert.professionalCertificate',compact('hasProfCertificate'));
            }

            else{
//            return $professional;
                $count=ProfessionalQualification::where('fkemployeeId',$employee->employeeId)
                    ->count();
                $hasProfCertificate=1;
                return view('userCv.update.professionalCertificate',compact('professional','count','hasProfCertificate'));
            }


        }



    }

    public function submitEmployeeCvProfessionalCertificate(Request $r){

//        return $r;

        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
       // return $r->hasProfCertificate;
        $emp=Employee::findOrFail($employee->employeeId);
        if ($r->hasProfCertificate==0){

            $emp->hasProfCertificate=0;
            $emp->save();

        }
        else{
            $emp->hasProfCertificate=1;
            $emp->save();

            for($i=0;$i<count($r->certificateName);$i++){
                $professional=new ProfessionalQualification();
                $professional->certificateName=$r->certificateName[$i];
                $professional->institutionName=$r->institutionName[$i];
                $professional->startDate=$r->startDate[$i];
                $professional->endDate=$r->endDate[$i];
//                $professional->resultSystem=$r->resultSystem[$i];
                $professional->result=$r->result[$i];
                $professional->status=$r->status[$i];
                if($r->grade[$i]){
                    $professional->grade=$r->grade[$i];
                }

                if ($r->resultSystem[$i]==OTHERS){

                    $professional->resultSystem=4;
                    $professional->resultSystemName=$r->resultSydtemName[$i];
                }else{
                    $professional->resultSystem=$r->resultSystem[$i];
                }


                $professional->hour=$r->hour[$i];
                $professional->day=$r->day[$i];
                $professional->week=$r->week[$i];
                $professional->month=$r->month[$i];
                $professional->year=$r->year[$i];
                $professional->fkemployeeId=$employee->employeeId;
                $professional->save();
            }
        }



        Session::flash('message', 'Certificate Added Successfully');

        return redirect()->route('candidate.cvProfessionalCertificate');
    }

    public function updateEmployeeCvProfessionalCertificate(Request $r){


            $professional=ProfessionalQualification::findOrFail($r->professionalQualificationId);
            $professional->certificateName=$r->certificateName;
            $professional->institutionName=$r->institutionName;
            $professional->startDate=$r->startDate;
            $professional->endDate=$r->endDate;
//            $professional->resultSystem=$r->resultSystem;
        if ($r->resultSystem==OTHERS){

            $professional->resultSystem=4;
            $professional->resultSystemName=$r->resultSydtemName;
        }else{
            $professional->resultSystem=$r->resultSystem;
        }
            $professional->result=$r->result;
            $professional->status=$r->status;
            $professional->hour=$r->hour;
            $professional->day=$r->day;
            $professional->week=$r->week;
            $professional->month=$r->month;
            $professional->year=$r->year;

            if($r->grade){
                $professional->grade=$r->grade;
            }


        $professional->save();



        Session::flash('message', 'Certificate Edited Successfully');
        return redirect()->route('candidate.cvProfessionalCertificate');
    }
    public function editProfessionalQualification(Request $r){
        $professional=ProfessionalQualification::findOrFail($r->professionalQualificationId);

        return view('userCv.edit.editProfessionalQualification',compact('professional'));
    }

    public function deleteProfessionalQualification(Request $r){

        ProfessionalQualification::destroy($r->professionalQualificationId);
        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
        $count=ProfessionalQualification::where('fkemployeeId',$employee->employeeId)
            ->count();

        if ($count == 0){
            $emp=Employee::findOrFail($employee->employeeId);

            $emp->hasProfCertificate=0;
            $emp->save();

        }

        Session::flash('message', 'Certificate Deleted Successfully');

    }
}
