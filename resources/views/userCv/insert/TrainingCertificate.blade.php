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
                            <a href="{{route('candidate.cvTrainingCertificate')}}" class="activeNav">Training certification</a>
                            <a <?php if ($hasTrainingInfo!='0'){?> onclick="return false;" class="incomplete" <?php } ?> href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('JobExperience.index')}}">Job experience</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" onsubmit="return chkTrainingCertificate()" action="{{route('insert.cvTrainingCertificate')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;text-align: center">Training certification </h2>

                            <div class="row">
                                <div class="form-group">

                                    <label class="control-label">Do you have any training certification?<span style="color: red" class="required">*</span></label>

                                    <div class="col-md-10 mb-3">
                                        <input class="form-check-input" type="radio" required <?php if ($hasTrainingInfo=='1'){?>checked<?php } ?> name="hasTrainingInfo" value="1"> Yes&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-10">
                                        <input class="form-check-input" type="radio" required <?php if ($hasTrainingInfo=='0'){?>checked<?php } ?> name="hasTrainingInfo" value="0"> No&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div style="display: none" id="TrainCertificateDiv">
                                <div id="TextBoxesGroup">

                                    <div class="row">
                                        <div class="form-group col-md-12">


                                            <label for="inputEmail4">Name of the training<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="trainingName[]" id="trainingName" placeholder="training name" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Venue </label>
                                            <input type="text" class="form-control" name="vanue[]" id="vanue" placeholder="venue" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4" style="display:block">Country</label>

                                            <select  class="form-control col-md-12 js-example-basic-single" id="country" name="countryId[]" style="width:100%">
                                                <option value="">Select country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->countryId}}">{{$country->countryName}}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">Start date</label>
                                            <input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date" >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">End date</label>
                                            <input type="text" class="form-control date" name="endDate[]" id="end" placeholder="date">
                                        </div>




                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">Status<span style="color: red">*</span></label>
                                            <select  class="form-control" id="trainingCertificateStatus" name="status[]" onchange="selectStatus(this)">

                                                <option value="">Select status</option>
                                                @foreach(COMPLETING_STATUS as $key=>$value)
                                                    <option value="{{$value}}">{{$key}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="row" id="courseDuration">
                                        <label>Duration</label>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Hour</label>
                                            <select  class="form-control js-example-basic-single"id="trainingCertificatehour" name="hour[]">

                                                <option value="">Select hour</option>
                                                @for($i = 1 ; $i <=300 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Day</label>
                                            <select  class="form-control js-example-basic-single"id="trainingCertificateday" name="day[]">

                                                <option value="">Select day</option>
                                                @for($i = 1 ; $i <=365 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Week</label>
                                            <select  class="form-control js-example-basic-single"id="trainingCertificateweek" name="week[]">

                                                <option value="">Select week</option>
                                                @for($i = 1 ; $i <=52 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Month</label>
                                            <select  class="form-control js-example-basic-single"id="trainingCertificatemonth" name="month[]">

                                                <option value="">Select month</option>
                                                @for($i = 1 ; $i <=12 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Year</label>
                                            <select  class="form-control js-example-basic-single"id="trainingCertificateyear" name="year[]">

                                                <option value="">Select year</option>
                                                @for($i = 1 ; $i <51 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>



                                    </div>



                                </div>


                            </div>
                                <button type="button" id="addButton" class="btn btn-success">Add more</button>
                                <button type="button" id="removeButton" class="btn btn-success" >Remove</button>
                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <a href="{{route('cv.OthersInfo')}}"><button type="button" id="btnPevious" >Back</button></a>
                                    <button type="submit" id="submitBtn">Save</button>
                                    @if($hasTrainingInfo == '1' || $hasTrainingInfo == '0')
                                        <a href="{{route('candidate.cvProfessionalCertificate')}}"><button type="button" id="btnNext" >Next</button></a>
                                    @endif

                                </div>
                            </div>



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
                    </form>


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

        $("input[name=hasTrainingInfo]").click( function () {

            if ($(this).val()=='1'){
                $('#TrainCertificateDiv').show();
                $("#submitBtn").show();
            }else {
                $('#TrainCertificateDiv').hide();
            }
        });

        $(document).ready(function(){
            if ('<?php echo $hasTrainingInfo?>'== '0'){

                $('#TrainCertificateDiv').hide();
                $("#submitBtn").hide();

            }else if ('<?php echo $hasTrainingInfo?>'== '1'){
                $('#TrainCertificateDiv').show();

            }
        });

    </script>





    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
//            $('#end').datepicker({
//                format: 'yyyy-m-d'
//            });

            $('#courseDuration').hide();
        });

        function chkTrainingCertificate() {

            if ($("input[name=hasTrainingInfo]:checked").val()=="1") {



                var trainingName = document.getElementsByName('trainingName[]');
                var vanue = document.getElementsByName('vanue[]');
                var country = document.getElementsByName('countryId[]');

                var start = document.getElementsByName('startDate[]');
                var end = document.getElementsByName('endDate[]');
                var trainingCertificateStatus = document.getElementsByName('status[]');

                for (i=0;i<trainingName.length;i++) {


                    if (trainingName[i].value == "") {

                        var errorMsg = 'Please type a training name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (trainingName[i].value.length > 100) {

                        var errorMsg = 'Training name should not more than 100 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    // if (vanue[i].value == "") {
                    //
                    //     var errorMsg = 'Please Type a Venue First!!'
                    //     validationError(errorMsg)
                    //     return false;
                    //
                    // }
                    if (vanue[i].value.length > 255) {

                        var errorMsg = 'value should not more than 255 charecter length!!';
                        validationError(errorMsg)
                        return false;

                    }
                    // if (country[i].value == "") {
                    //
                    //     var errorMsg = 'Please Select a Country First!!';
                    //     validationError(errorMsg)
                    //     return false;
                    //
                    // }

                    // if (start[i].value == "") {
                    //     var errorMsg = 'Please Select a Strat Date First!!';
                    //     validationError(errorMsg)
                    //     return false;
                    // }
//        if(end==""){
//            var errorMsg='Please Select a End Date First!!';
//            validationError(errorMsg)
//            return false;
//        }

                    if (trainingCertificateStatus[i].value == "") {
                        var errorMsg = 'Please select a status first!!';
                        validationError(errorMsg)
                        return false;
                    }

                    if (start[i].value != "") {

                        if (end[i].value != "") {


                            if (Date.parse(end[i].value) < Date.parse(start[i].value)) {
                                var errorMsg = 'End date should after start date!!';
                                validationError(errorMsg);
                                return false;
                            }
                        }
                    }
                }
            }else {

                return true;

            }

        }
        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();



            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per time!!");
                    return false;
                }

                if (counter == 1 ) {

                    var trainingName = $('#trainingName').val();
                    var vanue = $('#vanue').val();
                    var country = $('#country').val();

                    var start = $('#start').val();
                    var end = $('#end').val();
                    var trainingCertificateStatus = $('#trainingCertificateStatus').val();


                    if (trainingName == "") {

                        var errorMsg = 'Please type a training name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (trainingName.length > 100) {

                        var errorMsg = 'Training name Should not more than 100 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
//                    if (vanue == "") {
//
//                        var errorMsg = 'Please type a venue first!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if (vanue.length > 255) {

                        var errorMsg = 'value should not more than 255 charecter length!!';
                        validationError(errorMsg)
                        return false;

                    }
//                    if (country == "") {
//
//                        var errorMsg = 'Please select a country first!!';
//                        validationError(errorMsg)
//                        return false;
//
//                    }

//                    if(start==""){
//                        var errorMsg='Please select a strat date first!!';
//                        validationError(errorMsg)
//                        return false;
//                    }
                    if (trainingCertificateStatus == "") {
                        var errorMsg = 'Please select a status first!!';
                        validationError(errorMsg)
                        return false;
                    }
//                    if(end==""){
//                        var errorMsg='Please Select a End Date First!!';
//                        validationError(errorMsg)
//                        return false;
//                    }

                    if (start != "") {



                    if (end != "") {


                        if (Date.parse(end) < Date.parse(start)) {
                            var errorMsg = 'End date should after start date!!';
                            validationError(errorMsg);
                            return false;
                        }
                    }
                }



                }
                else {

                    var trainingName=$('#trainingName'+(counter-1)).val();
                    var vanue=$('#vanue'+(counter-1)).val();
                    var country=$('#country'+(counter-1)).val();

                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();
                    var trainingCertificateStatus=$('#trainingCertificateStatus'+(counter-1)).val();


                    if(trainingName==""){

                        var errorMsg='Please type a training name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (trainingName.length > 100){

                        var errorMsg='Training name should not more than 100 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
//                    if(vanue==""){
//
//                        var errorMsg='Please type a venue first!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if (vanue.length > 255){

                        var errorMsg='value should not more than 255 charecter length!!';
                        validationError(errorMsg)
                        return false;

                    }
//                    if(country==""){
//
//                        var errorMsg='Please select a country first!!';
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if(trainingCertificateStatus==""){
                        var errorMsg='Please select a status first!!';
                        validationError(errorMsg)
                        return false;
                    }

//                    if(start==""){
//                        var errorMsg='Please select a strat date first!!';
//                        validationError(errorMsg)
//                        return false;
//                    }
//                    if(end==""){
//                        var errorMsg='Please Select a End Date First!!';
//                        validationError(errorMsg)
//                        return false;
//                    }

                    if (start != "") {
                        if (end != "") {


                            if (Date.parse(end) < Date.parse(start)) {
                                var errorMsg = 'End date should after Start Date!!';
                                validationError(errorMsg);
                                return false;
                            }
                        }
                    }


                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+

                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Name of the training<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="trainingName[]" id="trainingName'+counter+'" placeholder="training name" required> ' +
                    '</div> ' +

                    '<div class="form-group col-md-8"> ' +
                    '<label for="inputEmail4">Venue </label> ' +
                    '<input type="text" class="form-control" name="vanue[]" id="vanue'+counter+'" placeholder="venue" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Country</label>' +
                    '<select required class="form-control js-example-basic-single" id="country'+counter+'" name="countryId[]">'+
                    '<option value="">Select Country</option>'+
                    '@foreach($countries as $country)'+
                    '<option value="{{$country->countryId}}">{{$country->countryName}}</option>'+
                    '@endforeach'+
                    '</select>'+
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Start date</label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date"> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">End date</label> ' +
                    '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'" placeholder="date"> ' +
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Status<span style="color: red">*</span></label>'+
                    '<select required onchange="checkTrainingStatus('+counter+')" class="form-control"id="trainingCertificateStatus'+counter+'" name="status[]">'+

                    '<option value="">Select status</option>'+
                        @foreach(COMPLETING_STATUS as $key=>$value)
                            '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach
                            '</select>'+
                    '</div>'+
                    '<div id="courseDuration'+counter+'" class="row">'+
                    '<label>Duration</label>'+
                    '<div class="form-group col-md-2">'+
                    '<label for="inputPassword4">Hour</label>'+
                    '<select  class="form-control js-example-basic-single"id="trainingCertificatehour" name="hour[]">'+

                    '<option value="">Select hour</option>'+
                        @for($i = 1 ; $i <=300 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>'+
                        @endfor
                            '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-2">'+
                    '<label for="inputPassword4">Day</label>'+
                    '<select  class="form-control js-example-basic-single"id="trainingCertificateday" name="day[]">'+

                    '<option value="">Select day</option>'+
                        @for($i = 1 ; $i <=365 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>'+
                        @endfor
                            '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-2">'+
                    '<label for="inputPassword4">Week</label>' +
                    '<select  class="form-control js-example-basic-single"id="trainingCertificateweek" name="week[]">'+

                    '<option value="">Select week</option>'+
                        @for($i = 1 ; $i <=52 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>'+
                        @endfor
                            '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-2">'+
                    '<label for="inputPassword4">Month</label>'+
                    '<select  class="form-control js-example-basic-single"id="trainingCertificatemonth" name="month[]">'+

                    '<option value="">Select month</option>'+
                        @for($i = 1 ; $i <=12 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>'+
                        @endfor
                            '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-2">'+
                    '<label for="inputPassword4">Year</label>'+
                    '<select  class="form-control js-example-basic-single"id="trainingCertificateyear" name="year[]">'+

                    '<option value="">Select year</option>'+
                        @for($i = 1 ; $i <51 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>'+
                        @endfor
                            '</select>'+
                    '</div>'+
                    '</div>'

                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");
                $('#courseDuration'+counter).hide();

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                }
                $('.date').datepicker({
                    format: 'yyyy-m-d'
                });
                $('.js-example-basic-single').select2();

            });
            $('.js-example-basic-single').select2();
            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast one course section is needed!!");
                    return false;
                }
                counter--;
                if(counter<2){
                    $("#removeButton").hide();
                }
                $("#TextBoxDiv" + counter).remove();
            });



        });

        function checkTrainingStatus(x) {

            var trainingCertificateStatus =$('#trainingCertificateStatus'+x).val();

            if(trainingCertificateStatus==1){
                $('#courseDuration'+x).hide();
            }
            else if(trainingCertificateStatus==2){
                $('#courseDuration'+x).show();
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

        function selectStatus(x) {
            var value=$(x).val();


            if(value==1){
                $('#courseDuration').hide();
            }
            else if(value==2){
                $('#courseDuration').show();
            }
            // alert(value);

        }

    </script>



@endsection
