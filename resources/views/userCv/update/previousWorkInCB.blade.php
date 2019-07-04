@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card updateCard">
                <div style="background-color: #F1F1F1" class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal details</a>
                            <a href="{{route('candidate.cvQuesObj')}}">Career objective and application information</a>
                            <a href="{{route('candidate.cvEducation')}}">Education</a>
                            <a href="{{route('candidate.language.index')}}" >Language</a>
                            <a href="{{route('candidate.computerSkill.index')}}" >Computer-skill</a>
                            {{--<a href="{{route('candidate.skill.index')}}" >Other Skill Information</a>--}}
                            <a href="{{route('cv.OthersInfo')}}" >Other information</a>
                            <a href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a  href="{{route('JobExperience.index')}}">Job experience</a>
                            <a class="activeNav" href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a  href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a  href="{{route('refree.index')}}">Referee</a>
                            <a  href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm" >


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Previous work information in caritas bangladesh</h2>
                            @php($tempHr=0)
                            @foreach($previousWorkInCB as $prevWc)
                                @if($tempHr>0)
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                @endif
                                <div id="edit{{$prevWc->id}}">
                                    <div class="row">
                                        <div class="form-group col-md-10">

                                            <label for="inputEmail4">Designation :</label>
                                            {{$prevWc->designation}}
                                        </div>

                                        <div class="form-group col-md-2 ">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$prevWc->id}})"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm " onclick="deletePreViousWork({{$prevWc->id}})"><i class="fa fa-trash"></i></button>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Start date</label>
                                            {{$prevWc->startDate}}
                                        </div>
                                        <div class="col-md-6">
                                            <label>End date</label>
                                            @if($prevWc->currentlyRunning=='0')
                                                {{$prevWc->endDate}}
                                            @else
                                                Running
                                            @endif


                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword4">Total experience :</label>
                                            <span id="TE{{$tempHr}}"></span>

                                        </div>
                                    </div>

                                    @php($tempHr++)


                                </div>
                            @endforeach
                        </div>
                        <form onsubmit="return chkPreviousWork()"action="{{route('candidate.previousWorkInCB.insert')}}" method="post">
                            <!-- One "tab" for each step in the form: -->
                            <input type="hidden" required name="hasWorkedInCB" value="1">&nbsp;
                            {{csrf_field()}}

                            <div id="TextBoxesGroup">


                            </div>


                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>



                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <a href="{{route('JobExperience.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                    <button type="submit" id="submitBtn">Save</button>
                                    <a href="{{route('candidate.membershipInSocialNetwork.index')}}"><button type="button" id="nextBtn" >Next</button></a>
                                </div>
                            </div>
                        </form>



                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>


                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- end container -->
    </div>
    <!-- end wrapper -->




@endsection

@section('foot-js')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        fixStepIndicator(currentTab); // Display the crurrent tab

        function editInfo(x) {

            $.ajax({
                type: 'POST',
                url: "{!! route('candidate.previousWorkInCB.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': x},
                success: function (data) {

                    $('#edit'+x).html(data);
                    $("#addButton").hide();


                }
            });
        }
        function deletePreViousWork(x) {


            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('candidate.previousWorkInCB.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'id': x},
                            success: function (data) {
                                location.reload();
                            }
                        });
                    },
                    cancel: function () {
//                        $.alert('Canceled!');
                    }

                }
            });
        }



        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var x1 = document.getElementsByClassName("tab");
            x1[n].style.display = "block";
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[(n+3)].className += " active";
        }
    </script>



    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
//            $('#end').datepicker({
//                format: 'yyyy-m-d'
//            });




            <?php $ii=0;?>
            @foreach($previousWorkInCB as $pwc)
            @if(!is_null($pwc->startDate) && !is_null($pwc->endDate))
            document.getElementById("TE"+'{{$ii}}').innerHTML = calcDate(new Date('{{$pwc->endDate}}'),new Date('{{$pwc->startDate}}'));
            @elseif(!is_null($pwc->startDate) && is_null($pwc->endDate))
            document.getElementById("TE"+'{{$ii}}').innerHTML = calcDate(new Date(),new Date('{{$pwc->startDate}}'));
            @endif
            <?php $ii++;?>
            @endforeach

        });

        function getExp(counter) {

            if ($('#end'+counter).val()!="" && $('#start'+counter).val()!=""){

                var total_month='';

                var end = new Date($('#end'+counter).val());
                var start = new Date($('#start'+counter).val());
                var exp=calcDate(end,start);


                $("#totalExpValue"+counter).val(exp);
                $("#currentlyRunning"+counter). prop("checked", false);

                $("#experienceDiv"+counter).show();


            }else {
                $("#experienceDiv"+counter).hide();
            }


        }
        function getchkExp(counter) {

            if ($('#start'+counter).val()!=""){

                var total_month='';

                var end = new Date();
                var start = new Date($('#start'+counter).val());
                var exp=calcDate(end,start);


                $("#totalExpValue"+counter).val(exp);
                $('#end'+counter).val("");

                $("#experienceDiv"+counter).show();


            }else {
                $("#experienceDiv"+counter).hide();
            }


        }
        function calcDate(date1,date2) {
            // var diff = Math.floor(date1.getTime() - date2.getTime());
            // var day = 1000 * 60 * 60 * 24;
            //
            // var days = Math.floor(diff/day);
            // var months = Math.floor((days%365)/31);
            // var years = Math.floor(days/365);
            // var daydiffs = Math.floor(days%30);
            //
            // if (days>0) {
            //
            //
            //     if (daydiffs == 0) {
            //         var month = (months + 1);
            //     } else {
            //         var month = months;
            //     }
            //
            // }
            //
            // // if (years > 0){
            // //     var month=Math.round((months-(12*years)+1));
            // // }else {
            // //     var month=months;
            // // }
            //
            // var message = years + "years ";
            // message += month + " months ";
            // message += daydiffs + "days ";
            //
            // return message;

            var now = date1;
            var today = date2;

            var yearNow = now.getYear();
            var monthNow = now.getMonth();
            var dateNow = now.getDate();

            // var dob = new Date(dateString.substring(6,10),
            //     dateString.substring(0,2)-1,
            //     dateString.substring(3,5)
            // );

            var yearDob = today.getYear();
            var monthDob = today.getMonth();
            var dateDob = today.getDate();
            var age = {};
            var ageString = "";
            var yearString = "";
            var monthString = "";
            var dayString = "";


            yearAge = yearNow - yearDob;

            if (monthNow >= monthDob)
                var monthAge = monthNow - monthDob;
            else {
                yearAge--;
                var monthAge = 12 + monthNow -monthDob;
            }

            if (dateNow >= dateDob)
                var dateAge = dateNow - dateDob;
            else {
                monthAge--;
                var dateAge = 31 + dateNow - dateDob;

                if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                }
            }

            age = {
                years: yearAge,
                months: monthAge,
                days: dateAge
            };

            if ( age.years > 1 ) yearString = " years";
            else yearString = " year";
            if ( age.months> 1 ) monthString = " months";
            else monthString = " month";
            if ( age.days > 1 ) dayString = " days";
            else dayString = " day";


            if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
                ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString ;
            else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
                ageString = age.days + dayString;
            else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
                ageString = age.years + yearString;
            else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
                ageString = age.years + yearString + " and " + age.months + monthString ;
            else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
                ageString = age.months + monthString + " and " + age.days + dayString;
            else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
                ageString = age.years + yearString + " and " + age.days + dayString;
            else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
                ageString = age.months + monthString
            else ageString = "Oops! Could not calculate !";

            return ageString;

        }

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter > 1)
                {
                    var degisnation=$('#degisnation'+(counter-1)).val();
                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();


                    if(degisnation==""){

                        var errorMsg='Please type designation first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 255){

                        var errorMsg='Designation should not more than 255 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start==""){

                        var errorMsg='Please select a start date first!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after start date!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }else {
                        if ($("#currentlyRunning"+(counter-1)).prop('checked') != true){

                            var errorMsg = 'Either end date or currently running should be selected!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }

                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="form-group"><hr style="border-top:1px dotted #000;"></div>' +
//                    '<div class="row"> ' +
                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Designation</label> ' +
                    '<input type="text" class="form-control" name="degisnation[]" id="degisnation'+counter+'" placeholder="designation" > ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputPassword4">Start date</label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" onchange="getExp('+counter+')" id="start'+counter+'" placeholder="date"> ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputPassword4">End date</label> ' +
                    '/ <input type="checkbox"  class="col-md-2" id="currentlyRunning'+counter+'" onclick="getchkExp('+counter+')" name="currentlyRunning[]" value="1">Running'+
                    '<input type="text" class="form-control date" name="endDate[]" onchange="getExp('+counter+')" id="end'+counter+'" placeholder="date"> ' +

//                    '</div> ' +
                    '</div>'+
                    '<div id="experienceDiv'+counter+'" style="display: none" class="form-group col-md-4">'+
                    '<label for="inputPassword4">Total Experience</label>'+
                    '<input type="text" class="form-control" name="totalExp" id="totalExpValue'+counter+'"readonly placeholder="experience">'+
                    '</div>'

                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                    $("#submitBtn").show();
                }
                $('.date').datepicker({
                    format: 'yyyy-m-d'
                });
                $('.date').keydown(false);
            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast one course section is needed!!");
                    return false;
                }
                counter--;
                if(counter<2){
                    $("#removeButton").hide();
                    $("#submitBtn").hide();
                }
                $("#TextBoxDiv" + counter).remove();
            });


        });

        function chkPreviousWork() {






                var degisnation=document.getElementsByName('degisnation[]');
                var startDate=document.getElementsByName('startDate[]');

                var currentlyRunning=document.getElementsByName('currentlyRunning[]');


                var endDate=document.getElementsByName('endDate[]');


                for (i=0;i<degisnation.length;i++){

                    if(degisnation[i].value==""){

                        var errorMsg='Please type a designation first!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if(startDate[i].value==""){

                        var errorMsg='Please type start date first!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if ($("input[name=currentlyRunning]:checked").val()!=1){

                        if(endDate[i].value!=""){

                            if(Date.parse(startDate[i].value) > Date.parse(endDate[i].value)){

                                var errorMsg='startDate must be less then endDate';
                                validationError(errorMsg);
                                return false;
                            }

                        }

                    }


                }




        }

        function validationError(errorMsg){

            $.alert({
                title: 'Error',
                type: 'red',
                content: errorMsg,
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-green',
                        action: function () {

                        }
                    }
                }
            });

        }

    </script>



@endsection
