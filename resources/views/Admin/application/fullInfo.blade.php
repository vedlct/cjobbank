<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{url('public/css/exceltable.css')}}" rel="stylesheet">


<body>


<table class="table">

    <tr>

        <td class="Border"colspan="34" style="text-align: center;vertical-align: top;height: 20"></td>

    </tr>
    <tr >
        <td class="Border"colspan="34" style="text-align: center;vertical-align: top;height: 20"><span style="font-weight: bold">CARITAS BANGLADESH</span></td>
    </tr>

    <tr>

        <td class="Border"colspan="34" style="text-align: center;">
            <span id="red" style="color: #FF0000">{{strtoupper($jobTitle)}}</span>
            <b>- {{$excelName}}</b>
        </td>

    </tr>


</table>

<table class="table" style="font-size:10">
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
    <?php $sl=0; ?>
    @foreach($employee as $emp)
    <tr>
        <td colspan="1" class="testStyle" height="400" style="text-align: left;border-right: 2px solid black!important">{{++$sl}}</td>
        <td colspan="4" height="800" class="testStyle" style="text-align: left;border-left: 2px solid black!important">
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
                National ID Card No: {{$emp->nationalId}}.<br>
                Passport No:  {{$emp->passport}}<br>

                Permanent Address: {{$emp->parmanentAddress}}<br>


                Present Address: {{$emp->presentAddress}}<br>

            </span>


        </td>




        <td colspan="4" class="Border" height="400" style="text-align: left;">


            @foreach($empQuestionAns->where('fkemployeeId',$emp->employeeId) as $ans)
                {{$ans->ques}} <br>  {{$ans->ans}} <br>

            @endforeach
        </td>



        <td colspan="4" class="Border" height="400" style="text-align: left;">
            <?php  $temp=0; ?>
            @foreach($education->where('fkemployeeId',$emp->employeeId) as $edu)
                {{++$temp}}. Degree title : {{$edu->degreeName}}<br>
                Major Subject: {{$edu->educationMajorName}}<br>
                Passing Year: {{$edu->passingYear}}<br>
                Board: {{$edu->boardName}}<br>
                Name of Institution/school/college/versity: <br>
                    {{$edu->institutionName}}<br>
                Status : @if($edu->status==1) Ongoing @elseif($edu->status==2) Complete @endif<br>
                Result: {{$edu->result}}<br><br>

            @endforeach
        </td>
        <td colspan="6" class="Border" height="400"   style="text-align: left;">
            <?php $temp=0 ?>
            @foreach($jobExperience->where('fkemployeeId',$emp->employeeId) as $job)
            {{++$temp}}. Position: {{$job->degisnation}}<br>
            Organization name: {{$job->organization}}<br>
            Organizarion type: {{$job->organizationTypeName}}<br>

            Type of Employment: {{$job->employmentType}}<br>
            Served From /To: {{$job->startDate}} - {{$job->endDate}}<br>
            Job location/Address: {{$job->address}}<br>
            Name of Supervisor: {{$job->supervisorName}}<br>

                <br><br>
            @endforeach
        </td>
        <td colspan="8" class="Border" height="400" style="text-align: left;">
            Extracurricular activities<br>
            1. Interests:<br>
            {{$emp->interests}}<br>
            2.Awards received:<br>
            {{$emp->awardReceived}}<br>
            3.Research/Publciation:<br>
            {{$emp->researchPublication}}<br>


            4.Other skills:<br>
            @foreach($extraCurriculumn->where('fkemployeeId',$emp->employeeId) as $c)
                Name: {{$c->skillName}} -{{$c->ratiing}}%<br><br>
            @endforeach

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
        <td colspan="4" class="Border" height="400" style="text-align: left;">
            <?php $temp=0;  ?>
            @foreach($reference->where('fkemployeeId',$emp->employeeId) as $ref)
            {{++$temp}}. {{$ref->firstName}} {{$ref->lastName}}<br>
            {{$ref->presentposition}}<br>
            {{$ref->organization}}<br>
            Relation: {{$ref->relation}} <br>
            Cell Phone: {{$ref->phone}}              E-mail:{{$ref->email}}<br><br>
            @endforeach
        </td>
        <td colspan="3" class="Border" height="400" style="text-align: left;"></td>

    </tr>
    <tr>
        <td colspan="1" class="testStyle" height="300" style="text-align: left;border-right: 2px solid black!important;border-bottom: 2px solid black!important "></td>
        <td colspan="4" class="testStyle" height="300" style="text-align: left;border-left: 2px solid black!important">
{{--            <span style="text-align: left">--}}
{{--                Telephone: {{$emp->telephone}}<br>--}}
{{--                Personal Phone no:  {{$emp->personalMobile}}<br>--}}
{{--                Alternative phone no: {{$emp->alternativePhoneNo}}<br>--}}
{{--                Home Phone: {{$emp->homeNumber}}<br>--}}
{{--                Office Phone: {{$emp->officeNumber}}<br>--}}
{{--                Email: {{$emp->email}}<br>--}}
{{--                Alternative Email: {{$emp->alternativeEmail}}<br>--}}
{{--                Skype :  {{$emp->skype}}<br>--}}
{{--                Date Of Birth: {{$emp->dateOfBirth}}<br>--}}
{{--                National ID Card No: {{$emp->nationalId}}.<br>--}}
{{--                Passport No:  {{$emp->passport}}<br>--}}

{{--                Parmanent Adress: {{$emp->parmanentAddress}}<br>--}}


{{--                Present Adress: {{$emp->presentAddress}}<br>--}}

{{--            </span>--}}
        </td>
        <td colspan="4" class="Border" height="300" style="text-align: left;">
            {{--Why you are intersted for the position applied for?<br>--}}
            {{--@if($empQuestion->where('empId',$emp->employeeId)->first())--}}
                {{--{{$empQuestion->where('empId',$emp->employeeId)->first()->ques_2}}--}}
            {{--@endif--}}
        </td>
        <td colspan="4" class="Border" height="300" style="text-align: left;">
            Professional Qualification:<br>
            <?php  $temp=0; ?>
            @foreach($pQualification->where('fkemployeeId',$emp->employeeId) as $qualification)

            1. Certificate Name: {{$qualification->certificateName}}<br>
            Institution: {{$qualification->institutionName}}<br>
            Duration: {{$qualification->startDate}} - {{$qualification->endDate}}<br>

            Result: {{$qualification->result}}<br>
            @endforeach
        </td>
        <td colspan="6" class="Border" height="300"   style="text-align: left;">
            @foreach($jobExperience->where('fkemployeeId',$emp->employeeId) as $job)
                Major Job responsibility: {{$job->majorResponsibilities}}<br>
                Key Achievement: {{$job->keyAchivement}}<br>
                <br><br>
            @endforeach




            Previous work information in Caritas Bangladesh (If )<br>

                @foreach($previousWorkExperienceInCB->where('fkemployeeId',$emp->employeeId) as $pExp)
                            Position in Caritas: {{$pExp->designation}}<br>
                            Served from/to: {{$pExp->startDate}}  To {{$pExp->endDate}}<br>
                @endforeach
        </td>
        <td colspan="8" class="Border" height="300" style="text-align: left;">

        </td>
        <td colspan="4" class="Border" height="300" style="text-align: left;">

            {{--1. Name of Referees, Designation, Organization, adress, mobile number and email number, Relation<br>--}}
            {{--2. Name of Referees, Designation, Organization, adress, mobile number and email number, Relation--}}



        </td>
        <td colspan="3" class="Border" height="300" style="text-align: left;"></td>

    </tr>

    <tr>

        <td colspan="1" class="Border" height="300" style="text-align: left;"></td>
        <td colspan="4" class="Border"  height="300" style="text-align: left;"><span style="text-align: left">
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
        <td colspan="4" class="Border" height="300" style="text-align: left;">
            Do you have any relatives working in Caritas Bangladesh?*<br>

            @foreach($relative->where('fkemployeeId',$emp->employeeId) as $rel)
                {{$rel->firstName}}
                {{$rel->lastName}}<br>
                {{$rel->degisnation}}<br>
                Relation: {{$rel->relation}}<br><br>
            @endforeach



        </td>
        <td colspan="4" class="Border" height="300" style="text-align: left;">
            Training information:<br>
            @foreach($training->where('fkemployeeId',$emp->employeeId) as $t)
            1. Training title: {{$t->trainingName}}<br>
            Institute: {{$t->vanue}}<br>
            Duration: {{$t->startDate}} - {{$t->endDate}}<br>
            Country: {{$t->countryName}}<br>
            @endforeach
        </td>
        <td colspan="6" class="Border" height="300"   style="text-align: left;">
            Do you have any reservation contacting your employer?
            @foreach($jobExperience->where('fkemployeeId',$emp->employeeId)->where('endDate',null) as $job)
                    {{$job->reservationContactingEmployer}}
                <br><br>
            @endforeach
        </td>
        <td colspan="8" class="Border" height="300" style="text-align: left;">

        </td>
        <td colspan="4" class="Border" height="300" style="text-align: left;">

        </td>
        <td colspan="3" class="Border" height="300" style="text-align: left;"></td>

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
            {{--$agreement--}}
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

</table>
</body>


</html>