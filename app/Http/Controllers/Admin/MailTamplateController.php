<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Job;
use App\HR;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Yajra\DataTables\DataTables;

use PDF;


class MailTamplateController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware(function ($request, $next) {

            if (Auth::check()){

                return $next($request);


            }else{

                return redirect('/');
            }


        });
    }
    public function show(){

        return view('manage.mail_tamplate');


    }
    public function test(){

        return view('mail.interviewCard');


    }
    public function testPdf(){



        $pdf = PDF::loadView('mail.interviewCard');

        return $pdf->stream('test'.'.pdf',array('Attachment'=>false));



    }

}
