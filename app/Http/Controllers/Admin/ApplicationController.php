<?php

namespace App\Http\Controllers\Admin;
use App\Ethnicity;
use App\Http\Controllers\Controller;

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

//        $application = Jobapply::select('jobapply.jobapply as applyId', 'jobapply.applydate', 'zone.zoneName', 'employee.firstName', 'employee.lastName', 'job.title',
//            DB::raw("TIMESTAMPDIFF(YEAR,'employee.dateOfBirth',CURDATE()) as Age"))
//            ->leftJoin('employee', 'employee.employeeId', '=', 'jobapply.fkemployeeId')
//            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')
//            ->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')->toSql();
//
//        return $application;



        return view('Admin.application.manageApplication',compact('religion','ethnicity','natinality','allZone'));
    }
    public function showAllApplication(Request $r)
    {
        $application = Jobapply::select('jobapply.jobapply as applyId', 'jobapply.applydate', 'zone.zoneName', 'employee.firstName', 'employee.lastName', 'job.title',
                        DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as Age"))
            ->leftJoin('employee', 'employee.employeeId', '=', 'jobapply.fkemployeeId')
            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')
            ->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId');

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

//        if ($r->ageFromFilter){
//            $application= $application->where('age','>',$r->ageFromFilter);
//        }

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
