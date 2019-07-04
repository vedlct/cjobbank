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
                            <a class="activeNav" href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a <?php if ($hasProfCertificate!='0'){?> onclick="return false;" class="incomplete" <?php } ?> href="{{route('JobExperience.index')}}">Job experience</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" name="regForm" action="{{route('submit.cvProfessionalCertificate')}}" onsubmit="return chkProfessinalCertificate()" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;text-align: center">Professional certification </h2>
                            <div class="row">
                            <div class="form-group">

                                <label class="control-label">Do you have professional certification? <span style="color: red" class="required">*</span></label>

                                <div class="col-md-10 mb-3">
                                    <input class="form-check-input"  type="radio" required <?php if ($hasProfCertificate=='1'){?>checked<?php } ?> name="hasProfCertificate" value="1"> Yes&nbsp;&nbsp;
                                </div>
                                <div class="col-md-10">

                                    <input class="form-check-input"   type="radio" required <?php if ($hasProfCertificate=='0'){?>checked<?php } ?> name="hasProfCertificate" value="0"> No&nbsp;&nbsp;
                                </div>
                            </div>
                            </div>

                            <div style="display: none" id="profCertificateDiv">
                            <div id="TextBoxesGroup">

                                <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Certificate name<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="certificateName[]" id="certificateName" placeholder="certificate" >
                                </div>
                            </div>

                                <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="inputEmail4">Institution</label>
                                    <input type="text" class="form-control" name="institutionName[]" id="institutionName" placeholder="institution">
                                </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Result system</label>
                                        <select name="resultSystem[]" class="form-control" data-panel-id="0"  id="resultSydtem">
                                            <option value="">Select System</option>
                                            @foreach(RESULT_SYSTEM as $key=>$value)
                                                <option value="{{$value}}">{{$key}}</option>
                                            @endforeach
                                            <option  value="{{OTHERS}}" >{{OTHERS}}</option>
                                        </select>
                                    </div>

                                    <div style="display: none" id="resultSydtemNameDiv" class="form-group col-md-4">
                                        <label for="">Result system name</label>
                                        <input type="text" maxlength="255" name="resultSydtemName[]" class="form-control" id="resultSydtemName"  placeholder="Result system name">

                                    </div>


                                    <div class="form-group" id="otherField0">

                                    </div>

                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Result</label>
                                    <input type="text" class="form-control" name="result[]" id="result" placeholder="">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Start date</label>
                                    <input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">End date</label>
                                    <input type="text" class="form-control date" name="endDate[]" id="end" placeholder="date">
                                </div>

                                 <!--duration-->

                                    <div class="row" id="courseDuration" style="margin-left: 10px">
                                        <label>Duration</label>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Hour</label>
                                            <select  class="form-control js-example-basic-single" id="trainingCertificatehour" name="hour[]">

                                                <option value="">Select hour</option>
                                                @for($i = 1 ; $i <=300 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Day</label>
                                            <select  class="form-control js-example-basic-single" id="trainingCertificateday" name="day[]">

                                                <option value="">Select day</option>
                                                @for($i = 1 ; $i <=365 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Week</label>
                                            <select  class="form-control js-example-basic-single" id="trainingCertificateweek" name="week[]">

                                                <option value="">Select week</option>
                                                @for($i = 1 ; $i <=52 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Month</label>
                                            <select  class="form-control js-example-basic-single" id="trainingCertificatemonth" name="month[]">

                                                <option value="">Select month</option>
                                                @for($i = 1 ; $i <=12 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Year</label>
                                            <select  class="form-control js-example-basic-single" id="trainingCertificateyear" name="year[]">

                                                <option value="">Select year</option>
                                                @for($i = 1 ; $i <51 ; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>


                                    </div>

                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Status<span style="color: red">*</span></label>
                                    <select  class="form-control" id="professinalCertificateStatus" name="status[]" onchange="selectStatus(this)">

                                        <option value="">Select status</option>
                                        @foreach(COMPLETING_STATUS as $key=>$value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                            </div>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.cvTrainingCertificate')}}"><button type="button" id="btnPevious">Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                @if($hasProfCertificate == 1 || $hasProfCertificate == 0)
                                <a href="{{route('JobExperience.index')}}"><button type="button" id="nextBtn" >Next</button></a>
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
            x[(n+2)].className += " active";
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
            $('.js-example-basic-single').select2();
        });


        $('#resultSydtem').on('change', function() {

            var resultSydtem =$('#resultSydtem').val();
            if (resultSydtem == "{{OTHERS}}"){

                $("#resultSydtemNameDiv").show();
            }else {


                $("#resultSydtemNameDiv").hide();


            }



        });

        function getResultSystemName(x){


            var resultSydtem=document.getElementById("resultSydtem"+x).value;

            if (resultSydtem == "{{OTHERS}}"){

                $("#resultSydtemNameDiv"+x).show();
            }else {


                $("#resultSydtemNameDiv"+x).hide();


            }

        }

        $("input[name=hasProfCertificate]").click( function () {

            if ($(this).val()=='1'){
                $('#profCertificateDiv').show();
                $("#submitBtn").show();
            }else {
                $('#profCertificateDiv').hide();
            }
        });

        $(document).ready(function(){
            if ('<?php echo $hasProfCertificate?>'== '0'){

                $('#profCertificateDiv').hide();

            }else if ('<?php echo $hasProfCertificate?>'== '1'){
                $('#profCertificateDiv').show();

            }
        });
        
        function chkProfessinalCertificate() {



            if ($("input[name=hasProfCertificate]:checked").val()=="1") {



                var certificateName = document.getElementsByName("certificateName[]");

//                var institutionName = document.getElementsByName("institutionName[]");

                var start = document.getElementsByName("startDate[]");
                var end = document.getElementsByName("endDate[]");
                var status = document.getElementsByName("status[]");
//                var resultSystem = document.getElementsByName("resultSystem[]");




                for (i = 0; i < certificateName.length; i++) {

                    if(certificateName[i].value==""){

                        var errorMsg='Please type certificate name first!!';
                        validationError(errorMsg);
                        return false;
                    }
//                    if(resultSystem[i].value==""){
//
//                        var errorMsg='Please select result system first!!';
//                        validationError(errorMsg);
//                        return false;
//                    }
                    if (certificateName[i].value.length > 100){

                        var errorMsg='certificate name should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
//                    if(institutionName[i].value==""){
//
//                        var errorMsg='Please type instituteName first!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }

                    if (start[i].value != "" && end[i].value != "") {


                        if (Date.parse(end[i].value) < Date.parse(start[i].value)) {

                            var errorMsg = 'End date should after start date!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    if(status[i].value==""){

                        var errorMsg='Please select a status first!!';
                        validationError(errorMsg);
                        return false;

                    }

                }

            }else {

                return true;

            }

            
        }


        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();
            $('#courseDuration').hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 section allow per time!!");
                    return false;
                }

                if (counter == 1 ){

                    var certificateName=$('#certificateName').val();
                    var institutionName=$('#institutionName').val();
//                    
                    var start=$('#start').val();
                    var end=$('#end').val();
                    var status=$('#professinalCertificateStatus').val();
                    var resultSystem=$('#resultSystem').val();


                    if(certificateName==""){

                        var errorMsg='Please type certificate name first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if(resultSystem==""){

                        var errorMsg='Please select result system first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (certificateName.length > 100){

                        var errorMsg='certificate name should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
//                    if(institutionName==""){
//
//                        var errorMsg='Please type instituteName first!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }
                    if (institutionName.length > 255){

                        var errorMsg='Institute name should not more than 255 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
//                    if(result==""){
//
//                        var errorMsg='Please Type a Result First!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }
//                    if (result.length > 10){
//
//                        var errorMsg='Result Should not more than 10 Charecter Length!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }
//                    if(start==""){
//
//                        var errorMsg='Please select a strat date first!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }
//                    if(end==""){
//
//                        var errorMsg='Please Select a End Date First!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }
                    if (start!="" && end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after Start Date!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    if(status==""){

                        var errorMsg='Please select a status first!!';
                        validationError(errorMsg);
                        return false;

                    }



                }
                
                else {

                    var certificateName=$('#certificateName'+(counter-1)).val();
                    var institutionName=$('#institutionName'+(counter-1)).val();
//                    var result=$('#result'+(counter-1)).val();
                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();
                    var status=$('#professinalCertificateStatus'+(counter-1)).val();
                    var resultSystem=$('#resultSystem'+(counter-1)).val();


                    if(certificateName==""){

                        var errorMsg='Please type certificate name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (certificateName.length > 100){

                        var errorMsg='certificate name should not more than 100 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
//                    if(institutionName==""){
//
//                        var errorMsg='Please type institute name first!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if (institutionName.length > 255){

                        var errorMsg='Institute name should not more than 255 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }

//                    if(resultSystem==""){
//
//                        var errorMsg='Please select result system first!!'
//                        validationError(errorMsg)
//                        return false;
//                    }

//                    if(result==""){
//
//                        var errorMsg='Please Type a Result First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
//                    if (result.length > 10){
//
//                        var errorMsg='Result Should not more than 10 Charecter Length!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
//                    if(start==""){
//
//                        var errorMsg='Please select a strat date first!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
//                    if(end==""){
//
//                        var errorMsg='Please Select a End Date First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }

                    if (start !="" && end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after start date!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    if(status==""){

                        var errorMsg='Please select a status first!!'
                        validationError(errorMsg)
                        return false;

                    }


                }
                
                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+
                    '<div id="TextBoxesGroup">'+
                    '<div class="row">'+
                    '<div class="form-group col-md-12">'+
                    '<label for="inputEmail4">Certificate name<span style="color: red">*</span></label>'+
                '<input type="text" class="form-control" name="certificateName[]" id="certificateName'+counter+'" placeholder="certificate" >'+
                '</div>'+
                '</div>'+
                '<div class="row" >'+
                    '<div class="form-group col-md-8">'+
                    '<label for="inputEmail4">Institution</label>'+
                '<input type="text" class="form-control" name="institutionName[]" id="institutionName'+counter+'" placeholder="institution" >'+
                '</div>'+
                    '<div class="form-group col-md-4">'+
                    '<label for="">Result system</label>'+

                    '<select name="resultSystem[]" class="form-control" data-panel-id="'+counter+'"  onchange="getResultSystemName('+counter+')"  id="resultSydtem'+counter+'">'+
                    '<option value="">Select system</option>'+
                    @foreach(RESULT_SYSTEM as $key=>$value)
                    '<option value="{{$value}}">{{$key}}</option>'+
                    @endforeach
                    '<option  value="{{OTHERS}}" >{{OTHERS}}</option>'+
                    '</select>'+
                    '</div>'+
                    '<div style="display: none" id="resultSydtemNameDiv'+counter+'" class="form-group col-md-4">'+
                    '<label for="">Result system name</label>'+
                    '<input type="text" maxlength="255" name="resultSydtemName[]" class="form-control" id="resultSydtemName'+counter+'"  placeholder="">'+

                    '</div>'+
                    '<div class="form-group" id="otherField'+counter+'"></div>'+
                '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Result</label>'+
                    '<input type="text" class="form-control" name="result[]" id="result'+counter+'" placeholder="">'+
                    '</div>'+

                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Start date</label>'+
                '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date" >'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">End date</label>'+
                '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'"  placeholder="date">'+
                    '</div>'+

                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Status<span style="color: red">*</span></label>'+
                    '<select  class="form-control" id="professinalCertificateStatus'+counter+'" name="status[]" data-panel-id="'+counter+'" onchange="selectStatusAdd(this)">'+
                    '<option value="">Select Status</option>'+
                    @foreach(COMPLETING_STATUS as $key=>$value)
                    '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                '<div class="row" id="courseDuration'+counter+'" style="margin-left: 10px">'+
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
                    $("#submitBtn").show();

                }
                $('.date').datepicker({
                    format: 'yyyy-m-d'
                });
                $('.js-example-basic-single').select2();
                
                
            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast one course section is needed!!");
                    return false;
                }
                counter--;
                if(counter<2){
                    $("#removeButton").hide();
//                    $("#submitBtn").hide();
                }
                $("#TextBoxDiv" + counter).remove();
            });


        });

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


        function selectStatusAdd(x) {

            var value=$(x).val();
            var id=$(x).data('panel-id');
            if(value==1){
                $('#courseDuration'+id).hide();
            }
            else if(value==2){
                $('#courseDuration'+id).show();
            }
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

//        function changeResult(x) {
//            // alert($(x).val());
//            var value=$(x).val();
//            var id=$(x).data('panel-id');
//
//            if(value==4){
//                $('#otherField'+id).html(' <div class="form-group col-md-12">\n' +
//                    '                                    <label for="inputPassword4">Grade</label>\n' +
//                    '                                    <input type="text" class="form-control" name="grade['+id+']"  placeholder="">\n' +
//                    '                                </div>');
//            }
//
//            else{
//                $('#otherField'+id).html('');
//            }
//
//        }

    </script>



@endsection
