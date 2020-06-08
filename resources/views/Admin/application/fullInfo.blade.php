<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        .Border{
            border: 2px solid ;
        }
        td{
            wrap-text:true;
            vertical-align: top;
        }
        .bold{
            font-weight: bold;
        }
        .noTopBorder{
            border-top: none !important ;
            border-bottom: none !important ;
            border-right: 2px solid !important ;
            border-left: 2px solid !important ;
        }
        .testStyle{
            border-right: 2px solid !important ;
            border-left: 2px solid !important ;
        }
    </style>

</head>



<table class="table">

    <tr>

        <td class="Border" colspan="34" style="text-align: center;vertical-align: top;height: 20"></td>

    </tr>
    <tr>
        <td class="Border" colspan="34" style="text-align: center;vertical-align: top;height: 20"><span style="font-weight: bold">CARITAS BANGLADESH</span></td>
    </tr>

    <tr>

        <td class="Border" colspan="34" style="text-align: center;">
            <span id="red" style="color: #FF0000">{{strtoupper($jobTitle)}}</span>
            <b>- {{$excelName}}</b>
        </td>

    </tr>


</table>

<table class="table" style="font-size:10">
    <thead>
    <tr style="font-weight: bold">
        <td class="Border" colspan="1" style="text-align: center">Sl No.</td>
        <td class="Border" colspan="4" style="text-align: center">Name and personal information</td>
        <td class="Border" colspan="4" style="text-align: center">Questionnaire</td>
        <td class="Border" colspan="4" style="text-align: center">Educational/ professional/Training Information</td>
        <td class="Border" colspan="6" style="text-align: center">Job Experiences/ Employment History</td>
        <td class="Border" colspan="8" style="text-align: center">Extracurricular activities/ other skills</td>
        <td class="Border" colspan="4" style="text-align: center">References</td>
        <td class="Border" colspan="3" style="text-align: center">Remarks</td>
    </tr>
    </thead>
    <tbody>
    <?php (int)$sl=0; ?>
    @foreach($employee as $emp)
    <tr>
        <td colspan="1" class="Border" height="620" style="text-align: left;border-right: 2px solid black !important">{{++$sl}}</td>
        <td colspan="4" height="620" class="testStyle" style="text-align: left;border-left: 2px solid black !important">
            <span style="text-align: left">{{$emp->firstName}} {{$emp->lastName}}</span>
            <br>
            <span style="text-align: left">
                Telephone: {{$emp->telephone}}<br>
                Personal Phone no:  {{$emp->personalMobile}}<br>
                Alternative phone no: {{$emp->alternativePhoneNo}}<br>
                Home Phone: {{$emp->homeNumber}}<br>
                Office Phone: {{$emp->officeNumber}}<br>
                Email: {{$emp->email}}<br>
                Alternative Email: {{$emp->alternativeEmail}}<br>
                Skype :  {{$emp->skype}}<br>
                Date Of Birth: {{$emp->dateOfBirth}}<br>

                @if(!is_null($emp->nationalId))

                National ID No. :{{ $emp->nationalId }}<br>

                @elseif(!is_null($emp->birthID))

                Birth Identification No. :{{ $emp->birthID }}<br>

                @endif

                {{--National ID Card No: {{$emp->nationalId}}.<br>--}}
                Passport No:  {{$emp->passport}}<br>

                Permanent Address: {{$emp->parmanentAddress}}<br>


                Present Address: {{$emp->presentAddress}}<br>

            </span>


        </td>




        <td colspan="4" class="Border" height="620" style="text-align: left;">


            @foreach($empQuestionAns->where('fkemployeeId',$emp->employeeId) as $ans)
                {{$ans->ques}} <br>  {{$ans->ans}} <br>

            @endforeach
        </td>

        <td colspan="4" class="Border" height="620" style="text-align: left;">
            <?php  $temp=0; ?>
            @foreach($education->where('fkemployeeId',$emp->employeeId) as $edu)
                {{++$temp}}. Degree title : {{$edu->degreeName}}<br>
                Major Subject: {{$edu->educationMajorName}}<br>
                Passing Year: {{$edu->passingYear}} , Board: {{$edu->boardName}}<br>
                Name of Institution/school/college/university: <br>
                    {{$edu->institutionName}}<br>
                Status : @if($edu->status==1) Ongoing @elseif($edu->status==2) Complete @endif , Result: {{$edu->result}}<br><br>

            @endforeach
        </td>
        <td colspan="6" class="Border" height="620"   style="text-align: left;">
            <?php $tJEY=0;$tJEM=0;$tJED=0; $totalexpyr = 0;$totalexpDay = 0; $totalexpmonth = 0;$subDay=0; ?>
            <?php $temp=0; $totalday  = 0; ?>
            @foreach($jobExperience->where('fkemployeeId',$emp->employeeId) as $job)
            {{++$temp}}. Position: {{$job->degisnation}}<br>
            Organization name: {{$job->organization}}<br>
            Organizarion type: {{$job->organizationTypeName}}<br>

            Type of Employment: {{$job->employmentType}}<br>
            Served From /To: {{$job->startDate}} - @if($job->startDate!=null && $job->endDate==null) Running @else {{$job->endDate}}@endif<br>
            Job location/Address: {{$job->address}}<br>
            Name of Supervisor: {{$job->supervisorName}}<br>

                    @if ($job->startDate!=null && $job->endDate==null)

                    {{$sub_struct=\Carbon\Carbon::parse($job->startDate)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days')}}
                        @php
                            $subDay=\Carbon\Carbon::parse($job->startDate)->diffInDays(\Carbon\Carbon::now())
                        @endphp
                    @else
                    {{$sub_struct=\Carbon\Carbon::parse($job->startDate)->diff(\Carbon\Carbon::parse($job->endDate))->format('%y years, %m months and %d days')}}
                        @php
                            $subDay=\Carbon\Carbon::parse($job->startDate)->diffInDays(\Carbon\Carbon::parse($job->endDate))
                        @endphp
                    @endif

                <br><br>
                    <?php

                    $totalexpDay = $totalexpDay + $subDay ;

                    ?>



            @endforeach


            <br>
                <?php

                $now = \Carbon\Carbon::now();
                $nextDate=\Carbon\Carbon::now()->addDays($totalexpDay);
                $diff=$now->diff($nextDate)->format('%y years, %m months and %d days');

                ?>
                Total job experience :
                {{$diff}}

        </td>
        <td colspan="8" class="Border" height="620" style="text-align: left;">
            Extracurricular activities<br>
            1. Interests:<br>
            {{$emp->interests}}<br>
            2.Awards received:<br>
            {{$emp->awardReceived}}<br>
            3.Research/Publciation:<br>
            {{$emp->researchPublication}}<br>

            Computer skill:<br>
            @foreach($computerSkill->where('fk_empId',$emp->employeeId) as $skill)
                Name: {{$skill->computerSkillName}}  -@if($skill->SkillAchievement==1) General @else Advanced @endif <br><br>

            @endforeach
            Language Proficiency<br>
            @foreach($languageHead->where('fkemployeeId',$emp->employeeId) as $lh)

                Name: {{$lh->languagename}} <br>
                @foreach($language->where('fkemployeeId',$emp->employeeId) as $l)
                    @if($lh->fklanguageHead == $l->fklanguageHead)
                        Skill: {{$l->languageSkillName}}  -Rate: {{$l->rate}}<br>


                    @endif
               @endforeach

                <br>
            @endforeach

        </td>
        <td colspan="4" class="Border" height="620" style="text-align: left;">
            <?php $temp=0;  ?>
            @foreach($reference->where('fkemployeeId',$emp->employeeId) as $ref)
            {{++$temp}}. {{$ref->firstName}} {{$ref->lastName}}<br>
            {{$ref->presentposition}}<br>
            {{$ref->organization}}<br>
            Relation: {{$ref->relation}} <br>
            Cell Phone: {{$ref->phone}}              E-mail:{{$ref->email}}<br><br>
            @endforeach
        </td>
        <td colspan="3" class="Border" height="620" style="text-align: left;"></td>

    </tr>
    <tr>
        <td colspan="1" class="Border" height="450" style="text-align: left;border-right: 2px solid black!important;border-bottom: 2px solid black!important "></td>
        <td colspan="4" class="testStyle" height="450" style="text-align: left;border-left: 2px solid black!important">

        </td>
        <td colspan="4" class="Border" height="450" style="text-align: left;">

        </td>
        <td colspan="4" class="Border" height="450" style="text-align: left;">
            Professional Qualification:<br>
            <?php  $temp=1; ?>
            @foreach($pQualification->where('fkemployeeId',$emp->employeeId) as $qualification)

            {{$temp}}. Certificate Name: {{$qualification->certificateName}}<br>
            Institution: {{$qualification->institutionName}}<br>
            Duration: {{$qualification->startDate}} - {{$qualification->endDate}}<br>

            Result: {{$qualification->result}}<br>
                <?php  $temp++; ?>
            @endforeach
        </td>
        <td colspan="6" class="Border" height="450"   style="text-align: left;">
            <?php $temporary=1; ?>
            @foreach($jobExperience->where('fkemployeeId',$emp->employeeId) as $job)
              {{$temporary}}.{{$job->organization}}->{{$job->degisnation}}<br>
                    Major Job responsibility: <?php echo strip_tags(($job->majorResponsibilities),'<li><br>')?><br>
                    Key Achievement: <?php echo strip_tags(($job->keyAchivement), '<li><br>' ) ?><br>

                <br>
                    <?php  $temporary++; ?>
            @endforeach

            Previous work information in Caritas Bangladesh (If )<br>

                @foreach($previousWorkExperienceInCB->where('fkemployeeId',$emp->employeeId) as $pExp)
                            Position in Caritas: {{$pExp->designation}}<br>
                            Served from/to: {{$pExp->startDate}}  To {{$pExp->endDate}}<br>
                @endforeach
        </td>
        <td colspan="8" class="Border" height="450" style="text-align: left;">

        </td>
        <td colspan="4" class="Border" height="450" style="text-align: left;">

        </td>
        <td colspan="3" class="Border" height="450" style="text-align: left;"></td>

    </tr>

    <tr>

        <td colspan="1" class="Border" height="550" style="text-align: left;"></td>
        <td colspan="4" class="Border"  height="550" style="text-align: left;"><span style="text-align: left">
                Fathers Name: {{$emp->fathersName}}<br>
                Mothers Name: {{$emp->mothersName}}<br>
                Spouse Name: {{$emp->spouse}}<br>
                Blood Group: {{$emp->bloodGroup}}<br>
                Gender: {{$emp->gender}}<br>
                Nationality: {{$emp->nationalityName}}<br>
                Ethnicity: {{$emp->ethnicityName}}<br>
                Disability: {{$emp->disability}}<br>
                Religion: {{$emp->religionName}}<br>

            </span></td>
        <td colspan="4" class="Border" height="550" style="text-align: left;">
            Do you have any relatives working in Caritas Bangladesh?*<br>

            @foreach($relative->where('fkemployeeId',$emp->employeeId) as $rel)
                {{$rel->firstName}}
                {{$rel->lastName}}<br>
                {{$rel->degisnation}}<br>
                Relation: {{$rel->relation}}<br><br>
            @endforeach

            @if($relative->where('fkemployeeId',$emp->employeeId)->count() == 0)
                No

            @endif



        </td>
        <td colspan="4" class="Border" height="550" style="text-align: left;">
            Training information:<br>
            <?php  $te=1; ?>
            @foreach($training->where('fkemployeeId',$emp->employeeId) as $t)
            {{$te}}. Training title: {{$t->trainingName}}<br>
            Institute: {{$t->vanue}}<br>
            Duration: {{$t->startDate}} - {{$t->endDate}}<br>
            Country: {{$t->countryName}}<br>
                <?php  $te++; ?>
            @endforeach
        </td>
        <td colspan="6" class="Border" height="550"   style="text-align: left;">
            Do you have any reservation contacting your employer?
            @foreach($jobExperience->where('fkemployeeId',$emp->employeeId)->where('endDate',null) as $job)
                    {{$job->reservationContactingEmployer}}
                <br><br>
            @endforeach
        </td>
        <td colspan="8" class="Border" height="550" style="text-align: left;">

        </td>
        <td colspan="4" class="Border" height="550" style="text-align: left;">

        </td>
        <td colspan="3" class="Border" height="550" style="text-align: left;"></td>

    </tr>



    <tr>
        <td colspan="1" class="Border" height="300" style="text-align: left;"></td>
        <td colspan="4" class="Border" height="300" style="text-align: left;"><span style="text-align: left">
                Membership in Social Network :<br>
                @foreach($social->where('fkemployeeId',$emp->employeeId) as $s)

                Name of Network: {{$s->networkName}}<br>
                Type of Membership: {{$s->membershipType}}<br>
                Duration: {{$s->duration}}<br>
                @endforeach

            </span>

        </td>
        <td colspan="4" class="Border" height="300" style="text-align: left;">
            Answers of declaration form:
            @foreach($agreement->where('employeeId',$emp->employeeId) as $ag)
            $agreement
                {{$ag->qus}} : {{$ag->ans}} <br>

            @endforeach



        </td>
        <td colspan="4"class="Border"  height="300" style="text-align: left;">

        </td>
        <td colspan="6" class="Border" height="300"   style="text-align: left;">

        </td>
        <td colspan="8"class="Border"  height="300" style="text-align: left;">

        </td>
        <td colspan="4" class="Border" height="300" style="text-align: left;">

        </td>
        <td colspan="3" class="Border" height="300" style="text-align: left;"></td>

    </tr>


@endforeach
    </tbody>
</table>

</html>
