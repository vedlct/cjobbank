<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Ethnicity;
use App\Nationality;
use App\Religion;
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

        return redirect()->route('candidate.cvEducation');


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

        return redirect()->route('candidate.cvEducation');


    }
    public function getEmployeeCvCareerObjective()
    {
        $userId=Auth::user()->userId;
        return view('userCv.careerObjective');


    }
    public function getEmployeeCvEducation()
    {

        $userId=Auth::user()->userId;
        $employeeCvPersonalInfo=Employee::where('fkuserId', '=',$userId)->get();



        //return $employeeCvPersonalInfo;

        if (!$employeeCvPersonalInfo->isEmpty()){

            return view('userCv.insert.education');

        }else{
            return view('userCv.update.education');
        }



    }
    public function getEmployeeCvProfessionalCertificate()
    {
        $userId=Auth::user()->userId;
        return view('userCv.professionalCertificate');


    }
}
