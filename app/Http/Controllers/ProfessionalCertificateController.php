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
    public function getEmployeeCvProfessionalCertificate()
    {
        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
        $professional=ProfessionalQualification::where('fkemployeeId',$employee->employeeId)
            ->get();


        if($professional->isEmpty()){

            return view('userCv.insert.professionalCertificate');
        }

        else{
//            return $professional;
            $count=ProfessionalQualification::where('fkemployeeId',$employee->employeeId)
                ->count();
            return view('userCv.update.professionalCertificate',compact('professional','count'));
        }



    }

    public function submitEmployeeCvProfessionalCertificate(Request $r){
        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

        for($i=0;$i<count($r->certificateName);$i++){
            $professional=new ProfessionalQualification();
            $professional->certificateName=$r->certificateName[$i];
            $professional->institutionName=$r->institutionName[$i];
            $professional->startDate=$r->startDate[$i];
            $professional->endDate=$r->endDate[$i];
            $professional->result=$r->result[$i];
            $professional->status=$r->status[$i];
            $professional->fkemployeeId=$employee->employeeId;
            $professional->save();
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
        $professional->result=$r->result;
        $professional->status=$r->status;
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
        Session::flash('message', 'Certificate Deleted Successfully');

//        return $r;
    }
}
