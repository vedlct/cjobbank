<?php

namespace App\Http\Controllers\Admin;

use App\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
}
