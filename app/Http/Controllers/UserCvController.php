<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class UserCvController extends Controller
{
   public function index(){
//       return view('test');
       $pdf = PDF::loadView('test');
       return $pdf->stream('invoice.pdf',array('Attachment'=>0));
   }
}
