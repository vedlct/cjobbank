<?php

namespace App\Http\Controllers\Admin;
use App\Educationlevel;
use App\Educationmajor;
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
        $allJobTitle=Job::select('title')->get();
        $allEducationLevel=Educationlevel::get();
        $allEducationMajor=Educationmajor::select('educationMajorId','educationMajorName')->get();

//        $application = Jobapply::select('jobapply.jobapply as applyId', 'jobapply.applydate', 'zone.zoneName', 'employee.firstName', 'employee.lastName', 'job.title',
//
//            DB::raw("CONCAT((year(now()) - year(`employee`.`dateOfBirth`)),'.',(month(now()) - month(`employee`.`dateOfBirth`))) as Age"))
//            ->leftJoin('employee', 'employee.employeeId', '=', 'jobapply.fkemployeeId')
//            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')
//            ->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId');
//
//
//            $application= $application->having('Age','>=',2);
//
//        return $application=$application->get();




        return view('Admin.application.manageApplication',compact('religion','ethnicity','natinality','allZone','allJobTitle','allEducationLevel','allEducationMajor'));
    }
    public function showAllApplication(Request $r)
    {
        $application = Jobapply::select('jobapply.jobapply as applyId', 'jobapply.applydate', 'zone.zoneName', 'employee.firstName', 'employee.lastName', 'job.title',
                        DB::raw("CONCAT((year(now()) - year(`employee`.`dateOfBirth`)),'.',(month(now()) - month(`employee`.`dateOfBirth`))) as Age"))

            ->leftJoin('employee', 'employee.employeeId', '=', 'jobapply.fkemployeeId')
            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')
            ->leftJoin('education', 'education.fkemployeeId', '=', 'employee.employeeId')
            ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
//            ->leftJoin('educationmajor', 'educationmajor.fkDegreeId', '=', 'degree.degreeId')
            ->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')
//            ->groupBy('educationmajor.fkDegreeId')
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
        if ($r->educationMajorFilter){

            $application= $application->where('educationmajor.educationMajorId',$r->educationMajorFilter);
        }

        if ($r->ageFromFilter){
            $application= $application->having('Age','>=',$r->ageFromFilter);
        }
        if ($r->ageToFilter){
            $application= $application->having('Age','<=',$r->ageToFilter);
        }
        if ($r->jobTitle){
            $application= $application->where('job.title', 'LIKE', '%' . $r->jobTitle . '%');;
        }
        if ($r->applyDate){
            $application= $application->where('jobapply.applydate',$r->applyDate);;
        }

         $application=$application->get();



        $datatables = DataTables::of($application);

        return $datatables->addColumn('name', function ($application1) use ($application) {


            foreach ($application as $size) {

                $test = $size->firstName." ".$size->lastName;

            }
            return $test;

        })->make(true);

    }


}
