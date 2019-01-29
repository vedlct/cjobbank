@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                    <form id="regForm" onsubmit="return checkJobExperience()" action="{{route('submit.jobExperience')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Job Experience</h2>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">Has employment history?<span style="color: red" class="required">*</span>:</label>
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
                                        <label for="inputEmail4">Organization type</label>
                                        <select  name="organizationType[]" class="form-control" id="organizationType">
                                            <option selected value="">Select organization type</option>
                                            @foreach($companyType as $natio)
                                                <option value="{{$natio->organizationTypeId}}">{{$natio->organizationTypeName}}</option>
                                            @endforeach
                                        </select>

                                        {{--<input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>--}}
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Organization name</label>
                                        <input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Designation</label>
                                        <input type="text" class="form-control" name="degisnation[]" id="degisnation" placeholder="designation" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Start date</label>
                                        <input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">End date</label>
                                        <input type="text" class="form-control date" name="endDate[]" id="end" placeholder="date">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Organization address </label>
                                        <textarea class="form-control" name="address[]"  id="address" placeholder="address"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Major responsibilities </label>
                                        <textarea class="form-control" name="majorResponsibilities[]" maxlength="300"  id="majorResponsibilities" placeholder="Major responsibilities"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Key achievement </label>
                                        <textarea class="form-control" name="keyAchivement[]" maxlength="300"  id="keyAchivement" placeholder="Key achievement"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Name of supervisor</label>
                                        <input type="text" class="form-control" name="supervisorName[]" id="supervisorName" placeholder="Name of supervisor" >
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
                                        <label for="inputEmail4">Type of employment</label>
                                        <select class="form-control" id="employmentType" name="employmentType[]" >
                                            <option value="" selected>Select employment type</option>
                                            @foreach(TYPE_OF_EMPLOYMENT as $key=>$value)
                                                <option value="{{$value}}">{{$key}}</option>
                                                @endforeach
                                            <option value="{{OTHERS}}">Others</option>
                                        </select>&nbsp;
                                    </div>
                                    <div style="display: none" id="employmentTypeTextDiv" class="form-group col-md-6">
                                        <label for="inputEmail4">Write employment type</label>
                                        <input type="text" class="form-control" name="employmentTypeText[]" id="employmentTypeText" placeholder="Write employment type">

                                    </div>
                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

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

        $("input[name=hasProfCertificate]").click( function () {

            if ($(this).val()=='1'){
                $('#EmploymentDiv').show();
            }else {
                $('#EmploymentDiv').hide();
            }
        });

        $(document).ready(function(){
            if ('<?php echo $hasProfCertificate?>'== '0'){

                $('#EmploymentDiv').hide();

            }else if ('<?php echo $hasProfCertificate?>'== '1'){
                $('#EmploymentDiv').show();

            }
        });

        function checkJobExperience(){

            if ($("input[name=hasProfCertificate]:checked").val()=="1") {

            var organizationType=document.getElementsByName('organizationType[]');
            var organization=document.getElementsByName('organization[]');
            var degisnation=document.getElementsByName('degisnation[]');
            var start=document.getElementsByName('start[]');
            var end=document.getElementsByName('end[]');
            var address=document.getElementsByName('address[]');

            var majorResponsibilities=document.getElementsByName('majorResponsibilities[]');
            var keyAchivement=document.getElementsByName('keyAchivement[]');
            var supervisorName=document.getElementsByName('supervisorName[]');
            var reservationContactingEmployer=document.getElementsByName('reservationContactingEmployer[]');
            var employmentType=document.getElementsByName('employmentType[]');
            var employmentTypeText=document.getElementsByName('employmentTypeText[]');

            for (i=0;i<organization.length;i++){

                if(organizationType[i].value==""){

                    var errorMsg='Please Select a Organization Type First!!'
                    validationError(errorMsg)
                    return false;
                }

                if(organization[i].value==""){

                    var errorMsg='Please Type Organization Name First!!'
                    validationError(errorMsg)
                    return false;
                }
                if (organization[i].value.length > 100){

                    var errorMsg='Organization Name Should not more than 100 Charecter Length!!'
                    validationError(errorMsg)
                    return false;

                }
                if(degisnation[i].value==""){

                    var errorMsg='Please Type Designation First!!'
                    validationError(errorMsg)
                    return false;

                }
                if (degisnation[i].value.length > 100){

                    var errorMsg='Designation Should not more than 100 Charecter Length!!';
                    validationError(errorMsg);
                    return false;

                }
                if(start[i].value==""){

                    var errorMsg='Please Select a Strat Date First!!';
                    validationError(errorMsg);
                    return false;

                }
                if(end[i].value != "") {


                    if (Date.parse(end[i].value) < Date.parse(start[i].value)) {

                        var errorMsg = 'End date should after Start Date!!';
                        validationError(errorMsg);
                        return false;

                    }
                }

                if($.trim(address[i].value)==""){

                    var errorMsg='Please Type address First!!';
                    validationError(errorMsg);
                    return false;

                }

                if(majorResponsibilities[i].value==""){

                    var errorMsg='Please Type Major Responsibilities First!!';
                    validationError(errorMsg);
                    return false;
                }
                if (majorResponsibilities[i].value.length > 200){

                    var errorMsg='Major Responsibilities Should not more than 200 Charecter Length!!'
                    validationError(errorMsg)
                    return false;

                }
                if(keyAchivement[i].value==""){

                    var errorMsg='Please Type Key Achivement First!!'
                    validationError(errorMsg)
                    return false;
                }
                if (keyAchivement[i].value.length > 200){

                    var errorMsg='Key Achivement Should not more than 200 Charecter Length!!'
                    validationError(errorMsg)
                    return false;

                }
                if(supervisorName[i].value==""){

                    var errorMsg='Please Type Supervisor Name First!!'
                    validationError(errorMsg)
                    return false;
                }
                if (supervisorName[i].value.length > 200){

                    var errorMsg='Supervisor Name Should not more than 200 Charecter Length!!'
                    validationError(errorMsg)
                    return false;

                }

                if(reservationContactingEmployer[i].value==""){

                    var errorMsg='Please Select reservation of Contacting Employer First!!'
                    validationError(errorMsg)
                    return false;
                }

                if(employmentType[i].value==""){

                    var errorMsg='Please Select Employment Type First!!'
                    validationError(errorMsg)
                    return false;
                }
                if (employmentType[i].value != ""){

                    if (employmentType[i].value == "{{OTHERS}}" && employmentTypeText[i].value != "" ){

                        var errorMsg='Please Write Employement Other Text First!!';
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

                        var errorMsg='Please Select organizationType First!!'
                        validationError(errorMsg)
                        return false;
                    }

                    if(organization==""){

                        var errorMsg='Please Type Organization Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (organization.length > 100){

                        var errorMsg='Organization Name Should not more than 100 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(degisnation==""){

                        var errorMsg='Please Type Designation First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Designation Should not more than 100 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start==""){

                        var errorMsg='Please Select a Start Date First!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after Start Date!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }

                    if($.trim(address)==""){

                        var errorMsg='Please Type address First!!';
                        validationError(errorMsg);
                        return false;

                    }

                    if(majorResponsibilities==""){

                        var errorMsg='Please Type Major Responsibilities First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (majorResponsibilities.length > 200){

                        var errorMsg='Major Responsibilities Should not more than 200 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(keyAchivement==""){

                        var errorMsg='Please Type Key Achivement First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (keyAchivement.length > 200){

                        var errorMsg='Key Achivement Should not more than 200 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(supervisorName==""){

                        var errorMsg='Please Type Supervisor Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (supervisorName.length > 200){

                        var errorMsg='Supervisor Name Should not more than 200 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(reservationContactingEmployer==""){

                        var errorMsg='Please Select reservation of Contacting Employer First!!'
                        validationError(errorMsg)
                        return false;
                    }

                    if(employmentType==""){

                        var errorMsg='Please Select Employment Type First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (employmentType != ""){

                        if (employmentType == "{{OTHERS}}" && employmentTypeText != "" ){

                            var errorMsg='Please Write Employement Other Text First!!';
                            validationError(errorMsg);
                            return false;

                        }


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

                        var errorMsg='Please Select organizationType First!!'
                        validationError(errorMsg)
                        return false;
                    }



                    if(organization==""){

                        var errorMsg='Please Type Organization Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (organization.length > 100){

                        var errorMsg='Organization Name Should not more than 100 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(degisnation==""){

                        var errorMsg='Please Type Designation First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Designation Should not more than 100 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start==""){

                        var errorMsg='Please Select a Start Date First!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after Start Date!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }

                    if($.trim(address)==""){

                        var errorMsg='Please Type address First!!';
                        validationError(errorMsg);
                        return false;

                    }

                    if(majorResponsibilities==""){

                        var errorMsg='Please Type Major Responsibilities First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (majorResponsibilities.length > 200){

                        var errorMsg='Major Responsibilities Should not more than 200 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(keyAchivement==""){

                        var errorMsg='Please Type Key Achivement First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (keyAchivement.length > 200){

                        var errorMsg='Key Achivement Should not more than 200 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(supervisorName==""){

                        var errorMsg='Please Type Supervisor Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (supervisorName.length > 200){

                        var errorMsg='Supervisor Name Should not more than 200 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(reservationContactingEmployer==""){

                        var errorMsg='Please Select reservation of Contacting Employer First!!'
                        validationError(errorMsg)
                        return false;
                    }

                    if(employmentType==""){

                        var errorMsg='Please Select Employment Type First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (employmentType != ""){

                        if (employmentType == "{{OTHERS}}" && employmentTypeText != "" ){

                            var errorMsg='Please Write Employement Other Text First!!';
                            validationError(errorMsg);
                            return false;

                        }


                    }


                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div class="row"> ' +
                        '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Organization Type<span style="color: red">*</span></label>'+
                    '<select required name="organizationType[]" class="form-control" id="sel1">'+
                    '<option selected value="">Select Organization Type</option>'+
                @foreach($companyType as $natio)
                '<option value="{{$natio->organizationTypeId}}">{{$natio->organizationTypeName}}</option>'+
                        @endforeach
                    '</select>'+

                        {{--<input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>--}}
                    '</div>'+
                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Organization Name</label> ' +
                    '<input type="text" class="form-control" name="organization[]" id="organization'+counter+'" placeholder="organization" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputEmail4">Designation</label> ' +
                    '<input type="text" class="form-control" name="degisnation[]" id="degisnation'+counter+'" placeholder="designation" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Start Date</label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">End Date</label> ' +
                    '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'" placeholder="date"> ' +
                    '</div> ' +
                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputPassword4">Address</label> ' +
                    '<textarea class="form-control" name="address[]" id="address'+counter+'" placeholder="address"></textarea> ' +
                    '</div> ' +
                    '<div class="form-group col-md-12">'+
                    '<label for="inputPassword4">Major responsibilities<span style="color: red">*</span> </label>'+
                    '<textarea class="form-control" name="majorResponsibilities[]" maxlength="200" required id="majorResponsibilities'+counter+'" placeholder="Major responsibilities"></textarea>'+
                    '</div>'+
                    '<div class="form-group col-md-12">'+
                    '<label for="inputPassword4">Key Achievement<span style="color: red">*</span> </label>'+
                    '<textarea class="form-control" name="keyAchivement[]" maxlength="200" required id="keyAchivement'+counter+'" placeholder="Key Achievement"></textarea>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Name of Supervisor<span style="color: red">*</span></label>'+
                    '<input type="text" class="form-control" name="supervisorName[]" id="supervisorName'+counter+'" placeholder="Name of Supervisor" required>'+
                '</div>'+
                '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Any reservation contacting your employer?<span style="color: red">*</span></label>'+
                    '<select class="form-control" id="reservationContactingEmployer'+counter+'" name="reservationContactingEmployer[]" required>'+
                '<option value="" selected>Select Option</option>'+
                @foreach(YES_NO as $key=>$value)
                '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach
                    '</select>'+
                '</div>'+

                '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Type of Employment<span style="color: red">*</span></label>'+
                    '<select class="form-control" id="employmentType'+counter+'" onchange="employmentTypefunc('+counter+')" name="employmentType[]" required>'+
                '<option value="" selected>Select Employment Type</option>'+
                @foreach(TYPE_OF_EMPLOYMENT as $key=>$value)
                '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach
                    '<option value="{{OTHERS}}">Others</option>'+
                    '</select>'+
                '</div>'+
                '<div style="display: none" id="employmentTypeTextDiv'+counter+'" class="form-group col-md-6">'+
                    '<label for="inputEmail4">Write Employment Type<span style="color: red">*</span></label>'+
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
                    alert("Atleast One Course Section is needed!!");
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
