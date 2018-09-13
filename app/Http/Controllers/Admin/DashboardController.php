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




class DashboardController extends Controller
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


    public function home()
    {
        $todaysJobApply=Jobapply::select('employee.firstName','employee.lastName','job.position','employee.gender','employee.email','job.fkzoneId')
            ->leftJoin('employee', 'employee.employeeId', '=', 'jobapply.fkemployeeId')
            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')
            ->where('applydate',date('Y-m-d'))->get();

        $todaysRegisterCv=Employee::select('employee.firstName','employee.lastName','employee.gender','employee.email','employee.personalMobile','employee.fkreligionId','employee.ethnicityId')
            ->where('cvStatus',1)
            ->where('cvCompletedDate',date('Y-m-d'))
            ->get();
        $allZone=DB::table('zone')->get();
        $religion=Religion::get();
        $ethnicity=Ethnicity::get();


        return view('Admin.dashboard.home',compact('todaysJobApply','allZone','todaysRegisterCv','religion','ethnicity'));
    }





}
