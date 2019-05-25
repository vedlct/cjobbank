<?php

namespace App\Http\Controllers;


use App\Employee;
use App\Ethnicity;
use App\Nationality;
use App\Religion;

use Illuminate\Http\Request;
use Artisan;
use Session;
use Auth;
use Image;

class PersonalInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
    }
    public function editPersonalInfo()
    {
        $userId=Auth::user()->userId;
        $employeeCvPersonalInfo=Employee::where('fkuserId','=',$userId)->get();

        $religion=Religion::where('status',1)->get();
        $ethnicity=Ethnicity::where('status',1)->get();
        $natinality=Nationality::where('status',1)->get();

        return view('userCv.edit.personalInfo',compact('religion','ethnicity','natinality','employeeCvPersonalInfo'));

    }

    public function getEmployeeCv()
    {
        $userId=Auth::user()->userId;
        $employeeCvPersonalInfo=Employee::where('fkuserId','=',$userId)->get();

        $religion=Religion::where('status',1)->get();
        $ethnicity=Ethnicity::where('status',1)->get();
        $natinality=Nationality::where('status',1)->get();

//        return view('userCv.insert.personalInfo',compact('religion','ethnicity','natinality'));

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
            'bloodGroup' => 'required|max:5',
            'maritalStatus' => 'required|max:15',
            'spouse' => 'max:100',
            'passport' => 'nullable|alpha_num',
            'fathersName' => 'required|max:50',
            'mothersName' => 'required|max:50',
            'dob' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'ethnicity' => 'required',
            'disability' => 'required',
            'nId' => 'max:25',
            'bId' => 'max:25',
            'homeTelephone' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'officeTelephone' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'telephone' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'alternativePhoneNo' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'personalMobile' => 'required|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|max:255|email',
            'nationality' => 'required|max:25',
            'skype' => 'nullable|max:255',
            'alternateEmail' => 'nullable|email|max:255',
            'currentAddress' => 'required',
            'permanentAddress' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:100',
            'sign' => 'image|mimes:jpeg,jpg,png|max:50',


        ];

        $customMessages = [
            'regex' => 'please write correct phone number without country code,special charecters and max length 11 number',
        ];

        $this->validate($r, $rules, $customMessages);


        $employee=new Employee();

        $employee->firstName=$r->firstName;
        $employee->lastName=$r->lastName;
        $employee->fathersName=$r->fathersName;
        $employee->mothersName=$r->mothersName;
        $employee->dateOfBirth=$r->dob;
        $employee->gender=$r->gender;
        $employee->bloodGroup=$r->bloodGroup;
        $employee->fkreligionId=$r->religion;
        $employee->ethnicityId=$r->ethnicity;
        $employee->disability=$r->disability;
        $employee->fknationalityId=$r->nationality;
        $employee->homeNumber=$r->homeTelephone;
        $employee->officeNumber=$r->officeTelephone;
        $employee->telephone=$r->telephone;
        $employee->personalMobile=$r->personalMobile;
        $employee->alternativePhoneNo=$r->alternativePhoneNo;
        $employee->email=$r->email;

        if ($r->idProvided=="NID"){
            $employee->nationalId=$r->nId;
            $employee->birthID=null;
        }elseif ($r->idProvided=="BID"){
            $employee->nationalId=null;
            $employee->birthID=$r->bId;
        }
        $employee->skype=$r->skype;
        $employee->alternativeEmail=$r->alternateEmail;
        $employee->presentAddress=$r->currentAddress;
        $employee->parmanentAddress=$r->permanentAddress;
        $employee->fkuserId=Auth::user()->userId;
        $employee->maritalStatus=$r->maritalStatus;
        $employee->spouse=$r->spouse;
        $employee->passport=$r->passport;
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
        if($r->hasFile('sign')){
            $sign = $r->file('sign');
            $filename= $employee->employeeId.'cvSign'.'.'.$sign->getClientOriginalExtension();
            $employee->sign=$filename;
            $location = public_path('candidateSigns/'.$filename);
            Image::make($sign)->save($location);
            $location2 = public_path('candidateSigns/thumb/'.$filename);
            Image::make($sign)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location2);
        }


        $employee->save();
        Session::flash('message', 'Personal Info Added Successfully');
        Artisan::call('cache:clear');

        return redirect()->route('candidate.cvPersonalInfo');


    }
    public function updatePersonalInfo(Request $r)
    {


        $rules = [
            'firstName' => 'required|max:50',
            'lastName' => 'required|max:50',
            'bloodGroup' => 'required|max:5',
            'maritalStatus' => 'required|max:15',
            'spouse' => 'max:100',
            'passport' => 'nullable|alpha_num',
            'fathersName' => 'required|max:50',
            'mothersName' => 'required|max:50',
            'dob' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'ethnicity' => 'required',
            'disability' => 'required',
            'nId' => 'max:25',
            'bId' => 'max:25',
            'homeTelephone' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'officeTelephone' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'telephone' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'alternativePhoneNo' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'personalMobile' => 'required|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|max:255|email',
            'nationality' => 'required|max:25',
            'skype' => 'nullable|max:255',
            'alternateEmail' => 'nullable|email|max:255',
            'currentAddress' => 'required',
            'permanentAddress' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:100',
            'sign' => 'image|mimes:jpeg,jpg,png|max:50',


        ];

        $customMessages = [
            'regex' => 'please write correct phone number without country code,special charecters and max length 11 number',
        ];

        $this->validate($r, $rules, $customMessages);

//        $empId=Employee::where('fkuserId',Auth::user()->userId)->first()->employeeId;

        $employee=Employee::where('fkuserId',Auth::user()->userId)->first();

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
        $employee->alternativePhoneNo=$r->alternativePhoneNo;
        $employee->email=$r->email;
        if ($r->idProvided=="NID"){
            $employee->nationalId=$r->nId;
            $employee->birthID=null;
        }elseif ($r->idProvided=="BID"){
            $employee->nationalId=null;
            $employee->birthID=$r->bId;
        }

        $employee->skype=$r->skype;
        $employee->alternativeEmail=$r->alternateEmail;
        $employee->presentAddress=$r->currentAddress;
        $employee->parmanentAddress=$r->permanentAddress;
        $employee->bloodGroup=$r->bloodGroup;
        $employee->maritalStatus=$r->maritalStatus;
        $employee->spouse=$r->spouse;
        $employee->passport=$r->passport;
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

        if($r->hasFile('sign')){
            $sign = $r->file('sign');
            $filename= $employee->employeeId.'cvSign'.'.'.$sign->getClientOriginalExtension();
            $employee->sign=$filename;
            $location = public_path('candidateSigns/'.$filename);
            Image::make($sign)->save($location);
            $location2 = public_path('candidateSigns/thumb/'.$filename);
            Image::make($sign)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location2);
        }


        $employee->save();

        Session::flash('message', 'Personal Info Updated Successfully');
        Artisan::call('cache:clear');
        return redirect()->route('candidate.cvPersonalInfo');


    }



}
