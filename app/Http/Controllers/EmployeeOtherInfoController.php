<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeOtherInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmployeeOtherInfoController extends Controller
{
    public function otherInfo(){
        $userId=Auth::user()->userId;

        $employee=Employee::where('fkuserId', '=',$userId)->first()->employeeId;

        $empOtherInfo=EmployeeOtherInfo::where('fk_empId','=',$employee)->first();
        if($empOtherInfo==null){
            return view('userCv.insert.insertOtherInfo',compact('employee','empOtherInfo'));
        }
        else{
            return view('userCv.update.updateOtherInfo',compact('employee','empOtherInfo'));
        }


    }

    public function insertOtherInfo(Request $r){
        $userId=Auth::user()->userId;

        $employee=Employee::where('fkuserId', '=',$userId)->first()->employeeId;
        $this->validate($r, [
            'extraCurricularActivities' => 'max:200',
            'interests' => 'max:200',
            'awardReceived' => 'max:200',
            'researchPublication' => 'max:200',
        ]);
        $empOtherInfo = new EmployeeOtherInfo();
        $empOtherInfo->extraCurricularActivities = $r->extraCurricularActivities;
        $empOtherInfo->interests = $r->interests;
        $empOtherInfo->awardReceived = $r->awardReceived;
        $empOtherInfo->researchPublication = $r->researchPublication;
        $empOtherInfo->fk_empId =$employee;
        $empOtherInfo->save();
        Session::flash('message', 'Other Info Saved Successfully');
        return redirect()->route('cv.OthersInfo');
    }
    public function editOtherInfo(Request $r)
    {

        $empOtherInfo=EmployeeOtherInfo::findOrFail($r->id);

        return view('userCv.edit.editOtherInfo',compact('empOtherInfo'));


    }
    public  function updateOtherInfo(Request $r){
                $this->validate($r, [
                    'extraCurricularActivities' => 'max:200',
                    'interests' => 'max:200',
                    'awardReceived' => 'max:200',
                    'researchPublication' => 'max:200',
                ]);
                $empInfo = EmployeeOtherInfo::findOrFail($r->empQuesObjId);
                $empInfo->extraCurricularActivities = $r->extraCurricularActivities;
                $empInfo->interests = $r->interests;
                $empInfo->awardReceived = $r->awardReceived;
                $empInfo->awardReceived = $r->awardReceived;
                $empInfo->save();
        Session::flash('message', 'Other Info Updated Successfully');
                return redirect()->route('cv.OthersInfo');
//        return 'call from update';
    }


}
