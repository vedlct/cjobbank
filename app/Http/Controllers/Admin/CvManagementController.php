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




class CvManagementController extends Controller
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


    public function manage()
    {
        return view('Admin.cvManage.manage');
    }
    public function manageCvData()
    {

        $cvData=Employee::select('employeeId',DB::raw("((DATEDIFF(CURRENT_DATE, STR_TO_DATE(`employee`.`dateOfBirth`, '%Y-%m-%d'))/365)) as Age"),'gender',
            'email','image')
            ->where('cvStatus',1);

        $cvData=$cvData->get();

        $datatables = DataTables::of($cvData);

        return $datatables->addColumn('name', function ($application1) use ($cvData) {


            foreach ($cvData as $size) {

                $test = $size->firstName." ".$size->lastName;

            }
            return $test;

        })->make(true);


    }





}
