<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeLanguage;
use App\LanguageHead;
use App\LanguageSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class LanguageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (Auth::check()){

                return $next($request);


            }else{

                return redirect('/');
            }


        });
    }

    public function index(){

        $languagehead = LanguageHead::get();
        $languageskill = LanguageSkill::get();
        return view('userCv.insert.language', compact('languagehead', 'languageskill'));
    }

    public function insert(Request $r){


        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

        $emp=Employee::findOrFail($employee->employeeId);

        $languageskill = LanguageSkill::get();

            for($i=0;$i < count($r->languagehead);$i++) {

                $count= 0;
               foreach ($languageskill as $ls){

                    $language = new EmployeeLanguage();
                    $language->fkemployeeId = $employee->employeeId;
                    $language->fklanguageHead = $r->languagehead[$i];
                    $language->fklanguageSkill = $ls->id;
                    $language->rate = $r->languageskill[$count];
                    $language->save();
                $count++;

                }

            }

        Session::flash('message', 'Language Added Successfully');

        return redirect()->route('candidate.language.index');

    }
}
