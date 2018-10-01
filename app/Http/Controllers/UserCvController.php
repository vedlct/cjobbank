<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Education;
use App\JobExperience;
use App\ProfessionalQualification;
use App\Refree;
use App\RelativeInCb;
use App\Traning;
use Illuminate\Http\Request;
use PDF;
use Auth;
class UserCvController extends Controller
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
//       $empId=6;
//       $personalInfo = Employee::select('firstName','lastName','personalMobile','email','presentAddress','image')
//           ->findOrFail($empId);
//
//       $education=Education::select('degreeName','education.institutionName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
//           'educationmajor.educationMajorName','education.fkMajorId','passingYear')
//           ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
//           ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
//           ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
//           ->where('fkemployeeId',$empId)
//           ->orderBy('passingYear','desc')
//           ->get();
//
//       $professionalCertificate=ProfessionalQualification::where('fkemployeeId',$empId)
//           ->get();
//
//       $jobExperience=JobExperience::where('fkemployeeId',$empId)
//           ->orderBy('startDate','desc')
//           ->get();
//
//       $trainingCertificate=Traning::where('fkemployeeId',$empId)
//           ->orderBy('startDate','desc')
//           ->get();
//       $refree=Refree::where('fkemployeeId',$empId)
//           ->get();
//       $relativeCb=RelativeInCb::where('fkemployeeId',$empId)
//           ->get();
//
//       $pdf = PDF::loadView('test',compact('personalInfo','education','professionalCertificate','jobExperience','trainingCertificate','refree','relativeCb'));
//       return $pdf->stream('Curriculam Vitae of '.$personalInfo->firstName." ".$personalInfo->lastName.'.pdf',array('Attachment'=>0));
   }

   public function getFullCv($empId){



       $personalInfo = Employee::select('firstName','lastName',
           'fathersName','mothersName','gender','personalMobile',
           'dateOfBirth','email','presentAddress','image','religionName','nationalityName','nationalId','parmanentAddress')
           ->leftJoin('religion','religion.religionId','fkreligionId')
           ->leftJoin('nationality','nationality.nationalityId','fknationalityId')
           ->findOrFail($empId);

       $education=Education::select('degreeName','education.institutionName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
           'educationmajor.educationMajorName','education.fkMajorId','passingYear')
           ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
           ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
           ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
           ->where('fkemployeeId',$empId)
           ->orderBy('passingYear','desc')
           ->get();

       $professionalCertificate=ProfessionalQualification::where('fkemployeeId',$empId)
           ->get();

       $jobExperience=JobExperience::where('fkemployeeId',$empId)
           ->orderBy('startDate','desc')
           ->get();

       $trainingCertificate=Traning::where('fkemployeeId',$empId)
           ->orderBy('startDate','desc')
           ->get();
       $refree=Refree::where('fkemployeeId',$empId)
           ->get();
       $relativeCb=RelativeInCb::where('fkemployeeId',$empId)
           ->get();

       $pdf = PDF::loadView('test',compact('personalInfo','education','professionalCertificate','jobExperience','trainingCertificate','refree','relativeCb'));
       return $pdf->stream('Curriculam Vitae of '.$personalInfo->firstName." ".$personalInfo->lastName.'.pdf',array('Attachment'=>0));


   }
   public function getUserFullCv(Request $r){

       $empId=$r->id;

       $personalInfo = Employee::select('firstName','lastName',
           'fathersName','mothersName','gender','personalMobile',
           'dateOfBirth','email','presentAddress','image','religionName','nationalityName','nationalId','parmanentAddress')
           ->leftJoin('religion','religion.religionId','fkreligionId')
           ->leftJoin('nationality','nationality.nationalityId','fknationalityId')
           ->findOrFail($empId);

       $education=Education::select('degreeName','education.institutionName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
           'educationmajor.educationMajorName','education.fkMajorId','passingYear')
           ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
           ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
           ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
           ->where('fkemployeeId',$empId)
           ->orderBy('passingYear','desc')
           ->get();

       $professionalCertificate=ProfessionalQualification::where('fkemployeeId',$empId)
           ->get();

       $jobExperience=JobExperience::where('fkemployeeId',$empId)
           ->orderBy('startDate','desc')
           ->get();

       $trainingCertificate=Traning::where('fkemployeeId',$empId)
           ->orderBy('startDate','desc')
           ->get();
       $refree=Refree::where('fkemployeeId',$empId)
           ->get();
       $relativeCb=RelativeInCb::where('fkemployeeId',$empId)
           ->get();

        $pdf = PDF::loadView('test',compact('personalInfo','education','professionalCertificate','jobExperience','trainingCertificate','refree','relativeCb'));

       return $pdf->stream('Curriculam Vitae of '.$personalInfo->firstName." ".$personalInfo->lastName.'.pdf',array('Attachment'=>false));


   }
   public function getUserFullCvdownload($empId){


       $personalInfo = Employee::select('firstName','lastName',
           'fathersName','mothersName','gender','personalMobile',
           'dateOfBirth','email','presentAddress','image','religionName','nationalityName','nationalId','parmanentAddress')
           ->leftJoin('religion','religion.religionId','fkreligionId')
           ->leftJoin('nationality','nationality.nationalityId','fknationalityId')
           ->findOrFail($empId);

       $education=Education::select('degreeName','education.institutionName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
           'educationmajor.educationMajorName','education.fkMajorId','passingYear')
           ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
           ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
           ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
           ->where('fkemployeeId',$empId)
           ->orderBy('passingYear','desc')
           ->get();

       $professionalCertificate=ProfessionalQualification::where('fkemployeeId',$empId)
           ->get();

       $jobExperience=JobExperience::where('fkemployeeId',$empId)
           ->orderBy('startDate','desc')
           ->get();

       $trainingCertificate=Traning::where('fkemployeeId',$empId)
           ->orderBy('startDate','desc')
           ->get();
       $refree=Refree::where('fkemployeeId',$empId)
           ->get();
       $relativeCb=RelativeInCb::where('fkemployeeId',$empId)
           ->get();

        $pdf = PDF::loadView('test',compact('personalInfo','education','professionalCertificate','jobExperience','trainingCertificate','refree','relativeCb'));

       return $pdf->download('Curriculam Vitae of '.$personalInfo->firstName." ".$personalInfo->lastName.'.pdf',array('Attachment'=>false));


   }

    public function getSelectedCv(Request $r){

//        foreach ($r->ids as $id){
//            $this->downloadCv($id);
//        }

        /*------------*/
        foreach ($r->ids as $id) {
            $empId = $id;

            $personalInfo = Employee::select('firstName','lastName',
                'fathersName','mothersName','gender','personalMobile',
                'dateOfBirth','email','presentAddress','image','religionName','nationalityName','nationalId','parmanentAddress')
                ->leftJoin('religion','religion.religionId','fkreligionId')
                ->leftJoin('nationality','nationality.nationalityId','fknationalityId')
                ->findOrFail($empId);

            $education = Education::select('degreeName', 'education.institutionName', 'education.fkemployeeId', 'education.status', 'education.resultSystem', 'education.result', 'educationlevel.educationLevelName',
                'educationmajor.educationMajorName', 'education.fkMajorId', 'passingYear')
                ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
                ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
                ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
                ->where('fkemployeeId', $empId)
                ->orderBy('passingYear', 'desc')
                ->get();

            $professionalCertificate = ProfessionalQualification::where('fkemployeeId', $empId)
                ->get();

            $jobExperience = JobExperience::where('fkemployeeId', $empId)
                ->orderBy('startDate', 'desc')
                ->get();

            $trainingCertificate = Traning::where('fkemployeeId', $empId)
                ->orderBy('startDate', 'desc')
                ->get();
            $refree = Refree::where('fkemployeeId', $empId)
                ->get();
            $relativeCb = RelativeInCb::where('fkemployeeId', $empId)
                ->get();

            $pdf = PDF::loadView('test', compact('personalInfo', 'education', 'professionalCertificate', 'jobExperience', 'trainingCertificate', 'refree', 'relativeCb'));
            return $pdf->stream('Curriculam Vitae of ' . $personalInfo->firstName . " " . $personalInfo->lastName . '.pdf', array('Attachment' => 0));
        }

    }

    public function downloadCv($empId){

        $personalInfo = Employee::select('firstName','lastName',
            'fathersName','mothersName','gender','personalMobile',
            'dateOfBirth','email','presentAddress','image','religionName','nationalityName','nationalId','parmanentAddress')
            ->leftJoin('religion','religion.religionId','fkreligionId')
            ->leftJoin('nationality','nationality.nationalityId','fknationalityId')
            ->findOrFail($empId);

        $education=Education::select('degreeName','education.institutionName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
            'educationmajor.educationMajorName','education.fkMajorId','passingYear')
            ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
            ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
            ->where('fkemployeeId',$empId)
            ->orderBy('passingYear','desc')
            ->get();

        $professionalCertificate=ProfessionalQualification::where('fkemployeeId',$empId)
            ->get();

        $jobExperience=JobExperience::where('fkemployeeId',$empId)
            ->orderBy('startDate','desc')
            ->get();

        $trainingCertificate=Traning::where('fkemployeeId',$empId)
            ->orderBy('startDate','desc')
            ->get();
        $refree=Refree::where('fkemployeeId',$empId)
            ->get();
        $relativeCb=RelativeInCb::where('fkemployeeId',$empId)
            ->get();

        $pdf = PDF::loadView('test',compact('personalInfo','education','professionalCertificate','jobExperience','trainingCertificate','refree','relativeCb'));
        return $pdf->stream('Curriculam Vitae of '.$personalInfo->firstName." ".$personalInfo->lastName.'.pdf',array('Attachment'=>0));



    }

    public function getFullInfo($id){

//        $personalInfo = Employee::where()
//            ->get();
    }

}
