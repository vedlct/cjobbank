<html>

<style>
    td{
        border: solid black 2px;
    }
</style>

<table class="table">


    <tr>
        <td colspan="18"><span style="text-align: center"><h4>LIST OF CANDIDATES FOR THE POSITION OF  JUNIOR HUMAN RESOURCES (HR) OFFICER FOR CARITAS CENTRAL OFFICE</h4></span></td>
    </tr>

    <tr>
        <td colspan="7"></td>
        <td colspan="3"><span style="text-align: center"><h4>Last date: 10/06/2018</h4> </span></td>
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
        <th>AGE </th>
        <th>Educational Qualification and name of Institution</th>
        {{--<th>Professional Qualification</th>--}}
        {{--<th>Training</th>--}}
        {{--<th>Job Experiences/ Employment History</th>--}}
        {{--<th>Salary</th>--}}
        {{--<th>National ID Card</th>--}}
        {{--<th>Photo(2)</th>--}}
        {{--<th>Relative in CB</th>--}}
        {{--<th>Name of  two Referees (2)</th>--}}
        {{--<th>Remarks</th>--}}
    </tr>
    </thead>
    @php $sl=1;
    @endphp
    @foreach($AppliedCandidateList as $list)
        <tbody>


        <tr>
            <td valign="middle" rowspan="14">{{$sl}}</td>
            <td>
                <b>{{$list['firstName']." ".$list['lastName']}}</b>
            </td>

            <td valign="middle" rowspan="14">
                            <span style="text-align: center">

                                @foreach(GENDER as $key=>$value)
                                    @if($value==$list['gender']) {{$key}} @endif
                                @endforeach
                            </span>
            </td>

            <td valign="middle" rowspan="14">

                <span style="text-align: center">

                    @foreach(DISABILITY as $key=>$value)
                        @if($value==$list['disability']) {{$key}} @endif
                    @endforeach

                </span>

            </td>
            <td valign="middle" rowspan="14">

                <span style="text-align: center">

                    @foreach($ethnicity as $eth)
                        @if($eth->ethnicityId==$list['ethnicityId']) {{$eth->ethnicityName}} @endif
                    @endforeach

                </span>

            </td>
            <td valign="middle" rowspan="14">
                {{$list['AgeYear']}}.{{$list['AgeMonth']}}yrs
            </td>
            <td valign="middle" rowspan="14">
                <table>
                @foreach($educationList as $edu)

                    {{$edu['educationLevelName']}}
                    @if($edu['fkMajorId'] != null)({{$edu['educationMajorName']}})@endif ={{$edu['result']}}<br>

                    Name Of Institution:{{$edu['institutionName']}}<br>

                @endforeach
                </table>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <td>Cell-{{$list['personalMobile']}}, {{$list['homeNumber']}}</td>
        </tr>
        <tr><td></td></tr>

        <tr><td>Skype adress: {{$list['skype']}}</td></tr>

        <tr><td>
                Email-{{$list['email']}}
            </td>
        </tr>
        <tr><td>Alternative Mail:{{$list['alternativeEmail']}}</td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td><b>Present Address :</b></td></tr>
        <tr><td>{{$list['presentAddress']}}</td></tr>
        <tr><td></td></tr>
        <tr><td>Parmanent Address :</td></tr>
        <tr><td>{{$list['parmanentAddress']}}</td></tr>



        </tbody>
        @php $sl++;
        @endphp
    @endforeach
</table>

</html>