
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{url('public/css/exceltable.css')}}" rel="stylesheet">
</head>

<table class="table">


    <tr>
        <td colspan="15" style="text-align: center;vertical-align: top;height: 20"><span style="font-weight: bold">{{strtoupper($jobTitle['title'])}}</span>
            <b>- {{$excelName}}</b>
        </td>
    </tr>

    <tr>
        <td colspan="15" style="text-align: center;vertical-align: top;height: 20">
            <span style="font-weight: bold">Last date: {{$jobTitle['deadline']}} </span>
        </td>
        {{--<td colspan="5"></td>--}}
        {{--<td colspan="4" style="text-align: center;vertical-align: top;height: 20"><span style="font-weight: bold">Last date: {{$jobTitle['deadline']}} </span></td>--}}
        {{--<td colspan="5"> </td>--}}
    </tr>

</table>


<table class="table">
    <thead>

    <tr >
        <th colspan="1"style="text-align: center">Sl No.</th>
        <th colspan="3"style="text-align: center">NAME</th>
        {{--<th>Gender</th>--}}
        {{--<th>Disability</th>--}}
        {{--<th>Ethnicity</th>--}}
        <th colspan="1"style="text-align: center" >  AGE  </th>
        <th style="text-align: center" colspan="3">Educational Qualification</th>
        {{--<th colspan="2">Professional Qualification</th>--}}
        {{--<th colspan="2">Training</th>--}}
        <th style="text-align: center" colspan="3">Job Experiences</th>
        @if($withoutsalary != 'true')
        <th style="text-align: center">Salary Information</th>
        @endif
        <th style="text-align: center">National ID No./ Birth Identification No.</th>
        <th style="text-align: center">Photo (2)</th>
        <th style="text-align: center">Name of  two Referees</th>
        {{--<th>Relative in CB</th>--}}
        <th style="text-align: center" colspan="2">Remarks</th>

    </tr>
    </thead>
    <tbody>

    @foreach($AppliedCandidateList as $key=>$emp)
        <tr>
            <td colspan="1"height="600" style="text-align: left;vertical-align: middle;">
             {{$key+1}}


            </td>
            <td colspan="3"height="600" style="text-align: left;vertical-align: top;">
                {{$emp['firstName']}}   {{$emp['lastName']}}
                <br>
                Cell: {{$emp['personalMobile']}} <br>
                Email: {{$emp['email']}} <br>

                <span class="bold">Present Address</span>:<br>
                {{$emp['presentAddress']}} <br>

                <span class="bold">Permanent Address:</span><br>
                {{$emp['parmanentAddress']}} <br>

            </td>
            {{--<td height="600" style="text-align: center;vertical-align: middle;">--}}
                {{--{{$emp['gender']}}--}}
            {{--</td>--}}
            {{--<td height="600" style="text-align: center;vertical-align: middle;">--}}
                {{--{{$emp['disability']}}--}}
            {{--</td>--}}
            {{--<td height="600" style="text-align: center;vertical-align: middle;">--}}
                {{--{{$ethnicity->where('ethnicityId',$emp['ethnicityId'])->first()->ethnicityName}}--}}
            {{--</td>--}}
            <td colspan="1" height="600" style="text-align: center;vertical-align: middle;">

                {{$emp['AgeYear']}}.{{substr($emp['AgeMonth'],0,1)}}yrs
            </td>
            <td colspan="3" height="600" style="text-align: left;vertical-align: top;">

{{--                @foreach($educationList->where('fkemployeeId',$emp['employeeId']) as $edu)--}}
{{--                        --}}{{--{{$edu->institutionName}}--}}
{{--                        --}}{{--<br>--}}
{{--                        --}}{{--{{$edu->boardName}}--}}
{{--                        --}}{{--<br>--}}
{{--                        --}}{{--Level:{{$edu->educationLevelName}}  Result:{{$edu->result}}--}}
{{--                        --}}{{--<br>--}}

{{--                    {{$edu->educationLevelName}} @if($edu->educationMajorName)({{$edu->educationMajorName}})@endif={{$edu->result}}<br>--}}

{{--                @endforeach--}}
                <?php  $temp=0; ?>
                @foreach($educationList->where('fkemployeeId',$emp['employeeId']) as $edu)
                    {{++$temp}}. Degree title : {{$edu->degreeName}}<br>
                    Major Subject: {{$edu->educationMajorName}}<br>
                    Passing Year: {{$edu->passingYear}} , Board: {{$edu->boardName}}<br>
                    Name of Institution/school/college/university: <br>
                    {{$edu->institutionName}}<br>
                    Status : @if($edu->status==1) Ongoing @elseif($edu->status==2) Complete @endif , Result: {{$edu->result}}<br><br>

                @endforeach
            </td>

            {{--<td colspan="2" height="600" style="text-align: center;vertical-align: middle;">--}}
                {{--@foreach($qualificationList->where('fkemployeeId',$emp['employeeId']) as $qualification)--}}
                    {{--Certification:{{$qualification->certificateName}}<br>--}}
                    {{--Institution:{{$qualification->institutionName}}<br>--}}
                    {{--Start:{{$qualification->startDate}}--}}
                    {{--End:{{$qualification->endDate}}--}}
                    {{--<br>--}}
                    {{--Result: {{$qualification->result}}--}}


                 {{--@endforeach--}}

            {{--</td>--}}
            {{--<td colspan="2" height="600" style="text-align: center;vertical-align: middle;">--}}
                {{--@foreach($trainingList->where('fkemployeeId',$emp['employeeId']) as $training)--}}

                    {{--{{$training->trainingName}}<br>--}}
                    {{--Venue:{{$training->vanue}}<br>--}}
                    {{--Start:{{$training->startDate}}--}}
                    {{--End:{{$training->endDate}}--}}
                    {{--<br>--}}

                {{--@endforeach--}}

            {{--</td>--}}
            <td colspan="3" height="600" style="text-align: left;vertical-align: top;">
                <?php $tJEY=0;$tJEM=0; $totalexpyr = 0;$totalexpDay = 0;$tJED=0; $totalexpmonth = 0;$subDay=0 ?>
                @foreach($jobExperienceList->where('fkemployeeId',$emp['employeeId']) as $job)
                    Position: {{$job->degisnation}}<br>
                    Organization name: {{$job->organization}}<br>
                    {{$job->address}}<br>

                    years:
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

<?php
//                        $result = array($job->expDay);
//
//
//                        $sub_struct_month = ($result[0] / 30) ;
//                        $sub_struct_month = floor($sub_struct_month);
//                        $sub_struct_months = floor($sub_struct_month%12);
//                        $sub_struct_year = floor($sub_struct_month / 12) ;
//                        $sub_struct_days = floor($result[0] % 30); // the rest of days
//                        echo $sub_struct = $sub_struct_year."years ".$sub_struct_months."months ".$sub_struct_days."days";
//
//
                        ?>

                    <br>
                    {{--Start: {{$job->startDate}}--}}
                    {{--End: @if($job->startDate!=null && $job->endDate==null) Running @else {{$job->endDate}}@endif--}}
                    Served From /To: {{$job->startDate}} - @if($job->startDate!=null && $job->endDate==null) Running @else {{$job->endDate}}@endif<br>
                    <br>

                        <?php

                        $totalexpDay = $totalexpDay + $subDay ;

                        ?>
                    <br>

                @endforeach


                    <?php
                    $now = \Carbon\Carbon::now();
                    $nextDate=\Carbon\Carbon::now()->addDays($totalexpDay);
                    $diff=$now->diff($nextDate)->format('%y years, %m months and %d days');

//                    $result = array($totalexpDay);
//
//
//                    $sub_struct_month = ($result[0] / 30) ;
//                    $sub_struct_month = floor($sub_struct_month);
//
//                    $sub_struct_year = floor($sub_struct_month / 12) ;
//
//                    $sub_struct_months = floor($sub_struct_month % 12);
//
//                    $sub_struct_days = floor($result[0] % 30); // the rest of days
//
//                    $sub_struct = $sub_struct_year."years ".$sub_struct_months."months ".$sub_struct_days."days";


                    ?>
                    <br>
                    Total job experience : {{$diff}}

            </td>
            @if($withoutsalary != 'true')
            <td  height="600" style="text-align: left;vertical-align: middle;">
                @foreach($salaryList->where('fkemployeeId',$emp['employeeId']) as $salary)
                    Current:{{$salary->currentSalary}}<br>
                    Expected:{{$salary->expectedSalary}}
                @endforeach

            </td>
            @endif
            <td height="600" style="text-align: center;vertical-align: middle;">

                {{--@if($emp['nationalId'])--}}
                    {{--Yes--}}
                {{--@else--}}
                    {{--No--}}
                {{--@endif--}}
                    @if(!is_null($emp['nationalId']))

                    National ID No. :{{ $emp['nationalId'] }}

                    @elseif(!is_null($emp['birthID']))

                    Birth Identification No. :{{ $emp['birthID'] }}

                    @endif

            </td>
            <td height="600" style="text-align: center;vertical-align: middle;">

                @if($emp['image'] && $emp['sign'])
                    Yes
                @else
                    No
                @endif
            </td>
            <td height="600" style="text-align: center;vertical-align: middle;">
                @if($refreeList->where('fkemployeeId',$emp['employeeId'])->count()>1)
                    Yes
                @else
                    No
                @endif
                {{--@foreach($refreeList->where('fkemployeeId',$emp['employeeId']) as $ref)--}}
                    {{--{{$ref->firstName}} {{$ref->lastName}}<br>--}}
                    {{--{{$ref->presentposition}}<br>--}}
                    {{--{{$ref->organization}}--}}
                {{--@endforeach--}}

            </td>
            {{--<td height="600" style="text-align: center;vertical-align: middle;">--}}
                {{--@foreach($relativeList->where('fkemployeeId',$emp['employeeId']) as $relative)--}}
                    {{--{{$relative->firstName}} {{$relative->lastName}}<br>--}}
                    {{--{{$relative->degisnation}}<br>--}}
                   {{--Relation:{{$relative->relation}}<br>--}}
                 {{--@endforeach--}}

            {{--</td>--}}
            <td colspan="2" height="600" style="text-align: center;vertical-align: middle;"></td>


        </tr>



    @endforeach

    </tbody>

</table>

</html>