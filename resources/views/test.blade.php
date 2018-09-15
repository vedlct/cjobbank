<html>
<head>
<style>
    table{
        border: solid black 1px;
    }
    th{
        border: solid black 1px;
    }
    td{
        border: solid black 1px;
    }
</style>
</head>
<body>

<table class="table">
    <thead>
    <tr>

        <th>Sl No.</th>
        <th>NAME</th>
        <th>Gender</th>
        <th>Disability</th>
        <th>Ethnicity</th>
        <th>AGE </th>
        <th>Educational Qualification and name of Institution</th>

    </tr>

    </thead>


    <tbody>
    @php $sl=1;
    @endphp
    @foreach($AppliedCandidateList as $list)
        <tr>
            <td valign="middle" rowspan="16">
                <span style="text-align: center">{{$sl}}</span>
            </td>
            <td>



                <b>{{$list['firstName']." ".$list['lastName']}}</b><hr>
                Cell-{{$list['personalMobile']}}, {{$list['homeNumber']}}<hr>
                Skype adress: {{$list['skype']}}<hr>
                Email-{{$list['email']}}<hr>
                Alternative Mail:{{$list['alternativeEmail']}}<hr><hr>
                <b>Present Address :</b><hr>
                {{$list['presentAddress']}}<hr>
                <b>Parmanent Address :</b><hr>
                {{$list['parmanentAddress']}}



            </td>
            <td valign="middle" rowspan="16"><span style="text-align: center">{{$list['disability']}}</span></td>
            <td valign="middle" rowspan="16"><span style="text-align: center">{{$list['ethnicityId']}}</span></td>
            <td valign="middle" rowspan="16">
                {{$list['AgeYear']}}.{{$list['AgeMonth']}}yrs
            </td>
            <td>

                @foreach($educationList as $edu)

                    {{$edu['educationLevelName']}}

                    @if($edu['fkMajorId'] != null)({{$edu['educationMajorName']}})@endif ={{$edu['result']}}<hr>

                    Name Of Institution:{{$edu['institutionName']}}<hr>

                @endforeach

            </td>
        </tr>


        @php $sl++;
        @endphp
    @endforeach


    </tbody>



</table>

</body>
</html>