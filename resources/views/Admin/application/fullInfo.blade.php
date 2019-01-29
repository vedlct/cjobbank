<html>
<head>
    {{--<style>--}}
        {{--table{--}}
            {{--font-size: 5px;--}}
        {{--}--}}
    {{--</style>--}}

</head>
<body>


<table class="table">

    <tr>

        <td colspan="8" style="text-align: center"></td>
        <td colspan="8" style="text-align: center"></td>
        <td colspan="8" style="text-align: center"></td>

    </tr>
    <tr >
        <td colspan="24" style="vertical-align: center;height: 20;"><span style="text-align: center"><h4>CARITAS BANGLADESH</h4></span></td>
    </tr>

    <tr>

        <td colspan="24" style="text-align: center;height: 15;">
            <span id="red" style="color: #FF0000">{{strtoupper($jobTitle)}}</span>
            <b>- {{$excelName}}</b>
        </td>

    </tr>


</table>

<table class="table" style="font-size:10">
    <tr style="font-weight: bold">
        <td colspan="1" style="text-align: center">Sl No.</td>
        <td colspan="4" style="text-align: center">Name and personal information</td>
        <td colspan="3" style="text-align: center">Questionnaire</td>
        <td colspan="4" style="text-align: center">Educational/ professional/Training Information</td>
        <td colspan="4" style="text-align: center">Job Experiences/ Employment History</td>
        <td colspan="4" style="text-align: center">Extracurricular activities/ other skills</td>
        <td colspan="3" style="text-align: center">References</td>
        <td colspan="1" style="text-align: center">Remarks</td>
    </tr>
    <?php $sl=0; ?>
    @foreach($employee as $emp)
    <tr>
        <td colspan="1" height="250" style="text-align: center;vertical-align: middle;">{{++$sl}}</td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;"><span style="text-align: center">{{$emp->firstName}} {{$emp->lastName}}</span></td>




        <td colspan="3" height="250" style="text-align: center;vertical-align: middle;">
            {{--Why Do You Want to Leave Your Current Job?<br>--}}
            {{--@if($empQuestion->where('empId',$emp->employeeId)->first())--}}
            {{--{{$empQuestion->where('empId',$emp->employeeId)->first()->ques_1}}--}}
            {{--@endif--}}

            @foreach($empQuestionAns->where('fkemployeeId',$emp->employeeId) as $ans)
                {{$ans->ques}} <br>  {{$ans->ans}} <br>

            @endforeach
        </td>



        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;">
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
        <td colspan="4" height="250"   style="text-align: center;vertical-align: middle;">
            <?php $temp=0 ?>
            @foreach($jobExperience->where('fkemployeeId',$emp->employeeId) as $job)
            {{++$temp}}. Position: {{$job->degisnation}}<br>
            Organization name: {{$job->organization}}<br>
            Organizarion type: {{$job->organizationTypeName}}<br>
            {{--Total experience: {{$job->organization}}<br>--}}
            {{--Department: {{$job->organization}}<br>--}}
            Type of Employment: {{$job->employmentType}}<br>
            Served From /To: {{$job->startDate}} - {{$job->endDate}}<br>
            Job location/Address: {{$job->address}}<br>
            Name of Supervisor: {{$job->supervisorName}}<br>
            {{--Present Salary: {{$job->organization}}<br>--}}
            {{--Ready to join after(Days):--}}
                <br><br>
            @endforeach
        </td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;">
            Extracurricular activities<br>
            1. Interests<br>
            2.Awards received<br>
            3.Research/Publciation<br>


            Other skills:<br>
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
        <td colspan="3" height="250" style="text-align: center;vertical-align: middle;">
            <?php $temp=0;  ?>
            @foreach($reference->where('fkemployeeId',$emp->employeeId) as $ref)
            {{++$temp}}. {{$ref->firstName}} {{$ref->lastName}}<br>
            {{$ref->presentposition}}<br>
            {{$ref->organization}}<br>
            Relation: {{$ref->relation}} <br>
            Cell Phone: {{$ref->phone}}              E-mail:{{$ref->email}}<br><br>
            @endforeach
        </td>
        <td colspan="1" height="250" style="text-align: center;vertical-align: middle;"></td>

    </tr>
    <tr>
        <td colspan="1" height="250" style="text-align: center;vertical-align: middle;"></td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;"><span style="text-align: center">
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

                Parmanent Adress: {{$emp->parmanentAddress}}<br>


                Present Adress: {{$emp->presentAddress}}<br>

            </span></td>
        <td colspan="3" height="250" style="text-align: center;vertical-align: middle;">
            {{--Why you are intersted for the position applied for?<br>--}}
            {{--@if($empQuestion->where('empId',$emp->employeeId)->first())--}}
                {{--{{$empQuestion->where('empId',$emp->employeeId)->first()->ques_2}}--}}
            {{--@endif--}}
        </td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;">
            Professional Qualification:<br>
            <?php  $temp=0; ?>
            @foreach($pQualification->where('fkemployeeId',$emp->employeeId) as $qualification)

            1. Certificate Name: {{$qualification->certificateName}}<br>
            Institution: {{$qualification->institutionName}}<br>
            Duration: {{$qualification->startDate}} - {{$qualification->endDate}}<br>

            Result: {{$qualification->result}}<br>
            @endforeach
        </td>
        <td colspan="4" height="250"   style="text-align: center;vertical-align: middle;">
            Major Job responsibility:<br>
            Key Achievement<br>


            Previous work information in Caritas Bangladesh (If )<br>
            Position in Caritas:<br>
            Served from/to<br>
        </td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;">

        </td>
        <td colspan="3" height="250" style="text-align: center;vertical-align: middle;">

            1. Name of Referees, Designation, Organization, adress, mobile number and email number, Relation<br>
            2. Name of Referees, Designation, Organization, adress, mobile number and email number, Relation



        </td>
        <td colspan="1" height="250" style="text-align: center;vertical-align: middle;"></td>

    </tr>

    <tr>

        <td colspan="1" height="250" style="text-align: center;vertical-align: middle;"></td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;"><span style="text-align: center">
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
        <td colspan="3" height="250" style="text-align: center;vertical-align: middle;">
            Do you have any relatives working in Caritas Bangladesh?*<br>
            Name and relation:<br>

            Answers of declaration form:<br>
        </td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;">
            Training information:<br>
            @foreach($training->where('fkemployeeId',$emp->employeeId) as $t)
            1. Training title: {{$t->trainingName}}<br>
            Institute: {{$t->vanue}}<br>
            Duration: {{$t->startDate}} - {{$t->endDate}}<br>
            Country: {{$t->countryName}}<br>
            @endforeach
        </td>
        <td colspan="4" height="250"   style="text-align: center;vertical-align: middle;">
            Do you have any reservation contacting your employer?
        </td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;">

        </td>
        <td colspan="3" height="250" style="text-align: center;vertical-align: middle;">

        </td>
        <td colspan="1" height="250" style="text-align: center;vertical-align: middle;"></td>

    </tr>



    <tr>
        <td colspan="1" height="250" style="text-align: center;vertical-align: middle;"></td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;"><span style="text-align: center">
                Membership in Social Network :<br>
                @foreach($social->where('fkemployeeId',$emp->employeeId) as $s)

                Name of Network: {{$s->networkName}}<br>
                Type of Membership: {{$s->membershipType}}<br>
                Duration: {{$s->duration}}<br>
                @endforeach

            </span>

        </td>
        <td colspan="3" height="250" style="text-align: center;vertical-align: middle;">
            Answers of declaration form:
        </td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;">

        </td>
        <td colspan="4" height="250"   style="text-align: center;vertical-align: middle;">

        </td>
        <td colspan="4" height="250" style="text-align: center;vertical-align: middle;">

        </td>
        <td colspan="3" height="250" style="text-align: center;vertical-align: middle;">

        </td>
        <td colspan="1" height="250" style="text-align: center;vertical-align: middle;"></td>

    </tr>

@endforeach

</table>
</body>


</html>