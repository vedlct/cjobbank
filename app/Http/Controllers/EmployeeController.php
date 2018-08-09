<?php

namespace App\Http\Controllers;

use App\Country;
use App\Degree;
use App\Education;
use App\Educationlevel;
use App\Educationmajor;
use App\Employee;
use App\Ethnicity;
use App\Nationality;
use App\Religion;
use App\ProfessionalQualification;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getEmployeeCv()
    {
        $userId=Auth::user()->userId;
        $employeeCvPersonalInfo=Employee::where('fkuserId', '=',$userId)->get();

        $religion=Religion::get();
        $ethnicity=Ethnicity::get();
        $natinality=Nationality::get();

        //return $employeeCvPersonalInfo;

        if (!$employeeCvPersonalInfo->isEmpty()){

            return view('userCv.update.personalInfo',compact('religion','ethnicity','natinality','employeeCvPersonalInfo'));

        }else{
            return view('userCv.insert.personalInfo',compact('religion','ethnicity','natinality'));
        }

    }
    public function insertPersonalInfo(Request $r)
    {

        $rules = [

            'firstName' => 'required|max:50',
            'lastName' => 'required|max:50',
            'fathersName' => 'required|max:50',
            'mothersName' => 'required|max:50',
            'dob' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'ethnicity' => 'required',
            'disability' => 'required',
            'nId' => 'required',
            'homeTelephone' => 'required|max:20',
            'officeTelephone' => 'required|max:20',
            'telephone' => 'required|max:20',
            'personalMobile' => 'required|max:20',
            'email' => 'required|max:255|email',
            'nationality' => 'required|max:25',
            'skype' => 'required|max:255',
            'alternateEmail' => 'required|email|max:255',
            'currentAddress' => 'required',
            'permanentAddress' => 'required',


        ];

        $customMessages = [
//            'unique' => 'This User is already been registered.Please Login !'
        ];

        $this->validate($r, $rules, $customMessages);


        $employee=new Employee();

        $employee->firstName=$r->firstName;
        $employee->lastName=$r->lastName;
        $employee->fathersName=$r->fathersName;
        $employee->mothersName=$r->mothersName;
        $employee->dateOfBirth=$r->dob;
        $employee->gender=$r->gender;
        $employee->fkreligionId=$r->religion;
        $employee->ethnicityId=$r->ethnicity;
        $employee->disability=$r->disability;
        $employee->fknationalityId=$r->nationality;
        $employee->homeNumber=$r->homeTelephone;
        $employee->officeNumber=$r->officeTelephone;
        $employee->telephone=$r->telephone;
        $employee->personalMobile=$r->personalMobile;
        $employee->email=$r->email;
        $employee->nationalId=$r->nId;
        $employee->skype=$r->skype;
        $employee->alternativeEmail=$r->alternateEmail;
        $employee->presentAddress=$r->currentAddress;
        $employee->parmanentAddress=$r->permanentAddress;
        $employee->fkuserId=Auth::user()->userId;

        $employee->save();





        if($r->hasFile('image')){
            $img = $r->file('image');
            $filename= $employee->employeeId.'cvImage'.'.'.$img->getClientOriginalExtension();
            $employee->image=$filename;
            $location = public_path('candidateImages/'.$filename);
            Image::make($img)->save($location);
            $location2 = public_path('candidateImages/thumb/'.$filename);
            Image::make($img)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location2);
        }


        $employee->save();

        return redirect()->route('candidate.cvPersonalInfo');


    }
    public function updatePersonalInfo(Request $r)
    {

        $rules = [

            'firstName' => 'required|max:50',
            'lastName' => 'required|max:50',
            'fathersName' => 'required|max:50',
            'mothersName' => 'required|max:50',
            'dob' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'ethnicity' => 'required',
            'disability' => 'required',
            'nId' => 'required',
            'homeTelephone' => 'required|max:20',
            'officeTelephone' => 'required|max:20',
            'telephone' => 'required|max:20',
            'personalMobile' => 'required|max:20',
            'email' => 'required|max:255|email',
            'nationality' => 'required|max:25',
            'skype' => 'required|max:255',
            'alternateEmail' => 'required|email|max:255',
            'currentAddress' => 'required',
            'permanentAddress' => 'required',


        ];

        $customMessages = [
//            'unique' => 'This User is already been registered.Please Login !'
        ];

        $this->validate($r, $rules, $customMessages);


        $employee=Employee::findOrFail(Auth::user()->userId);

        $employee->firstName=$r->firstName;
        $employee->lastName=$r->lastName;
        $employee->fathersName=$r->fathersName;
        $employee->mothersName=$r->mothersName;
        $employee->dateOfBirth=$r->dob;
        $employee->gender=$r->gender;
        $employee->fkreligionId=$r->religion;
        $employee->ethnicityId=$r->ethnicity;
        $employee->disability=$r->disability;
        $employee->fknationalityId=$r->nationality;
        $employee->homeNumber=$r->homeTelephone;
        $employee->officeNumber=$r->officeTelephone;
        $employee->telephone=$r->telephone;
        $employee->personalMobile=$r->personalMobile;
        $employee->email=$r->email;
        $employee->nationalId=$r->nId;
        $employee->skype=$r->skype;
        $employee->alternativeEmail=$r->alternateEmail;
        $employee->presentAddress=$r->currentAddress;
        $employee->parmanentAddress=$r->permanentAddress;
//        $employee->fkuserId=Auth::user()->userId;

        $employee->save();





        if($r->hasFile('image')){
            $img = $r->file('image');
            $filename= $employee->employeeId.'cvImage'.'.'.$img->getClientOriginalExtension();
            $employee->image=$filename;
            $location = public_path('candidateImages/'.$filename);
            Image::make($img)->save($location);
            $location2 = public_path('candidateImages/thumb/'.$filename);
            Image::make($img)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location2);
        }


        $employee->save();

        return redirect()->route('candidate.cvPersonalInfo');


    }
    public function getEmployeeCvCareerObjective()
    {
        $userId=Auth::user()->userId;
        return view('userCv.careerObjective');


    }
    public function getEmployeeCvEducation()
    {

        $userId=Auth::user()->userId;

        $employee=Employee::where('fkuserId', '=',$userId)->first()->employeeId;

        $employeeCvEducationInfo=Education::leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
            ->leftJoin('educationmajor', 'educationmajor.educationMajorId', '=', 'education.fkMajorId')
            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
            ->where('fkemployeeId', '=',$employee)->get();

        //return $employeeCvEducationInfo;

        $educationLevel=Educationlevel::get();
        //$degree=Degree::get();
        $country=Country::get();

        //return $employeeCvPersonalInfo;

        if ($employeeCvEducationInfo->isEmpty()){

            return view('userCv.insert.education',compact('educationLevel','degree','country'));

        }else{
            return view('userCv.update.education',compact('educationLevel','degree','country','employeeCvEducationInfo'));
        }

    }
    public function getDegreePerEducation(Request $r)
    {
        $degree=Degree::select('degreeId','degreeName')->where('educationLevelId', '=',$r->id)->get();

        if ($degree == null) {
            echo "<option value='' selected>Select Degree</option>";
        } else {
            echo "<option value='' selected>Select Degree</option>";
            foreach ($degree as $deg) {
                echo "<option value='$deg->degreeId'>$deg->degreeName</option>";
            }
        }



    }
    public function getMajorPerEducation(Request $r)
    {
        $major=Educationmajor::select('educationMajorId','educationMajorName')->where('fkDegreeId', '=',$r->id)->get();

        if ($major == null) {
            echo "<option value='' selected>Select Major</option>";
        } else {
            echo "<option value='' selected>Select Major</option>";
            foreach ($major as $mejor) {
                echo "<option value='$mejor->educationMajorId'>$mejor->educationMajorName</option>";
            }
        }
    }
    public function insertPersonalEducation(Request $r)
    {
       // return $r;

        $employee=Employee::where('fkuserId', '=',Auth::user()->userId)->first()->employeeId;

        for($i=0;$i<count($r->degree);$i++){
            $professional=new Education();
            $professional->fkdegreeId=$r->degree[$i];
            $professional->institutionName=$r->instituteName[$i];
            $professional->fkMajorId=$r->major[$i];
            $professional->passingYear=$r->passingYear[$i];
            $professional->status=$r->status[$i];
            $professional->resultSystem=$r->resultSystem[$i];
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

        $education=Education::leftJoin('degree', 'degree.degreeId', '=', 'education.fkdegreeId')
            ->leftJoin('educationmajor', 'educationmajor.educationMajorId', '=', 'education.fkMajorId')
            ->leftJoin('educationlevel', 'educationlevel.educationLevelId', '=', 'degree.educationLevelId')
            ->findOrFail($r->id);

        $educationLevel=Educationlevel::get();
        $country=Country::get();

        return view('userCv.edit.editEducation',compact('education','educationLevel','country'));


    }
    public function updatePersonalEducation(Request $r)
    {

        $personalEducation=Education::findOrFail($r->educationId);

        $personalEducation->fkdegreeId=$r->degree;
        $personalEducation->institutionName=$r->instituteName;
        $personalEducation->fkMajorId=$r->major;
        $personalEducation->passingYear=$r->passingYear;
        $personalEducation->status=$r->status;
        $personalEducation->resultSystem=$r->resultSystem;
        $personalEducation->result=$r->result;
        $personalEducation->resultOutOf=$r->resultOutOf;
        $personalEducation->fkcountryId=$r->country;
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
