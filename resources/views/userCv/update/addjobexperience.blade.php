<style>
    #notice{
        color: blue;
    }
</style>

    <form onsubmit="return checkJobExperience()" action="{{route('jobExperience.submit')}}" method="post">
    {{csrf_field()}}

    <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Organization type<span style="color: red">*</span></label>
            <select required name="organizationType" class="form-control" id="organizationType">
                <option selected value="">Select organization type</option>
                @foreach($companyType as $natio)
                    <option value="{{$natio->organizationTypeId}}">{{$natio->organizationTypeName}}</option>
                @endforeach
            </select>

            {{--<input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>--}}
        </div>

        <div class="form-group col-md-10">
            <label for="inputEmail4">Organization name<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="organization" id="organization" placeholder="organization" required>
        </div>

        <div class="form-group col-md-4">
            <label for="inputEmail4">Designation<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="degisnation" id="degisnation" placeholder="designation" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">Start date<span style="color: red">*</span></label>
            <input type="text" class="form-control date" name="startDate" id="start" placeholder="date" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">End date</label>
            <input type="text" class="form-control date" name="endDate" id="end" placeholder="date">
        </div>
        <div id="experienceDiv" style="display: none" class="form-group col-md-4">
            <label for="inputPassword4">Total Experience</label>
            <input type="text" class="form-control" name="totalExp" id="totalExpValue" placeholder="experience">
        </div>
        <div class="form-group col-md-12">
            <label for="inputPassword4">Organization address</label>
            <textarea  class="form-control" rows="5" name="address"id="address" placeholder="address"></textarea>
        </div>

        <div class="form-group col-md-12">
            <label for="majorResponsibilities">Major responsibilities</label>
            <textarea class="form-control ckeditor" rows="15" name="majorResponsibilities" id="majorResponsibilities" placeholder="Major responsibilities"></textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="keyAchivement">Key achievement</label>
            <textarea class="form-control ckeditor" rows="15" name="keyAchivement" id="keyAchivement" placeholder="Key Achievement"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Name of supervisor</label>
            <input type="text" class="form-control" name="supervisorName" id="supervisorName" placeholder="Name of Supervisor">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Any reservation contacting your employer?</label>
            <select class="form-control" id="reservationContactingEmployer" name="reservationContactingEmployer" >
                <option value="" selected>Select option</option>
                @foreach(YES_NO as $key=>$value)
                <option value="{{$value}}">{{$key}}</option>
                @endforeach
            </select>&nbsp;
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Type of employment<span style="color: red">*</span></label>
            <select class="form-control" id="employmentType1"  name="employmentType" required>

                <option value="" selected>Select Employment Type</option>
                @foreach($employmentType as $eT)
                    <option value="{{$eT->employmentTypeName}}">{{$eT->employmentTypeName}}</option>
                @endforeach
            </select>&nbsp;
        </div>

{{--        <div @if($experience->employmentType != OTHERS) style="display: none" @endif id="employmentTypeTextDiv" class="form-group col-md-6">--}}

{{--            <label for="inputEmail4">Please mention other types<span style="color: red">*</span></label>--}}

{{--            <input type="text" class="form-control" value="{{$experience->employmentTypeText}}" name="employmentTypeText" id="employmentTypeText" placeholder="Write Employment Type">--}}

{{--        </div>--}}


        <div class="form-group col-md-12">
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="submit" id="submitBtn">Save</button>
                </div>
            </div>
        </div>
    </div>



</form>

<script type="text/javascript" src="{{url('public/assets/ckeditor/ckeditor.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.date').datepicker({
        format: 'yyyy-m-d'
    });

    $( "#end" ).change(function() {

        if ($('#end').val()!="" && $('#start').val()!=""){

            var end = new Date($('#end').val());
            var start = new Date($('#start').val());
            var exp=calcDate(end,start);

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

        var now = date1;
        var today = date2;
        var yearNow = now.getYear();
        var monthNow = now.getMonth();
        var dateNow = now.getDate();
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

        // if (majorResponsibilities.length > 5000){
        //
        //     var errorMsg='Major Responsibilities Should not more than 5000 Charecter Length!!'
        //     validationError(errorMsg)
        //     return false;
        //
        // }
        //
        // if (keyAchivement.length > 5000){
        //     var errorMsg='Key Achivement Should not more than 5000 Charecter Length!!'
        //     validationError(errorMsg)
        //     return false;
        // }

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
                    btnClass: 'btn-green'
                }
            }
        });
    }

</script>

