<?php

namespace App\Http\Controllers\Admin;

use App\ComputerSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ComputerSkillController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check()){
                if(Auth::user()->fkuserTypeId==USER_TYPE['Admin'] || Auth::user()->fkuserTypeId==USER_TYPE['Emp'] ){
                    return $next($request);
                }else{
                    return redirect('/');
                }
            }else{
                return redirect('/');
            }
        });
    }
    /*---------------------- Zone -----------------*/
    public function skill(){
        $zones=ComputerSkill::get();
        return view('manage.computerSkill',compact('zones'));
    }

    public function insertSkill(Request $r){
        $r->validate([
            'zone' => 'required|max:255|unique:computerskill,computerSkillName',

        ]);
        $cSkill=new ComputerSkill();
        $cSkill->computerSkillName=$r->zone;

        if ($r->status ==""){
            $cSkill->status='1';
        }else{
            $cSkill->status=$r->status;
        }

        $cSkill->save();

        Session::flash('message', 'Computer SKill Added Successfully!');
        return back();
    }

    public function editSkill(Request $r){
        $zone=ComputerSkill::findOrFail($r->id);
        return view('manage.editComputerSkill',compact('zone'));
    }
    public function updateSkill($id,Request $r){
        $zone=ComputerSkill::findOrFail($r->id);
        $zone->computerSkillName=$r->zone;
        if ($r->status ==""){
            $zone->status='1';
        }else{
            $zone->status=$r->status;
        }
        $zone->save();
        Session::flash('message', 'Computer SKill Updated Successfully!');
        return redirect()->route('manage.skill');
    }

}
