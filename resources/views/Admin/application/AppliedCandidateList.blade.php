
<html>

<style>

    table, th, td {
        border: 2px solid ;
    }

</style>

<table class="table">


    <tr>
        <td colspan="18"><span style="text-align: center"><h4>{{strtoupper($jobTitle['title'])}}</h4></span></td>
    </tr>

    <tr>
        <td colspan="7"></td>
        <td colspan="3"><span style="text-align: center"><h4>Last date: {{$jobTitle['deadline']}}</h4> </span></td>
        <td colspan="8"> </td>
    </tr>

</table>




<table class="table">
    <thead>

    <tr >
        <th>Sl No.</th>
        <th>NAME</th>
        <th>Gender</th>
        <th>Disability</th>
        <th>Ethnicity</th>
        <th >  AGE  </th>
        <th colspan="2">Educational Qualification and name of Institution</th>
        <th colspan="2">Professional Qualification</th>
        <th colspan="2">Training</th>
        <th colspan="2">Job Experiences/ Employment History </th>
        @if($withoutsalary != 'true')
        <th colspan="2">Salary</th>
        @endif
        <th>National ID Card</th>
        <th>Photo</th>
        <th>Name of  two Referees</th>
        <th>Relative in CB</th>
        <th colspan="2">Remarks</th>

    </tr>
    </thead>
    <tbody>
    @foreach($AppliedCandidateList as $key=>$emp)
        <tr>
            <td height="250" style="text-align: center;vertical-align: middle;">
             {{$key+1}}


            </td>
            <td height="250" style="text-align: center;vertical-align: middle;">
                {{$emp['firstName']}}   {{$emp['lastName']}}

            </td>
            <td height="250" style="text-align: center;vertical-align: middle;">
                {{$emp['gender']}}
            </td>
            <td height="250" style="text-align: center;vertical-align: middle;">
                {{$emp['disability']}}
            </td>
            <td height="250" style="text-align: center;vertical-align: middle;">
                {{$ethnicity->where('ethnicityId',$emp['ethnicityId'])->first()->ethnicityName}}
            </td>
            <td height="250" style="text-align: center;vertical-align: middle;">

                {{$emp['AgeYear']}}.{{substr($emp['AgeMonth'],0,1)}}yrs
            </td>
            <td colspan="2" height="250" style="text-align: center;vertical-align: middle;">

                @foreach($educationList->where('fkemployeeId',$emp['employeeId']) as $edu)
                    {{$edu->institutionName}}
                        <br>
                    {{$edu->boardName}}
                <br>
                Level:{{$edu->educationLevelName}}  Result:{{$edu->result}}
                    <br>

                @endforeach
            </td>

            <td colspan="2" height="250" style="text-align: center;vertical-align: middle;">
                @foreach($qualificationList->where('fkemployeeId',$emp['employeeId']) as $qualification)
                    Certification:{{$qualification->certificateName}}<br>
                    Institution:{{$qualification->institutionName}}<br>
                    Start:{{$qualification->startDate}}
                    End:{{$qualification->endDate}}
                    <br>
                    Result: {{$qualification->result}}


                 @endforeach

            </td>
            <td colspan="2" height="250" style="text-align: center;vertical-align: middle;">
                @foreach($trainingList->where('fkemployeeId',$emp['employeeId']) as $training)

                    {{$training->trainingName}}<br>
                    Venue:{{$training->vanue}}<br>
                    Start:{{$training->startDate}}
                    End:{{$training->endDate}}
                    <br>

                @endforeach

            </td>
            <td colspan="2" height="250" style="text-align: center;vertical-align: middle;">
                @foreach($jobExperienceList->where('fkemployeeId',$emp['employeeId']) as $job)
                    {{$job->degisnation}}<br>
                    {{$job->organization}}<br>
                    {{$job->address}}<br>
                    Start:{{$job->startDate}}
                    End:{{$job->endDate}}
                    <br>



                @endforeach

            </td>
            @if($withoutsalary != 'true')
            <td colspan="2" height="250" style="text-align: center;vertical-align: middle;">
                @foreach($salaryList->where('fkemployeeId',$emp['employeeId']) as $salary)
                    Current:{{$salary->currentSalary}}<br>
                    Expected:{{$salary->expectedSalary}}
                @endforeach

            </td>
            @endif
            <td height="250" style="text-align: center;vertical-align: middle;">
                    {{$emp['nationalId']}}
            </td>
            <td height="250" style="text-align: center;vertical-align: middle;">
                {{$emp['image']}}
            </td>
            <td height="250" style="text-align: center;vertical-align: middle;">
                @foreach($refreeList->where('fkemployeeId',$emp['employeeId']) as $ref)
                    {{$ref->firstName}} {{$ref->lastName}}<br>
                    {{$ref->presentposition}}<br>
                    {{$ref->organization}}
                @endforeach

            </td>
            <td height="250" style="text-align: center;vertical-align: middle;">
                @foreach($relativeList->where('fkemployeeId',$emp['employeeId']) as $relative)
                    {{$relative->firstName}} {{$relative->lastName}}<br>
                    {{$relative->degisnation}}<br>
                   Relation:{{$relative->relation}}<br>
                 @endforeach

            </td>
            <td colspan="2" height="250" style="text-align: center;vertical-align: middle;"></td>


        </tr>

    @endforeach

    </tbody>

</table>

</html>