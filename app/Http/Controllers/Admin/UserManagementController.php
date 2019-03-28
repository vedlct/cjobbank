<?php

namespace App\Http\Controllers\Admin;
use App\Designation;
use App\Educationlevel;
use App\Educationmajor;
use App\Employee;
use App\Ethnicity;
use App\HR;
use App\Http\Controllers\Controller;

use App\Job;
use App\Jobapply;
use App\Nationality;
use App\Religion;
use App\User;
use App\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Hash;
use Yajra\DataTables\DataTables;





class UserManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (Auth::check()){

                if(Auth::user()->fkuserTypeId==USER_TYPE['Admin'] || Auth::user()->fkuserTypeId==USER_TYPE['Emp'] ){

                    return $next($request);

                }else{

                    return redirect('/');
                }

            }else{

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


    public function home()
    {
        if(Auth::user()->fkuserTypeId==USER_TYPE['Admin']){
            $zones=Zone::where('status',1)->get();
            $designations=Designation::where('status',1)->get();


            return view('Admin.userMange.manage',compact('zones','designations'));
        }

    }

    public function getUserData(Request $r){

        $hr=HR::select('hrId','hr.status','hr.firstName','hr.lastName','hr.email','hr.gender','zoneName','designationName','employee.cvStatus','employee.employeeId')
            ->leftJoin('designation','designation.designationId','hr.fkdesignationId')
            ->leftJoin('zone','zone.zoneId','hr.fkzoneId')
            ->leftJoin('employee','employee.fkuserId','hr.fkuserId');
        if($r->zoneId){
            $hr=$hr->where('hr.fkzoneId',$r->zoneId);
        }
        if($r->designationId){
            $hr=$hr->where('hr.fkdesignationId',$r->designationId);
        }


        $hr=$hr->get();

        $datatables = DataTables::of($hr);

        return $datatables->make(true);

    }
    public function add(){

        if(Auth::user()->fkuserTypeId==USER_TYPE['Admin']) {

            $zones = Zone::where('status',1)->get();
            $designations = Designation::where('status',1)->get();

            return view('Admin.userMange.addUser', compact('zones', 'designations'));
        }

    }

    public function insert(Request $r){

        $r->validate([
            'firstName' => 'required|max:45',
            'lastName' => 'required|max:45',
            'email' => 'email|required|max:45|unique:user|unique:hr',
            'phone' => 'required|regex:/^[0-9]{11}+$/|min:11',
            'designationId' => 'required',
            'zoneId' => 'required',
            'address' => 'required|max:255',
            'gender' => 'required',
            'password' => 'required|confirmed|min:6',

        ]);

        $user=new User();
        $user->name=$r->firstName;
        $user->email=$r->email;
        $user->password=Hash::make($r->password);
        $user->fkuserTypeId=$r->userType;
        $user->register='Y';
        $user->save();


        $hr=new HR();
        $hr->firstName=$r->firstName;
        $hr->lastName=$r->lastName;
        $hr->email=$r->email;
        $hr->phone=$r->phone;
        $hr->address=$r->address;
        $hr->fkzoneId=$r->zoneId;
        $hr->fkdesignationId=$r->designationId;
        $hr->gender=$r->gender;
        $hr->fkuserId=$user->userId;
        $hr->status=1;
        $hr->save();

        Session::flash('message', 'User Added Successfully!');
        return redirect()->route('admin.manageUser.add');
    }

    public function update($id,Request $r){


        $hr=HR::findOrFail($id);
        $r->validate([
            'firstName' => 'required|max:45',
            'lastName' => 'required|max:45',
            'email' => 'email|required|max:45|unique:hr,email,'.$id.',hrId|unique:user,email,'.$hr->fkuserId.',userId',
            'phone' => 'required|regex:/^[0-9]{11}+$/|min:11',
            'designationId' => 'required',
            'zoneId' => 'required',
            'address' => 'required|max:255',
            'gender' => 'required',
            'password' => 'nullable|confirmed|min:6',
        ]);


        $hr->firstName=$r->firstName;
        $hr->lastName=$r->lastName;
        $hr->email=$r->email;
        $hr->phone=$r->phone;
        $hr->address=$r->address;
        $hr->fkzoneId=$r->zoneId;
        $hr->fkdesignationId=$r->designationId;
        $hr->gender=$r->gender;
        $hr->save();

        $user=User::findOrFail($hr->fkuserId);
        $user->fkuserTypeId=$r->userType;
        $user->email=$r->email;
        if ($r->password !=""){
            $user->password=Hash::make($r->password);
        }
        $user->save();


        Session::flash('message', 'User Updated Successfully!');
        return back();
    }
    public function edit($id){
        if(Auth::user()->fkuserTypeId==USER_TYPE['Admin']){
            $hr=HR::select('hr.*','user.fkuserTypeId')->leftJoin('user','user.userId','hr.fkuserId')->findOrFail($id);
            $zones=Zone::where('status',1)->get();
            $designations=Designation::where('status',1)->get();

            return view('Admin.userMange.editUser',compact('zones','designations','hr'));
        }

    }

    public function changeUserStatus(Request $r){

        $hr=HR::findOrFail($r->id);
        $status=$hr->status;
        if($status == 0){
            $hr->status=1;

            DB::table('user')
                ->where('userId', $hr->fkuserId)
                ->update(['register' => 'Y']);
        }
        else{
            $hr->status=0;
            DB::table('user')
                ->where('userId', $hr->fkuserId)
                ->update(['register' => 'N']);
        }
        $hr->save();

    }





}
