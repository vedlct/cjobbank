<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Jobapply;
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
        return view('Admin.application.manageApplication');
    }
    public function showAllApplication(Request $r)
    {
        $application = Jobapply::select('jobapply.jobapply as applyId', 'jobapply.applydate', 'zone.zoneName', 'employee.firstName', 'employee.lastName', 'job.title')
            ->leftJoin('employee', 'employee.employeeId', '=', 'jobapply.fkemployeeId')
            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')
            ->leftJoin('zone', 'zone.zoneId', '=', 'job.fkzoneId')->get();


        $datatables = DataTables::of($application);

        return $datatables->addColumn('name', function ($application1) use ($application) {


            foreach ($application as $size) {

                $test = $size->firstName." ".$size->lastName;

            }
            return $test;

        })->make(true);

    }


}
