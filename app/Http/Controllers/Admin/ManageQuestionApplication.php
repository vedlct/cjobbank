<?php

namespace App\Http\Controllers\Admin;

use App\Aggrement;
use App\Employee;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use DB;

class ManageQuestionApplication extends Controller
{
    public function manageQuestionAnswer(Request $request){

        $aggrements = Aggrement::select('agreementqus.qus','user.email','user.name','aggrement.ans'
//            DB::raw('CONCAT_WS(" ",employee.firstName,employee.lastName) AS full_name')
        )
            ->leftJoin('agreementqus','agreementqus.agreementQusId','=','aggrement.fkaggrementQusId')
            ->leftJoin('user','user.userId','=','aggrement.fkUserId');
//            ->leftJoin('employee','employee.fkuserId','=','user.userId');

//        if ($request->personalMobileFilter){
//            $aggrements= $aggrements->where('employee.personalMobile','=',$request->personalMobileFilter);
//        }
//        if ($request->emailFilter){
//            $aggrements= $aggrements->where('employee.email',$request->emailFilter);
//        }
        $aggrements=$aggrements->get();

        return DataTables::of($aggrements)->make(true);
//
    }
    public function test(){

        $aggrements = Aggrement::select('agreementqus.qus','employee.email','employee.personalMobile',DB::raw('CONCAT_WS(" ",employee.firstName,employee.lastName) AS full_name'))
            ->leftJoin('agreementqus','agreementqus.agreementQusId','=','aggrement.fkaggrementQusId')
            ->leftJoin('user','user.userId','=','aggrement.fkUserId')
            ->leftJoin('employee','employee.fkuserId','=','user.userId');


        return $aggrements=$aggrements->toSql();


    }
    public function getManageQuestionAnswer(){
        return view('manage.showQuestionAnswer');
    }
}
