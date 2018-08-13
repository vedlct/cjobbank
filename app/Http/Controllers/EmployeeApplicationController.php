<?php

namespace App\Http\Controllers;


use App\Employee;
use App\Ethnicity;
use App\Nationality;
use App\Religion;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;

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
       // return view('home');
    }

    public function getAllApplication()
    {
        $userId=Auth::user()->userId;
        return view('userCv.careerObjective');


    }



}
