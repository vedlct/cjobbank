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



        $languageskill = LanguageSkill::get();

        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)
                    ->first();

        $languagehead = LanguageHead::select('languagehead.*')->where('languagehead.status',1)->whereNotIn('id', function ($query) use ($employee){
            $query->select('fklanguageHead')
                ->from('emp_language')
                ->where('fkemployeeId',$employee->employeeId);
        })->get();

//        $languagehead = LanguageHead::get();


        $empLanguage=EmployeeLanguage::select('emp_language.*','languageskill.languageSkillName','languagehead.languagename')
            ->where('fkemployeeId',$employee->employeeId)
            ->leftJoin('languageskill','languageskill.id','emp_language.fklanguageSkill')
            ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
            ->get();

//        return $empLanguage;

        if($empLanguage->isEmpty()){
            return view('userCv.insert.language', compact('languagehead', 'languageskill'));
        }
        else{
            $empLanguageGroup=EmployeeLanguage::select('fklanguageHead','languagehead.languagename')->where('fkemployeeId',$employee->employeeId)
                ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
                ->groupBy('fklanguageHead')
                ->get();


            return view('userCv.update.language', compact('languagehead', 'languageskill','empLanguage','empLanguageGroup'));
        }






    }

    public function insert(Request $r){

        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

        $emp=Employee::findOrFail($employee->employeeId);

        $languageskill = LanguageSkill::get();
        $count= 0;
            for($i=0;$i < count($r->languagehead);$i++) {

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

    public function edit(Request $r){

       $fklanguageHead=$r->id;
        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

        $empLanguage=EmployeeLanguage::where('fkemployeeId',$employee->employeeId)
            ->where('fklanguageHead',$r->id)
            ->get();


        $languagehead = LanguageHead::get();
        $languageskill = LanguageSkill::get();



        return view('userCv.edit.language', compact('languagehead', 'languageskill','empLanguage','fklanguageHead'));

    }

    public function update(Request $r){
//       return $r;
        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();

        for($i=0;$i<count($r->langskillid);$i++){
            EmployeeLanguage::where('fkemployeeId',$employee->employeeId)
                ->where('fklanguageHead',$r->languagehead)
                ->where('fklanguageSkill',$r->langskillid[$i])
                ->update(['rate'=>$r->languageskill[$i]]);
        }
        return back();
    }

    public function delete(Request $r){
        $employee=Employee::select('employeeId')->where('fkuserId',Auth::user()->userId)->first();
        EmployeeLanguage::where('fkemployeeId',$employee->employeeId)
            ->where('fklanguageHead',$r->id)
            ->delete();

    }
}
