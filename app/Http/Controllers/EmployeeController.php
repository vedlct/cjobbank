<?php

namespace App\Http\Controllers;


use App\Education;
use App\email;
use App\Employee;
use App\EmployeeComputerSkill;
use App\EmployeeLanguage;
use App\EmployeeOtherInfo;
use App\EmpOtherSkill;
use App\EmpQuestionObj;
use App\Ethnicity;
use App\Jobapply;
use App\JobExperience;
use App\MembershipInSocialNetwork;
use App\Nationality;
use App\ProfessionalQualification;
use App\QuestionObjective;
use App\Refree;
use App\RelativeInCb;
use App\Religion;

use App\Traning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use Image;
use PDF;
use Mail;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getEmployeeCvCareerObjective()
    {
        $userId=Auth::user()->userId;
        return view('userCv.careerObjective');


    }
    public function applyJob($jobId,Request $r)
    {

        $empId=Employee::where('fkuserId',Auth::user()->userId)->first()->employeeId;

        $jobApply=new Jobapply();
        $jobApply->applydate=date('Y-m-d');
        $jobApply->fkjobId=$jobId;
        $jobApply->fkemployeeId=$empId;
        $jobApply->currentSalary=$r->currentSalary;
        $jobApply->expectedSalary=$r->expectedSalary;
//        $jobApply->status=JOB_STATUS['Pending'];
//        $jobApply->save();
        if ($jobApply->save())
        {
            $email = Auth::user()->email;
            $customBody = email::where('emailfor','Acknowledgement')->first();
            Mail::send('mail.jobApplySuccess',['email' => $email,'customBody' => $customBody->emailbody], function($message) use ($customBody,$email)
            {
                $message->to($email)->subject('APPLY SUCCESSFUL');
            });
        }

        return redirect()->route('job.all');
    }

    public function getEmployeeshowFullCv()
    {

        $empId=Employee::select('employeeId','cvStatus')->where('fkuserId',Auth::user()->userId)->first();

        if ($empId != null) {

            $count = Refree::where('employee.fkuserId', Auth::user()->userId)
                ->leftJoin('employee', 'employee.employeeId', 'referee.fkemployeeId')
                ->count();

            if ($count < 2) {

                $allEmp = $empId;

                $msg = 'Your CV is not Completed yet ! Candidate must have atleast 2 reference';
                Session::flash('message', 'Your CV is not Completed yet ! Candidate must have atleast 2 reference');

                return view('userCv.cvPdf.userCvPdf', compact('allEmp', 'msg'));

            } else {
                $msg = null;
//                Session::flash('message', 'Your CV is not Completed yet,Please Complete First');



            if ($empId->cvStatus == 0) {

                $allEmp = $empId;


                 Session::flash('message', 'Your CV is not Completed yet,Please Complete First');
                $msg=null;

                return view('userCv.cvPdf.userCvPdf', compact('allEmp', 'msg'));

            } else {

                $allEmp = $empId;


                $empId = $empId->employeeId;

                $personalInfo = Employee::select('emp_ques_obj.objective', 'firstName', 'lastName',
                    'fathersName', 'mothersName', 'gender', 'personalMobile',
                    'dateOfBirth', 'email', 'presentAddress', 'image', 'religionName', 'nationalityName', 'nationalId','birthID', 'parmanentAddress',
                    'passport', 'bloodGroup', 'maritalStatus','sign')
                    ->leftJoin('religion', 'religion.religionId', 'fkreligionId')
                    ->leftJoin('nationality', 'nationality.nationalityId', 'fknationalityId')
                    ->leftJoin('emp_ques_obj', 'emp_ques_obj.empId', 'employee.employeeId')
                    ->findOrFail($empId);

                $education = Education::select('degreeName', 'education.institutionName', 'boardName', 'education.fkemployeeId', 'education.status', 'education.resultSystem', 'education.result', 'educationlevel.educationLevelName',
                    'educationmajor.educationMajorName', 'education.fkMajorId', 'passingYear')
                    ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
                    ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
                    ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
                    ->leftJoin('board', 'board.boardId', '=', 'education.fkboardId')
                    ->where('fkemployeeId', $empId)
                    ->orderBy('passingYear', 'desc')
                    ->groupBy('education.educationId')
                    ->get();


                $empOtherSkillls = EmpOtherSkill::where('fkemployeeId', $empId)
                    ->leftJoin('otherskillsinformation', 'otherskillsinformation.id', 'emp_otherskill_achievement.otherSkillId')
                    ->get();

                $empComputerSkill = EmployeeComputerSkill::where('fk_empId', $empId)
                    ->leftJoin('computerskill', 'computerskill.id', 'empcomputerskill.computerSkillId')
                    ->get();


                $professionalCertificate = ProfessionalQualification::where('fkemployeeId', $empId)
                    ->get();

                $jobExperience = JobExperience::select('jobexperience.*')->where('fkemployeeId', $empId)
//                    ->orderBy('startDate', 'desc')
                    ->addSelect(DB::raw("TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,`jobexperience`.`endDate`) as expYear"),
                        DB::raw("TIMESTAMPDIFF(MONTH,`jobexperience`.`startDate`,`jobexperience`.`endDate`) as expMonth"))
                    ->get();

                //return $jobExperience;


                $trainingCertificate = Traning::where('fkemployeeId', $empId)
                    ->orderBy('startDate', 'desc')
                    ->get();
                $refree = Refree::where('fkemployeeId', $empId)
                    ->get();
                $relativeCb = RelativeInCb::where('fkemployeeId', $empId)
                    ->get();

                $empOtherInfo = EmployeeOtherInfo::where('fk_empId', $empId)
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


//                return $salary;

                return view('userCv.cvPdf.userCvPdf', compact('allEmp', 'personalInfo', 'education',
                    'professionalCertificate', 'jobExperience', 'trainingCertificate', 'refree',
                    'relativeCb', 'empOtherSkillls', 'empComputerSkill', 'empOtherInfo','memberShip','languages','languageNames','salary'));


            }
        }
        }else{
            $allEmp= null;
            Session::flash('message', 'Your CV information is not found ,please make your CV first');
            $msg='Your CV information is not found ,please make your CV first';

            return view('userCv.cvPdf.userCvPdf', compact('msg','allEmp'));

        }






    }



}
