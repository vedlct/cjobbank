<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Education;
use Illuminate\Http\Request;
use PDF;
class UserCvController extends Controller
{

   public function index(){
       $empId=6;
       $personalInfo = Employee::select('firstName','lastName','personalMobile','email','presentAddress','image')
           ->findOrFail($empId);

       $education=Education::select('degreeName','education.institutionName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
           'educationmajor.educationMajorName','education.fkMajorId','passingYear')
           ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
           ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
           ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
           ->where('fkemployeeId',$empId)
           ->orderBy('passingYear','desc')
           ->get();
//       return $education;
//
//       return view('test',compact('personalInfo'));
       $pdf = PDF::loadView('test',compact('personalInfo','education'));
       return $pdf->stream('invoice.pdf',array('Attachment'=>0));
   }

    public function getFullInfo($id){

//        $personalInfo = Employee::where()
//            ->get();
    }

}
