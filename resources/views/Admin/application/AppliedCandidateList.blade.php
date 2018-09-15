
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
        <th>Professional Qualification</th>
        <th>Training</th>
        <th>Job Experiences/ Employment History </th>
        <th>Salary</th>
        <th>National ID Card</th>

    </tr>
    </thead>
    @php $sl=1;
    @endphp
    @foreach($AppliedCandidateList as $list)
        <?php
        $eduList=array();
        $qList=array();
        $trainList=array();

    
        ?>
        @foreach($educationList as $education)
            @if($education['fkemployeeId'] == $list['employeeId'])
                <?php

                    array_push($eduList,$education);
                    ?>
            @endif
         @endforeach
        @foreach($qualificationList as $q)
                @if($q['fkemployeeId'] == $list['employeeId'])
                    <?php
                    array_push($qList,$q);
                    ?>
                @endif
         @endforeach

        @foreach($trainingList as $tList)
                @if($tList['fkemployeeId'] == $list['employeeId'])
                    <?php
                    array_push($trainList,$tList);
                    ?>
                @endif
        @endforeach
    <tbody>


        <tr>
            <td rowspan="14" style="text-align: center" valign="middle">1</td>
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
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td valign="middle" rowspan="14">
                {{$list['nationalId']}}

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
                    @if($i==0 && count($eduList)>0)
                        {{$eduList[0]['educationLevelName']}}<br>
                        {{$eduList[0]['institutionName']}}<br>
                        Result:{{$eduList[0]['result']}}<br>
                        Major:{{$eduList[0]['educationMajorName']}}


                    @endif
                    @if($i==2 && count($eduList)>1)
                            {{$eduList[1]['institutionName']}}<br>
                            {{$eduList[1]['institutionName']}}<br>
                            Result:{{$eduList[1]['result']}}<br>
                            Major:{{$eduList[1]['educationMajorName']}}

                        @endif

                    @if($i==4 && count($eduList)>2)
                            {{$eduList[2]['institutionName']}}<br>
                            {{$eduList[2]['institutionName']}}<br>
                            Result:{{$eduList[2]['result']}}<br>
                            Major:{{$eduList[2]['educationMajorName']}}

                        @endif
                    @if($i==5) @endif
                    @if($i==6 && count($eduList)>3)
                            {{$eduList[3]['institutionName']}}<br>
                            {{$eduList[3]['institutionName']}}<br>
                            Result:{{$eduList[3]['result']}}<br>
                            Major:{{$eduList[3]['educationMajorName']}}


                        @endif
                    @if($i==7) @endif
                    @if($i==8 && count($eduList)>4)
                            {{$eduList[4]['institutionName']}}<br>
                            {{$eduList[4]['institutionName']}}<br>
                            Result:{{$eduList[4]['result']}}<br>
                            Major:{{$eduList[4]['educationMajorName']}}
                        @endif
                    @if($i==9) @endif
                    @if($i==10 && count($eduList)>5)
                            {{$eduList[5]['institutionName']}}<br>
                            {{$eduList[5]['institutionName']}}<br>
                            Result:{{$eduList[5]['result']}}<br>
                            Major:{{$eduList[5]['educationMajorName']}}

                        @endif
                    @if($i==11) @endif
                    @if($i==12 && count($eduList)>6)
                            {{$eduList[6]['institutionName']}}<br>
                            {{$eduList[6]['institutionName']}}<br>
                            Result:{{$eduList[6]['result']}}<br>
                            Major:{{$eduList[6]['educationMajorName']}}
                        @endif

                    @if($i==14 && count($eduList)>7)
                            {{$eduList[7]['institutionName']}}<br>
                            {{$eduList[7]['institutionName']}}<br>
                            Result:{{$eduList[7]['result']}}<br>
                            Major:{{$eduList[7]['educationMajorName']}}
                        @endif
                </td>


                <td></td>
                <td> </td>
                <td></td>
                <td>

                    @if($i==0 && count($qList) >0)
                        {{$qList[0]['certificateName']}}<br>
                        {{$qList[0]['institutionName']}}<br>
                        {{$qList[0]['startDate']}}<br>
                        {{$qList[0]['endDate']}}<br>


                    @endif

                    @if($i==2 && count($qList) >1)
                        {{$qList[1]['certificateName']}}<br>
                        {{$qList[1]['institutionName']}}<br>
                        {{$qList[1]['startDate']}}<br>
                        {{$qList[1]['endDate']}}<br>
                    @endif

                    @if($i==4 && count($qList) >2)
                        {{$qList[2]['certificateName']}}<br>
                        {{$qList[2]['institutionName']}}<br>
                        {{$qList[2]['startDate']}}<br>
                        {{$qList[2]['endDate']}}<br>

                    @endif

                    @if($i==6 && count($qList) >3)
                        {{$qList[3]['certificateName']}}<br>
                        {{$qList[3]['institutionName']}}<br>
                        {{$qList[3]['startDate']}}<br>
                        {{$qList[3]['endDate']}}<br>

                    @endif
                    @if($i==8 && count($qList) >4)
                        {{$qList[4]['certificateName']}}<br>
                        {{$qList[4]['institutionName']}}<br>
                        {{$qList[4]['startDate']}}<br>
                        {{$qList[4]['endDate']}}<br>

                    @endif

                    @if($i==10 && count($qList) >5)
                        {{$qList[5]['certificateName']}}<br>
                        {{$qList[5]['institutionName']}}<br>
                        {{$qList[5]['startDate']}}<br>
                        {{$qList[5]['endDate']}}<br>
                    @endif

                    @if($i==12 && count($qList) >6)
                        {{$qList[6]['certificateName']}}<br>
                        {{$qList[6]['institutionName']}}<br>
                        {{$qList[6]['startDate']}}<br>
                        {{$qList[6]['endDate']}}<br>
                    @endif


                </td>
                <td>

                    @if($i==0 && count($trainList) >0)
                        {{$trainList[0]['trainingName']}}<br>
                        {{$trainList[0]['vanue']}}<br>
                        {{$trainList[0]['startDate']}}<br>
                        {{$trainList[0]['endDate']}}<br>
                        
                    @endif

                    @if($i==2 && count($trainList) >1)
                        {{$trainList[1]['trainingName']}}<br>
                        {{$trainList[1]['vanue']}}<br>
                        {{$trainList[1]['startDate']}}<br>
                        {{$trainList[1]['endDate']}}<br>
                    @endif

                    @if($i==4 && count($trainList) >2)
                        {{$trainList[2]['trainingName']}}<br>
                        {{$trainList[2]['vanue']}}<br>
                        {{$trainList[2]['startDate']}}<br>
                        {{$trainList[2]['endDate']}}<br>

                    @endif

                    @if($i==6 && count($trainList) >3)
                        {{$trainList[3]['trainingName']}}<br>
                        {{$trainList[3]['vanue']}}<br>
                        {{$trainList[3]['startDate']}}<br>
                        {{$trainList[3]['endDate']}}<br>

                    @endif
                    @if($i==8 && count($trainList) >4)
                        {{$trainList[4]['trainingName']}}<br>
                        {{$trainList[4]['vanue']}}<br>
                        {{$trainList[4]['startDate']}}<br>
                        {{$trainList[4]['endDate']}}<br>

                    @endif

                    @if($i==10 && count($trainList) >5)
                        {{$trainList[5]['trainingName']}}<br>
                        {{$trainList[5]['vanue']}}<br>
                        {{$trainList[5]['startDate']}}<br>
                        {{$trainList[5]['endDate']}}<br>
                    @endif

                    @if($i==12 && count($trainList) >6)
                        {{$trainList[6]['trainingName']}}<br>
                        {{$trainList[6]['vanue']}}<br>
                        {{$trainList[6]['startDate']}}<br>
                        {{$trainList[6]['endDate']}}<br>
                    @endif


                </td>
                <td>Job experience</td>
                <td>
                    @if($i==0) Current Salary @endif
                    @if($i==1) Expected Salary @endif
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
