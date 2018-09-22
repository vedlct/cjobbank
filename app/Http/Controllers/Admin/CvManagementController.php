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
use App\HR;
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
//        $this->middleware('auth');
        $this->middleware(function ($request, $next) {


            if(Auth::check() && Auth::user()->fkuserTypeId==USER_TYPE['Admin'] || Auth::user()->fkuserTypeId==USER_TYPE['Emp'] ){

                return $next($request);

            }else{
                // Session::flash('message', 'please Login to Account Again .');
                return redirect('/');
            }


        });
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
        if(Auth::user()->fkuserTypeId==USER_TYPE['Admin']){

            $religion=Religion::where('status',1)->get();
            $ethnicity=Ethnicity::where('status',1)->get();

            return view('Admin.cvManage.manage',compact('religion','ethnicity'));
        }

    }
    public function manageCvData(Request $r)
    {

        $cvData=Employee::select('employeeId','employee.dateOfBirth as birthDate','gender', 'email','image','firstName','lastName',DB::raw("TIMESTAMPDIFF(YEAR,`employee`.`dateOfBirth`,CURDATE()) as age1"),DB::raw("MONTH(`employee`.`dateOfBirth`)-MONTH(CURDATE()) as age2"))
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

        return $datatables->make(true);

//         $datatables->addColumn('name', function ($application1) use ($cvData) {
//
//
//            foreach ($cvData as $size) {
//
//                $test = $size->firstName." ".$size->lastName;
//
//            }
//            return $test;
//
//        });

//         $datatables->addColumn('Age', function ($application1) use ($cvData,$r) {
//
//
//            foreach ($cvData as $date) {
//
//
//                $test1 = Carbon::parse($date->birthDate)->diff(Carbon::now())->format('%y.%m');
//
//            }
//
//
//            return $test1;
//
//
//
//        });






//        return $datatables->addColumn('gender', function ($application1) use ($cvData) {
//
//
//            foreach ($cvData as $age) {
//
//                foreach (GENDER as $key=>$value){
//
//                    if ($age->gender==$value){
//                        $test2=$key;
//                    }
//                }
//
//            }
//            return $test2;
//
//        }


//        )->make(true);


    }





}
