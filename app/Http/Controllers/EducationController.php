<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Auth;
use Session;

use App\Country;
use App\Degree;
use App\Education;
use App\Educationlevel;
use App\Educationmajor;

use App\Employee;

class EducationController extends Controller
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
   public function index(){


   }

    public function getEmployeeCvEducation()
    {
        $userId=Auth::user()->userId;

        $employee=Employee::where('fkuserId', '=',$userId)->first()->employeeId;

        $employeeCvEducationInfo=Education::select('education.*','board.boardName','educationmajor.educationMajorName','educationLevelName','eduLvlUnder','degreeName')
            ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
            ->leftJoin('educationmajor', 'educationmajor.educationMajorId', '=', 'education.fkMajorId')
            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
            ->leftJoin('board', 'board.boardId', '=', 'education.fkboardId')
            ->where('fkemployeeId', '=',$employee)->get();



        $educationLevel=Educationlevel::where('status',1)->get();

        $country=Country::get();
        $boards=Board::where('status',1)->orderBy('boardName', 'ASC')->get();
//        return $employeeCvEducationInfo;



        if ($employeeCvEducationInfo->isEmpty()){

            return view('userCv.insert.education',compact('educationLevel','degree','country','boards'));

        }else{
            return view('userCv.update.education',compact('educationLevel','degree','country','employeeCvEducationInfo','boards'));
        }

    }
    public function getDegreePerEducation(Request $r)
    {
        $degree=Degree::select('degreeId','degreeName')->where('educationLevelId', '=',$r->id)->where('status',1)->orderBy('degreeName', 'ASC')->get();

        if ($degree == null) {
            echo "<option value='' selected>Select Degree</option>";
            echo  "<option value=".OTHERS.">".OTHERS."</option>";
        } else {
            echo "<option value='' selected>Select Degree</option>";
            foreach ($degree as $deg) {
                echo "<option value='$deg->degreeId'>$deg->degreeName</option>";

            }
            echo  "<option value=".OTHERS.">".OTHERS."</option>";
        }



    }
    public function getBoradOrUniversity(Request $r)
    {
        $eduLvlUnder=Educationlevel::findOrFail($r->id)->eduLvlUnder;

        if($eduLvlUnder){
            return $eduLvlUnder;
        }else{
            return 0;
        }




    }
    public function getMajorPerEducation(Request $r)
    {



        $major=Educationmajor::select('educationMajorId','educationMajorName')
            ->where('fkDegreeId', '=',$r->id)
            ->where('status',1)
            ->orWhere('type', '=','g')
            ->groupBy('educationMajorId')
            ->orderBy('educationMajorName', 'ASC')
            ->get();


        if ($major == null) {
            echo "<option value='' selected>Select Major</option>";
            echo  "<option value=".OTHERS.">".OTHERS."</option>";
        } else {
            echo "<option value='' selected>Select Major</option>";
            foreach ($major as $mejor) {
                echo "<option value='$mejor->educationMajorId'>$mejor->educationMajorName</option>";
            }
            echo  "<option value=".OTHERS.">".OTHERS."</option>";
        }
    }
    public function insertPersonalEducation(Request $r)
    {
       // return $r;
        $employee=Employee::where('fkuserId', '=',Auth::user()->userId)->first()->employeeId;



        for($i=0;$i<count($r->degree);$i++){
            $professional=new Education();

            if ($r->degree[$i]==OTHERS){
                $degreeName=new Degree();
                $degreeName->degreeName=$r->degreeName[$i];
                $degreeName->educationLevelId=$r->educationLevel[$i];
                $degreeName->status=1;
                $degreeName->save();

                $professional->fkdegreeId=$degreeName->degreeId;

            }else{
                $professional->fkdegreeId=$r->degree[$i];

            }

            if ($r->board[$i]==OTHERS){

                $boardName=new Board();
                $boardName->boardName=$r->boardName[$i];
                $boardName->status=1;
                $boardName->save();

                $professional->fkboardId=$boardName->boardId;
            }else{
                $professional->fkboardId=$r->board[$i];
            }


            if ($r->resultSystem[$i]==OTHERS){

                $professional->resultSystem=4;
                $professional->resultSystemName=$r->resultSydtemName[$i];
            }else{
                $professional->resultSystem=$r->resultSystem[$i];
            }

            if ($r->major[$i] == OTHERS){

                $eduMajor=new Educationmajor();
                $eduMajor->educationMajorName=$r->subjectName[$i];

                if ($r->degree[$i]==OTHERS){
                    $eduMajor->fkDegreeId=$degreeName->degreeId;
                }else{
                    $eduMajor->fkDegreeId=$r->degree[$i];
                }

                $eduMajor->status=1;
                $eduMajor->save();

                $professional->fkMajorId=$eduMajor->educationMajorId;

            }else{
                $professional->fkMajorId=$r->major[$i];
            }

            if ($r->universityType[$i]==''){
                $professional->universityType=null;
            }else{
                $professional->universityType=$r->universityType[$i];
            }

            $professional->institutionName=$r->instituteName[$i];
           // $professional->fkMajorId=$r->major[$i];
            $professional->passingYear=$r->passingYear[$i];
            $professional->status=$r->status[$i];

            $professional->result=$r->result[$i];
            $professional->resultOutOf=$r->resultOutOf[$i];
            $professional->fkcountryId=$r->country[$i];

            $professional->fkemployeeId=$employee;
            $professional->save();
        }

        Session::flash('message', 'Education Added Successfully');

        return redirect()->route('candidate.cvEducation');


    }
    public function getEducationEdit(Request $r)
    {

        $education=Education::select('education.*','educationmajor.educationMajorName','educationLevelName','eduLvlUnder','universityType','degree.educationLevelId','degree.degreeName','degree.degreeId')
            ->leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
            ->leftJoin('educationmajor', 'educationmajor.educationMajorId', '=', 'education.fkMajorId')
            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
            ->findOrFail($r->id);

        $educationLevel=Educationlevel::where('status',1)->get();
        $country=Country::get();
        $boards=Board::where('status',1)->orderBy('boardName', 'ASC')->get();


        $major=Educationmajor::select('educationMajorId','educationMajorName')
            ->where('fkDegreeId', '=',$education->degreeId)
            ->where('status',1)
            ->orWhere('type', '=','g')
            ->groupBy('educationMajorId')
            ->orderBy('educationMajorName', 'ASC')
            ->get();



        return view('userCv.edit.editEducation',compact('education','educationLevel','country','boards','major'));


    }
    public function updatePersonalEducation(Request $r)
    {
        $personalEducation=Education::findOrFail($r->educationId);

        if ($r->degree==OTHERS){
            $degreeName=new Degree();
            $degreeName->degreeName=$r->degreeName;
            $degreeName->educationLevelId=$r->educationLevel;
            $degreeName->status=1;
            $degreeName->save();

            $personalEducation->fkdegreeId=$degreeName->degreeId;

        }else{
            $personalEducation->fkdegreeId=$r->degree;

        }

        if ($r->board==OTHERS){

            $boardName=new Board();
            $boardName->boardName=$r->boardName;
            $boardName->status=1;
            $boardName->save();

            $personalEducation->fkboardId=$boardName->boardId;
        }else{
            $personalEducation->fkboardId=$r->board;
        }

        if ($r->resultSystem==OTHERS){

            $personalEducation->resultSystem=4;
            $personalEducation->resultSystemName=$r->resultSydtemName;
        }else{
            $personalEducation->resultSystem=$r->resultSystem;
        }


        if ($r->major == OTHERS){

            $eduMajor=new Educationmajor();
            $eduMajor->educationMajorName=$r->subjectName;

            if ($r->degree==OTHERS){
                $eduMajor->fkDegreeId=$degreeName->degreeId;
            }else{
                $eduMajor->fkDegreeId=$r->degree;
            }

            $eduMajor->status=1;
            $eduMajor->save();

            $personalEducation->fkMajorId=$eduMajor->educationMajorId;

        }else{
            $personalEducation->fkMajorId=$r->major;
        }

        if ($r->universityType==''){
            $personalEducation->universityType=null;
        }else{
            $personalEducation->universityType=$r->universityType;
        }

        /*-----*/

//        if ($r->major == OTHERS){
//            $eduMajor=new Educationmajor();
//            $eduMajor->educationMajorName=$r->subjectName;
//            $eduMajor->fkDegreeId=$r->degree;
//            $eduMajor->status=1;
//            $eduMajor->save();
//
//            $personalEducation->fkMajorId=$eduMajor->educationMajorId;
//        }else{
//            $personalEducation->fkMajorId=$r->major;
//        }
//
//        if ($r->universityType==''){
//            $personalEducation->universityType=null;
//        }else{
//            $personalEducation->universityType=$r->universityType;
//        }





//        $personalEducation->fkdegreeId=$r->degree;
        $personalEducation->institutionName=$r->instituteName;
        $personalEducation->passingYear=$r->passingYear;
        $personalEducation->status=$r->status;
//        $personalEducation->resultSystem=$r->resultSystem;
        $personalEducation->result=$r->result;
        $personalEducation->resultOutOf=$r->resultOutOf;
        $personalEducation->fkcountryId=$r->country;
//        $personalEducation->fkboardId=$r->board;
        $personalEducation->save();





        Session::flash('message', 'Education Updated Successfully');

        return redirect()->route('candidate.cvEducation');

    }
    public function deletePersonalEducation(Request $r)
    {

        $personalEducation=Education::destroy($r->id);
        // Session::flash('message', 'Education Deleted Successfully');


    }
}
