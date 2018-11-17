<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MailTamplate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Job;
use App\HR;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Mail;
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
        $mailTemplete =MailTamplate::all();
        return view('manage.mail_tamplate')->with('mailTemplete',$mailTemplete);
    }
    public function test(){

        return view('mail.interviewCard');


    }
    public function testPdf(){


    
        $pdf = PDF::loadView('mail.interviewCard');

        return $pdf->stream('test'.'.pdf',array('Attachment'=>false));



    }

    public function storeMailTemplete(Request $r)
    {
       $mailTemplete = new MailTamplate();
       $mailTemplete->tamplateName = $r->tamplateName;
       $mailTemplete->tamplateFooterAndSign = $r->tamplateFooterAndSign;
       $mailTemplete->testDetails = $r->testDetails;
       $mailTemplete->testDate = $r->testDate;
       $mailTemplete->testAddress = $r->testAddress;
       $mailTemplete->subjectLine = $r->subjectLine;
       $mailTemplete->status = $r->status;
       $mailTemplete->save();
        Session::flash('message', 'Mail Template Saved');
       return back();
    }
    public function editMailTemplete(Request $r){
        $mailTemplete = MailTamplate::findOrFail($r->id);
        return view('manage.editMailTemplete')->with('mail',$mailTemplete);
    }
public function updateMailTemplete(Request $r){
//        return $r;
        $mailTemplete = MailTamplate::findOrFail($r->id);
//        return $mailTemplete;
        $mailTemplete->tamplateName = $r->tamplateName;
        $mailTemplete->tamplateFooterAndSign = $r->tamplateFooterAndSign;
        $mailTemplete->testDetails = $r->testDetails;
        $mailTemplete->testDate = $r->testDate;
        $mailTemplete->testAddress = $r->testAddress;
        $mailTemplete->subject = $r->subject;
        $mailTemplete->status = '1';
       $mailTemplete->save();
      Session::flash('message', 'Mail Template Updated');
      return back();
}
}
