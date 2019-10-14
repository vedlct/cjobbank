<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Ethnicity;
use App\HR;
use App\Jobapply;
use App\Religion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class ZoneAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()){
                if(Auth::user()->fkuserTypeId==USER_TYPE['ZoneAdmin'] ){
                    return $next($request);
                }else{
                    return redirect('/');
                }
            }else{
                return redirect('/');
            }
        });
    }

    public function home()
    {
        $todaysJobApply=Jobapply::select('employee.firstName','employee.lastName','job.position','employee.gender','employee.email','job.fkzoneId')
            ->leftJoin('employee', 'employee.employeeId', '=', 'jobapply.fkemployeeId')
            ->leftJoin('job', 'job.jobId', '=', 'jobapply.fkjobId')
            ->where('applydate',date('Y-m-d'));

        $todaysJobApply=$todaysJobApply->get();

        $todaysRegisterCv=Employee::select('employee.firstName','employee.lastName','employee.gender','employee.email','employee.personalMobile','employee.fkreligionId','employee.ethnicityId')
            ->where('cvStatus',1)
            ->where('cvCompletedDate',date('Y-m-d'))
            ->get();
        $allZone=DB::table('zone')->where('status',1)->get();
        $religion=Religion::where('status',1)->get();
        $ethnicity=Ethnicity::where('status',1)->get();

        return view('Admin.dashboard.home',compact('todaysJobApply','allZone','todaysRegisterCv','religion','ethnicity'));

    }
}
