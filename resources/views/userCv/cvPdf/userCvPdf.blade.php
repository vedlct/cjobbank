@extends('main')

@section('content')

    <style>

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            font-weight: bold;
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
        .bold{
            font-weight: bold;
        }
    </style>


<div style="position: relative;" class="row ">


    <div class="col-12">
        <div style="background-color: #F1F1F1" class="card">
            <div class="card-body">
                @if($allEmp != null && $allEmp->cvStatus == 1)

                <div id="regForm">
                    {{--<div class="pull-right"><a class="btn btn-sm btn-success"  onclick="viewUserCv()">Download</a></div>--}}
                    <div class="pull-right"><a class="btn btn-sm btn-success" href="{{route('userCv.post1',$allEmp->employeeId)}}" >Download</a></div>



                    <table border="0" style="width:100%; margin-top: 10px; border: none;">
                        <tr>
                            <td style="border: none;"><h2 style="font-size: 24px; border: none; text-align: center"><span style="border-bottom: 1px solid #000">Curriculam Vitae</span> </h2></td>
                        </tr>

                    </table>
                    <table border="0" style="width:100%; margin-top: 30px; border: none;">
                        <tr>
                            <td style="text-align: left; border: none;">
                                <h3 style="">{{$personalInfo->firstName}} {{$personalInfo->lastName}}</h3>
                                <p style="max-width: 300px"><span class="bold">Cell No:</span> {{$personalInfo->personalMobile}} <br>
                                    <span class="bold">email:</span> {{$personalInfo->email}} <br>
                                    <span class="bold">address:</span> {{$personalInfo->presentAddress}}
                                </p>

                            </td>
                            <td style="width: 13%; border: none; "><img height="150px" width="150px" src="{{url('public/candidateImages/thumb').'/'.$personalInfo->image}}" alt=""></td>
                        </tr>

                    </table>

                    {{--Objective--}}

                    <p style="page-break-after: always"></p>

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
                            <th style="text-align: center" >Passing year</th>
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
                            <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Job experience</b> </td>
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

                                    <span class="bold"> Company name : </span> &nbsp;&nbsp {{$exp->organization}}  &nbsp;&nbsp;
                                    <div class="pull-right"><span class="bold">Position:</span>&nbsp;&nbsp;&nbsp; {{$exp->degisnation}} </div><br>

                                    <span class="bold"> Major responsibilities :</span>&nbsp;&nbsp;&nbsp; {{$exp->majorResponsibilities}} <br>
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
                            <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000; background-color: #eff0f1;" ><b>Training certificate</b> </td>
                        </tr>
                    </table>

                    <table border="0" style="width:100%; margin-top: 10px; border: none;">
                        @if($trainingCertificate->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @endif

                        @php $count=1;@endphp


                        @foreach($trainingCertificate as $certificate)
                            <tr>
                                <td width="2%" style="border: none; vertical-align: top">
                                    <span class="bold">{{$count++}}.</span>
                                </td>
                                <td style="border: none;">
                                    <span class="bold"> Training name :</span> &nbsp;&nbsp;&nbsp;{{$certificate->trainingName}} <br>
                                    <span class="bold"> Vanue:</span> &nbsp;&nbsp;&nbsp;{{$certificate->vanue}} <br>
                                    <span class="bold"> Duration:</span> &nbsp;&nbsp;&nbsp;{{$certificate->startDate}} -  @if($certificate->endDate) {{$certificate->endDate}} @else
                                        Continuing
                                    @endif
                                    .



                                </td>
                            </tr>
                        @endforeach

                    </table>

                    <p style="page-break-after: always"></p>

                    <table border="0" style="width:100%;border: none;">
                        <tr>
                            <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Professional certificate</b> </td>
                        </tr>
                    </table>

                    <table border="0" style="width:100%; margin-top: 10px; border: none;">
                        @if($professionalCertificate->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @endif

                    @foreach($professionalCertificate as $certificate)
                            <tr>

                                <td style="border: none; width: 20%"><span class="bold">Certificate name</span></td>
                                <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                <td style="border: none;"><b>{{$certificate->certificateName}}</b> </td>
                            </tr>
                            <tr>

                                <td style="border: none; width: 20%"><span class="bold">Institution name</span></td>
                                <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                <td style="border: none;">{{$certificate->institutionName}} </td>
                            </tr>
                            <tr>

                                <td style="border: none; width: 20%"><span class="bold">Session</span></td>
                                <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                <td style="border: none;width: 40%">{{$certificate->startDate}} - {{$certificate->endDate}}</td>
                            </tr>


                            <tr>
                                <td style="border: none; width: 20%"><span class="bold">Status</span></td>
                                <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                <td style="border: none;width: 20%">
                                    @if($certificate->status == 1) On Going
                                    @else
                                        Completed
                                    @endif

                                </td>
                                <td style="border: none; width: 10%"><span class="bold">Result</span></td>
                                <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                <td style="border: none;">{{$certificate->result}}</td>
                            </tr>



                        @endforeach

                    </table >

                    <table border="0" style="width:100%; margin-top: 25px; border: none;">
                        <tr>
                            <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Other skill</b> </td>
                        </tr>
                    </table>
                    <table border="0" style="width:100%; margin-top: 10px; border: none;">
                    </table>
                    <table border="0" style="width:100%; margin-top: 10px; border: none;">
                        @if($empOtherSkillls->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @else

                        <thead>
                            <th style="width: 70%;text-align: center" >Skill</th>
                            <th style="width: 30%;text-align: center">Rating</th>
                        </thead>
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
                            <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Computer skill</b> </td>
                        </tr>
                    </table>
                    <table border="0" style="width:100%; margin-top: 10px; border: none;">
                    </table>
                    <table border="0" style="width:100%; margin-top: 10px; border: none;">
                        <thead>
                        <th style="width: 70%;text-align: center" >Skill</th>
                        <th style="width: 30%;text-align: center">Level</th>
                        </thead>
                        @foreach($empComputerSkill as $skills)
                            <tr>

                                <td style="text-align: center">{{$skills->computerSkillName}}</td>

                                <td style="text-align: center">{{$skills->SkillAchievement}}</td>

                            </tr>
                        @endforeach
                    </table>





                    <table border="0" style="width:100%; margin-top: 25px; border: none;">
                        <tr>
                            <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Personal info</b> </td>
                        </tr>
                    </table>

                    <table border="0" style="width:100%; margin-top: 10px; border: none;">
                    </table>



                    <table border="0" style="width:100%; margin-top: 10px; border: none;">

                        <tr>
                            <td  style="border: none;">
                                <label>Father name : </label>{{$personalInfo->fathersName}}
                            </td>


                            <td style="border: none;">
                                <label> Mother name :</label> {{$personalInfo->mothersName}}
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
                                <label>Date of birth :</label> {{$personalInfo->dateOfBirth}}
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
                                <label>Permanent address :</label> {{$personalInfo->parmanentAddress}}
                            </td>
                        </tr>

                        {{--bloodGroup--}}
                        {{--maritalStatus--}}


                    </table>

                    <table border="0" style="width:100%; margin-top: 5px; border: none;">
                        <tr>
                            <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Relative in caritas</b> </td>
                        </tr>
                    </table>

                    <table border="0" style="width:100%; margin-top: 5px; border: none;">

                        <tr style=" border: none;">
                            @if($relativeCb->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @endif
                            @foreach($relativeCb as $ref)

                                <td style="border: none;">
                                    <span class="bold"> Name :</span> &nbsp;&nbsp;&nbsp;{{$ref->firstName}} {{$ref->lastName}} <br>
                                    <span class="bold">  Position:</span> &nbsp;&nbsp;&nbsp;{{$ref->degisnation}} <br>

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
                                    <span class="bold">{{$count++}}.</span>
                                </td>

                                <td style="border: none;">
                                    <span class="bold">Name :</span> &nbsp;&nbsp;&nbsp;{{$ref->firstName}} {{$ref->lastName}} <br>
                                    <span class="bold">Contact:</span> &nbsp;&nbsp;&nbsp;{{$ref->phone}} <br>
                                    <span class="bold">Position:</span> &nbsp;&nbsp;&nbsp;{{$ref->presentposition}} <br>
                                    <span class="bold">email:</span> &nbsp;&nbsp;&nbsp;{{$ref->email}}

                                </td>
                            </tr>
                        @endforeach




                    </table>




                </div>
                @endif


            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->




@endsection

@section('foot-js')

<script>

    @if(Session::has('message') && $allEmp != null &&  $allEmp->cvStatus == null)

    $.alert({
        title: 'Error',
        type: 'red',
        content: 'Your CV is not Completed yet,Please Complete First',
        buttons: {
            tryAgain: {
                text: 'Ok',
                btnClass: 'btn-green',
                action: function () {

                }
            }
        }
    });

    @endif
    @if(Session::has('message') && $msg != null)

    $.alert({
        title: 'Error',
        type: 'red',
        content: '<?php echo $msg?>',
        buttons: {
            tryAgain: {
                text: 'Ok',
                btnClass: 'btn-green',
                action: function () {

                }
            }
        }
    });

    @endif
    {{--function viewUserCv() {--}}


        {{--$.ajax({--}}
            {{--type: "get",--}}
            {{--url: '{{route('userCv.post')}}',--}}
            {{--data: {_token:"{{csrf_token()}}",id:"{{$allEmp->employeeId}}"},--}}
            {{--success: function (data) {--}}


            {{--},--}}
        {{--});--}}


    {{--}--}}
</script>

@endsection