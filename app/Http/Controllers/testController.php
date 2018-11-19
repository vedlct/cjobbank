<?php

namespace App\Http\Controllers;

use App\Education;
use App\Employee;
use App\JobExperience;
use App\MembershipInSocialNetwork;
use App\ProfessionalQualification;
use App\QuestionObjective;
use App\Refree;
use App\Traning;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class testController extends Controller
{
    //

    public function testloop(){


        for ($i=0; $i<5; $i++){

           $this->printview($i);
        }


    }

    public function printview($no){

        return  $no;
    }


    public function testExcel(){

        $empId=6;
        $employee=Employee::select('employee.*','nationality.nationalityName','ethnicity.ethnicityName','religion.religionName')
            ->leftJoin('nationality','nationality.nationalityId','employee.fknationalityId')
            ->leftJoin('ethnicity','ethnicity.ethnicityId','employee.ethnicityId')
            ->leftJoin('religion','religion.religionId','employee.fkreligionId')
//            ->leftJoin('membership_social_network','membership_social_network.fkemployeeId','employee.employeeId')
            ->findOrFail($empId);

//        return $employee;
        $social=MembershipInSocialNetwork::where('fkemployeeId',$empId)->get();

        $education=Education::select('education.*','degree.degreeName','board.boardName','educationmajor.educationMajorName')
            ->where('fkemployeeId',$empId)
            ->leftJoin('degree','degree.degreeId','education.fkdegreeId')
            ->leftJoin('board','board.boardId','education.fkboardId')
            ->leftJoin('educationmajor','educationmajor.educationMajorId','education.fkMajorId')
            ->get();

        $pQualification=ProfessionalQualification::where('fkemployeeId',$empId)->get();

        $training=Traning::where('fkemployeeId',$empId)
            ->leftJoin('country','country.countryId','traning.countryId')
            ->get();

        $jobExperience=JobExperience::where('fkemployeeId',$empId)
            ->leftJoin('organizationtype','organizationtype.organizationTypeId','jobexperience.fkOrganizationType')
            ->get();

        $reference=Refree::where('fkemployeeId',$empId)->get();

        $empQuestion=QuestionObjective::where('empId',$empId)->first();


//       return $reference;

        $fileName="Full Info";

        $check=Excel::create($fileName,function($excel)use ($employee,$social,$education,$pQualification,$training,$jobExperience,$reference,$empQuestion) {


            $excel->sheet('First sheet', function($sheet) use ($employee,$social,$education,$pQualification,$training,$jobExperience,$reference,$empQuestion) {

                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  10,
                        'bold'      =>  false
                    )
                ));

                $sheet->loadView('Admin.application.fullInfo',compact('employee','social','education','pQualification','training','jobExperience','reference','empQuestion'));
            });

        });


        $check->download();




    }
}
