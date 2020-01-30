<style>
    #notice{
        color: blue;
    }
</style>

<form  action="<?php echo e(route('update.jobExperience')); ?>" onsubmit="return checkJobExperience()" method="post">
    <!-- One "tab" for each step in the form: -->
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="jobExperienceId" value="<?php echo e($experience->jobExperienceId); ?>">

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Organization type<span style="color: red">*</span></label>
                    <select required name="organizationType" class="form-control" id="organizationType">
                        <option selected value="">Select organization type</option>
                        <?php $__currentLoopData = $companyType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $natio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($experience->fkOrganizationType == $natio->organizationTypeId ): ?> selected <?php endif; ?> value="<?php echo e($natio->organizationTypeId); ?>"><?php echo e($natio->organizationTypeName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    
                </div>

                <div class="form-group col-md-10">
                    <label for="inputEmail4">Organization name<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="organization" value="<?php echo e($experience->organization); ?>" id="organization" placeholder="organization" required>
                </div>

                    <div class="form-group col-md-4">
                    <label for="inputEmail4">Designation<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="degisnation" value="<?php echo e($experience->degisnation); ?>"  id="degisnation" placeholder="designation" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Start date<span style="color: red">*</span></label>
                    <input type="text" class="form-control date" name="startDate" value="<?php echo e($experience->startDate); ?>"  id="start" placeholder="date" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">End date</label>
                    <input type="text" class="form-control date" name="endDate" value="<?php echo e($experience->endDate); ?>"  id="end" placeholder="date">
                </div>
                <div id="experienceDiv" style="display: none" class="form-group col-md-4">
                    <label for="inputPassword4">Total Experience</label>
                    <input type="text" class="form-control" name="totalExp" id="totalExpValue" placeholder="experience">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Organization address</label>
                    <textarea  class="form-control" rows="5" name="address"id="address" placeholder="address"><?php echo e($experience->address); ?> </textarea>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Major responsibilities <span style="color: red">* (Maximum 5000 character)</span></label>
                    <textarea class="form-control ckeditor" rows="15" name="majorResponsibilities" id="majorResponsibilities" placeholder="Major responsibilities"><?php echo $experience->majorResponsibilities; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Key achievement <span style="color: red">* (Maximum 5000 character)</span></label>
                    <textarea class="form-control ckeditor" rows="15" name="keyAchivement" id="keyAchivement" placeholder="Key Achievement"><?php echo e($experience->keyAchivement); ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name of supervisor<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="supervisorName" value="<?php echo e($experience->supervisorName); ?>" id="supervisorName" placeholder="Name of Supervisor">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Any reservation contacting your employer?</label>
                    <select class="form-control" id="reservationContactingEmployer" name="reservationContactingEmployer" >
                        <option value="" selected>Select option</option>
                        <?php $__currentLoopData = YES_NO; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($experience->reservationContactingEmployer == $value): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>&nbsp;
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Type of employment<span style="color: red">*</span></label>
                    <select class="form-control" id="employmentType1"  name="employmentType" required>

                        <option value="" selected>Select Employment Type</option>
                        <?php $__currentLoopData = $employmentType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eT): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($eT->employmentTypeName == $experience->employmentType): ?>selected <?php endif; ?> value="<?php echo e($eT->employmentTypeName); ?>"><?php echo e($eT->employmentTypeName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($experience->employmentType == OTHERS): ?>selected <?php endif; ?> value="<?php echo e(OTHERS); ?>">Others</option>
                    </select>&nbsp;
                </div>

                <div <?php if($experience->employmentType != OTHERS): ?> style="display: none" <?php endif; ?> id="employmentTypeTextDiv" class="form-group col-md-6">

                    <label for="inputEmail4">Please mention other types<span style="color: red">*</span></label>

                    <input type="text" class="form-control" value="<?php echo e($experience->employmentTypeText); ?>" name="employmentTypeText" id="employmentTypeText" placeholder="Write Employment Type">

                </div>


                <div class="form-group col-md-12">
                    <a class="btn btn-danger pull-right" href="<?php echo e(route('JobExperience.index')); ?>">Cancel</a>
                    <button  class="btn btn-info pull-right">Update</button>
                </div>
            </div>



    </form>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<script type="text/javascript" src="<?php echo e(url('public/assets/ckeditor/ckeditor.js')); ?>"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.date').datepicker({
        format: 'yyyy-m-d'
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


    $('#employmentType1').on('change', function() {

        var employmentType =$('#employmentType1').val();

        if (employmentType == "<?php echo e(OTHERS); ?>"){

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

        var majorResponsibilities=CKEDITOR.instances['majorResponsibilities'].getData();
        var keyAchivement=CKEDITOR.instances['keyAchivement'].getData();
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

        if(majorResponsibilities.length == 0){
            var errorMsg='Please type major responsibilities first!!';
            validationError(errorMsg);
            return false;
        }

        if(CKEDITOR.instances.majorResponsibilities.document.getBody().getText().length > 5000){
            var errorMsg = 'Major responsibilities should not more than 5000 charecter length!!';
            validationError(errorMsg);
            return false;
        }

        if(keyAchivement.length == 0){
            var errorMsg='Please type key achivement first!!';
            validationError(errorMsg);
            return false;
        }

        if(CKEDITOR.instances.keyAchivement.document.getBody().getText().length > 5000){
            var errorMsg = 'Key achivement should not more than 5000 charecter length!!';
            validationError(errorMsg);
            return false;
        }

        if(employmentType==""){
            var errorMsg='Please Select Employment Type First!!'
            validationError(errorMsg)
            return false;
        }

        if(supervisorName==""){
            var errorMsg='Please insert supervisor name!!';
            validationError(errorMsg);
            return false;
        }

        if (employmentType != ""){
            if (employmentType == "<?php echo e(OTHERS); ?>" && employmentTypeText != "" ){
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
