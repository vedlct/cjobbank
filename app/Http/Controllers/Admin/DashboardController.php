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


        return view('Admin.dashboard.home');
    }





}
