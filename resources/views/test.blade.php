
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
                <td style="border: none;"><h2 style="font-size: 24px; border: none; text-align: center"><span style="border-bottom: 1px solid #000">Curriculam Vitae</span> </h2></td>
            </tr>

        </table>
        <table border="0" style="width:100%; margin-top: 30px; border: none;">
            <tr>
                <td style="text-align: left; border: none;">
                    <h3 style="">{{$personalInfo->firstName}} {{$personalInfo->lastName}}</h3>
                    <p style="max-width: 300px">Cell No: {{$personalInfo->personalMobile}} <br>
                        email: {{$personalInfo->email}} <br>
                        address: {{$personalInfo->presentAddress}}
                    </p>

                </td>
                <td style="width: 13%; border: none; "><img height="150px" width="150px" src="{{url('public/candidateImages/thumb').'/'.$personalInfo->image}}" alt=""></td>
            </tr>

        </table>



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


        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Education</b> </td>
            </tr>
        </table>


        {{--Education--}}

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
            @if($jobExperience->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @else

            @php $count=1;@endphp
            @foreach($jobExperience as $exp)

                <tr>
                    <td width="2%" style="border: none; vertical-align: top">
                        <span class="bold">{{$count++}}.</span>
                    </td>


                    <td style="border: none;">

                        <span class="bold"> Company Name : </span> &nbsp;&nbsp; {{$exp->organization}}  &nbsp;&nbsp;
                        <div class="pull-right"><span class="bold">Position:</span>&nbsp;&nbsp;&nbsp; {{$exp->degisnation}} </div><br>

                        <span class="bold"> Major Responsibilities :</span>&nbsp;&nbsp;&nbsp; {{$exp->majorResponsibilities}} <br>
                        <span class="bold"> Address:</span>&nbsp;&nbsp;&nbsp; {{$exp->address}} <br>
                        <span class="bold"> Duration:</span>&nbsp;&nbsp;&nbsp; {{$exp->startDate}} -  @if($exp->endDate) {{$exp->endDate}} @else
                            Continuing
                        @endif
                        .



                    </td>
                </tr>

            @endforeach
    @endif
        </table>



        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000; background-color: #eff0f1;" ><b>Training Certificate</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            @if($trainingCertificate->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @endif

            @php $count=1;@endphp


            @foreach($trainingCertificate as $certificate)
                <tr>
                    <td width="2%" style="border: none; vertical-align: top">
                        <span>{{$count++}}.</span>
                    </td>
                    <td style="border: none;">
                        Training Name : {{$certificate->trainingName}} <br>
                        Vanue: {{$certificate->vanue}} <br>
                        Duration: {{$certificate->startDate}} -  @if($certificate->endDate) {{$certificate->endDate}} @else
                            Continuing
                        @endif
                        .

                    </td>
                </tr>
            @endforeach

        </table>

        {{--<p style="page-break-after: always"></p>--}}

        <table border="0" style="width:100%;border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Professional Certificate</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            @if($professionalCertificate->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @endif

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
                    <td style="border: none;">{{$certificate->startDate}} - {{$certificate->endDate}}</td>
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

        <p style="page-break-after: always"></p>

        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Other Skill</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            @if($empOtherSkillls->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @else
            <tr>
            <th style="width: 70%;text-align: center" >Skill</th>
            <th style="width: 30%;text-align: center">Rating</th>
            </tr>
            @foreach($empOtherSkillls as $skills)
                <tr>

                    <td style="text-align: center">{{$skills->skillName}}</td>

                    <td style="text-align: center">{{$skills->ratiing}}</td>

                </tr>
            @endforeach
                @endif
        </table>



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

                    <td style="text-align: center">{{$skills->SkillAchievement}}</td>

                </tr>
            @endforeach
        </table>






        {{--<p style="page-break-after: always"></p>--}}
        <table border="0" style="width:100%; margin-top: 25px; border: none;">
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
                    <label>Date Of Birth :</label> {{$personalInfo->dateOfBirth}}
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
                    <label> Blood Group: </label>{{$personalInfo->bloodGroup}}
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
                    <label>National Id :</label> {{$personalInfo->nationalId}}
                </td>
            </tr>
            <tr>
                <td  style="border: none;">
                    <label>Permanent Address :</label> {{$personalInfo->parmanentAddress}}
                </td>
            </tr>

            {{--bloodGroup--}}
            {{--maritalStatus--}}


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


            @foreach($refree as $ref)
                <tr style="">

                    <td width="2%" style="border: none; vertical-align: top">
                        <span>{{$count++}}.</span>
                    </td>

                    <td style="border: none;">
                        Name : {{$ref->firstName}} {{$ref->lastName}} <br>
                        Contact: {{$ref->phone}} <br>
                        Position: {{$ref->presentposition}} <br>
                        email: {{$ref->email}}

                    </td>
                </tr>
            @endforeach




        </table>


    </div>
</div>
</body>
</html>