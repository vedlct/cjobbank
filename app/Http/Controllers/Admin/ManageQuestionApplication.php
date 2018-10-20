<?php

namespace App\Http\Controllers\Admin;

use App\Aggrement;
use App\Employee;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ManageQuestionApplication extends Controller
{
    public function manageQuestionAnswer(Request $request){
        $aggrements = Aggrement::select('aggrement.*','agreementqus.qus','user.name')
            ->leftJoin('agreementqus','agreementqus.agreementQusId','=','aggrement.fkaggrementQusId')
            ->leftJoin('user','user.userId','=','aggrement.fkUserId')
            ->get();
        return DataTables::of($aggrements)->make(true);
//
    }
    public function getManageQuestionAnswer(){
        return view('manage.showQuestionAnswer');
    }
}
