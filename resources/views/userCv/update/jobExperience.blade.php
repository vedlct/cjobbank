@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">
                    <div id="regForm">


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Job Experience</h2>
                            @php($tempHr=0)
                            @foreach($experiences as $experience)
                                @if($tempHr>0)
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                @endif
                                    <div id="edit{{$experience->jobExperienceId}}">
                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Organization Type :</label>
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
                                                <label for="inputEmail4">Organization Name :</label>
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
                                                <label for="inputPassword4">Start Date :</label>
                                                {{$experience->startDate}}

                                            </div>
                                            <div class="form-group col-md-4">

                                                @if($experience->endDate==null)
                                                    <label for="inputPassword4">Status :</label>
                                                    Running
                                                @else
                                                    <label for="inputPassword4">End Date :</label>
                                                {{$experience->endDate}}
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Organization Address :</label>
                                                {{$experience->address}}

                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Major responsibilities :</label><br>
                                                {{$experience->majorResponsibilities}}

                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Key Achievement :</label><br>
                                                {{$experience->keyAchivement}}

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Name of Supervisor :</label>
                                                {{$experience->supervisorName}}

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Any reservation contacting your employer? :</label>
                                                @foreach(YES_NO as $key=>$value)
                                                    @if($value==$experience->reservationContactingEmployer){{$key}} @endif
                                                @endforeach

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Type of Employment :</label>
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

                            <form  action="{{route('submit.jobExperience')}}" method="post">
                                <!-- One "tab" for each step in the form: -->
                                {{csrf_field()}}
                                <input class="form-check-input"  type="hidden"  name="hasProfCertificate" value="1">
                                <div id="TextBoxesGroup">
                                </div>



                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

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

                        var errorMsg='Please Select a Strat Date First!!';
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
                    '<select required name="organizationType[]" class="form-control" id="organizationType'+counter+'">'+
                    '<option selected value="">Select Organization Type</option>'+
                @foreach($companyType as $natio)
                '<option value="{{$natio->organizationTypeId}}">{{$natio->organizationTypeName}}</option>'+
                        @endforeach
                    '</select>'+

                        {{--<input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>--}}
                    '</div>'+
                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Organization Name<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="organization[]" id="organization'+counter+'" placeholder="organization" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputEmail4">Designation<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="degisnation[]" id="degisnation'+counter+'" placeholder="designation" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Start Date<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">End Date</label> ' +
                    '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'" placeholder="date"> ' +
                    '</div> ' +
                    '<div class="form-group col-md-8"> ' +
                    '<label for="inputPassword4">Address<span style="color: red">*</span></label> ' +
                    '<textarea required class="form-control" name="address[]" id="address'+counter+'" placeholder="address"></textarea> ' +
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
                    $("#submitBtn").show();
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
                    $("#submitBtn").hide();
                }
                $("#TextBoxDiv" + counter).remove();
            });


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
