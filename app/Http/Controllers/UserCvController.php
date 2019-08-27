<?php

namespace App\Http\Controllers;

use App\Aggrement;
use App\Employee;
use App\Education;
use App\EmployeeComputerSkill;
use App\EmployeeLanguage;
use App\EmployeeOtherInfo;
use App\EmpOtherSkill;
use App\Jobapply;
use App\JobExperience;
use App\MembershipInSocialNetwork;
use App\PreviousWorkInCB;
use App\ProfessionalQualification;
use App\QuestionObjective;
use App\QuestionObjectiveAns;
use App\Refree;
use App\RelativeInCb;
use App\Traning;
use App\User;
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

       $personalInfo = Employee::select('emp_ques_obj.objective','firstName', 'lastName',
           'fathersName', 'mothersName', 'gender', 'personalMobile',
           'dateOfBirth', 'email', 'presentAddress', 'image', 'religionName', 'nationalityName','nationalId','parmanentAddress',
           'passport','bloodGroup','maritalStatus','sign','birthID')
           ->leftJoin('religion', 'religion.religionId', 'fkreligionId')
           ->leftJoin('nationality', 'nationality.nationalityId', 'fknationalityId')
           ->leftJoin('emp_ques_obj', 'emp_ques_obj.empId', 'employee.employeeId')
           ->findOrFail($empId);

       $education = Education::select('degreeName', 'education.institutionName', 'boardName','education.fkemployeeId', 'education.status', 'education.resultSystem', 'education.result', 'educationlevel.educationLevelName',
           'educationmajor.educationMajorName', 'education.fkMajorId', 'passingYear')
           ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
           ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
           ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
           ->leftJoin('board', 'board.boardId', '=', 'education.fkboardId')
           ->where('fkemployeeId', $empId)
           ->orderBy('passingYear', 'desc')
           ->groupBy('education.educationId')
           ->get();

       $empOtherSkillls=EmpOtherSkill::where('fkemployeeId',$empId)
           ->leftJoin('otherskillsinformation','otherskillsinformation.id','emp_otherskill_achievement.otherSkillId')
           ->get();

       $empComputerSkill=EmployeeComputerSkill::where('fk_empId',$empId)
           ->leftJoin('computerskill','computerskill.id','empcomputerskill.computerSkillId')
           ->get();


       $professionalCertificate = ProfessionalQualification::where('fkemployeeId', $empId)
           ->get();

       $jobExperience = JobExperience::where('fkemployeeId', $empId)
//           ->orderBy('startDate', 'desc')
           ->get();

       $trainingCertificate = Traning::where('fkemployeeId', $empId)
           ->orderBy('startDate', 'desc')
           ->get();
       $refree = Refree::where('fkemployeeId', $empId)
           ->get();
       $relativeCb = RelativeInCb::where('fkemployeeId', $empId)
           ->get();

       $empOtherInfo=EmployeeOtherInfo::where('fk_empId', $empId)
           ->first();



       $memberShip=MembershipInSocialNetwork::where('fkemployeeId',$empId)->get();


//                return $memberShip;

       $languageNames=EmployeeLanguage::select('fklanguageHead','languagename')
           ->where('fkemployeeId',$empId)
           ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
           ->groupBy('fklanguageHead')
           ->get();

       $languages=EmployeeLanguage::where('fkemployeeId',$empId)
           ->leftJoin('languageskill','languageskill.id','emp_language.fklanguageSkill')
           ->get();



//                return $languages;
       $salary=QuestionObjective::where('empId',$empId)->first();

       $application = Jobapply::where('fkemployeeId',$empId)->first();
       $application->status = 'Viewed';
       $application->save();

       $pdf = PDF::loadView('test',compact( 'personalInfo', 'education',
           'professionalCertificate', 'jobExperience', 'trainingCertificate', 'refree',
           'relativeCb','empOtherSkillls','empComputerSkill','empOtherInfo','empOtherInfo','languageNames','languages','salary','memberShip'));

       return $pdf->download('Curriculam Vitae of '.$personalInfo->firstName." ".$personalInfo->lastName.'.pdf',array('Attachment'=>false));



   }
   public function getUserFullCv(Request $r){

       $empId=$r->id;

       $personalInfo = Employee::select('emp_ques_obj.objective','firstName', 'lastName',
           'fathersName', 'mothersName', 'gender', 'personalMobile',
           'dateOfBirth', 'email', 'presentAddress', 'image', 'religionName', 'nationalityName','nationalId','parmanentAddress',
           'passport','bloodGroup','maritalStatus','sign','birthID')
           ->leftJoin('religion', 'religion.religionId', 'fkreligionId')
           ->leftJoin('nationality', 'nationality.nationalityId', 'fknationalityId')
           ->leftJoin('emp_ques_obj', 'emp_ques_obj.empId', 'employee.employeeId')
           ->findOrFail($empId);

       $education = Education::select('degreeName', 'education.institutionName', 'boardName','education.fkemployeeId', 'education.status', 'education.resultSystem', 'education.result', 'educationlevel.educationLevelName',
           'educationmajor.educationMajorName', 'education.fkMajorId', 'passingYear')
           ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
           ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
           ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
           ->leftJoin('board', 'board.boardId', '=', 'education.fkboardId')
           ->where('fkemployeeId', $empId)
           ->orderBy('passingYear', 'desc')
           ->groupBy('education.educationId')
           ->get();

       $empOtherSkillls=EmpOtherSkill::where('fkemployeeId',$empId)
           ->leftJoin('otherskillsinformation','otherskillsinformation.id','emp_otherskill_achievement.otherSkillId')
           ->get();

       $empComputerSkill=EmployeeComputerSkill::where('fk_empId',$empId)
           ->leftJoin('computerskill','computerskill.id','empcomputerskill.computerSkillId')
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

       $empOtherInfo=EmployeeOtherInfo::where('fk_empId', $empId)
           ->first();

       $memberShip=MembershipInSocialNetwork::where('fkemployeeId',$empId)->get();


//                return $memberShip;

       $languageNames=EmployeeLanguage::select('fklanguageHead','languagename')
           ->where('fkemployeeId',$empId)
           ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
           ->groupBy('fklanguageHead')
           ->get();

       $languages=EmployeeLanguage::where('fkemployeeId',$empId)
           ->leftJoin('languageskill','languageskill.id','emp_language.fklanguageSkill')
           ->get();



//                return $languages;
       $salary=QuestionObjective::where('empId',$empId)->first();



       $pdf = PDF::loadView('test',compact('allEmp', 'personalInfo', 'education',
           'professionalCertificate', 'jobExperience', 'trainingCertificate', 'refree',
           'relativeCb','empOtherSkillls','empComputerSkill','empOtherInfo','languageNames','languages','salary','memberShip'));

       return $pdf->download('Curriculam Vitae of '.$personalInfo->firstName." ".$personalInfo->lastName.'.pdf',array('Attachment'=>false));

   }

   public function getUserFullCvdownload($empId){


       $personalInfo = Employee::select('emp_ques_obj.objective','firstName', 'lastName',
           'fathersName', 'mothersName', 'gender', 'personalMobile',
           'dateOfBirth', 'email', 'presentAddress', 'image', 'religionName', 'nationalityName','nationalId','parmanentAddress',
           'passport','bloodGroup','maritalStatus','sign','birthID','birthID')
           ->leftJoin('religion', 'religion.religionId', 'fkreligionId')
           ->leftJoin('nationality', 'nationality.nationalityId', 'fknationalityId')
           ->leftJoin('emp_ques_obj', 'emp_ques_obj.empId', 'employee.employeeId')
           ->findOrFail($empId);

       $education = Education::select('degreeName', 'education.institutionName', 'boardName','education.fkemployeeId', 'education.status', 'education.resultSystem', 'education.result', 'educationlevel.educationLevelName',
           'educationmajor.educationMajorName', 'education.fkMajorId', 'passingYear')
           ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
           ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
           ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
           ->leftJoin('board', 'board.boardId', '=', 'education.fkboardId')
           ->where('fkemployeeId', $empId)
           ->orderBy('passingYear', 'desc')
           ->groupBy('education.educationId')
           ->get();

       $empOtherSkillls=EmpOtherSkill::where('fkemployeeId',$empId)
           ->leftJoin('otherskillsinformation','otherskillsinformation.id','emp_otherskill_achievement.otherSkillId')
           ->get();

       $empComputerSkill=EmployeeComputerSkill::where('fk_empId',$empId)
           ->leftJoin('computerskill','computerskill.id','empcomputerskill.computerSkillId')
           ->get();





       $professionalCertificate = ProfessionalQualification::where('fkemployeeId', $empId)
           ->get();

       $jobExperience = JobExperience::where('fkemployeeId', $empId)
//           ->orderBy('startDate', 'desc')
           ->get();

       $trainingCertificate = Traning::where('fkemployeeId', $empId)
           ->orderBy('startDate', 'desc')
           ->get();
       $refree = Refree::where('fkemployeeId', $empId)
           ->get();
       $relativeCb = RelativeInCb::where('fkemployeeId', $empId)
           ->get();

       $empOtherInfo=EmployeeOtherInfo::where('fk_empId', $empId)
           ->first();


       $memberShip=MembershipInSocialNetwork::where('fkemployeeId',$empId)->get();


//                return $memberShip;

       $languageNames=EmployeeLanguage::select('fklanguageHead','languagename')
           ->where('fkemployeeId',$empId)
           ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
           ->groupBy('fklanguageHead')
           ->get();

       $languages=EmployeeLanguage::where('fkemployeeId',$empId)
           ->leftJoin('languageskill','languageskill.id','emp_language.fklanguageSkill')
           ->get();



//                return $languages;
       $salary=QuestionObjective::where('empId',$empId)->first();



        $pdf = PDF::loadView('test',compact('allEmp', 'personalInfo', 'education',
            'professionalCertificate', 'jobExperience', 'trainingCertificate', 'refree',
            'relativeCb','empOtherSkillls','empComputerSkill','empOtherInfo','memberShip','languageNames','languages','salary'));

       return $pdf->download('Curriculam Vitae of '.$personalInfo->firstName." ".$personalInfo->lastName.'.pdf',array('Attachment'=>false));


   }

    public function getSelectedCv(Request $r){

//        foreach ($r->ids as $id){
//            $this->downloadCv($id);
//        }

        /*------------*/
        foreach ($r->ids as $id) {
            $empId = $id;

            $personalInfo = Employee::select('emp_ques_obj.objective','firstName', 'lastName',
                'fathersName', 'mothersName', 'gender', 'personalMobile',
                'dateOfBirth', 'email', 'presentAddress', 'image', 'religionName', 'nationalityName','nationalId','parmanentAddress',
                'passport','bloodGroup','maritalStatus','sign','birthID')
                ->leftJoin('religion', 'religion.religionId', 'fkreligionId')
                ->leftJoin('nationality', 'nationality.nationalityId', 'fknationalityId')
                ->leftJoin('emp_ques_obj', 'emp_ques_obj.empId', 'employee.employeeId')
                ->findOrFail($empId);

            $education = Education::select('degreeName', 'education.institutionName', 'boardName','education.fkemployeeId', 'education.status', 'education.resultSystem', 'education.result', 'educationlevel.educationLevelName',
                'educationmajor.educationMajorName', 'education.fkMajorId', 'passingYear')
                ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
                ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
                ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
                ->leftJoin('board', 'board.boardId', '=', 'education.fkboardId')
                ->where('fkemployeeId', $empId)
                ->orderBy('passingYear', 'desc')
                ->groupBy('education.educationId')
                ->get();

            $empOtherSkillls=EmpOtherSkill::where('fkemployeeId',$empId)
                ->leftJoin('otherskillsinformation','otherskillsinformation.id','emp_otherskill_achievement.otherSkillId')
                ->get();

            $empComputerSkill=EmployeeComputerSkill::where('fk_empId',$empId)
                ->leftJoin('computerskill','computerskill.id','empcomputerskill.computerSkillId')
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

//            $pdf = PDF::loadView('test', compact('personalInfo', 'education', 'professionalCertificate', 'jobExperience', 'trainingCertificate', 'refree', 'relativeCb'));


            $empOtherInfo=EmployeeOtherInfo::where('fk_empId', $empId)
                ->first();

            $memberShip=MembershipInSocialNetwork::where('fkemployeeId',$empId)->get();


//                return $memberShip;

            $languageNames=EmployeeLanguage::select('fklanguageHead','languagename')
                ->where('fkemployeeId',$empId)
                ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
                ->groupBy('fklanguageHead')
                ->get();

            $languages=EmployeeLanguage::where('fkemployeeId',$empId)
                ->leftJoin('languageskill','languageskill.id','emp_language.fklanguageSkill')
                ->get();



//                return $languages;
            $salary=QuestionObjective::where('empId',$empId)->first();

            $pdf = PDF::loadView('test',compact('allEmp', 'personalInfo', 'education',
                'professionalCertificate', 'jobExperience', 'trainingCertificate', 'refree',
                'relativeCb','empOtherSkillls','empComputerSkill','empOtherInfo','memberShip','languageNames','languages','salary'));

            return $pdf->stream('Curriculam Vitae of ' . $personalInfo->firstName . " " . $personalInfo->lastName . '.pdf', array('Attachment' => 0));
        }

    }

    public function downloadCv($empId){

        $personalInfo = Employee::select('firstName','lastName',
            'fathersName','mothersName','gender','personalMobile',
            'dateOfBirth','email','presentAddress','image','religionName','nationalityName','nationalId','parmanentAddress','birthID')
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
    public function FullCvDelete(Request $r){
        $empId=$r->id;
        $check=Jobapply::where('fkemployeeId', $empId)->count();
        if ($check > 0){
            return $check;
        }else{

            RelativeInCb::where('fkemployeeId', $empId)->delete();
            Refree::where('fkemployeeId', $empId)->delete();
            Refree::where('fkemployeeId', $empId)->delete();
            MembershipInSocialNetwork::where('fkemployeeId', $empId)->delete();
            PreviousWorkInCB::where('fkemployeeId', $empId)->delete();
            JobExperience::where('fkemployeeId', $empId)->delete();
            ProfessionalQualification::where('fkemployeeId', $empId)->delete();
            Traning::where('fkemployeeId', $empId)->delete();
            EmployeeOtherInfo::where('fk_empId', $empId)->delete();
            EmpOtherSkill::where('fkemployeeId', $empId)->delete();
            EmployeeComputerSkill::where('fk_empId', $empId)->delete();
            EmployeeLanguage::where('fkemployeeId', $empId)->delete();
            Education::where('fkemployeeId', $empId)->delete();
            QuestionObjective::where('empId', $empId)->delete();
            QuestionObjectiveAns::where('fkemployeeId', $empId)->delete();
            Jobapply::where('fkemployeeId', $empId)->delete();
            $userId=Employee::find($empId)->fkuserId;

            Employee::destroy($empId);
            Aggrement::where('fkuserId', $userId)->delete();
            User::destroy($userId);
            return 0;

        }





    }
    public function FullCvCompleteDelete(Request $r){
        $empId=$r->id;


            RelativeInCb::where('fkemployeeId', $empId)->delete();
            Refree::where('fkemployeeId', $empId)->delete();
            Refree::where('fkemployeeId', $empId)->delete();
            MembershipInSocialNetwork::where('fkemployeeId', $empId)->delete();
            PreviousWorkInCB::where('fkemployeeId', $empId)->delete();
            JobExperience::where('fkemployeeId', $empId)->delete();
            ProfessionalQualification::where('fkemployeeId', $empId)->delete();
            Traning::where('fkemployeeId', $empId)->delete();
            EmployeeOtherInfo::where('fk_empId', $empId)->delete();
            EmpOtherSkill::where('fkemployeeId', $empId)->delete();
            EmployeeComputerSkill::where('fk_empId', $empId)->delete();
            EmployeeLanguage::where('fkemployeeId', $empId)->delete();
            Education::where('fkemployeeId', $empId)->delete();
            QuestionObjective::where('empId', $empId)->delete();
            QuestionObjectiveAns::where('fkemployeeId', $empId)->delete();
            Jobapply::where('fkemployeeId', $empId)->delete();
            $userId=Employee::find($empId)->fkuserId;
            Employee::destroy($empId);
            Aggrement::where('fkuserId', $userId)->delete();
            User::destroy($userId);
            return 0;


    }

}
