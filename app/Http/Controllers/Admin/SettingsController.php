<?php

namespace App\Http\Controllers\Admin;

use App\Degree;
use App\Education;
use App\Educationlevel;
use App\Nationality;
use App\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Yajra\DataTables\DataTables;


class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*---------------------- Zone -----------------*/
    public function zone(){
        $zones=Zone::get();

        return view('manage.zone',compact('zones'));
    }

    public function insertZone(Request $r){
        $r->validate([
            'zone' => 'required|max:15|unique:zone,zoneName',

        ]);
        $zone=new Zone();
        $zone->zoneName=$r->zone;
        $zone->save();

        Session::flash('message', 'Zone Added Successfully!');
        return back();
    }

    public function editZone(Request $r){
        $zone=Zone::findOrFail($r->id);

        return view('manage.editZone',compact('zone'));
    }
    public function updateZone($id,Request $r){
        $zone=Zone::findOrFail($r->id);
        $zone->zoneName=$r->zone;
        $zone->save();
        Session::flash('message', 'Zone Updated Successfully!');
        return redirect()->route('manage.zone');
    }

    /*---------------------- Education -----------------*/

    public function education(){
        $educations=Educationlevel::get();

        return view('manage.education',compact('educations'));
    }

    public function insertEducation(Request $r){
        $r->validate([
            'education' => 'required|max:128|unique:educationlevel,educationLevelName',

        ]);
        $education=new Educationlevel();
        $education->educationLevelName=$r->education;
        $education->save();

        Session::flash('message', 'Education Updated Successfully!');
        return redirect()->route('manage.education');
    }
    public function editEducation(Request $r){
        $education=Educationlevel::findOrFail($r->id);

        return view('manage.editEducation',compact('education'));
    }
    public function updateEducation($id,Request $r){
        $r->validate([
            'education' => 'required|max:128|unique:educationlevel,educationLevelName,'.$id.',educationLevelId',
        ]);

        $education=Educationlevel::findOrFail($id);
        $education->educationLevelName=$r->education;
        $education->save();

        Session::flash('message', 'Education Updated Successfully!');
        return redirect()->route('manage.education');
    }

    /*====================== Education Degree ============================*/

    public function educationDegree(){
        $degree=Degree::leftJoin('educationlevel','educationlevel.educationLevelId','degree.educationLevelId')->get();
        $educations=Educationlevel::get();
//        $datatables = DataTables::of($degree);
//
//        return $datatables->make(true);
//        return $degree;

        return view('manage.educationDegree',compact('degree','educations'));
    }

    public function insertEducationDegree(Request $r){
        $r->validate([
            'educationLevel' => 'required',
            'degree' => 'required|max:25',

        ]);
        $degree =new Degree();
        $degree->degreeName=$r->degree;
        $degree->educationLevelId=$r->educationLevel;
        $degree->save();

        Session::flash('message', 'Degree Added Successfully!');
        return redirect()->route('manage.educationDegree');

    }

    public function editEducationDegree(Request $r){
        $degree=Degree::findOrFail($r->id);
        $educations=Educationlevel::get();

        return view('manage.editDegree',compact('degree','educations'));
    }

    public function updateDegree($id,Request $r){
        $degree =Degree::findOrFail($id);
        $degree->degreeName=$r->degree;
        $degree->educationLevelId=$r->educationLevel;
        $degree->save();

        Session::flash('message', 'Degree Updated Successfully!');
        return redirect()->route('manage.educationDegree');

    }

    /*====================== Nationality ============================*/

    public function nationality(){

        $nationality=Nationality::get();
//        $datatables = DataTables::of($degree);
//
//        return $datatables->make(true);
//        return $degree;

        return view('manage.nationality',compact('nationality'));
    }

    public function insertNationality(Request $r){
        $r->validate([
            'nationality' => 'required',
            'country' => 'required',

        ]);
        $nationality =new Nationality();
        $nationality->nationalityName=$r->nationality;
        $nationality->countryName=$r->country;
        $nationality->save();

        Session::flash('message', 'Nationality Added Successfully!');
        return redirect()->route('manage.nationality');

    }

    public function editNationality(Request $r){
        $editNationality=Nationality::findOrFail($r->id);
        return view('manage.editNationality',compact('editNationality'));
    }

    public function updateNationality($id,Request $r){
        $nationality =Nationality::findOrFail($id);
        $nationality->nationalityName=$r->nationality;
        $nationality->countryName=$r->country;
        $nationality->status = $r->status;
        $nationality->save();

        Session::flash('message', 'Nationality Updated Successfully!');
        return redirect()->route('manage.nationality');

    }

}
