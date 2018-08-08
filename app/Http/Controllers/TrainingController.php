<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Traning;


class TrainingController extends Controller
{
   public function index(){

       return view('userCv.insert.TrainingCertificate');
   }
   public function insert(Request $r){


       return $r;
   }
}
