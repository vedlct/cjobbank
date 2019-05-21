
<html>

{{--<style>--}}

    {{----}}

{{--</style>--}}

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
        <th style="text-align: center">National ID Card</th>
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

                @foreach($educationList->where('fkemployeeId',$emp['employeeId']) as $edu)
                    {{$edu->institutionName}}
                        <br>
                    {{$edu->boardName}}
                <br>
                Level:{{$edu->educationLevelName}}  Result:{{$edu->result}}
                    <br>

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
                <?php $tJEY=0;$tJEM=0; $totalexpyr = 0; $totalexpmonth = 0 ?>
                @foreach($jobExperienceList->where('fkemployeeId',$emp['employeeId']) as $job)
                    Designation:<br>{{$job->degisnation}}<br>
                    Name of Organization:<br>{{$job->organization}}<br>
                    {{$job->address}}<br>

                    years: @if ($job->expYear >0){{$tJEY=$job->expYear}}.{{floor((((int)$job->expMonth)/(12*$job->expYear)))}}
                    @else
                        {{$job->expYear}}.{{floor($job->expMonth)}}
                    @endif
                    <br>
                    Start:{{$job->startDate}}
                    End:{{$job->endDate}}
                    <br>

                    <?php
                        $totalexpyr = $totalexpyr + $tJEY=$job->expYear ;
                        if($job->expYear >0){
                            $totalexpmonth =  $totalexpmonth +(floor(((int)$job->expMonth)-(12*$job->expYear))) ;
                        }else{
                            $totalexpmonth =  $totalexpmonth +(floor($job->expMonth)) ;
                        }
                    ?>
                @endforeach

                Total job experience : {{$totalexpyr + floor($totalexpmonth / 12)." years"}} {{round($totalexpmonth % 12)." months"}}

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

                @if($emp['nationalId'])
                    Yes
                @else
                    No
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