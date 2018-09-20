<?php

namespace App\Http\Controllers\Admin;
use App\Education;
use App\Educationlevel;
use App\Educationmajor;
use App\Employee;
use App\Ethnicity;
use App\HR;
use App\Http\Controllers\Controller;

use App\Job;
use App\Jobapply;
use App\JobExperience;
use App\Nationality;
use App\ProfessionalQualification;
use App\Refree;
use App\RelativeInCb;
use App\Religion;
use App\Traning;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Yajra\DataTables\DataTables;

use Excel;




class ApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    public function manageApplication()
    {
        $religion=Religion::where('status',1)->get();
        $ethnicity=Ethnicity::where('status',1)->get();
        $natinality=Nationality::where('status',1)->get();
        $allZone=DB::table('zone')->where('status',1)->get();
        $organizationType=DB::table('organizationtype')->where('status',1)->get();
        $allJobTitle=Job::select('title')->get();
        $allEducationLevel=Educationlevel::get();
        $allEducationMajor=Educationmajor::select('educationMajorId','educationMajorName')->get();

//        $application = Jobapply::select('jobapply.jobapply as applyId', 'jobapply.applydate', 'zone.zoneName', 'employee.firstName', 'employee.lastName', 'job.title',
//                                    DB::raw("CONCAT((year(now()) - year(`employee`.`dateOfBirth`)),'.',(month(now()) - month(`employee`.`dateOfBirth`))) as Age"))
//            ->leftJoin('employee', 'employee.employeeId', '=', 'jobapply.fkemployeeId')
//            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')
//            ->leftJoin('education', 'education.fkemployeeId', '=', 'employee.employeeId')
//            ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
//            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
//            ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'degree.degreeId')
//            ->leftJoin('professionalqualification', 'professionalqualification.fkemployeeId', '=', 'employee.employeeId')
//            ->leftJoin('jobexperience', 'jobexperience.fkemployeeId', '=', 'employee.employeeId')
//            ->leftJoin('traning', 'traning.fkemployeeId', '=', 'employee.employeeId')
//            ->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')
//            ->distinct('educationmajor.fkDegreeId')
//        ;
//
//        $application= $application->where('jobexperience.startDate','>=','2018-08-24');



//        return $application=$application->get();




        return view('Admin.application.manageApplication',compact('religion','ethnicity','natinality','allZone','allJobTitle','allEducationLevel','allEducationMajor','organizationType'));
    }
    public function showAllApplication(Request $r)
    {
        $application = Jobapply::select('jobapply.jobapply as applyId', 'jobapply.applydate', 'zone.zoneName','employee.employeeId', 'employee.firstName', 'employee.lastName', 'job.title')

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
            ->distinct('educationmajor.fkDegreeId')
        ;

        if ($r->genderFilter){
            $application= $application->where('employee.gender',$r->genderFilter);
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

            $application= $application->where('education.fkMajorId',$r->educationMajorFilter);
        }

        if ($r->ageFromFilter){
            $application= $application->where(DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE())"),'>=',$r->ageFromFilter);
        }
        if ($r->ageToFilter){
            $application= $application->where(DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE())"),'<=',$r->ageToFilter);
        }
        if ($r->jobTitle){
            $application= $application->where('job.title', 'LIKE', '%' . $r->jobTitle . '%');;
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

        if(Auth::user()->fkuserTypeId=="cbEmp"){
            $myZone=HR::where('fkuserId',Auth::user()->userId)
                ->first();
            $application= $application->where('job.fkzoneId',$myZone->fkzoneId);



        }

         $application=$application->get();



        $datatables = DataTables::of($application);

        return $datatables->make(true);

//         $datatables->addColumn('name', function ($application1) use ($application) {
//
//
//            foreach ($application as $size) {
//
//                $test = $size->firstName." ".$size->lastName;
//
//            }
//            return $test;
//
//        });
//        return $datatables->addColumn('Age', function ($application1) use ($application) {
//
//
//            foreach ($application as $date) {
//
//
//                $test1 = Carbon::parse($date->birthDate)->diff(Carbon::now())->format('%y.%m');
//
//            }
//            return $test1;
//
//        }
//        )->make(true);

    }

    public function exportAppliedCandidate(Request $r)
    {
        $ethnicity=Ethnicity::get();




        $appliedList=$r->jobApply;
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

        for ($i=0;$i<count($appliedList);$i++){
            $appliedId=$appliedList[$i];

            $empId=Jobapply::where('jobapply',$appliedId)->first()->fkemployeeId;

            $newlist=Employee::select('employee.*',DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as AgeYear"),DB::raw("MONTH(`employee`.`dateOfBirth`)-MONTH(CURDATE()) as AgeMonth"))
//                ->leftJoin('education', 'education.fkemployeeId', '=', 'employee.employeeId')
                ->where('employee.employeeId',$empId)
                ->get()
                ->toArray();
            $education=Education::select('education.institutionName','education.fkemployeeId','education.status','education.resultSystem','education.result','educationlevel.educationLevelName',
                'educationmajor.educationMajorName','education.fkMajorId')
                ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
                ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
                ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
                ->where('fkemployeeId',$empId)
                ->get()
                ->toArray();

            $pQualification=ProfessionalQualification::where('professionalqualification.fkemployeeId',$empId)
                ->get()
                ->toArray();

            $training=Traning::where('fkemployeeId',$empId)
                ->get()
                ->toArray();

            $jobExperience=JobExperience::where('fkemployeeId',$empId)
                ->get()
                ->toArray();

            $jobApply=Jobapply::where('jobapply',$appliedId)
                ->get()
                ->toArray();

            $refree=Refree::where('fkemployeeId',$empId)
                ->get()
                ->toArray();
            $relList=RelativeInCb::where('fkemployeeId',$empId)
                ->get()
                ->toArray();


            $list=array_merge($list,$newlist);
            $eduList=array_merge($eduList,$education);
            $trainingList=array_merge($trainingList,$training);
            $qualificationList=array_merge($qualificationList,$pQualification);
            $jobExperienceList=array_merge($jobExperienceList,$jobExperience);
            $salaryList=array_merge($salaryList,$jobApply);
            $refreeList=array_merge($refreeList,$refree);
            $relativeList=array_merge($relativeList,$relList);

        }







        $check=Excel::create($fileName,function($excel) use($list,$filePath,$ethnicity,$eduList,$qualificationList,$trainingList,$jobExperienceList,$salaryList,$refreeList,$relativeList) {
            $excel->sheet('First sheet', function($sheet) use($list,$ethnicity,$eduList,$qualificationList,$trainingList,$jobExperienceList,$salaryList,$refreeList,$relativeList) {


                $sheet->loadView('Admin.application.AppliedCandidateList')
                    ->with('AppliedCandidateList',$list)
                    ->with('ethnicity',$ethnicity)
                    ->with('educationList',$eduList)
                    ->with('qualificationList',$qualificationList)
                    ->with('trainingList',$trainingList)
                    ->with('jobExperienceList',$jobExperienceList)
                    ->with('salaryList',$salaryList)
                    ->with('refreeList',$refreeList)
                    ->with('relativeList',$relativeList);
            });

        })->store('xls',$filePath);

        if ($check){
            $message=array('message'=>$fileName .'.csv <br><div align="center">ProductList.csv and</div> OfferList.csv'. ' has been sent to server',
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

        $appliedList=array(1);
        $filePath=public_path ()."/exportedExcel";
        $fileName="AppliedCandidateList".date("Y-m-d_H-i-s");

        $fileInfo=array(
            'fileName'=>$fileName,
            'filePath'=>$fileName,
        );

        $list=array();
        $eduList=array();
        for ($i=0;$i<count($appliedList);$i++) {
            $appliedId = $appliedList[$i];

            $empId = Jobapply::where('jobapply', $appliedId)->first()->fkemployeeId;

            $newlist = Employee::select('employee.*', DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as AgeYear"), DB::raw("TIMESTAMPDIFF(MONTH,`employee`.`dateOfBirth`,CURDATE()) as AgeMonth"))
//                ->leftJoin('education', 'education.fkemployeeId', '=', 'employee.employeeId')

                ->where('employee.employeeId', $empId)
                ->get()
                ->toArray();

            $education = Education::select('education.institutionName', 'education.status', 'education.resultSystem', 'education.result', 'educationlevel.educationLevelName',
                'educationmajor.educationMajorName', 'education.fkMajorId')
                ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
                ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
                ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'education.fkMajorId')
                ->where('fkemployeeId', $empId)->get()->toArray();

            $list = array_merge($list, $newlist);
            $educationList = array_merge($eduList, $education);
        }

        $ethnicity=Ethnicity::get();

        return view('Admin.application.AppliedCandidateList')->with('AppliedCandidateList',$list)->with('ethnicity',$ethnicity)->with('educationList',$educationList);



    }




}
