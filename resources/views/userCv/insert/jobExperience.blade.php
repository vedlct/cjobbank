@extends('main')

@section('content')

    <style>
        #notice{
            color: blue;
        }

    </style>
    <style>
        .updateCard {
            height:2500px;
        }
    </style>

    <div class="row ">

        <div class="col-12 ">
            <div class="card updateCard">
                <div style="background-color: #F1F1F1" class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal Details</a>
                            <a href="{{route('candidate.cvQuesObj')}}">Career Objective and Application Information</a>
                            <a href="{{route('candidate.cvEducation')}}">Education</a>
                            <a href="{{route('candidate.language.index')}}" >Language</a>
                            <a href="{{route('candidate.computerSkill.index')}}" >Computer-Skill</a>
                            {{--<a href="{{route('candidate.skill.index')}}" >Other Skill Information</a>--}}
                            <a href="{{route('cv.OthersInfo')}}" >Other Information</a>
                            <a href="{{route('candidate.cvTrainingCertificate')}}">Training Certification</a>
                            <a href="{{route('candidate.cvProfessionalCertificate')}}">Professional Certification</a>
                            <a class="activeNav" href="{{route('JobExperience.index')}}">Job Experience</a>
                            <a <?php if ($hasProfCertificate!='0'){?> onclick="return false;" class="incomplete" <?php } ?> href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" onsubmit="return checkJobExperience()" action="{{route('submit.jobExperience')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Job Experience</h2>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">Do you have any job experience?<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10 mb-3">
                                        <input class="form-check-input" type="radio" required <?php if ($hasProfCertificate=='1'){?>checked<?php } ?> name="hasProfCertificate" value="1"> Yes&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-10">
                                        <input class="form-check-input" type="radio" required <?php if ($hasProfCertificate=='0'){?>checked<?php } ?> name="hasProfCertificate" value="0"> No&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div style="display: none" id="EmploymentDiv">
                            <div id="TextBoxesGroup">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Organization type<span style="color: red">*</span></label>
                                        <select name="organizationType[]" class="form-control" id="organizationType">
                                            <option selected value="">Select organization type</option>
                                            @foreach($companyType as $natio)
                                                <option value="{{$natio->organizationTypeId}}">{{$natio->organizationTypeName}}</option>
                                            @endforeach
                                        </select>

                                        {{--<input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>--}}
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Organization name<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Designation<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="degisnation[]" id="degisnation" placeholder="designation" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Start date<span style="color: red">*</span></label>
                                        <input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">End date</label>
                                        <input type="text" class="form-control date" name="endDate[]" id="end" placeholder="date">
                                    </div>
                                    <div id="experienceDiv" style="display: none" class="form-group col-md-4">
                                        <label for="inputPassword4">Total Experience</label>
                                        <input type="text" class="form-control" name="totalExp" id="totalExpValue" placeholder="experience">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Organization address </label>
                                        <textarea class="form-control" rows="5" name="address[]"  id="address" placeholder="address"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Major responsibilities <span id="notice">Max limit 5000 character</span></label>
                                        <textarea class="form-control" rows="15" name="majorResponsibilities[]" maxlength="5000"  id="majorResponsibilities" placeholder="max limit 5000"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Key achievement <span id="notice">Max limit 5000 character</span></label>
                                        <textarea class="form-control" rows="15" name="keyAchivement[]" maxlength="5000"  id="keyAchivement" placeholder="max limit 5000"></textarea>
                                    </div>

                                    <div class="form-group col-md-6" id="supervisorDiv">
                                        <label for="inputEmail4">Name of supervisor</label>
                                        <input type="text" class="form-control" name="supervisorName[]" id="supervisorName" placeholder="Name of Supervisor" >

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Any reservation contacting your employer?</label>
                                        <select class="form-control" id="reservationContactingEmployer" name="reservationContactingEmployer[]" >
                                            <option value="" selected>Select Option</option>
                                            @foreach(YES_NO as $key=>$value)
                                                <option value="{{$value}}">{{$key}}</option>
                                                @endforeach
                                        </select>&nbsp;
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Type of employment<span style="color: red">*</span></label>
                                        <select class="form-control"  id="employmentType" name="employmentType[]" >

                                            <option value="" selected>Select employment type</option>
                                            @foreach($employmentType as $eT)
                                                <option value="{{$eT->employmentTypeName}}">{{$eT->employmentTypeName}}</option>

                                                @endforeach
                                            <option value="{{OTHERS}}">Others</option>
                                        </select>&nbsp;
                                    </div>
                                    <div style="display: none" id="employmentTypeTextDiv" class="form-group col-md-6">

                                        <label for="inputEmail4">Please mention other types</label>
                                        <input type="text" class="form-control" name="employmentTypeText[]" id="employmentTypeText" placeholder="Write Employment Type">


                                    </div>
                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                        </div>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.cvProfessionalCertificate')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                @if($hasProfCertificate == 0 || $hasProfCertificate== 1 )
                                <a href="{{route('candidate.previousWorkInCB.index')}}"><button type="button" id="nextBtn" >Next</button></a>
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
            x[(n+4)].className += " active";
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
        });

        $( "#start" ).change(function() {

            if ($('#end').val()!="" && $('#start').val()!=""){

                var total_month='';

                var end = new Date($('#end').val());
                var start = new Date($('#start').val());
                var exp=calcDate(end,start)


                $("#totalExpValue").val(exp);

                $("#experienceDiv").show();


            }else {

                $("#experienceDiv").hide();
            }

        });
        $( "#end" ).change(function() {

            if ($('#end').val()!="" && $('#start').val()!=""){

                var total_month='';

                var end = new Date($('#end').val());
                var start = new Date($('#start').val());
                var exp=calcDate(end,start)


                $("#totalExpValue").val(exp);

                $("#experienceDiv").show();


            }else {
                $("#experienceDiv").hide();
            }

        });

        function getExp(counter) {

            if ($('#end'+counter).val()!="" && $('#start'+counter).val()!=""){

                var total_month='';

                var end = new Date($('#end'+counter).val());
                var start = new Date($('#start'+counter).val());
                var exp=calcDate(end,start);


                $("#totalExpValue"+counter).val(exp);

                $("#experienceDiv"+counter).show();


            }else {
                $("#experienceDiv"+counter).hide();
            }


        }
        function calcDate(date1,date2) {
            var diff = Math.floor(date1.getTime() - date2.getTime());
            var day = 1000 * 60 * 60 * 24;

            var days = Math.floor(diff/day);
            var months = Math.floor(days/31);
            var years = Math.floor(months/12);

            if (years > 0){
                var month=Math.round((months-(12*years)+1));
            }else {
                var month=months;
            }

            var message = years + " years.";
            message += month + " months ";

            return message
        }

        $("input[name=hasProfCertificate]").click( function () {

            if ($(this).val()=='1'){
                $('#EmploymentDiv').show();
                $("#submitBtn").show();
            }else {
                $('#EmploymentDiv').hide();
            }
        });

        $(document).ready(function(){
            if ('<?php echo $hasProfCertificate?>'== '0'){

                $('#EmploymentDiv').hide();
                $("#submitBtn").hide();

            }else if ('<?php echo $hasProfCertificate?>'== '1'){
                $('#EmploymentDiv').show();

            }
        });

        function checkJobExperience(){


            if ($("input[name=hasProfCertificate]:checked").val()=="1") {

            var organizationType=document.getElementsByName('organizationType[]');
            var organization=document.getElementsByName('organization[]');
            var degisnation=document.getElementsByName('degisnation[]');
            var start=document.getElementsByName('startDate[]');
            var end=document.getElementsByName('endDate[]');
            var address=document.getElementsByName('address[]');

            var majorResponsibilities=document.getElementsByName('majorResponsibilities[]');
            var keyAchivement=document.getElementsByName('keyAchivement[]');
            var supervisorName=document.getElementsByName('supervisorName[]');
            var reservationContactingEmployer=document.getElementsByName('reservationContactingEmployer[]');
            var employmentType=document.getElementsByName('employmentType[]');
            var employmentTypeText=document.getElementsByName('employmentTypeText[]');

            for (i=0;i<organization.length;i++){

                if(end[i].value =="" && supervisorName[i].value==""){

                    var errorMsg='Please insert supervisor name for running job !!';
                    validationError(errorMsg)
                    return false;
                }

                if(organizationType[i].value==""){

                    var errorMsg='Please select a organization type first!!'
                    validationError(errorMsg)
                    return false;
                }

                // if(organization[i].value==""){
                //
                //     var errorMsg='Please type organization name first!!'
                //     validationError(errorMsg)
                //     return false;
                // }
                if (organization[i].value.length > 100){

                    var errorMsg='Organization name should not more than 100 charecter length!!'
                    validationError(errorMsg)
                    return false;

                }
                if(degisnation[i].value==""){

                    var errorMsg='Please type designation first!!'
                    validationError(errorMsg)
                    return false;

                }
                if (degisnation[i].value.length > 100){

                    var errorMsg='Designation should not more than 100 charecter length!!';
                    validationError(errorMsg);
                    return false;

                }
                if(start[i].value==""){

                    var errorMsg='Please select a strat date first!!';
                    validationError(errorMsg);
                    return false;

                }
                 if(end[i].value != "") {


                     if (Date.parse(end[i].value) < Date.parse(start[i].value)) {

                         var errorMsg = 'End date should after start date!!';
                         validationError(errorMsg);
                         return false;

                     }
                 }

//                if($.trim(address[i].value)==""){
//
//                    var errorMsg='Please type address first!!';
//                    validationError(errorMsg);
//                    return false;
//
//                }

               // if(majorResponsibilities[i].value==""){
               //
               //     var errorMsg='Please type major responsibilities first!!';
               //     validationError(errorMsg);
               //     return false;
               // }
                if(majorResponsibilities[i].value!= "") {

                    if (majorResponsibilities[i].value.length > 5000) {

                        var errorMsg = 'Major responsibilities should not more than 5000 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
                }

                if(keyAchivement[i].value!="") {
                    if (keyAchivement[i].value.length > 5000) {

                        var errorMsg = 'Key achivement should not more than 5000 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
                }

                // if(supervisorName[i].value!="") {
                //     if (supervisorName[i].value.length > 200) {
                //
                //         var errorMsg = 'Supervisor name should not more than 200 charecter length!!'
                //         validationError(errorMsg)
                //         return false;
                //
                //     }
                // }

                // if(reservationContactingEmployer[i].value==""){
                //
                //     var errorMsg='Please select reservation of contacting employer first!!'
                //     validationError(errorMsg)
                //     return false;
                // }

                if(employmentType[i].value==""){

                    var errorMsg='Please select employment type first!!'
                    validationError(errorMsg)
                    return false;
                }
                if (employmentType[i].value != ""){

                    if (employmentType[i].value == "{{OTHERS}}" && employmentTypeText[i].value != "" ){

                        var errorMsg='Please write employement other text first!!';
                        validationError(errorMsg);
                        return false;

                    }

                }

            }

        }
        else {
                return true;

            }
        }



        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter == 1 ){

                    var organizationType=$('#organizationType').val();

                    var organization=$('#organization').val();
                    var degisnation=$('#degisnation').val();
                    var start=$('#start').val();
                    var end=$('#end').val();
                    var address=$('#address').val();

                    var majorResponsibilities=$('#majorResponsibilities').val();
                    var keyAchivement=$('#keyAchivement').val();
                    var supervisorName=$('#supervisorName').val();
                    var reservationContactingEmployer=$('#reservationContactingEmployer').val();
                    var employmentType=$('#employmentType').val();
                    var employmentTypeText=$('#employmentTypeText').val();



                    if(organizationType==""){

                        var errorMsg='Please select organization type first!!'
                        validationError(errorMsg)
                        return false;
                    }

                    if(organization==""){

                        var errorMsg='Please type organization name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (organization.length > 100){

                        var errorMsg='Organization name should not more than 100 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(degisnation==""){

                        var errorMsg='Please type designation first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Designation should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start==""){

                        var errorMsg='Please select a start date first!!';
                        validationError(errorMsg);
                        return false;

                    }

                    // if(majorResponsibilities==""){
                    //
                    //     var errorMsg='Please type major responsibilities first!!';
                    //     validationError(errorMsg);
                    //     return false;
                    // }
                    if (majorResponsibilities.length > 5000){

                        var errorMsg='Major responsibilities should not more than 5000 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    // if(keyAchivement==""){
                    //
                    //     var errorMsg='Please type key achivement first!!'
                    //     validationError(errorMsg)
                    //     return false;
                    // }
                    if (keyAchivement.length > 5000){

                        var errorMsg='Key achivement should not more than 5000 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }


                    // if(reservationContactingEmployer==""){
                    //
                    //     var errorMsg='Please select reservation of contacting employer first!!'
                    //     validationError(errorMsg)
                    //     return false;
                    // }

                    if(employmentType==""){

                        var errorMsg='Please select employment type first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (employmentType != ""){

                        if (employmentType == "{{OTHERS}}" && employmentTypeText != "" ){

                            var errorMsg='Please write employement other text first!!';
                            validationError(errorMsg);
                            return false;

                        }

                    }

                    if(end =="" && supervisorName==""){

                        var errorMsg='Please insert supervisor name for running job !!';
                        validationError(errorMsg);
                        return false;
                    }

                }
                else {

                    var organizationType=$('#organizationType'+(counter-1)).val();
                    var organization=$('#organization'+(counter-1)).val();
                    var degisnation=$('#degisnation'+(counter-1)).val();
                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();
                    var address=$('#address'+(counter-1)).val();

                    var majorResponsibilities=$('#majorResponsibilities'+(counter-1)).val();
                    var keyAchivement=$('#keyAchivement'+(counter-1)).val();
                    var supervisorName=$('#supervisorName'+(counter-1)).val();
                    var reservationContactingEmployer=$('#reservationContactingEmployer'+(counter-1)).val();
                    var employmentType=$('#employmentType'+(counter-1)).val();
                    var employmentTypeText=$('#employmentTypeText'+(counter-1)).val();


                    if(organizationType==""){

                        var errorMsg='Please select organization type first!!'
                        validationError(errorMsg)
                        return false;
                    }



                    if(organization==""){

                        var errorMsg='Please type organization name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (organization.length > 100){

                        var errorMsg='Organization name should not more than 100 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(degisnation==""){

                        var errorMsg='Please type designation first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Designation should not more than 100 charecter length!!';
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
                     }
                    //
                    // if($.trim(address)==""){
                    //
                    //     var errorMsg='Please type address first!!';
                    //     validationError(errorMsg);
                    //     return false;
                    //
                    // }

                    // if(majorResponsibilities==""){
                    //
                    //     var errorMsg='Please type major responsibilities first!!';
                    //     validationError(errorMsg);
                    //     return false;
                    // }
                    if (majorResponsibilities.length > 5000){

                        var errorMsg='Major responsibilities should not more than 5000 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    // if(keyAchivement==""){
                    //
                    //     var errorMsg='Please type key achivement First!!'
                    //     validationError(errorMsg)
                    //     return false;
                    // }
                    if (keyAchivement.length > 5000){

                        var errorMsg='Key achivement should not more than 5000 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    // if(supervisorName==""){
                    //
                    //     var errorMsg='Please type supervisor name first!!'
                    //     validationError(errorMsg)
                    //     return false;
                    // }
                    // if (supervisorName.length > 200){
                    //
                    //     var errorMsg='Supervisor name should not more than 200 charecter length!!'
                    //     validationError(errorMsg)
                    //     return false;
                    //
                    // }

                    // if(reservationContactingEmployer==""){
                    //
                    //     var errorMsg='Please select reservation of contacting employer first!!'
                    //     validationError(errorMsg)
                    //     return false;
                    // }

                    if(employmentType==""){

                        var errorMsg='Please select employment type first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (employmentType != ""){

                        if (employmentType == "{{OTHERS}}" && employmentTypeText != "" ){

                            var errorMsg='Please write employement other text first!!';
                            validationError(errorMsg);
                            return false;

                        }


                    }

                    if(end =="" && supervisorName==""){

                        var errorMsg='Please insert supervisor name for running job !!';
                        validationError(errorMsg)
                        return false;
                    }


                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div class="row"> ' +
                        '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Organization type<span style="color: red">*</span></label>'+
                    '<select required name="organizationType[]" class="form-control" id="sel1">'+
                    '<option selected value="">Select organization Type</option>'+
                @foreach($companyType as $natio)
                '<option value="{{$natio->organizationTypeId}}">{{$natio->organizationTypeName}}</option>'+
                        @endforeach
                    '</select>'+

                        {{--<input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>--}}
                    '</div>'+
                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Organization name<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="organization[]" id="organization'+counter+'" placeholder="organization" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputEmail4">Designation<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="degisnation[]" id="degisnation'+counter+'" placeholder="designation" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Start date<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control date" onchange="getExp('+counter+')" name="startDate[]" id="start'+counter+'" placeholder="date" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">End date</label> ' +
                    '<input type="text" class="form-control date" onchange="getExp('+counter+')" name="endDate[]" id="end'+counter+'" placeholder="date"> ' +
                    '</div> ' +
                    '<div id="experienceDiv'+counter+'" style="display: none" class="form-group col-md-4">'+
                    '<label for="inputPassword4">Total Experience</label>'+
                    '<input type="text" class="form-control" name="totalExp" id="totalExpValue'+counter+'" placeholder="experience">'+
                    '</div>'+
                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputPassword4">Address</label> ' +
                    '<textarea class="form-control" name="address[]" id="address'+counter+'" placeholder="address"></textarea> ' +
                    '</div> ' +
                    '<div class="form-group col-md-12">'+
                    '<label for="inputPassword4">Major responsibilities </label>'+
                    '<textarea class="form-control" name="majorResponsibilities[]" maxlength="5000"  id="majorResponsibilities'+counter+'" placeholder="Major responsibilities"></textarea>'+
                    '</div>'+
                    '<div class="form-group col-md-12">'+
                    '<label for="inputPassword4">Key achievement </label>'+
                    '<textarea class="form-control" name="keyAchivement[]" maxlength="5000"  id="keyAchivement'+counter+'" placeholder="Key achievement"></textarea>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Name of supervisor</label>'+
                    '<input type="text" class="form-control" name="supervisorName[]" id="supervisorName'+counter+'" placeholder="Name of supervisor" >'+
                '</div>'+
                '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Any reservation contacting your employer?</label>'+
                    '<select class="form-control" id="reservationContactingEmployer'+counter+'" name="reservationContactingEmployer[]" >'+
                '<option value="" selected>Select option</option>'+
                @foreach(YES_NO as $key=>$value)
                '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach
                    '</select>'+
                '</div>'+

                '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Type of employment<span style="color: red">*</span></label>'+
                    '<select required class="form-control" id="employmentType'+counter+'" onchange="employmentTypefunc('+counter+')" name="employmentType[]" >'+
                '<option value="" selected>Select employment type</option>'+
                    @foreach($employmentType as $eT)
                    '<option value="{{$eT->employmentTypeName}}">{{$eT->employmentTypeName}}</option>'+
                        @endforeach
                    '<option value="{{OTHERS}}">Others</option>'+
                    '</select>'+
                '</div>'+
                '<div style="display: none" id="employmentTypeTextDiv'+counter+'" class="form-group col-md-6">'+
                    '<label for="inputEmail4">Please mention other types</label>'+
                    '<input type="text" class="form-control" name="employmentTypeText[]" id="employmentTypeText'+counter+'" placeholder="Write Employment Type">'+

                    '</div>'+
                    '</div>'

                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                }
                $('.date').datepicker({
                    format: 'yyyy-m-d'
                });
            });

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

        $('#employmentType').on('change', function() {

            var employmentType =$('#employmentType').val();
            if (employmentType == "{{OTHERS}}"){

                $("#employmentTypeTextDiv").show();
            }else {
                $("#employmentTypeTextDiv").hide();
            }


        });

        function employmentTypefunc(x) {

            var employmentType =$('#employmentType'+x).val();

            if (employmentType == "{{OTHERS}}"){

                $("#employmentTypeTextDiv"+x).show();
            }else {
                $("#employmentTypeTextDiv"+x).hide();
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
