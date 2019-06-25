
<html lang="en">
<head>
    <title>Curriculam Vitae of {{$personalInfo->firstName}} {{$personalInfo->lastName}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }

        input {
            border: medium none;
            padding: 0;
        }
        .label{
            background-color: #eff0f1;
        }

        @page {
            margin-bottom:0px;margin-top: 5px;
        }
    </style>

</head>
<body style="margin-bottom:0px;">
<div style="margin-bottom:0px;" class="">
    <div style="background: #fff;margin-bottom:0px; " class="">

        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <tr>
                <td style="border: none;text-align: center"><h2 style="font-size: 24px; border: none; text-align: center"><span style="border-bottom: 1px solid #000">Curriculam Vitae</span> </h2></td>
            </tr>

        </table>
        <table border="0" style="width:100%; border: none;">
            <tr>
                <td style="text-align: left; border: none;width: 85%; ">
                    <h3 style="">{{$personalInfo->firstName}} {{$personalInfo->lastName}}</h3>
                    <p style="max-width: 300px">Cell No: {{$personalInfo->personalMobile}} <br>
                        Email: {{$personalInfo->email}} <br>
                        Address: {{$personalInfo->presentAddress}}
                    </p>

                </td>
                <td style="width: 15%; border: none; "><img height="150px" width="150px" src="{{url('public/candidateImages/thumb').'/'.$personalInfo->image}}" alt=""></td>
            </tr>

        </table>


        @if($personalInfo->objective)
        <table border="0" style="width:100%;border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Objective</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <tr>
                <td style="width: 100%;border: none;">{{$personalInfo->objective}}</td>
            </tr>
        </table>

        @endif


        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Education</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; ">
            <thead>
            <tr>
                <th style="text-align: center" >Degree</th>
                <th style="text-align: center" >Institution / Board</th>
                <th style="text-align: center" >Passing Year</th>
                <th style="text-align: center" >Result</th>
            </tr>
            </thead>
            <tbody >
            @foreach($education as $edu)
                <tr>
                    <td style="text-align: center">{{$edu->educationLevelName}} in {{$edu->degreeName}} </td>
                    <td style="text-align: center">{{$edu->institutionName}}
                        @if($edu->boardName)
                            /
                            {{$edu->boardName}}

                        @endif

                    </td>

                    <td style="text-align: center">{{$edu->passingYear}} </td>

                    <td style="text-align: center"> {{$edu->result}}</td>
                </tr>
            @endforeach

            </tbody>


        </table >


        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Job Experience</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            @if($jobExperience->isEmpty())<tr><td style=" border: none; text-align: center"> <strong>None </strong> </td> </tr>@else

            @php $count=1;$flag=0;@endphp
            @foreach($jobExperience as $exp)

                <tr>
                    <td width="5%" style="border: none; vertical-align: top">
                        <span class="bold">{{$count++}}.</span>
                    </td>

                    <td style="border: none;">

                        <span class="bold"> Company Name : </span> &nbsp;&nbsp; {{$exp->organization}}  &nbsp;&nbsp;
                        <div class="pull-right"><span class="bold">Position:</span>&nbsp;{{$exp->degisnation}} </div><br>
                        <span class="bold"> Major Responsibilities :</span>&nbsp;&nbsp;{{$exp->majorResponsibilities}} <br>
                        <span class="bold"> Address:</span>&nbsp;&nbsp;&nbsp; {{$exp->address}} <br>
                        <span class="bold"> Duration:</span>&nbsp;&nbsp;&nbsp; {{$exp->startDate}} -  @if($exp->endDate) {{$exp->endDate}} @else
                            Continuing
                        @endif
                        <br>

                        <span class="bold"> Total job experience:</span>

                        @if ($exp->startDate!=null && $exp->endDate==null)

                            {{$sub_struct=\Carbon\Carbon::parse($exp->startDate)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days')}}
                        @else
                            {{$sub_struct=\Carbon\Carbon::parse($exp->startDate)->diff(\Carbon\Carbon::parse($exp->endDate))->format('%y years, %m months and %d days')}}
                        @endif





                    </td>
                </tr>

            @endforeach
    @endif
        </table>

        @if(!$jobExperience->isEmpty() && count($jobExperience) >=2)
            <p style="page-break-after: always;"></p>
        @elseif(!$jobExperience->isEmpty())
            <p style="page-break-after: always;"></p>
        @elseif($jobExperience->isEmpty()&& count($trainingCertificate)>=2)
            <p style="page-break-after: always;"></p>
        @endif



        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000; background-color: #eff0f1;" ><b>Training Certificate</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            @if($trainingCertificate->isEmpty())<tr><td style=" border: none; text-align: center"> <strong>None </strong> </td></tr> @endif

            @php $count=1;@endphp


            @foreach($trainingCertificate as $certificate)
                <tr>
                    <td width="5%" style="border: none; vertical-align: top">
                        <span>{{$count++}}.</span>
                    </td>
                    <td style="border: none;">
                        Training Name : {{$certificate->trainingName}} <br>
                        Vanue: {{$certificate->vanue}} <br>
                        Duration: {{$certificate->startDate}} -  @if($certificate->endDate) {{$certificate->endDate}} @else
                            Continuing
                        @endif
                        ({{$certificate->year}}Y - {{$certificate->month}}M - {{$certificate->week}}W - {{$certificate->day}}D - {{$certificate->hour}}H)
                        .

                    </td>
                </tr>
            @endforeach

        </table>

        @if($trainingCertificate->isEmpty()&& $jobExperience->isEmpty() )
        <p style="page-break-after: always;"></p>
        @endif

        <table border="0" style="width:100%;border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Professional Certificate</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            @if($professionalCertificate->isEmpty())<tr><td style=" border: none; text-align: center"> <strong>None </strong> </td></tr> @endif

        @foreach($professionalCertificate as $certificate)
                <tr>

                    <td style="border: none; width: 20%">Certificate Name</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;"><b>{{$certificate->certificateName}}</b> </td>
                </tr>
                <tr>

                    <td style="border: none; width: 20%">Institution Name</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;">{{$certificate->institutionName}} </td>
                </tr>
                <tr>

                    <td style="border: none; width: 20%">Session</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;">{{$certificate->startDate}} - {{$certificate->endDate}}
                        ({{$certificate->year}}Y - {{$certificate->month}}M - {{$certificate->week}}W - {{$certificate->day}}D - {{$certificate->hour}}H)
                    </td>
                </tr>

                <tr>
                    <td style="border: none; width: 20%">Status</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;">
                        @if($certificate->status == 1) On Going
                        @else
                            Completed
                        @endif

                    </td>
                </tr>

                <tr>

                    <td style="border: none; width: 20%">Result</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;">{{$certificate->result}}</td>
                </tr>

            @endforeach

        </table >

        {{--<p style="page-break-after: always"></p>--}}

        {{--<table border="0" style="width:100%; margin-top: 5px; border: none;">--}}
            {{--<tr>--}}
                {{--<td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Other Skill</b> </td>--}}
            {{--</tr>--}}
        {{--</table>--}}
        {{--<table border="0" style="width:100%; margin-top: 10px; border: none;">--}}
        {{--</table>--}}

        {{--<table border="0"  style="width:100%;margin-top:10px; border: none;">--}}
            {{--@if($empOtherSkillls->isEmpty())--}}
                {{--<tr>--}}
                {{--<td style=" border: none; text-align: center"> <strong>None </strong> </td> </tr>@else--}}
            {{--<tr>--}}
            {{--<th style="width: 70%;text-align: center" >Skill</th>--}}
            {{--<th style="width: 30%;text-align: center">Rating</th>--}}
            {{--</tr>--}}
            {{--@foreach($empOtherSkillls as $skills)--}}
                {{--<tr>--}}

                    {{--<td style="text-align: center">{{$skills->skillName}}</td>--}}

                    {{--<td style="text-align: center">{{$skills->ratiing}}</td>--}}

                {{--</tr>--}}
            {{--@endforeach--}}
            {{--@endif--}}
        {{--</table>--}}



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Computer Skill</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <thead>
            <tr>
                <th style="width: 70%;text-align: center" >Skill</th>
                <th style="width: 30%;text-align: center">Level</th>

            </tr>

            </thead>
            @foreach($empComputerSkill as $skills)
                <tr>

                    <td style="text-align: center">{{$skills->computerSkillName}}</td>

                    <td style="text-align: center">@if($skills->SkillAchievement==1)General @elseif($skills->SkillAchievement==2)Advance @endif</td>

                </tr>
            @endforeach
        </table>






{{--        <p style="page-break-after: always"></p><br>--}}
        <table border="0" style="width:100%; margin-top: 5px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Personal Info</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <tr>
                <td  style="border: none;">
                    <label>Father Name : </label>{{$personalInfo->fathersName}}
                </td>


                <td style="border: none;">
                    <label> Mother Name :</label> {{$personalInfo->mothersName}}
                </td>
            </tr>
            <tr>
                <td  style="border: none;">
                    <label>Gender :</label>
                    @if($personalInfo->gender == "M")
                        {{"Male"}}
                    @else
                        {{"Female"}}
                    @endif
                </td>



                <td style="border: none;">
                    <label>Date of Birth :</label> {{$personalInfo->dateOfBirth}}
                </td>
            </tr>
            <tr>
                <td  style="border: none;">
                    <label> Religion : </label>{{$personalInfo->religionName}}
                </td>


                <td style="border: none;">

                    <label> Nationality :</label> {{$personalInfo->nationalityName}}

                </td>
            </tr>

            <tr>
                <td  style="border: none;">
                    <label> Blood Group: </label>{{strtoupper($personalInfo->bloodGroup)}}
                </td>


                <td style="border: none;">
                    @foreach(MARITAL_STATUS as $key=>$value)
                        @if($personalInfo->maritalStatus==$value) <label>Marital Status :</label> {{$key}}@endif
                    @endforeach

                </td>
            </tr>


            <tr>
                <td  style="border: none;">
                    <label>Passport :</label> {{$personalInfo->passport}}
                </td>


                <td style="border: none;">
                    @if(!is_null($personalInfo->nationalId))
                    <label>National Id :</label> {{$personalInfo->nationalId}}
                    @elseif(!is_null($personalInfo->birthID))
                        <label>Birth Id :</label> {{$personalInfo->birthID}}

                    @endif
                </td>
            </tr>
            <tr>
                <td  style="border: none;" colspan="2">
                    <label>Permanent address :</label> {{$personalInfo->parmanentAddress}}
                </td>
            </tr>

            <tr>
                <td  style="border: none;" >
                    <label>Expected salary :</label> {{$salary->expectedSalary}}
                </td>
            </tr>



        </table>

        @if($empOtherInfo)
            <table border="0" style="width:100%; margin-top: 25px; border: none;">
                <tr>
                    <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Other info</b> </td>
                </tr>
            </table>

            <table border="0" style="width:100%; margin-top: 10px; border: none;">

                <tr>
                    <td  style="border: none;">
                        <label><b>Extracurricular activities :</b></label>{{$empOtherInfo->extraCurricularActivities}}
                    </td>
                </tr>
                <tr>

                    <td style="border: none;">
                        <label> <b>Interests :</b></label>{{$empOtherInfo->interests}}
                    </td>
                </tr>
                <tr>
                    <td style="border: none;">
                        <label> <b>Awards received :</b></label>{{$empOtherInfo->awardReceived}}
                    </td>
                </tr>
                <tr>
                    <td style="border: none;">
                        <label> <b>Research / Publication :</b></label>{{$empOtherInfo->researchPublication}}
                    </td>
                </tr>
            </table>
        @endif

        {{--@if($trainingCertificate->isEmpty()&& $jobExperience->isEmpty() )--}}
            {{--<p style="page-break-after: always;"></p>--}}
        {{--@elseif($trainingCertificate->isEmpty()&& count($jobExperience)<2)--}}
            {{--<p style="page-break-after: always;"></p>--}}
        {{--@elseif(count($jobExperience)<2 && count($trainingCertificate)<2)--}}
            {{--<p style="page-break-after: always;"></p>--}}
        {{--@endif--}}

        <p style="page-break-after: always;"></p>

        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Languages</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 5px; ">

            <tr style=" ">
                @if($languageNames->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @endif
                @foreach($languageNames as $lname)
                    <td>
                        {{$lname->languagename}}
                    </td>


                    @foreach($languages->where('fklanguageHead',$lname->fklanguageHead) as $lan)

                        <td>
                            {{$lan->languageSkillName}} : {{$lan->rate}}

                        </td>

                    @endforeach
                @endforeach

            </tr>


        </table>


        <table border="0" style="width:100%; margin-top: 5px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Membership in Professional Network</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 5px; border: none;">

            <tr style=" border: none;">
                @if($memberShip->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @endif
                @foreach($memberShip as $mem)

                    <td style="border: none;">
                        <span class="bold"> Network name :</span>{{$mem->networkName}}  <br>
                        <span class="bold">Membership type:&nbsp; &nbsp;</span>{{$mem->membershipType}}  &nbsp; &nbsp;&nbsp;<span class="bold">  Duration:</span> &nbsp;&nbsp;{{$mem->duration}} <br>

                    </td>

                @endforeach

            </tr>


        </table>


        <table border="0" style="width:100%; margin-top: 5px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Relative in Caritas</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 5px; border: none;">

            <tr style=" border: none;">
                @if($relativeCb->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @endif
                @foreach($relativeCb as $ref)

                    <td style="border: none;">
                        <p> Name : {{$ref->firstName}} {{$ref->lastName}} <br>
                            Position: {{$ref->degisnation}} <br>
                        </p>
                    </td>

                @endforeach

            </tr>


        </table>

        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Referee</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            @php $count=1;@endphp
            @if($refree->isEmpty())<tr><td style=" border: none; text-align: center"> <strong>None </strong> </td></tr> @endif


            @foreach($refree as $ref)
                <tr style="">

                    <td width="2%" style="border: none; vertical-align: top">
                        <span>{{$count++}}.</span>
                    </td>

                    <td style="border: none;">
                        Name : {{$ref->firstName}} {{$ref->lastName}} <br>
                        Contact: {{$ref->phone}} <br>
                        Position: {{$ref->presentposition}} <br>
                        Email: {{$ref->email}}

                    </td>
                </tr>
            @endforeach




        </table>
        <table border="0" style="width:100%; margin-top: 25px; border: none;">

            <b>Declaration:</b> I do hereby declare that the above information is true and correct to the best of my knowledge.

            <tr>

                <td style="width: 13%; border: none; "><img height="100px" width="100px" src="{{url('public/candidateSigns/thumb').'/'.$personalInfo->sign}}" alt=""></td>
            </tr>
            <tr>
                <td style="width: 13%; border: none; ">&nbsp;&nbsp;Signature</td>
            </tr>
        </table>




    {{--</div>--}}
{{--</div>--}}
</body>
</html>