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
//        $allZone=DB::table('zone')->get();
        $religion=Religion::get();
        $ethnicity=Ethnicity::get();

        return view('Admin.cvManage.manage',compact('religion','ethnicity'));
    }
    public function manageCvData(Request $r)
    {

        $cvData=Employee::select('employeeId','employee.dateOfBirth as birthDate','gender', 'email','image','firstName','lastName',DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as age1"))
//            ->leftJoin('zone', 'zone.zoneId', '=', 'employee.fkzoneId')
            ->where('cvStatus',1);

        if ($r->genderFilter){
            $cvData= $cvData->where('employee.gender',$r->genderFilter);
        }
        if ($r->religionFilter){
            $cvData= $cvData->where('employee.fkreligionId',$r->religionFilter);
        }
        if ($r->ethnicityFilter){
            $cvData= $cvData->where('employee.ethnicityId',$r->ethnicityFilter);
        }

        if ($r->ageFromFilter){
            $cvData= $cvData->having('age1','>=',$r->ageFromFilter);
        }
        if ($r->ageToFilter){
            $cvData= $cvData->having('age1','<=',$r->ageToFilter);
        }


        $cvData=$cvData->get();

        $datatables = DataTables::of($cvData);

         $datatables->addColumn('name', function ($application1) use ($cvData) {


            foreach ($cvData as $size) {

                $test = $size->firstName." ".$size->lastName;

            }
            return $test;

        });
         $datatables->addColumn('Age', function ($application1) use ($cvData,$r) {


            foreach ($cvData as $date) {


                $test1 = Carbon::parse($date->birthDate)->diff(Carbon::now())->format('%y.%m');

            }


            return $test1;



        });






        return $datatables->addColumn('gender', function ($application1) use ($cvData) {


            foreach ($cvData as $age) {

                foreach (GENDER as $key=>$value){

                    if ($age->gender==$value){
                        $test2=$key;
                    }
                }



            }
            return $test2;

        }


        )->make(true);


    }





}
