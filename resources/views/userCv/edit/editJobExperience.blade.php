<form  action="{{route('update.jobExperience')}}" onsubmit="return checkJobExperience()" method="post">
    <!-- One "tab" for each step in the form: -->
    {{csrf_field()}}
    <input type="hidden" name="jobExperienceId" value="{{$experience->jobExperienceId}}">

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Organization type<span style="color: red">*</span></label>
                    <select required name="organizationType" class="form-control" id="organizationType">
                        <option selected value="">Select organization type</option>
                        @foreach($companyType as $natio)
                            <option @if($experience->fkOrganizationType == $natio->organizationTypeId ) selected @endif value="{{$natio->organizationTypeId}}">{{$natio->organizationTypeName}}</option>
                        @endforeach
                    </select>

                    {{--<input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>--}}
                </div>

                <div class="form-group col-md-10">
                    <label for="inputEmail4">Organization name<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="organization" value="{{$experience->organization}}" id="organization" placeholder="organization" required>
                </div>

                    <div class="form-group col-md-4">
                    <label for="inputEmail4">Designation<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="degisnation" value="{{$experience->degisnation}}"  id="degisnation" placeholder="designation" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Start date<span style="color: red">*</span></label>
                    <input type="text" class="form-control date" name="startDate" value="{{$experience->startDate}}"  id="start" placeholder="date" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">End date</label>
                    <input type="text" class="form-control date" name="endDate" value="{{$experience->endDate}}"  id="end" placeholder="date">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Organization address<span style="color: red">*</span></label>
                    <textarea required class="form-control" name="address"id="address" placeholder="address">{{$experience->address}} </textarea>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Major responsibilities<span style="color: red">*</span> </label>
                    <textarea class="form-control" name="majorResponsibilities" maxlength="300" required id="majorResponsibilities" placeholder="Major responsibilities">{{$experience->majorResponsibilities}}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Key achievement<span style="color: red">*</span> </label>
                    <textarea class="form-control" name="keyAchivement" maxlength="300" required id="keyAchivement" placeholder="Key Achievement">{{$experience->keyAchivement}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name of supervisor<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="supervisorName" value="{{$experience->supervisorName}}" id="supervisorName" placeholder="Name of Supervisor" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Any reservation contacting your employer?<span style="color: red">*</span></label>
                    <select class="form-control" id="reservationContactingEmployer" name="reservationContactingEmployer" required>
                        <option value="" selected>Select option</option>
                        @foreach(YES_NO as $key=>$value)
                            <option @if($experience->reservationContactingEmployer == $value) selected @endif value="{{$value}}">{{$key}}</option>
                        @endforeach
                    </select>&nbsp;
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Type of employment<span style="color: red">*</span></label>
                    <select class="form-control" id="employmentType1"  name="employmentType" required>
                        <option value="" selected>Select employment type</option>
                        @foreach(TYPE_OF_EMPLOYMENT as $key=>$value)
                            <option @if($experience->employmentType == $value)selected @endif value="{{$value}}">{{$key}}</option>
                        @endforeach
                        <option @if($experience->employmentType == OTHERS)selected @endif value="{{OTHERS}}">Others</option>
                    </select>&nbsp;
                </div>

                <div @if($experience->employmentType != OTHERS) style="display: none" @endif id="employmentTypeTextDiv" class="form-group col-md-6">
                    <label for="inputEmail4">Write employment type<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{$experience->employmentTypeText}}" name="employmentTypeText" id="employmentTypeText" placeholder="Write Employment Type">

                </div>


                <div class="form-group col-md-12">
                    <a class="btn btn-danger pull-right" href="{{route('JobExperience.index')}}">Cancel</a>
                    <button  class="btn btn-info pull-right">Update</button>
                </div>
            </div>



    </form>

<meta name="csrf-token" content="{{ csrf_token() }}" />

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.date').datepicker({
        format: 'yyyy-m-d'
    });


    $('#employmentType1').on('change', function() {

        var employmentType =$('#employmentType1').val();

        if (employmentType == "{{OTHERS}}"){

            $("#employmentTypeTextDiv").show();
        }else {
            $("#employmentTypeTextDiv").hide();
        }


    });

    function checkJobExperience(){

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

            var errorMsg='Please Select a Organization Type First!!'
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
