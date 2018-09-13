<?php

namespace App\Http\Controllers\Admin;
use App\Educationlevel;
use App\Educationmajor;
use App\Employee;
use App\Ethnicity;
use App\Http\Controllers\Controller;

use App\Job;
use App\Jobapply;
use App\Nationality;
use App\Religion;
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
        $religion=Religion::get();
        $ethnicity=Ethnicity::get();
        $natinality=Nationality::get();
        $allZone=DB::table('zone')->get();
        $organizationType=DB::table('organizationtype')->get();
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
        $application = Jobapply::select('jobapply.jobapply as applyId', 'jobapply.applydate', 'zone.zoneName', 'employee.firstName', 'employee.lastName', 'job.title')

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

         $application=$application->get();



        $datatables = DataTables::of($application);

         $datatables->addColumn('name', function ($application1) use ($application) {


            foreach ($application as $size) {

                $test = $size->firstName." ".$size->lastName;

            }
            return $test;

        });
        return $datatables->addColumn('Age', function ($application1) use ($application) {


            foreach ($application as $date) {


                $test1 = Carbon::parse($date->birthDate)->diff(Carbon::now())->format('%y.%m');

            }
            return $test1;

        }
        )->make(true);

    }

    public function exportAppliedCandidate(Request $r)
    {

        $appliedList=$r->jobApply;
        $filePath=public_path ()."/exportedExcel";
        $fileName="AppliedCandidateList".date("Y-m-d_H-i-s");

        $fileInfo=array(
            'fileName'=>$fileName,
            'filePath'=>$fileName,
        );

        $list=array();
        for ($i=0;$i<count($appliedList);$i++){
            $appliedId=$appliedList[$i];

            $empId=Jobapply::where('jobapply',$appliedId)->first()->fkemployeeId;

            $newlist=Employee::select('employee.*',DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as AgeYear"),DB::raw("TIMESTAMPDIFF(MONTH,`employee`.`dateOfBirth`,CURDATE()) as AgeMonth"),'education.institutionName',
            'education.status','education.resultSystem','educationlevel.educationLevelName','educationmajor.educationMajorName')
                ->leftJoin('education', 'education.fkemployeeId', '=', 'employee.employeeId')

                ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
                ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
                ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'degree.degreeId')
                ->where('employee.employeeId',$empId)
                ->get()
                ->toArray();
            $list=array_merge($list,$newlist);

        }

        $check=Excel::create($fileName,function($excel) use($list,$filePath) {
            $excel->sheet('First sheet', function($sheet) use($list) {
                $sheet->loadView('Admin.application.AppliedCandidateList')->with('AppliedCandidateList',$list);
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




}
