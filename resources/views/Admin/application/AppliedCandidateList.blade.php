
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

    </tr>
    </thead>
    @php $sl=1;
    @endphp
    @foreach($AppliedCandidateList as $list)
    <tbody>


        <tr>
            <td rowspan="14" style="text-align: center">1</td>
            <td><b>{{$list['firstName']." ".$list['lastName']}}</b></td>

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
            <td>
                {{--{{$list['educationLevelName']}}--}}
                {{--@if($list['fkMajorId'] != null)({{$list['educationMajorName']}})@endif--}}
                {{--={{$list['result']}}--}}
            </td>
        </tr>


        @for($i=0 ;$i<14;$i++)
            <tr>

                <td>
                    @if($i==0) @endif
                    @if($i==1) Cell-{{$list['personalMobile']}}, {{$list['homeNumber']}}  @endif
                    @if($i==2) @endif
                    @if($i==3) Skype address: {{$list['skype']}} @endif
                    @if($i==4)  Email-{{$list['email']}} @endif
                    @if($i==5)Alternative Mail:{{$list['alternativeEmail']}} @endif
                    @if($i==6) @endif
                    @if($i==7) @endif
                    @if($i==8) Present Address : @endif
                    @if($i==9){{$list['presentAddress']}}  @endif
                    @if($i==10) @endif
                    @if($i==11) Parmanent Address : @endif
                    @if($i==12){{$list['parmanentAddress']}} @endif
                    @if($i==13) @endif


                </td>
                <td>
                    @if($i==0) @endif
                    @if($i==1)  @endif
                    @if($i==2) @endif
                    @if($i==3) @endif
                    @if($i==4) @endif
                    @if($i==5) @endif
                    @if($i==6) @endif
                    @if($i==7) @endif
                    @if($i==8) @endif
                    @if($i==9) @endif
                    @if($i==10) @endif
                    @if($i==11) @endif
                    @if($i==12) @endif
                    @if($i==13) @endif
                </td>
                <td>
                    @if($i==0) @endif
                    @if($i==1)  @endif
                    @if($i==2) @endif
                    @if($i==3) @endif
                    @if($i==4) @endif
                    @if($i==5) @endif
                    @if($i==6) @endif
                    @if($i==7) @endif
                    @if($i==8) @endif
                    @if($i==9) @endif
                    @if($i==10) @endif
                    @if($i==11) @endif
                    @if($i==12) @endif
                    @if($i==13) @endif
                </td>
                <td>
                    @if($i==0 && count($educationList)>0)
                        {{$educationList[0]['educationLevelName']}}
                        {{$educationList[0]['institutionName']}}


                    @endif
                    @if($i==1 && count($educationList)>1) {{$educationList[1]['institutionName']}} @endif
                    @if($i==2)  @endif
                    @if($i==3) Name Of Institution: @endif
                    @if($i==4) Name Of Institution: @endif
                    @if($i==5) Name Of Institution: @endif
                    @if($i==6) @endif
                    @if($i==7) @endif
                    @if($i==8) Name Of Institution: @endif
                    @if($i==9) Name Of Institution: @endif
                    @if($i==10) @endif
                    @if($i==11) Name Of Institution: @endif
                    @if($i==12) Name Of Institution: @endif
                    @if($i==13) @endif
                </td>




            </tr>


        @endfor


        {{--<tr>--}}

            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}




        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>Cell-{{$list['personalMobile']}}, {{$list['homeNumber']}}</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>Name Of Institution:</td>--}}

        {{--</tr>--}}

        {{--<tr>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
        {{--</tr>--}}

        {{--<tr>--}}
            {{--<td>Skype address: {{$list['skype']}}</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>Name Of Institution:</td>--}}

        {{--</tr>--}}

        {{--<tr>--}}
            {{--<td>--}}
                {{--Email-{{$list['email']}}--}}
            {{--</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>Name Of Institution:</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>Alternative Mail:{{$list['alternativeEmail']}}</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>Name Of Institution:</td>--}}

        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}

        {{--</tr>--}}

        {{--<tr>--}}
            {{--<td><b>Present Address :</b></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>Name Of Institution:</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>{{$list['presentAddress']}}</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>Name Of Institution:</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>Parmanent Address :</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>Name Of Institution:</td>--}}

        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>{{$list['parmanentAddress']}}</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>Name Of Institution:</td>--}}

        {{--</tr>--}}








            {{--<td rowspan="16">--}}

                   {{--<b>{{$list['firstName']." ".$list['lastName']}}</b>--}}
                {{--<br>--}}

                {{----}}


            {{--</td>--}}


                        {{--<td>Skype adress: {{$list['skype']}}</td>--}}


                        {{--<td>--}}
                            {{--Email-{{$list['email']}}--}}
                            {{--Alternative Mail:{{$list['alternativeEmail']}}--}}
                        {{--</td>--}}

                {{--<td></td>--}}
                {{--<td></td>--}}


                    {{--<td>--}}
                        {{--<b>Present Address: </b>--}}
                    {{--</td>--}}



                    {{--<td>--}}
                        {{--{{$list['presentAddress']}}--}}
                    {{--</td>--}}

                {{--<td></td>--}}


                    {{--<td>--}}
                        {{--<b>Parmanent Address :</b>--}}
                    {{--</td>--}}



                    {{--<td>--}}
                        {{--{{$list['parmanentAddress']}}--}}
                    {{--</td>--}}

                    {{--<td></td>--}}
                    {{--<td></td>--}}




            {{--<td style="border: solid black 2px" >--}}








            {{--</td>--}}

            {{--<td valign="middle" rowspan="16"><span style="text-align: center">{{$list['disability']}}</span></td>--}}
            {{--<td valign="middle" rowspan="16"><span style="text-align: center">{{$list['ethnicityId']}}</span></td>--}}

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
            {{--<td></td>--}}



    </tbody>
        @php $sl++;
        @endphp
    @endforeach
</table>

</html>
