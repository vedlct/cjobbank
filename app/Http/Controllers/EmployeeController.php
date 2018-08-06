<?php

namespace App\Http\Controllers;

use App\Employee;
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
        if (!empty($employeeCvPersonalInfo)){

            return view('userCv.update.personalInfo');

        }else{
            return view('userCv.insert.personalInfo');
        }



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
