@extends('main')

@section('content')
    <style>
        .updateCard {
            height:2500px;
        }

        @media only screen and (max-width: 1450px) and (min-width: 801px) {
            .updateCard {
            height:3800px;
        }
        }
    </style>
    <style>
        #notice{
            color: blue;
        }
    </style>

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
                            <a class="activeNav" href="{{route('JobExperience.index')}}">Job experience</a>
                            <a href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a  href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a  href="{{route('refree.index')}}">Referee</a>
                            <a  href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm">


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Job experience</h2>
                            @php($tempHr=0)
                            @foreach($experiences as $experience)
                                @if($tempHr>0)
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                @endif
                                    <div id="edit{{$experience->jobExperienceId}}">
                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Organization type :</label>
                                                {{$experience->organizationTypeName}}
                                                {{--<select required name="organizationType[]" class="form-control" id="organizationType">--}}
                                                    {{--<option selected value="">Select Company Type</option>--}}
                                                    {{--@foreach($companyType as $natio)--}}
                                                        {{--<option @if($experience->fkOrganizationType == $natio->organizationTypeId ) selected @endif value="{{$natio->organizationTypeId}}">{{$natio->organizationTypeName}}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}

                                                {{--<input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>--}}
                                            </div>

                                            <div class="form-group col-md-10">
                                                <label for="inputEmail4">Organization name :</label>
                                              {{$experience->organization}}

                                            </div>

                                            <div class="form-group col-md-2 ">
                                                <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$experience->jobExperienceId}})"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm " onclick="deleteExperience({{$experience->jobExperienceId}})"><i class="fa fa-trash"></i></button>

                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Designation :</label>
                                                {{$experience->degisnation}}

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Start date :</label>
                                                {{$experience->startDate}}

                                            </div>
                                            <div class="form-group col-md-4">

                                                @if($experience->endDate==null)
                                                    <label for="inputPassword4">Status :</label>
                                                    Running
                                                @else
                                                    <label for="inputPassword4">End date :</label>
                                                {{$experience->endDate}}
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12">


                                                    <label for="inputPassword4">Total experience :</label>
                                                <span id="TE{{$tempHr}}"></span>



                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Organization address :</label>
                                                {{$experience->address}}

                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Major responsibilities :</label><br>
                                                {{$experience->majorResponsibilities}}

                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Key achievement :</label><br>
                                                {{$experience->keyAchivement}}

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Name of supervisor :</label>
                                                {{$experience->supervisorName}}

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Any reservation contacting your employer? :</label>
                                                @foreach(YES_NO as $key=>$value)
                                                    @if($value==$experience->reservationContactingEmployer){{$key}} @endif
                                                @endforeach

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Type of employment :</label>
                                                {{$experience->employmentType}}

                                            </div>
                                            @if($experience->employmentType== OTHERS)
                                            <div class="form-group col-md-6">

                                                <label for="inputPassword4">Employment type (other) :</label>

                                                {{$experience->employmentTypeText}}

                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @php($tempHr++)
                            @endforeach

                            <form  onsubmit="return checkJobExperience()" action="{{route('submit.jobExperience')}}" method="post">
                                <!-- One "tab" for each step in the form: -->
                                {{csrf_field()}}
                                <input class="form-check-input"  type="hidden"  name="hasProfCertificate" value="1">
                                <div id="TextBoxesGroup">
                                </div>



                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                        </div>


                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.cvProfessionalCertificate')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                {{--<a href="{{route('refree.index')}}"><button type="button" id="nextBtn" >Next</button></a>--}}
                                <a href="{{route('candidate.previousWorkInCB.index')}}"><button type="button" id="nextBtn" >Next</button></a>

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

        function editInfo(x){

            $.ajax({
                type: 'POST',
                url: "{!! route('JobExperience.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'jobExperienceId': x},
                success: function (data) {
//                    console.log(data);
                    $('#edit'+x).html(data);
                    $("#addButton").hide();

                }
            });
        }
        function deleteExperience(x){
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('JobExperience.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'jobExperienceId': x},
                            success: function (data) {
//                                console.log(data);
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
            x[(n+4)].className += " active";
        }
    </script>



    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
           // var expss= '{{$experiences}}';

          //  console.log(expss[0]);



//            for (var $i=0;$i<=expss.length;$i++){
//
//                console.log(expss[0]['startDate']);

//            if((expss[$i]['startDate']) && (expss[$i]['endDate']))
//            document.getElementById("TE"+[0]).innerHTML = calcDate(new Date(expss[$i]['endDate']),new Date(expss[$i]['startDate']));
//            else if((expss[$i]['startDate']) && !(expss[$i]['endDate']))
//            document.getElementById("TE"+[$i]).innerHTML = calcDate(new Date(),new Date(expss[$i]['startDate']));


//            }


                <?php $ii=0;?>
                @foreach($experiences as $experience)


                @if(!is_null($experience->startDate) && !is_null($experience->endDate))
                document.getElementById("TE"+'{{$ii}}').innerHTML = calcDate(new Date('{{$experience->endDate}}'),new Date('{{$experience->startDate}}'));
                @elseif(!is_null($experience->startDate) && is_null($experience->endDate))
                document.getElementById("TE"+'{{$ii}}').innerHTML = calcDate(new Date(),new Date('{{$experience->startDate}}'));
                @endif
            <?php $ii++;?>
            @endforeach





        });

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter > 1){

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

                        var errorMsg='Please select a strat date first!!';
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




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div class="row"> ' +
                        '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Organization type<span style="color: red">*</span></label>'+
                    '<select required name="organizationType[]" class="form-control" id="organizationType'+counter+'">'+
                    '<option selected value="">Select organization type</option>'+
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
                    '<textarea  class="form-control" rows="5" name="address[]" id="address'+counter+'" placeholder="address"></textarea> ' +
                    '</div> ' +
                    '<div class="form-group col-md-12">'+
                    '<label for="inputPassword4">Major responsibilities: <span id="notice">Max limit 5000 character</span></label>'+
                    '<textarea class="form-control" rows="15"name="majorResponsibilities[]" maxlength="5000"  id="majorResponsibilities'+counter+'" placeholder="Major responsibilities"></textarea>'+
                    '</div>'+
                    '<div class="form-group col-md-12">'+
                    '<label for="inputPassword4">Key achievement: <span id="notice">Max limit 5000 character</span></label>'+
                    '<textarea class="form-control" rows="15" name="keyAchivement[]" maxlength="5000"  id="keyAchivement'+counter+'" placeholder="Key Achievement"></textarea>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Name of supervisor</label>'+
                    '<input type="text" class="form-control" name="supervisorName[]" id="supervisorName'+counter+'" placeholder="Name of Supervisor" >'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Any reservation contacting your employer?</label>'+
                    '<select class="form-control" id="reservationContactingEmployer'+counter+'" name="reservationContactingEmployer[]" >'+
                    '<option value="" selected>Select Option</option>'+
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
                    '<label for="inputEmail4">Write Employment Type</label>'+
                    '<input type="text" class="form-control" name="employmentTypeText[]" id="employmentTypeText'+counter+'" placeholder="Write Employment Type">'+

                    '</div>'+
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

        function checkJobExperience(){




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

        function getExp(counter) {

            if ($('#end'+counter).val()!="" && $('#start'+counter).val()!=""){

                var total_month='';

                var end = new Date($('#end'+counter).val());
                var start = new Date($('#start'+counter).val());
                var exp=calcDate(end,start)


                $("#totalExpValue"+counter).val(exp);

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

    </script>



@endsection
