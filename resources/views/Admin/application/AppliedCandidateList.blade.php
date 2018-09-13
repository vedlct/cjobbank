
<html>

<style>

</style>

<table>
    <tr>
        <td colspan="18"><span style="text-align: center"><h4>LIST OF CANDIDATES FOR THE POSITION OF  JUNIOR HUMAN RESOURCES (HR) OFFICER FOR CARITAS CENTRAL OFFICE</h4></span></td>
    </tr>

    <tr>
        <td colspan="7"></td>
        <td colspan="3"><span style="text-align: center"><h4>Last date: 10/06/2018</h4> </span></td>
        <td colspan="8"> </td>
    </tr>

</table>

<table style="border: solid black 2px" class="table">
    {{--<thead>--}}
    {{--<tr>--}}
        {{--<th>Sl No.</th>--}}
        {{--<th>NAME</th>--}}
        {{--<th>Gender</th>--}}
        {{--<th>Disability</th>--}}
        {{--<th>Ethnicity</th>--}}
        {{--<th>AGE </th>--}}
        {{--<th>Educational Qualification and name of Institution</th>--}}
        {{--<th>Professional Qualification</th>--}}
        {{--<th>Training</th>--}}
        {{--<th>Job Experiences/ Employment History</th>--}}
        {{--<th>Salary</th>--}}
        {{--<th>National ID Card</th>--}}
        {{--<th>Photo(2)</th>--}}
        {{--<th>Relative in CB</th>--}}
        {{--<th>Name of  two Referees (2)</th>--}}
        {{--<th>Remarks</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    <tbody>
    @php $sl=1;
     @endphp
    @foreach($AppliedCandidateList as $list)
        <tr>


            <td  >
                <table style="border: solid black 2px" >
                    <thead>
                    <tr><th>Sl No.</th></tr>
                    </thead>
                    <tbody>
                    <td valign="middle" rowspan="16"><span style="text-align: center">{{$sl}}</span></td>
                    </tbody>
                </table>
            </td>

            <td>
                <table style="border: solid black 2px" >

                    <thead>
                    <tr><th>NAME</th></tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td >{{$list['firstName']." ".$list['lastName']}}</td>
                    </tr>
                    <tr><td></td></tr>
                    <tr><td>Cell-{{$list['personalMobile']}}, {{$list['homeNumber']}}</td></tr>
                    <tr><td></td></tr>
                    <tr>
                        <td>Skype adress: {{$list['skype']}}</td>
                    </tr>
                    <tr>
                        <td>
                            Email-{{$list['email']}}
                            Alternative Mail:{{$list['alternativeEmail']}}
                        </td>
                    </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>

                <tr>
                    <td>
                        <b>Present Address: </b>
                    </td>
                </tr>

                <tr>
                    <td>
                        {{$list['presentAddress']}}
                    </td>
                </tr>
                <tr><td></td></tr>

                <tr>
                    <td>
                        <b>Parmanent Address :</b>
                    </td>
                </tr>

                <tr>
                    <td>
                        {{$list['parmanentAddress']}}
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr ><td></td></tr>
                <tr ><td></td></tr>
                    </tbody>
                </table>

            </td>

            <td valign="middle" rowspan="16">

                <span style="text-align: center">

                @foreach(GENDER as $key=>$value)
                    @if($value==$list['gender']) {{$key}} @endif
                @endforeach
                </span>

            </td>

            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
</html>
