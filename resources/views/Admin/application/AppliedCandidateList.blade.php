
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
        <th>Photo</th>
        <th>Name of  two Referees (2)</th>
        <th>Relative in CB</th>
        <th>Remarks</th>

    </tr>
    </thead>
    @php
        $sl=1;
    @endphp
    @foreach($AppliedCandidateList as $list)
        <?php
        $eduList=array();
        $qList=array();
        $trainList=array();
        $jobList=array();
        $salList=array();
        $refList=array();
        $relList=array();

    
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

        @foreach($jobExperienceList as $jList)
                @if($jList['fkemployeeId'] == $list['employeeId'])
                    <?php
                    array_push($jobList,$jList);
                    ?>
                @endif
        @endforeach

        @foreach($salaryList as $sList)
                @if($sList['fkemployeeId'] == $list['employeeId'])
                    <?php
                    array_push($salList,$sList);
                    ?>
                @endif
        @endforeach

        @foreach($refreeList as $rList)
                @if($rList['fkemployeeId'] == $list['employeeId'])
                    <?php
                    array_push($refList,$rList);
                    ?>
                @endif
        @endforeach
        @foreach($relativeList as $reList)
                @if($reList['fkemployeeId'] == $list['employeeId'])
                    <?php
                    array_push($relList,$reList);
                    ?>
                @endif
        @endforeach


    <tbody>


        <tr>
            <td rowspan="14" style="text-align: center" valign="middle">{{$sl}}</td>
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
            <td valign="middle" rowspan="14" style="text-align: center">
                {{$list['AgeYear'].".".$list['AgeMonth']}}yrs
            </td>
            <td>

            </td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td valign="middle" rowspan="14" style="text-align: center">
                {{$list['nationalId']}}

            </td>
            <td valign="middle" align="center" rowspan="14" style="text-align: center">
                @if($list['image'])
                    Yes
                @else
                    No
                @endif

            </td>

            <td></td>
            <td></td>

            <td valign="middle" align="center" rowspan="14" style="text-align: center">

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

                </td>
                {{--Education--}}
                <td>
                    @if($i==0 && count($eduList)>0)
                        {{$eduList[0]['educationLevelName']}}<br>&nbsp;&nbsp;
                        {{$eduList[0]['institutionName']}}<br>&nbsp;&nbsp;
                        Result:{{$eduList[0]['result']}}<br>&nbsp;&nbsp;
                        Major:{{$eduList[0]['educationMajorName']}}


                    @endif
                    @if($i==2 && count($eduList)>1)
                            {{$eduList[1]['institutionName']}}<br>&nbsp;&nbsp;
                            {{$eduList[1]['institutionName']}}<br>&nbsp;&nbsp;
                            Result:{{$eduList[1]['result']}}<br>&nbsp;&nbsp;
                            Major:{{$eduList[1]['educationMajorName']}}

                        @endif

                    @if($i==4 && count($eduList)>2)
                            {{$eduList[2]['institutionName']}}<br>&nbsp;&nbsp;
                            {{$eduList[2]['institutionName']}}<br>&nbsp;&nbsp;
                            Result:{{$eduList[2]['result']}}<br>&nbsp;&nbsp;
                            Major:{{$eduList[2]['educationMajorName']}}

                        @endif
                    @if($i==5) @endif
                    @if($i==6 && count($eduList)>3)
                            {{$eduList[3]['institutionName']}}<br>&nbsp;&nbsp;
                            {{$eduList[3]['institutionName']}}<br>&nbsp;&nbsp;
                            Result:{{$eduList[3]['result']}}<br>&nbsp;&nbsp;
                            Major:{{$eduList[3]['educationMajorName']}}


                        @endif
                    @if($i==7) @endif
                    @if($i==8 && count($eduList)>4)
                            {{$eduList[4]['institutionName']}}<br>&nbsp;&nbsp;
                            {{$eduList[4]['institutionName']}}<br>&nbsp;&nbsp;
                            Result:{{$eduList[4]['result']}}<br>&nbsp;&nbsp;
                            Major:{{$eduList[4]['educationMajorName']}}
                        @endif
                    @if($i==9) @endif
                    @if($i==10 && count($eduList)>5)
                            {{$eduList[5]['institutionName']}}<br>&nbsp;&nbsp;
                            {{$eduList[5]['institutionName']}}<br>&nbsp;&nbsp;
                            Result:{{$eduList[5]['result']}}<br>&nbsp;&nbsp;
                            Major:{{$eduList[5]['educationMajorName']}}

                        @endif
                    @if($i==11) @endif
                    @if($i==12 && count($eduList)>6)
                            {{$eduList[6]['institutionName']}}<br>&nbsp;&nbsp;
                            {{$eduList[6]['institutionName']}}<br>&nbsp;&nbsp;
                            Result:{{$eduList[6]['result']}}<br>&nbsp;&nbsp;
                            Major:{{$eduList[6]['educationMajorName']}}
                        @endif

                    @if($i==14 && count($eduList)>7)
                            {{$eduList[7]['institutionName']}}<br>&nbsp;&nbsp;
                            {{$eduList[7]['institutionName']}}<br>&nbsp;&nbsp;
                            Result:{{$eduList[7]['result']}}<br>&nbsp;&nbsp;
                            Major:{{$eduList[7]['educationMajorName']}}
                        @endif
                </td>


                <td></td>
                <td> </td>
                <td></td>
                {{--Qualifications--}}
                <td>

                    @if($i==0 && count($qList) >0)
                        {{$qList[0]['certificateName']}}<br>&nbsp;&nbsp;
                        {{$qList[0]['institutionName']}}<br>&nbsp;&nbsp;
                        {{$qList[0]['startDate']}}<br>&nbsp;&nbsp;
                        {{$qList[0]['endDate']}}<br>&nbsp;&nbsp;


                    @endif

                    @if($i==2 && count($qList) >1)
                        {{$qList[1]['certificateName']}}<br>&nbsp;&nbsp;
                        {{$qList[1]['institutionName']}}<br>&nbsp;&nbsp;
                        {{$qList[1]['startDate']}}<br>&nbsp;&nbsp;
                        {{$qList[1]['endDate']}}<br>&nbsp;&nbsp;
                    @endif

                    @if($i==4 && count($qList) >2)
                        {{$qList[2]['certificateName']}}<br>&nbsp;&nbsp;
                        {{$qList[2]['institutionName']}}<br>&nbsp;&nbsp;
                        {{$qList[2]['startDate']}}<br>&nbsp;&nbsp;
                        {{$qList[2]['endDate']}}<br>&nbsp;&nbsp;

                    @endif

                    @if($i==6 && count($qList) >3)
                        {{$qList[3]['certificateName']}}<br>&nbsp;&nbsp;
                        {{$qList[3]['institutionName']}}<br>&nbsp;&nbsp;
                        {{$qList[3]['startDate']}}<br>&nbsp;&nbsp;
                        {{$qList[3]['endDate']}}<br>&nbsp;&nbsp;

                    @endif
                    @if($i==8 && count($qList) >4)
                        {{$qList[4]['certificateName']}}<br>&nbsp;&nbsp;
                        {{$qList[4]['institutionName']}}<br>&nbsp;&nbsp;
                        {{$qList[4]['startDate']}}<br>&nbsp;&nbsp;
                        {{$qList[4]['endDate']}}<br>&nbsp;&nbsp;

                    @endif

                    @if($i==10 && count($qList) >5)
                        {{$qList[5]['certificateName']}}<br>&nbsp;&nbsp;
                        {{$qList[5]['institutionName']}}<br>&nbsp;&nbsp;
                        {{$qList[5]['startDate']}}<br>&nbsp;&nbsp;
                        {{$qList[5]['endDate']}}<br>&nbsp;&nbsp;
                    @endif

                    @if($i==12 && count($qList) >6)
                        {{$qList[6]['certificateName']}}<br>&nbsp;&nbsp;
                        {{$qList[6]['institutionName']}}<br>&nbsp;&nbsp;
                        {{$qList[6]['startDate']}}<br>&nbsp;&nbsp;
                        {{$qList[6]['endDate']}}<br>&nbsp;&nbsp;
                    @endif


                </td>
                {{--Training--}}
                <td>

                    @if($i==0 && count($trainList) >0)
                        {{$trainList[0]['trainingName']}}<br>&nbsp;&nbsp;
                        {{$trainList[0]['vanue']}}<br>&nbsp;&nbsp;
                        {{$trainList[0]['startDate']}}<br>&nbsp;&nbsp;
                        {{$trainList[0]['endDate']}}<br>&nbsp;&nbsp;
                        
                    @endif

                    @if($i==2 && count($trainList) >1)
                        {{$trainList[1]['trainingName']}}<br>&nbsp;&nbsp;
                        {{$trainList[1]['vanue']}}<br>&nbsp;&nbsp;
                        {{$trainList[1]['startDate']}}<br>&nbsp;&nbsp;
                        {{$trainList[1]['endDate']}}<br>&nbsp;&nbsp;
                    @endif

                    @if($i==4 && count($trainList) >2)
                        {{$trainList[2]['trainingName']}}<br>&nbsp;&nbsp;
                        {{$trainList[2]['vanue']}}<br>&nbsp;&nbsp;
                        {{$trainList[2]['startDate']}}<br>&nbsp;&nbsp;
                        {{$trainList[2]['endDate']}}<br>&nbsp;&nbsp;

                    @endif

                    @if($i==6 && count($trainList) >3)
                        {{$trainList[3]['trainingName']}}<br>&nbsp;&nbsp;
                        {{$trainList[3]['vanue']}}<br>&nbsp;&nbsp;
                        {{$trainList[3]['startDate']}}<br>&nbsp;&nbsp;
                        {{$trainList[3]['endDate']}}<br>&nbsp;&nbsp;

                    @endif
                    @if($i==8 && count($trainList) >4)
                        {{$trainList[4]['trainingName']}}<br>&nbsp;&nbsp;
                        {{$trainList[4]['vanue']}}<br>&nbsp;&nbsp;
                        {{$trainList[4]['startDate']}}<br>&nbsp;&nbsp;
                        {{$trainList[4]['endDate']}}<br>&nbsp;&nbsp;

                    @endif

                    @if($i==10 && count($trainList) >5)
                        {{$trainList[5]['trainingName']}}<br>&nbsp;&nbsp;
                        {{$trainList[5]['vanue']}}<br>&nbsp;&nbsp;
                        {{$trainList[5]['startDate']}}<br>&nbsp;&nbsp;
                        {{$trainList[5]['endDate']}}<br>&nbsp;&nbsp;
                    @endif

                    @if($i==12 && count($trainList) >6)
                        {{$trainList[6]['trainingName']}}<br>&nbsp;&nbsp;
                        {{$trainList[6]['vanue']}}<br>&nbsp;&nbsp;
                        {{$trainList[6]['startDate']}}<br>&nbsp;&nbsp;
                        {{$trainList[6]['endDate']}}<br>&nbsp;&nbsp;
                    @endif


                </td>
                {{--Job Experience--}}
                <td>
                    @if($i==0 && count($jobList) >0)
                            {{$jobList[0]['organization']}}<br>&nbsp;&nbsp;
                            {{$jobList[0]['degisnation']}}<br>&nbsp;&nbsp;
                           From {{$jobList[0]['startDate']}} To
                            @if($jobList[0]['endDate'])
                            {{$jobList[0]['endDate']}}
                            @else
                                Running
                            @endif


                    @endif

                    @if($i==2 && count($jobList) >1)
                        {{$jobList[1]['organization']}}<br>&nbsp;&nbsp;
                        {{$jobList[1]['degisnation']}}<br>&nbsp;&nbsp;
                        From {{$jobList[1]['startDate']}} To
                        @if($jobList[1]['endDate'])
                            {{$jobList[1]['endDate']}}
                        @else
                            Running
                        @endif

                    @endif

                    @if($i==4 && count($jobList) >2)
                        {{$jobList[2]['organization']}}<br>&nbsp;&nbsp;
                        {{$jobList[2]['degisnation']}}<br>&nbsp;&nbsp;
                        From {{$jobList[2]['startDate']}} To
                        @if($jobList[2]['endDate'])
                            {{$jobList[2]['endDate']}}
                        @else
                            Running
                        @endif

                    @endif

                    @if($i==6 && count($jobList) >3)
                        {{$jobList[3]['organization']}}<br>&nbsp;&nbsp;
                        {{$jobList[3]['degisnation']}}<br>&nbsp;&nbsp;
                        From {{$jobList[3]['startDate']}} To
                        @if($jobList[3]['endDate'])
                            {{$jobList[3]['endDate']}}
                        @else
                            Running
                        @endif

                    @endif

                    @if($i==8 && count($jobList) >4)
                        {{$jobList[4]['organization']}}<br>&nbsp;&nbsp;
                        {{$jobList[4]['degisnation']}}<br>&nbsp;&nbsp;
                        From {{$jobList[4]['startDate']}} To
                        @if($jobList[4]['endDate'])
                            {{$jobList[4]['endDate']}}
                        @else
                            Running
                        @endif


                    @endif

                    @if($i==10 && count($jobList) >5)
                        {{$jobList[5]['organization']}}<br>&nbsp;&nbsp;
                        {{$jobList[5]['degisnation']}}<br>&nbsp;&nbsp;
                        From {{$jobList[5]['startDate']}} To
                        @if($jobList[5]['endDate'])
                            {{$jobList[5]['endDate']}}
                        @else
                            Running
                        @endif


                    @endif

                    @if($i==12 && count($jobList) >6)
                        {{$jobList[6]['organization']}}<br>&nbsp;&nbsp;
                        {{$jobList[6]['degisnation']}}<br>&nbsp;&nbsp;
                        From {{$jobList[6]['startDate']}} To
                        @if($jobList[6]['endDate'])
                            {{$jobList[6]['endDate']}}
                        @else
                            Running
                        @endif

                    @endif



                </td>
                {{--Salary--}}
                <td>
                    @if($i==0) Current Salary : {{$salList[0]['currentSalary']}}  @endif
                    @if($i==1) Expected Salary : {{$salList[0]['expectedSalary']}}@endif
                </td>
                {{--Refrence--}}
                <td>
                    @if($i==0 && count($refList) >0)
                        {{$refList[0]['firstName']}}  {{$refList[0]['lastName']}}<br>&nbsp;&nbsp;
                       Email : {{$refList[0]['email']}}<br>&nbsp;&nbsp;
                       Phone : {{$refList[0]['phone']}}
                    @endif
                    @if($i==2 && count($refList) >1)
                            {{$refList[1]['firstName']}}  {{$refList[1]['lastName']}}<br>;&nbsp;&nbsp;
                            Email : {{$refList[1]['email']}}<br>&nbsp;&nbsp;
                            Phone : {{$refList[1]['phone']}}

                        @endif
                    @if($i==4 && count($refList) >2)
                            {{$refList[2]['firstName']}}  {{$refList[2]['lastName']}}<br>&nbsp;&nbsp;
                            Email : {{$refList[2]['email']}}<br>&nbsp;&nbsp;
                            Phone : {{$refList[2]['phone']}}

                        @endif
                    @if($i==6 && count($refList) >3)
                            {{$refList[3]['firstName']}}  {{$refList[3]['lastName']}}<br>&nbsp;&nbsp;
                            Email : {{$refList[3]['email']}}<br>&nbsp;&nbsp;
                            Phone : {{$refList[3]['phone']}}

                        @endif
                    @if($i==8 && count($refList) >4)
                            {{$refList[4]['firstName']}}  {{$refList[1]['lastName']}}<br>&nbsp;&nbsp;
                            Email : {{$refList[4]['email']}}<br>&nbsp;&nbsp;
                            Phone : {{$refList[4]['phone']}}

                    @endif


                </td>
                <td></td>
                <td></td>

                <td>
                    @if($i==0 && count($relList) >0)
                        {{$relList[0]['firstName']}}  {{$relList[0]['lastName']}}<br>&nbsp;&nbsp;
                        Designation : {{$relList[0]['degisnation']}}<br>&nbsp;&nbsp;

                    @endif
                    @if($i==2 && count($relList) >1)
                        {{$relList[1]['firstName']}}  {{$relList[1]['lastName']}}<br>;&nbsp;&nbsp;
                        Designation : {{$relList[1]['degisnation']}}<br>&nbsp;&nbsp;


                    @endif
                    @if($i==4 && count($relList) >2)
                        {{$relList[2]['firstName']}}  {{$relList[2]['lastName']}}<br>&nbsp;&nbsp;
                        Designation : {{$relList[2]['degisnation']}}<br>&nbsp;&nbsp;


                    @endif
                    @if($i==6 && count($relList) >3)
                        {{$relList[3]['firstName']}}  {{$relList[3]['lastName']}}<br>&nbsp;&nbsp;
                        Designation : {{$relList[3]['degisnation']}}<br>&nbsp;&nbsp;


                    @endif
                    @if($i==8 && count($relList) >4)
                        {{$relList[4]['firstName']}}  {{$relList[1]['lastName']}}<br>&nbsp;&nbsp;
                        Designation : {{$relList[4]['degisnation']}}<br>&nbsp;&nbsp;
                    @endif




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
                {{--<br>&nbsp;&nbsp;--}}

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
