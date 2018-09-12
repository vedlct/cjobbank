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
        $zones=Zone::get();
        $designations=Designation::get();


        return view('Admin.userMange.manage',compact('zones','designations'));
    }

    public function getUserData(Request $r){
        $hr=HR::select('hrId','firstName','lastName','email','gender','zoneName','designationName')
            ->leftJoin('designation','designation.designationId','hr.fkdesignationId')
            ->leftJoin('zone','zone.zoneId','hr.fkzoneId')
            ->get();

        $datatables = DataTables::of($hr);

        return $datatables->make(true);

    }
    public function add(){
        $zones=Zone::get();
        $designations=Designation::get();

        return view('Admin.userMange.addUser',compact('zones','designations'));
    }

    public function insert(Request $r){
        $r->validate([
            'firstName' => 'required|max:45',
            'lastName' => 'required|max:45',
            'email' => 'email|required|max:45',
            'phone' => 'required|max:25',
            'designationId' => 'required',
            'zoneId' => 'required',
            'address' => 'required|max:255',
            'gender' => 'required',
        ]);

        $user=new User();
        $user->name=$r->firstName;
        $user->email=$r->email;
        $user->password='';
        $user->fkuserTypeId='employee';
//        $user->fkuserTypeId='employee';

        $hr=new HR();
        $hr->firstName=$r->firstName;
        $hr->lastName=$r->lastName;
        $hr->email=$r->email;
        $hr->phone=$r->phone;
        $hr->address=$r->address;
        $hr->fkzoneId=$r->zoneId;
        $hr->fkdesignationId=$r->designationId;
        $hr->gender=$r->gender;
        $hr->save();
        Session::flash('message', 'User Added Successfully!');
        return redirect()->route('admin.manageUser.add');
    }

    public function edit($id){
        $hr=HR::findOrFail($id);
//        return $hr;
        $zones=Zone::get();
        $designations=Designation::get();

        return view('Admin.userMange.editUser',compact('zones','designations','hr'));
    }





}
