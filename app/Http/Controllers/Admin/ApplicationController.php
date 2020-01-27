<?php

namespace App\Http\Controllers\Admin;
use App\Aggrement;
use App\Degree;
use App\Education;
use App\Educationlevel;
use App\Educationmajor;
use App\Employee;
use App\EmpQuestionObjAns;
use App\Ethnicity;
use App\HR;
use App\email;
use App\Http\Controllers\Controller;

use App\Job;
use App\Jobapply;
use App\JobExperience;
use App\Mail\newMail;
use App\MailTamplate;
use App\Nationality;
use App\PreviousWorkInCB;
use App\ProfessionalQualification;
use App\MembershipInSocialNetwork;
use App\QuestionObjective;
use App\EmpOtherSkill;
use App\EmployeeComputerSkill;
use App\EmployeeLanguage;
use App\Refree;
use App\RelativeInCb;
use App\Religion;
use App\Traning;
use App\Zone;
use Carbon\Carbon;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App as AppAlias;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use Yajra\DataTables\DataTables;
use Excel;
use PDF;
use Mail;
use File;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()){
                if(Auth::user()->fkuserTypeId==USER_TYPE['Admin'] || Auth::user()->fkuserTypeId==USER_TYPE['Emp'] || Auth::user()->fkuserTypeId==USER_TYPE['ZoneAdmin']){
                    return $next($request);
                }else{
                    return redirect('/');
                }
            }else{
                return redirect('/');
            }
        });
    }

    public function manageApplication()
    {
//        $agreement=Aggrement::select('aggrement.*','agreementqus.*','employee.employeeId')
//            ->leftJoin('employee','employee.fkuserId','aggrement.fkuserId')
//            ->leftJoin('agreementqus','agreementqus.agreementQusId','aggrement.fkaggrementQusId')
//            ->where('employee.employeeId',7)
//            ->get();
//        return $agreement;

        $religion=Religion::where('status',1)->get();
        $ethnicity=Ethnicity::where('status',1)->get();
        $natinality=Nationality::where('status',1)->get();
        $allZone=DB::table('zone')->where('status',1)->get();
        $organizationType=DB::table('organizationtype')->where('status',1)->get();
        $allJobTitle=Job::select('title')->where('status','!=',0);
        if(Auth::user()->fkuserTypeId=="cbEmp" || Auth::user()->fkuserTypeId==USER_TYPE['ZoneAdmin']){
            $myZone=HR::where('fkuserId',Auth::user()->userId)->first();
            $allJobTitle = $allJobTitle->where('fkzoneId',$myZone->fkzoneId);
        }
        $allJobTitle = $allJobTitle->get();
        $allEducationLevel=Educationlevel::where('status',1)->get();
        $mailTamplate=MailTamplate::select('tamplateName','tamplateId')->get();
        $zones=Zone::where('status',1)->get();
        $degree=Degree::where('status',1)->get();

        return view('Admin.application.manageApplication',compact('zones','religion','degree','ethnicity','natinality','allZone','allJobTitle','allEducationLevel','organizationType','mailTamplate'));
    }


    public function showAllDegreeForEducation(Request $r){

        $degree = Degree::where('degree.educationLevelId', '=',$r->id)
            ->where('degree.status',1)
            ->get();

        if ($degree == null) {
            echo "<option value='' selected>Select Degree</option>";
        } else {
            echo "<option value='' selected>Select Degree</option>";
            foreach ($degree as $mejor) {
                echo "<option value='$mejor->degreeId'>$mejor->degreeName</option>";
            }
        }
    }

    public function applicationStatusChange($employeeId,$jobId)
    {
        $application = Jobapply::where([
            ['fkjobId', '=', $jobId],
            ['fkemployeeId', '=', $employeeId]
        ])->first();
        $application->status = 'Rejected';
        $application->save();
        return;
    }

    public function showAllApplication(Request $r)
    {
        $application = Jobapply::select('job.fkzoneId','jobapply.jobapply as applyId','jobapply.fkjobId as jid',DB::raw('DATE_FORMAT(jobapply.applydate, "%d-%m-%Y") as applydate'),'jobapply.status',DB::raw('DATE_FORMAT(jobapply.interviewCallDate, "%d-%m-%Y") as interviewCallDate'),DB::raw('TIME_FORMAT(jobapply.interviewCallDateTime, "%H:%i") as interviewCallDateTime'), 'zone.zoneName','employee.employeeId', 'employee.firstName', 'employee.lastName', 'job.title', 'employee.maritalStatus')
            ->leftJoin('employee', 'employee.employeeId', '=', 'jobapply.fkemployeeId')
            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')
            ->leftJoin('education', 'education.fkemployeeId', '=', 'employee.employeeId')
            ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
            ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'degree.degreeId')
            ->leftJoin('professionalqualification', 'professionalqualification.fkemployeeId', '=', 'employee.employeeId')
            ->leftJoin('jobexperience', 'jobexperience.fkemployeeId', '=', 'employee.employeeId')
            ->leftJoin('traning', 'traning.fkemployeeId', '=', 'employee.employeeId')
            ->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')
            ->distinct('educationmajor.fkDegreeId');

        if(Auth::user()->fkuserTypeId=="cbEmp" || Auth::user()->fkuserTypeId==USER_TYPE['ZoneAdmin']){
            $myZone=HR::where('fkuserId',Auth::user()->userId)->first();
//            echo $myZone->fkzoneId;exit();
            $application = $application->where('job.fkzoneId',$myZone->fkzoneId);
        }

        if ($r->maritalStatusFilter){
            $application= $application->where('employee.maritalStatus',$r->maritalStatusFilter);
        }
        if ($r->applicant_Status){
            $application= $application->where('jobapply.status',$r->applicant_Status);
        }
        if ($r->genderFilter){
            $application= $application->wherein('employee.gender',$r->genderFilter);
        }
        if ($r->religionFilter){
            $application= $application->where('employee.fkreligionId',$r->religionFilter);
        }
        if ($r->ethnicityFilter){
            $application= $application->where('employee.ethnicityId',$r->ethnicityFilter);
        }
        if ($r->disabilityFilter){
            $application= $application->where('employee.disability',$r->disabilityFilter);
        }
        if ($r->nationalityFilter){
            $application= $application->where('employee.fknationalityId',$r->nationalityFilter);
        }
        if ($r->zonefilter){
            $application= $application->where('job.fkzoneId',$r->zonefilter);
        }
        if ($r->educationLvlFilter){
            $application= $application->where('educationlevel.educationLevelId',$r->educationLvlFilter);
        }
        if ($r->degreeLvlFilter){
            $application= $application->where('degree.degreeId',$r->degreeLvlFilter);
        }
        if ($r->educationCompletingFilter){
            $application= $application->where('education.status',$r->educationCompletingFilter);
        }
        if ($r->qualificationCompletingFilter){
            $application= $application->where('professionalqualification.status',$r->qualificationCompletingFilter);
        }
        if ($r->trainingCompletingFilter){
            $application= $application->where('traning.status',$r->trainingCompletingFilter);
        }
        if ($r->educationMajorFilter){
            if (count($r->educationMajorFilter)>1)
            {
                $application= $application->wherein('education.fkMajorId',$r->educationMajorFilter);
            }else{
                $application= $application->where('education.fkMajorId',$r->educationMajorFilter);
            }
        }

        if ($r->ageFromFilter){
            $application= $application->where(DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE())"),'>=',$r->ageFromFilter);
        }
        if ($r->ageToFilter){
            $application= $application->where(DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE())"),'<=',$r->ageToFilter);
        }
        if ($r->jobTitle){
            $application= $application->where('job.title',$r->jobTitle);
        }
        if ($r->applyDate){
            $application= $application->where('jobapply.applydate',$r->applyDate);;
        }
        if ($r->jobExperienceFromFilter){
            $application= $application->where(DB::raw("TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,CURDATE())"),'>=',$r->jobExperienceFromFilter);
        }
        if ($r->jobExperienceToFilter){
            $application= $application->where(DB::raw("TIMESTAMPDIFF(YEAR,`jobexperience`.`endDate`,CURDATE())"),'<=',$r->jobExperienceToFilter);
        }
        if ($r->professionalQualificationFilter){
            $application= $application->where('professionalqualification.certificateName','LIKE', '%' . $r->professionalQualificationFilter . '%');
        }
        if ($r->TrainingNameFilter){
            $application= $application->where('traning.trainingName','LIKE', '%' .$r->TrainingNameFilter . '%');
        }
        if ($r->jobExperienceFilter){
            $application= $application->where('jobexperience.fkOrganizationType',$r->jobExperienceFilter);
        }

        $datatables = DataTables::of($application);
        return $datatables->make(true);
    }

    public function exportAppliedCandidate(Request $r)
    {
        $appliedList=$r->jobApply;
        $excelName=$r->excelName;
        $jobTitle=$r->jobTitle;

        $filePath=public_path ()."/exportedExcel";
//        $fileName="AppliedCandidateList".date("Y-m-d_H-i-s");
        $fileName=$excelName." Info".date("Y-m-d_H-i-s");

        $fileInfo=array(
            'fileName'=>$fileName,
            'filePath'=>$fileName,
        );
//        $list=array();
        $employees=array();

        for ($i=0;$i<count($appliedList);$i++){
            $appliedId=$appliedList[$i];
            $empId=Jobapply::where('jobapply',$appliedId)->first()->fkemployeeId;
            array_push($employees,$empId);
        }

        $employee=Employee::select('employee.*','emp_other_info.interests','emp_other_info.researchPublication','emp_other_info.awardReceived','nationality.nationalityName','ethnicity.ethnicityName','religion.religionName')
            ->leftJoin('nationality','nationality.nationalityId','employee.fknationalityId')
            ->leftJoin('ethnicity','ethnicity.ethnicityId','employee.ethnicityId')
            ->leftJoin('religion','religion.religionId','employee.fkreligionId')
            ->leftJoin('emp_other_info','emp_other_info.fk_empId','employee.employeeId')
            ->whereIn('employeeId',$employees)
            ->get();



//        return $employee;
        $social=MembershipInSocialNetwork::whereIn('fkemployeeId',$employees)->get();

        $education=Education::select('education.*','degree.degreeName','board.boardName','educationmajor.educationMajorName')
            ->whereIn('fkemployeeId',$employees)
            ->leftJoin('degree','degree.degreeId','education.fkdegreeId')
            ->leftJoin('board','board.boardId','education.fkboardId')
            ->leftJoin('educationmajor','educationmajor.educationMajorId','education.fkMajorId')
            ->get();

//        return $education;

        $pQualification=ProfessionalQualification::whereIn('fkemployeeId',$employees)->get();

        $training=Traning::whereIn('fkemployeeId',$employees)
            ->leftJoin('country','country.countryId','traning.countryId')
            ->get();

        $jobExperience=JobExperience::select('jobexperience.*')
            ->addSelect(DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expYear"),

                DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(month,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(month,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expMonth"),
                DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expDay"))

            ->whereIn('fkemployeeId',$employees)
            ->leftJoin('organizationtype','organizationtype.organizationTypeId','jobexperience.fkOrganizationType')
            ->get();

//        return $jobExperience;

        $reference=Refree::whereIn('fkemployeeId',$employees)->get();

        $empQuestion=QuestionObjective::whereIn('empId',$employees)->get();


        $extraCurriculumn=EmpOtherSkill::whereIn('fkemployeeId',$employees)
            ->leftJoin('otherskillsinformation','otherskillsinformation.id','emp_otherskill_achievement.otherSkillId')
            ->get();

        $computerSkill=EmployeeComputerSkill::whereIn('fk_empId',$employees)
            ->leftJoin('computerskill','computerskill.id','empcomputerskill.computerSkillId')
            ->get();

        $languageHead=EmployeeLanguage::select('fklanguageHead','fkemployeeId','languagename')
            ->whereIn('fkemployeeId',$employees)
            ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
            ->groupBy('fklanguageHead')
            ->get();

        $language=EmployeeLanguage::whereIn('fkemployeeId',$employees)
            ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
            ->leftJoin('languageskill','languageskill.id','emp_language.fklanguageSkill')
            ->get();

        $previousWorkExperienceInCB=PreviousWorkInCB::whereIn('fkemployeeId',$employees)->get();

        $empQuestionAns=EmpQuestionObjAns::whereIn('fkemployeeId',$employees)
            ->leftJoin('emp_ques_objective_and_info','emp_ques_objective_and_info.id','emp_ques_objective_and_info_ans.fkqusId')
            ->get();


        $relative=RelativeInCb::whereIn('fkemployeeId',$employees)->get();

        $agreement=Aggrement::select('aggrement.*','agreementqus.*','employee.employeeId')
            ->leftJoin('employee','employee.fkuserId','aggrement.fkuserId')
            ->leftJoin('agreementqus','agreementqus.agreementQusId','aggrement.fkaggrementQusId')
            ->whereIn('employee.employeeId',$employees)
            ->get();


        $check=Excel::create($fileName,function($excel)use ($agreement,$relative,$previousWorkExperienceInCB,$empQuestionAns,$employee,$excelName,$social,$education,$pQualification,$training,$jobExperience,$reference,$empQuestion,$extraCurriculumn,$computerSkill,$languageHead,$language,$jobTitle) {


            $excel->sheet('First sheet', function($sheet) use ($agreement,$relative,$previousWorkExperienceInCB,$empQuestionAns,$employee,$excelName,$social,$education,$pQualification,$training,$jobExperience,$reference,$empQuestion,$extraCurriculumn,$computerSkill,$languageHead,$language,$jobTitle) {

                $sheet->setStyle(array(
                    'font' => array(
//                        'name'      =>  'Calibri',
                        'size'      =>  13,
//                        'bold'      =>  false
                    )
                ));


                $sheet->setpaperSize(5);
                $sheet->setOrientation('landscape');
                $sheet->setScale(40);
                $sheet->setFitToPage(false);
//                $sheet->getStyle()->getAlignment()->setWrapText(true);

                $sheet->loadView('Admin.application.fullInfo',
                    compact('employee','social','education','pQualification','training','jobExperience','reference',
                        'empQuestion','extraCurriculumn','computerSkill','languageHead','language','excelName','empQuestionAns'
                        ,'jobTitle','previousWorkExperienceInCB','relative','agreement'));
            });

        })->store('xls',$filePath);

        if ($check){
            $message=array('message'=>$fileName .'.xls has been downloaded',
                'success'=>'1');
            $fileInfo=array_merge($fileInfo,$message);
        }else{

            $message=array('message'=>'Someting went wrong',
                'success'=>'0');
            $fileInfo=array_merge($fileInfo,$message);


        }
        return $fileInfo;

    }

    public function export()
    {



        $ethnicity=Ethnicity::get();
//        $appliedList=$r->jobApply;
        $appliedId=7;
        $filePath=public_path ()."/exportedExcel";
        $fileName="AppliedCandidateList".date("Y-m-d_H-i-s");
        $fileInfo=array(
            'fileName'=>$fileName,
            'filePath'=>$fileName,
        );

        $list=array();
        $eduList=array();
        $qualificationList=array();
        $trainingList=array();
        $jobExperienceList=array();
        $salaryList=array();
        $refreeList=array();
        $relativeList=array();



         $jobTitle=Jobapply::select('job.title','job.deadline')
                ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')->where('jobapply',$appliedId)->first();

        $empIds=Jobapply::select('fkemployeeId')->where('fkjobId',$appliedId)
            ->get()
            ->toArray();

        $newlist=Employee::select('employee.*',DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as AgeYear"),DB::raw("MONTH(`employee`.`dateOfBirth`)-MONTH(CURDATE()) as AgeMonth"))
                ->whereIn('employee.employeeId',$empIds)
                ->get();

        $education=Education::select('education.institutionName','board.boardName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
            'educationmajor.educationMajorName','education.fkMajorId')
            ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
            ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
            ->leftJoin('board', 'board.boardId', '=', 'education.fkboardId')
            ->whereIn('fkemployeeId',$empIds)
            ->get();


        $pQualification=ProfessionalQualification::whereIn('professionalqualification.fkemployeeId',$empIds)
            ->get();

        $training=Traning::whereIn('fkemployeeId',$empIds)
            ->get();


        $jobExperience=JobExperience::select('jobexperience.*')
            ->orderBy('startDate', 'desc')
            ->addSelect(DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expYear"),
                DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(MONTH,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(MONTH,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expMonth"),
            DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expDay"))

            ->whereIn('fkemployeeId',$empIds)
            ->get();

        $salaryInfo=Jobapply::whereIn('fkemployeeId',$empIds)
            ->where('fkjobId',$appliedId)
            ->get();

        $refree=Refree::whereIn('fkemployeeId',$empIds)
            ->get();

        $relativeList=RelativeInCb::whereIn('fkemployeeId',$empIds)
            ->get();





        $check=Excel::create($fileName,function($excel) use($newlist, $ethnicity, $education, $pQualification, $training, $jobExperience, $salaryInfo, $refree,$relativeList,$jobTitle) {
            $excel->sheet('First sheet', function($sheet) use($newlist, $ethnicity, $education, $pQualification, $training, $jobExperience, $salaryInfo, $refree,$relativeList,$jobTitle) {
                $sheet->loadView('Admin.application.AppliedCandidateList')
                    ->with('AppliedCandidateList',$newlist)
                    ->with('ethnicity',$ethnicity)
                    ->with('educationList',$education)
                    ->with('qualificationList',$pQualification)
                    ->with('trainingList',$training)
                    ->with('jobExperienceList',$jobExperience)
                    ->with('salaryList',$salaryInfo)
                    ->with('refreeList',$refree)
                    ->with('jobTitle',$jobTitle)
                    ->with('relativeList',$relativeList);

            });
        })->store('xls',$filePath);
        if ($check){
            $message=array('message'=>$fileName .'.xls has been downloaded',
                'success'=>'1');
            $fileInfo=array_merge($fileInfo,$message);
        }else{
            $message=array('message'=>'Someting went wrong',
                'success'=>'0');
            $fileInfo=array_merge($fileInfo,$message);
        }
        return $fileInfo;



    }
    public function exportAppliedCandidateHrReport03(Request $r)
    {
        $appliedList=$r->jobApply;
        $excelName=$r->excelName;
//        $jobTitle=$r->jobTitle;

//        $employees=array();
//        for ($i=0;$i<count($appliedList);$i++){
//            $appliedId=$appliedList[$i];
//            $empId=Jobapply::where('jobapply',$appliedId)->first()->fkemployeeId;
//            array_push($employees,$empId);
//        }


        $ethnicity=Ethnicity::get();
//        $appliedList=$r->jobApply;
//        $appliedId=7;
        $filePath=public_path ()."/exportedExcel";
        $fileName=$excelName."_HR_report02_".date("Y-m-d_H-i-s");

        $fileInfo=array(
            'fileName'=>$fileName,
            'filePath'=>$fileName,
        );

        $jobTitle=Jobapply::select('job.title','job.jobId','job.deadline')
                ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')->whereIn('jobapply',$appliedList)->first();

        $empIds=Jobapply::select('fkemployeeId')->whereIn('jobapply',$appliedList)
            ->get()
            ->toArray();


        $newlist=Employee::select('employee.*',DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as AgeYear"),DB::raw("MONTH(`employee`.`dateOfBirth`)-MONTH(CURDATE()) as AgeMonth"))
                ->whereIn('employee.employeeId',$empIds)
                ->get();

//        $education=Education::select('education.institutionName','board.boardName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
//            'educationmajor.educationMajorName','education.fkMajorId')
//            ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
//            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
//            ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
//            ->leftJoin('board', 'board.boardId', '=', 'education.fkboardId')
//            ->whereIn('fkemployeeId',$empIds)
//            ->orderBy('education.passingYear')
//            ->get();

        $education=Education::select('education.*','degree.degreeName','board.boardName','educationmajor.educationMajorName')
            ->whereIn('fkemployeeId',$empIds)
            ->leftJoin('degree','degree.degreeId','education.fkdegreeId')
            ->leftJoin('board','board.boardId','education.fkboardId')
            ->leftJoin('educationmajor','educationmajor.educationMajorId','education.fkMajorId')
            ->orderBy('education.passingYear')
            ->get();



        $pQualification=ProfessionalQualification::whereIn('professionalqualification.fkemployeeId',$empIds)
            ->get();

        $training=Traning::whereIn('fkemployeeId',$empIds)
            ->get();


        $jobExperience=JobExperience::select('jobexperience.*')
//            ->orderBy('startDate', 'desc')
            ->addSelect(DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expYear"),
                DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(MONTH,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(MONTH,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expMonth"),
                DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expDay"))

            ->whereIn('fkemployeeId',$empIds)
            ->get();

        $salaryInfo=Jobapply::whereIn('fkemployeeId',$empIds)
            ->where('fkjobId',$jobTitle->jobId)
            ->get();

        $refree=Refree::whereIn('fkemployeeId',$empIds)
            ->get();

        $relativeList=RelativeInCb::whereIn('fkemployeeId',$empIds)
            ->get();
        $withoutSalaryInfo='false';

        $check=Excel::create($fileName,function($excel) use($newlist, $ethnicity, $education, $pQualification, $training, $jobExperience, $salaryInfo, $refree,$relativeList,$jobTitle,$withoutSalaryInfo,$excelName) {
            $excel->sheet('First sheet', function($sheet) use($newlist, $ethnicity, $education, $pQualification, $training, $jobExperience, $salaryInfo, $refree,$relativeList,$jobTitle,$withoutSalaryInfo,$excelName) {

                $sheet->setStyle(array(
                    'font' => array(
//                        'name'      =>  'Calibri',
                        'size'      =>  13,
//                        'bold'      =>  false
                    )
                ));

                $sheet->setpaperSize(9);
                $sheet->setOrientation('landscape');
                $sheet->setScale(60);
                $sheet->setFitToPage(false);
                $sheet->loadView('Admin.application.AppliedCandidateList')
                    ->with('AppliedCandidateList',$newlist)
                    ->with('ethnicity',$ethnicity)
                    ->with('educationList',$education)
                    ->with('qualificationList',$pQualification)
                    ->with('trainingList',$training)
                    ->with('jobExperienceList',$jobExperience)
                    ->with('salaryList',$salaryInfo)
                    ->with('refreeList',$refree)
                    ->with('jobTitle',$jobTitle)
                    ->with('withoutsalary',$withoutSalaryInfo)
                    ->with('excelName',$excelName)
                    ->with('relativeList',$relativeList);

            });
        })->store('xls',$filePath);
        if ($check){
            $message=array('message'=>$fileName .'.xls has been downloaded',
                'success'=>'1');
            $fileInfo=array_merge($fileInfo,$message);
        }else{
            $message=array('message'=>'Someting went wrong',
                'success'=>'0');
            $fileInfo=array_merge($fileInfo,$message);
        }
        return $fileInfo;
    }

    public function exportAppliedCandidateHrReport02(Request $r)
    {
        $appliedList=$r->jobApply;
        $excelName=$r->excelName;
//        $jobTitle=$r->jobTitle;

//        $employees=array();
//        for ($i=0;$i<count($appliedList);$i++){
//            $appliedId=$appliedList[$i];
//            $empId=Jobapply::where('jobapply',$appliedId)->first()->fkemployeeId;
//            array_push($employees,$empId);
//        }


        $ethnicity=Ethnicity::get();
//        $appliedList=$r->jobApply;
//        $appliedId=7;
        $filePath=public_path ()."/exportedExcel";
        $fileName=$excelName."_HR_report03_".date("Y-m-d_H-i-s");

        $fileInfo=array(
            'fileName'=>$fileName,
            'filePath'=>$fileName,
        );



         $jobTitle=Jobapply::select('job.title','job.jobId','job.deadline')
                ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')->whereIn('jobapply',$appliedList)->first();

        $empIds=Jobapply::select('fkemployeeId')->whereIn('jobapply',$appliedList)
            ->get()
            ->toArray();

        $newlist=Employee::select('employee.*',DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as AgeYear"),DB::raw("MONTH(`employee`.`dateOfBirth`)-MONTH(CURDATE()) as AgeMonth"))
                ->whereIn('employee.employeeId',$empIds)
                ->get();

//        $education=Education::select('education.institutionName','board.boardName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
//            'educationmajor.educationMajorName','education.fkMajorId')
//            ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
//            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
//            ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
//            ->leftJoin('board', 'board.boardId', '=', 'education.fkboardId')
//            ->whereIn('fkemployeeId',$empIds)
//            ->orderBy('education.passingYear')
//            ->get();


        $education=Education::select('education.*','degree.degreeName','board.boardName','educationmajor.educationMajorName')
            ->whereIn('fkemployeeId',$empIds)
            ->leftJoin('degree','degree.degreeId','education.fkdegreeId')
            ->leftJoin('board','board.boardId','education.fkboardId')
            ->leftJoin('educationmajor','educationmajor.educationMajorId','education.fkMajorId')
            ->orderBy('education.passingYear')
            ->get();



        $pQualification=ProfessionalQualification::whereIn('professionalqualification.fkemployeeId',$empIds)
            ->get();

        $training=Traning::whereIn('fkemployeeId',$empIds)
            ->get();


        $jobExperience=JobExperience::select('jobexperience.*')
//            ->orderBy('startDate', 'desc')
            ->addSelect(DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expYear"),
                DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(MONTH,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(MONTH,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expMonth"),
                DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expDay"))

            ->whereIn('fkemployeeId',$empIds)
            ->get();

        $salaryInfo=Jobapply::whereIn('fkemployeeId',$empIds)
            ->where('fkjobId',$jobTitle->jobId)
            ->get();

        $refree=Refree::whereIn('fkemployeeId',$empIds)
            ->get();

        $relativeList=RelativeInCb::whereIn('fkemployeeId',$empIds)
            ->get();

        $withoutSalaryInfo='true';

        $check=Excel::create($fileName,function($excel) use($newlist, $ethnicity, $education, $pQualification, $training, $jobExperience, $salaryInfo, $refree,$relativeList,$jobTitle,$withoutSalaryInfo,$excelName) {
            $excel->sheet('First sheet', function($sheet) use($newlist, $ethnicity, $education, $pQualification, $training, $jobExperience, $salaryInfo, $refree,$relativeList,$jobTitle,$withoutSalaryInfo,$excelName) {

                $sheet->setStyle(array(
                    'font' => array(
//                        'name'      =>  'Times New Roman',
                        'size'      =>  20,
//                        'bold'      =>  false
                    )
                ));

                $sheet->setpaperSize(9);
                $sheet->setOrientation('landscape');
                $sheet->setScale(60);
                $sheet->setFitToPage(false);

                $sheet->loadView('Admin.application.AppliedCandidateList')
                    ->with('AppliedCandidateList',$newlist)
                    ->with('ethnicity',$ethnicity)
                    ->with('educationList',$education)
                    ->with('qualificationList',$pQualification)
                    ->with('trainingList',$training)
                    ->with('jobExperienceList',$jobExperience)
                    ->with('salaryList',$salaryInfo)
                    ->with('refreeList',$refree)
                    ->with('jobTitle',$jobTitle)
                    ->with('withoutsalary',$withoutSalaryInfo)
                    ->with('excelName',$excelName)
                    ->with('relativeList',$relativeList);

            });
        })->store('xls',$filePath);
        if ($check){
            $message=array('message'=>$fileName .'.xls has been downloaded',
                'success'=>'1');
            $fileInfo=array_merge($fileInfo,$message);
        }else{
            $message=array('message'=>'Someting went wrong',
                'success'=>'0');
            $fileInfo=array_merge($fileInfo,$message);
        }
        return $fileInfo;
    }

    public function exportAppliedCandidateHrReport04(Request $r)
    {
        $appliedList=$r->jobApply;
        $excelName=$r->excelName;
        $ethnicity=Ethnicity::get();
        $filePath=public_path ()."/exportedExcel";
        $fileName=$excelName."_HR_report04_".date("Y-m-d_H-i-s");

        $fileInfo=array(
            'fileName'=>$fileName,
            'filePath'=>$fileName,
        );

        $jobTitle=Jobapply::select('job.title','job.jobId','job.deadline')
            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')->whereIn('jobapply',$appliedList)->first();

        $empIds=Jobapply::select('fkemployeeId')->whereIn('jobapply',$appliedList)
            ->get()
            ->toArray();

        $newlist=Employee::select('employee.*',DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as AgeYear"),DB::raw("MONTH(`employee`.`dateOfBirth`)-MONTH(CURDATE()) as AgeMonth"))
            ->whereIn('employee.employeeId',$empIds)
            ->get();

        $education=Education::select('education.*','degree.degreeName','board.boardName','educationmajor.educationMajorName')
            ->whereIn('fkemployeeId',$empIds)
            ->leftJoin('degree','degree.degreeId','education.fkdegreeId')
            ->leftJoin('board','board.boardId','education.fkboardId')
            ->leftJoin('educationmajor','educationmajor.educationMajorId','education.fkMajorId')
            ->orderBy('education.passingYear')
            ->get();

        $pQualification=ProfessionalQualification::whereIn('professionalqualification.fkemployeeId',$empIds)
            ->get();

        $training=Traning::whereIn('fkemployeeId',$empIds)
            ->get();

        $jobExperience=JobExperience::select('jobexperience.*')
            ->addSelect(DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(YEAR,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expYear"),
                DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(MONTH,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(MONTH,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expMonth"),
                DB::raw("(CASE WHEN `jobexperience`.`endDate` IS NOT null AND `jobexperience`.`startDate` IS NOT null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,`jobexperience`.`endDate`) WHEN `jobexperience`.`startDate` IS NOT null AND `jobexperience`.`endDate` IS null THEN TIMESTAMPDIFF(DAY,`jobexperience`.`startDate`,CURDATE()) ELSE 0 END) AS expDay"))
            ->whereIn('fkemployeeId',$empIds)
            ->get();

        $previousWorkExperienceInCB = PreviousWorkInCB::whereIn('fkemployeeId',$empIds)->get();

        $salaryInfo=Jobapply::whereIn('fkemployeeId',$empIds)
            ->where('fkjobId',$jobTitle->jobId)
            ->get();

        $refree=Refree::whereIn('fkemployeeId',$empIds)
            ->get();

        $relativeList=RelativeInCb::whereIn('fkemployeeId',$empIds)
            ->get();

        $withoutSalaryInfo='false';

        $check=Excel::create($fileName,function($excel) use($newlist, $ethnicity, $education, $pQualification, $training, $jobExperience, $salaryInfo, $refree,$relativeList,$jobTitle,$withoutSalaryInfo,$excelName,$previousWorkExperienceInCB) {
            $excel->sheet('First sheet', function($sheet) use($newlist, $ethnicity, $education, $pQualification, $training, $jobExperience, $salaryInfo, $refree,$relativeList,$jobTitle,$withoutSalaryInfo,$excelName,$previousWorkExperienceInCB) {

                $sheet->setStyle(array(
                    'font' => array(
                        'size'      =>  20,
                    )
                ));

                $sheet->setpaperSize(9);
                $sheet->setOrientation('landscape');
                $sheet->setScale(60);
                $sheet->setFitToPage(false);

                $sheet->loadView('Admin.application.AppliedCandidateList')
                    ->with('AppliedCandidateList',$newlist)
                    ->with('ethnicity',$ethnicity)
                    ->with('educationList',$education)
                    ->with('qualificationList',$pQualification)
                    ->with('trainingList',$training)
                    ->with('jobExperienceList',$jobExperience)
                    ->with('previousWorkExperienceInCBList',$previousWorkExperienceInCB)
                    ->with('salaryList',$salaryInfo)
                    ->with('refreeList',$refree)
                    ->with('jobTitle',$jobTitle)
                    ->with('withoutsalary',$withoutSalaryInfo)
                    ->with('excelName',$excelName)
                    ->with('relativeList',$relativeList);

            });
        })->store('xls',$filePath);
        if ($check){
            $message=array('message'=>$fileName .'.xls has been downloaded',
                'success'=>'1');
            $fileInfo=array_merge($fileInfo,$message);
        }else{
            $message=array('message'=>'Someting went wrong',
                'success'=>'0');
            $fileInfo=array_merge($fileInfo,$message);
        }
        return $fileInfo;
    }

    public function showAllMajorForEducation(Request $r)
    {
//         $major=Degree::select('educationMajorId','educationMajorName')
//            ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'degree.educationLevelId')
//            ->where('degree.educationLevelId', '=',$r->id)
//            ->where('degree.status',1)
//            ->where('educationmajor.status',1)
//            ->groupBy('educationMajorId')
//            ->get();

        $major = Educationmajor::where('fkDegreeId', '=',$r->id)
            ->where('status',1)
            ->groupBy('educationMajorId')
            ->orderBy('educationMajorName','ASC')
            ->orWhere('type', '=','g')
            ->get();
        if ($major == null) {
            echo "<option value='' selected>Select Major</option>";
        } else {
            echo "<option value='' selected>Select Major</option>";
            foreach ($major as $mejor) {
                echo "<option value='$mejor->educationMajorId'>$mejor->educationMajorName</option>";
            }
        }
    }

    public function downloadMailData(Request $r)
    {
        $appliedList=$r->jobApply;
        $template=$r->tamplateId;
        $subjectLine=$r->subjectLine;
        $refNo=$r->refNo;
        $emailtamplateBody=$r->emailtamplateBody;

        $folder_name = date("h-i-sa");

        if ($r->zoneid) {
            $address = Zone::where('zoneId',$r->zoneid)->first();
        }else{
            $address = '';
        }

        if ($template=='1') {
            $emp_status = 'Called';
        }elseif ($template=='2') {
            $emp_status = 'Panel listed';
        }elseif ($template=='3') {
            $emp_status = 'Rejected';
        }

        $error=array();
        for ($i=0;$i<count($appliedList);$i++) {

            $appliedId = $appliedList[$i];
            $jobInfo=Jobapply::leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')->findOrFail($appliedId);
            $jobInfo->status = $emp_status;
            $jobInfo->save();


            $employeeInfo=Employee::select('employee.*')
                ->where('employee.employeeId',$jobInfo->fkemployeeId)
                ->first();

            if ($template=='1'){

                try{
                    $pdf = PDF::loadView('mail.interviewCard',['empInfo' => $employeeInfo,
                        'subjectLine'=>$subjectLine,'refNo'=>$refNo,'jobInfo'=>$jobInfo,'emailtamplateBody'=>$emailtamplateBody,'address'=>$address,'templateFooter'=>$r->templateFooter]);

                    Storage::put('mailPreview/'.$folder_name.'/'.$employeeInfo->firstName.' '.$employeeInfo->lastName.'-INTERVIEW-CARD.pdf', $pdf->output());

                }
                catch (\Exception $ex) {
                    $error[$i]=$ex;
                }
            }
            if ($template=='2'){
                try{
                    $pdf = PDF::loadView('mail.panelListed',['empInfo' => $employeeInfo,
                        'subjectLine'=>$subjectLine,'refNo'=>$refNo,'jobInfo'=>$jobInfo,'emailtamplateBody'=>$emailtamplateBody,'address'=>$address,'templateFooter'=>$r->templateFooter]);

                    Storage::put('mailPreview/'.$folder_name.'/'.$employeeInfo->firstName.' '.$employeeInfo->lastName.'-PANEL-LIST.pdf', $pdf->output());
                }
                catch (\Exception $ex) {
                    $error[$i]=$ex;
                }
            }
            if ($template=='3'){
                try{
                    $pdf = PDF::loadView('mail.notSelected',['empInfo' => $employeeInfo,'subjectLine'=>$subjectLine,'refNo'=>$refNo,'jobInfo'=>$jobInfo,'emailtamplateBody'=>$emailtamplateBody,'address'=>$address,'templateFooter'=>$r->templateFooter]);

                    Storage::put('mailPreview/'.$folder_name.'/'.$employeeInfo->firstName.' '.$employeeInfo->lastName.'-NOTSELECTED-CARD.pdf', $pdf->output());
                }
                catch (\Exception $ex) {
                    $error[$i]=$ex;
                }
            }
        }

        $files = glob(public_path('storage/mailPreview/'.$folder_name,'/*'));
        \Zipper::make(public_path("mailPreview/".$folder_name.".zip"))->add($files)->close();
        return $folder_name;
    }

    public function downloadZip($folder)
    {
        File::deleteDirectory(public_path('storage/mailPreview/'.$folder));
        return response()->download(public_path("mailPreview/".$folder.".zip"))->deleteFileAfterSend(true);
    }

    public function sendMailtoAppliedCandidate(Request $r)
    {
//        if ($r->tamplateId===1){
//            $start = $r->start;
//            $end = $r->end;
//
//            if (empty($r->interval) && $r->tamplateId=='1'){
//                $arr = array('msg' => 'interval field is required.', 'status' => 'error');
//                return Response()->json($arr);
//            }

//            if($start < $end){
//                $avail_time  = (strtotime($end)-strtotime($start))/60;
//                $avail_interval =  ($avail_time/$r->interval)+1;
//                if ($avail_interval >= $r->numberofapplicant)
//                {
//                    $possible=true;
//                }else{
//                    $arr = array('msg' => 'Not possible interval time.', 'status' => 'error');
//                    return Response()->json($arr);
//                }
//
//            } else {
//                $arr = array('msg' => 'Invalid start and end time.', 'status' => 'error');
//                return Response()->json($arr);
//            }
//        }else{
//            $possible=false;
//        }

        $appliedList=$r->jobApply;
        $template=$r->tamplateId;
//        $testDate=$r->testDate;
//        $testAddress=$r->testAddress;
//        $testDetails=$r->testDetails;
//        $footerAndSign=$r->footerAndSign;
        $subjectLine=$r->subjectLine;
        $refNo=$r->refNo;
        $emailtamplateBody=$r->emailtamplateBody;

    if ($r->zoneid) {
        $address = Zone::where('zoneId',$r->zoneid)->first();
    }else{
        $address = '';
    }

        if ($template=='1') {
//            $custom_template = email::where('emailfor','interview')->first();
            $emp_status = 'Called';
        }elseif ($template=='2') {
//            $custom_template = email::where('emailfor','panellisted')->first();
            $emp_status = 'Panel listed';
        }elseif ($template=='3') {
//            $custom_template = email::where('emailfor','notselected')->first();
            $emp_status = 'Rejected';
        }
//        $list=array();
        $error=array();
        for ($i=0;$i<count($appliedList);$i++) {

//            if ($possible){
//                if ($i==0){
//                    $intv = 0;
//                }else{
//                    $intv = $r->interval*($i+1);
//                }
//                $nexttime = strtotime("+".$intv." minutes", strtotime($start));
//                $intviewTime = date("H:i",$nexttime);
//            }else{
//                $intviewTime = '';
//            }

            $appliedId = $appliedList[$i];
            $jobInfo=Jobapply::leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')->findOrFail($appliedId);

            $jobInfo->status = $emp_status;
//            $jobInfo->interviewCallDate = $testDate;
//            $jobInfo->interviewCallDateTime = $intviewTime;
            $jobInfo->save();


            $employeeInfo=Employee::select('employee.*')
                ->where('employee.employeeId',$jobInfo->fkemployeeId)
                ->first();

            if ($template=='1'){

//                $jobInfo->interviewCallDate=$testDate;
                $jobInfo->save();

                try{
                    $pdf = PDF::loadView('mail.interviewCard',['empInfo' => $employeeInfo,
                            'subjectLine'=>$subjectLine,'refNo'=>$refNo,'jobInfo'=>$jobInfo,'emailtamplateBody'=>$emailtamplateBody,'address'=>$address,'templateFooter'=>$r->templateFooter]);

                    Mail::send('mail.MailBody',['employeeInfo' => $employeeInfo], function($message) use ($pdf,$employeeInfo)
                    {
                        $message->to($employeeInfo->email,$employeeInfo->firstName.' '.$employeeInfo->lastName)->subject('INTERVIEW CARD FROM CARITAS BANGLADESH');
                        $message->attachData($pdf->output(),'INTERVIEW-CARD.pdf',['mime' => 'application/pdf']);
                    });

//                    Storage::put('mailPreview/'.$folder_name.'/'.$employeeInfo->firstName.' '.$employeeInfo->lastName.'-INTERVIEW-CARD.pdf', $pdf->output());

                }
                catch (\Exception $ex) {
                     $error[$i]=$ex;
                }
            }
            if ($template=='2'){
                try{
                    $pdf = PDF::loadView('mail.panelListed',['empInfo' => $employeeInfo,
                        'subjectLine'=>$subjectLine,'refNo'=>$refNo,'jobInfo'=>$jobInfo,'emailtamplateBody'=>$emailtamplateBody,'address'=>$address,'templateFooter'=>$r->templateFooter]);

                    Mail::send('mail.MailBody',['employeeInfo' => $employeeInfo], function($message) use ($pdf,$employeeInfo)
                    {
                        $message->to($employeeInfo->email,$employeeInfo->firstName.' '.$employeeInfo->lastName)->subject('Panel listed letter from Caritas Bangladesh');
                        $message->attachData($pdf->output(),'PANEL-LIST.pdf',['mime' => 'application/pdf']);
                    });
//                    Storage::put('mailPreview/'.$folder_name.'/'.$employeeInfo->firstName.' '.$employeeInfo->lastName.'-PANEL-LIST.pdf', $pdf->output());
                }
                catch (\Exception $ex) {
                    $error[$i]=$ex;
                }
            }
            if ($template=='3'){
                try{
                    $pdf = PDF::loadView('mail.notSelected',['empInfo' => $employeeInfo,'subjectLine'=>$subjectLine,'refNo'=>$refNo,'jobInfo'=>$jobInfo,'emailtamplateBody'=>$emailtamplateBody,'address'=>$address,'templateFooter'=>$r->templateFooter]);

                    Mail::send('mail.MailBody',['employeeInfo' => $employeeInfo], function($message) use ($pdf,$employeeInfo)
                    {
                        $message->to($employeeInfo->email,$employeeInfo->firstName.' '.$employeeInfo->lastName)->subject('Regret letter from Caritas Bangladesh');
                        $message->attachData($pdf->output(),'NOTSELECTED-CARD.pdf',['mime' => 'application/pdf']);
                    });
//                    Storage::put('mailPreview/'.$folder_name.'/'.$employeeInfo->firstName.' '.$employeeInfo->lastName.'-NOTSELECTED-CARD.pdf', $pdf->output());
                }
                catch (\Exception $ex) {
                    $error[$i]=$ex;
                }
            }
        }

        if(!empty($error))
        {
            return $error;
        }else{
            return 1;
        }
    }

    public function downloadMailDoc(Request $r){

        $appliedList=$r->jobApply;
        $template=$r->tamplateId;
//        $testDate=$r->testDate;
//        $testAddress=$r->testAddress;
//        $testDetails=$r->testDetails;
//        $footerAndSign=$r->footerAndSign;
        $subjectLine=$r->subjectLine;
        $refNo=$r->refNo;
        $emailtamplateBody=$r->emailtamplateBody;

//        if ($template=='1') {
//            $custom_template = email::where('emailfor','interview')->first();
//        }elseif ($template=='2') {
//            $custom_template = email::where('emailfor','panellisted')->first();
//        }elseif ($template=='3') {
//            $custom_template = email::where('emailfor','notselected')->first();
//        }
        if ($r->zoneid) {
            $address = Zone::where('zoneId',$r->zoneid)->first();
        }else{
            $address = '';
        }
        $jobInfo=Jobapply::leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')->findOrFail($appliedList[0]);

        $empInfo=Employee::select('employee.*')
            ->where('employee.employeeId',$jobInfo->fkemployeeId)
            ->first();
        $templateFooter = $r->templateFooter;
        $viewMode=true;

        if ($template=='1'){
            return view('mail.interviewCard',compact( 'viewMode','empInfo', 'subjectLine','refNo','jobInfo','emailtamplateBody','address','templateFooter'));
        }
        if ($template=='2'){
            return view('mail.panelListed',compact( 'viewMode','empInfo', 'subjectLine','refNo','jobInfo','emailtamplateBody','address','templateFooter'));
        }
        if ($template=='3'){
            return view('mail.notSelected',compact( 'viewMode','empInfo', 'subjectLine','refNo','jobInfo','emailtamplateBody','address','templateFooter'));
        }
    }
}
