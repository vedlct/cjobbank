<?php

namespace App\Http\Controllers;

use App\Job;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function guestAvailablejob()
    {
        $allZone=Zone::where('status',1)->get();
        return view('guest.availableJob',compact('allZone'));
    }

    public function guestGetJobData(Request $r)
    {
        $allZone=Zone::where('status',1)->get();

        $jobs=Job::select('job.jobId','job.title','job.details','job.details','job.deadline','job.pdflink')
            ->where('job.status',1)
            ->where('job.deadline','>=',date('Y-m-d'));
        if($r->search !=""){
            $jobs=$jobs->where('job.title', 'like', '%' . $r->search . '%');
        }
        if ($r->zonefilter){
            $jobs= $jobs->where('job.fkzoneId',$r->zonefilter);
        }

        $jobs=$jobs->paginate(10);

        return view('job.getAllJob',compact('jobs','allZone'));
    }
}
