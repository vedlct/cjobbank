<form  action="{{route('update.jobExperience')}}" onsubmit="return checkJobExperience()" method="post">
    <!-- One "tab" for each step in the form: -->
    {{csrf_field()}}
    <input type="hidden" name="jobExperienceId" value="{{$experience->jobExperienceId}}">



            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Company Type<span style="color: red">*</span></label>
                    <select required name="organizationType" class="form-control" id="organizationType">
                        <option selected value="">Select Company Type</option>
                        @foreach($companyType as $natio)
                            <option @if($experience->fkOrganizationType == $natio->organizationTypeId ) selected @endif value="{{$natio->organizationTypeId}}">{{$natio->organizationTypeName}}</option>
                        @endforeach
                    </select>

                    {{--<input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>--}}
                </div>

                <div class="form-group col-md-10">
                    <label for="inputEmail4">Company Name<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="organization" value="{{$experience->organization}}" id="organization" placeholder="organization" required>
                </div>
                {{--<div class="form-group col-md-2 ">--}}
                    {{--<button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$experience->jobExperienceId}})"><i class="fa fa-edit"></i></button>--}}
                    {{--<button type="button" class="btn btn-danger btn-sm " onclick="deleteExperience({{$experience->jobExperienceId}})"><i class="fa fa-trash"></i></button>--}}
                {{--</div>--}}
                    <div class="form-group col-md-4">
                    <label for="inputEmail4">Designation<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="degisnation" value="{{$experience->degisnation}}"  id="degisnation" placeholder="designation" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Start Date<span style="color: red">*</span></label>
                    <input type="text" class="form-control date" name="startDate" value="{{$experience->startDate}}"  id="start" placeholder="date" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">End Date</label>
                    <input type="text" class="form-control date" name="endDate" value="{{$experience->endDate}}"  id="end" placeholder="date">
                </div>
                <div class="form-group col-md-8">
                    <label for="inputPassword4">Address<span style="color: red">*</span></label>
                    <textarea required class="form-control" name="address"id="address" placeholder="address">{{$experience->address}} </textarea>
                </div>
                <div class="form-group col-md-12">
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

    function checkJobExperience(){

        var organizationType=$('#organizationType').val();
        var organization=$('#organization').val();
        var degisnation=$('#degisnation').val();
        var start=$('#start').val();
        var end=$('#end').val();
        var address=$('#address').val();



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