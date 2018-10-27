<?php

namespace App\Http\Controllers;

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

            for($i=0;$i<count($r->languagehead);$i++) {

                foreach ($languageskill as $ls) {
                    $language = new EmployeeLanguage();
                    $language->otherSkillId = $r->skill[$i];
                    $language->fkemployeeId = $employee->employeeId;
                    $language->fklanguageHead = $employee->languagehead[$i];
                    $language->ratiing = $r->languageskill[$i];
                    $language->save();
                }
            }



        Session::flash('message', 'Language Added Successfully');

        return redirect()->route('candidate.language.index');

    }
}
