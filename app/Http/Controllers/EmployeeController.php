<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Ethnicity;
use App\Religion;
use Illuminate\Http\Request;

use Session;

use Auth;

class EmployeeController extends Controller
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
        return view('home');
    }

    public function getEmployeeCv()
    {
        $userId=Auth::user()->userId;
        $employeeCvPersonalInfo=Employee::where('fkuserId', '=',$userId)->get();

        $religion=Religion::get();
        $ethnicity=Ethnicity::get();

        if (!$employeeCvPersonalInfo->isEmpty()){

            return view('userCv.update.personalInfo',compact('religion','ethnicity'));

        }else{
            return view('userCv.insert.personalInfo',compact('religion','ethnicity'));
        }



    }
    public function insertPersonalInfo(Request $r)
    {

        $employee=new Employee();

        $employee->firstName=$r->firstName;
        $employee->lastName=$r->lastName;
        $employee->fathersName=$r->fathersName;
        $employee->mothersName=$r->mothersName;
        $employee->dateOfBirth=$r->dob;
        $employee->gender=$r->gender;
        $employee->fkreligionId=$r->religion;
        $employee->ethnicityId=$r->ethnicity;
        $employee->disability=$r->disability;
        $employee->fknationalityId=$r->nationality;
        $employee->homeNumber=$r->homeTelephone;
        $employee->officeNumber=$r->officeTelephone;
        $employee->telephone=$r->telephone;
        $employee->personalMobile=$r->personalMobile;
        $employee->email=$r->email;
        $employee->nationalId=$r->nId;
        $employee->skype=$r->skype;
        $employee->alternativeEmail=$r->alternateEmail;
        $employee->presentAddress=$r->currentAddress;
        $employee->parmanentAddress=$r->permanentAddress;

        $employee->save();


    }
    public function getEmployeeCvCareerObjective()
    {
        $userId=Auth::user()->userId;
        return view('userCv.careerObjective');


    }
    public function getEmployeeCvEducation()
    {
        $userId=Auth::user()->userId;
        return view('userCv.education');


    }
    public function getEmployeeCvProfessionalCertificate()
    {
        $userId=Auth::user()->userId;
        return view('userCv.professionalCertificate');


    }
}
