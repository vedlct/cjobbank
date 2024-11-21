<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Employee;
use App\Models\EmployeeComputerSkill;
use App\Models\EmployeeLanguage;
use App\Models\EmployeeOtherInfo;
use App\Models\EmpOtherSkill;
use App\Models\JobExperience;
use App\Models\MembershipInSocialNetwork;
use App\Models\OtherSkillInformation;
use App\Models\ProfessionalQualification;
use App\Models\QuestionObjective;
use App\Models\Refree;
use App\Models\Traning;
use Maatwebsite\Excel\Facades\Excel;
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


//        $empId=7;
        $employees=[1,2];




        $employee=Employee::select('employee.*','nationality.nationalityName','ethnicity.ethnicityName','religion.religionName')
            ->leftJoin('nationality','nationality.nationalityId','employee.fknationalityId')
            ->leftJoin('ethnicity','ethnicity.ethnicityId','employee.ethnicityId')
            ->leftJoin('religion','religion.religionId','employee.fkreligionId')
            ->whereIn('employeeId',$employees)
            ->get();

//        return $employee;
        $social=MembershipInSocialNetwork::whereIn('fkemployeeId',$employees)->get();

        $education=Education::select('education.*','degree.degreeName','board.boardName','educationmajor.educationMajorName')
            ->whereIn('fkemployeeId',$employees)
            ->leftJoin('degree','degree.degreeId','education.fkdegreeId')
            ->leftJoin('board','board.boardId','education.fkboardId')
            ->leftJoin('educationmajor','educationmajor.educationMajorId','education.fkMajorId')
            ->get();

//        return $education;

        $pQualification=ProfessionalQualification::whereIn('fkemployeeId',$employees)->get();

        $training=Traning::whereIn('fkemployeeId',$employees)
            ->leftJoin('country','country.countryId','traning.countryId')
            ->get();

        $jobExperience=JobExperience::whereIn('fkemployeeId',$employees)
            ->leftJoin('organizationtype','organizationtype.organizationTypeId','jobexperience.fkOrganizationType')
            ->get();

//        return $jobExperience;

        $reference=Refree::whereIn('fkemployeeId',$employees)->get();

        $empQuestion=QuestionObjective::whereIn('empId',$employees)->get();


        $extraCurriculumn=EmpOtherSkill::whereIn('fkemployeeId',$employees)
            ->leftJoin('otherskillsinformation','otherskillsinformation.id','emp_otherskill_achievement.otherSkillId')
            ->get();

        $computerSkill=EmployeeComputerSkill::whereIn('fk_empId',$employees)
            ->leftJoin('computerskill','computerskill.id','empcomputerskill.computerSkillId')
            ->get();

        $languageHead=EmployeeLanguage::select('fklanguageHead','fkemployeeId','languagename')
            ->whereIn('fkemployeeId',$employees)
            ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
            ->groupBy('fklanguageHead')
            ->get();

        $language=EmployeeLanguage::whereIn('fkemployeeId',$employees)
            ->leftJoin('languagehead','languagehead.id','emp_language.fklanguageHead')
            ->leftJoin('languageskill','languageskill.id','emp_language.fklanguageSkill')
            ->get();



        $fileName="Full Info";

        $check=Excel::create($fileName,function($excel)use ($employee,$social,$education,$pQualification,$training,$jobExperience,$reference,$empQuestion,$extraCurriculumn,$computerSkill,$languageHead,$language) {


            $excel->sheet('First sheet', function($sheet) use ($employee,$social,$education,$pQualification,$training,$jobExperience,$reference,$empQuestion,$extraCurriculumn,$computerSkill,$languageHead,$language) {

                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  10,
                        'bold'      =>  false
                    )
                ));

                $sheet->loadView('Admin.application.fullInfo',compact('employee','social','education','pQualification','training','jobExperience','reference','empQuestion','extraCurriculumn','computerSkill','languageHead','language'));
            });

        });


        $check->download();




    }
}
