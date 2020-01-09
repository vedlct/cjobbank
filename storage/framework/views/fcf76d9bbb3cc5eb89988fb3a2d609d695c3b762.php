<form method="post" onsubmit="return checkProfessionalQualification()" action="<?php echo e(route('update.cvProfessionalCertificate')); ?>">

    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="professionalQualificationId" value="<?php echo e($professional->professionalQualificationId); ?>">
    <div class="row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Certificate name :<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="certificateName" id="certificateName" value="<?php echo e($professional->certificateName); ?>" placeholder="certificate" required>
        </div>
        
            
            

        

    </div>

    <div class="row">
        <div class="form-group col-md-8">
            <label for="inputEmail4">Institution</label> :
            <input type="text" class="form-control" name="institutionName" id="institutionName" value="<?php echo e($professional->institutionName); ?>" placeholder="institution">
        </div>

        <div class="form-group col-md-4">

            <label for="">Result system</label>
            <select name="resultSystem" class="form-control"  id="resultSydtem" >
                <option value="">Select System</option>

                
                    
                
                

                <?php if($professional->resultSystem!=4): ?>
                    <?php $__currentLoopData = RESULT_SYSTEM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($value==$professional->resultSystem): ?>selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e(OTHERS); ?>" ><?php echo e(OTHERS); ?></option>
                <?php else: ?>
                    <option selected value="<?php echo e(OTHERS); ?>" ><?php echo e(OTHERS); ?></option>
                <?php endif; ?>

            </select>
        </div>

        <div class="form-group" id="otherField">
            
                
                    
                    
                


            

        </div>

        <div <?php if($professional->resultSystem !=4): ?>style="display: none" <?php endif; ?> id="resultSydtemNameDiv" class="form-group col-md-4">
            <label for="">Result system name</label>
            <input type="text" maxlength="255" name="resultSydtemName" value="<?php echo e($professional->resultSystemName); ?>" class="form-control" id="resultSydtemName"  placeholder="">

        </div>

        <div class="form-group col-md-4">
            <label for="inputPassword4">Result :</label>
            <input type="text" class="form-control" name="result" value="<?php echo e($professional->result); ?>" id="result" placeholder="Result">
        </div>

        <div class="form-group col-md-4">
            <label for="inputPassword4">Start date </label>:
            <input type="text" class="form-control date" name="startDate" value="<?php echo e($professional->startDate); ?>" id="start" placeholder="date">
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">End date </label>:
            <input type="text" class="form-control date" name="endDate" value="<?php echo e($professional->endDate); ?>" id="end" placeholder="date">
        </div>
    </div>
<div class="row" id="courseDuration">
        <label>Duration</label>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Hour</label>
            <select  class="form-control js-example-basic-single" id="trainingCertificatehour" name="hour">

                <option value="">Select hour</option>
                <?php for($i = 1 ; $i <=300 ; $i++): ?>
                    <option value="<?php echo e($i); ?>" <?php if($professional->hour == $i): ?>selected <?php endif; ?>><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Day</label>
            <select  class="form-control js-example-basic-single" id="trainingCertificateday" name="day">

                <option value="">Select day</option>
                <?php for($i = 1 ; $i <=365 ; $i++): ?>
                    <option value="<?php echo e($i); ?>" <?php if($professional->day == $i): ?>selected <?php endif; ?>><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Week</label>
            <select  class="form-control js-example-basic-single" id="trainingCertificateweek" name="week">

                <option value="">Select week</option>
                <?php for($i = 1 ; $i <=52 ; $i++): ?>
                    <option value="<?php echo e($i); ?>" <?php if($professional->week == $i): ?>selected <?php endif; ?>><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Month</label>
            <select  class="form-control js-example-basic-single" id="trainingCertificatemonth" name="month">

                <option value="">Select month</option>
                <?php for($i = 1 ; $i <=12 ; $i++): ?>
                    <option value="<?php echo e($i); ?>" <?php if($professional->month == $i): ?>selected <?php endif; ?>><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Year</label>
            <select  class="form-control js-example-basic-single" id="trainingCertificateyear" name="year">

                <option value="">Select year</option>
                <?php for($i = 1 ; $i <51 ; $i++): ?>
                    <option value="<?php echo e($i); ?>" <?php if($professional->year == $i): ?>selected <?php endif; ?>><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
        </div>
</div>
    <div class="row">

        <div class="form-group col-md-4">
            <label for="inputPassword4">Status <span style="color: red">*</span></label>:
            <select required class="form-control" id="professinalCertificateStatus" name="status"  onchange="selectStatus(this)">
                <option value="">Select status</option>

                <?php $__currentLoopData = COMPLETING_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($value == $professional->status): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-md-12">
            <a class="btn btn-danger pull-left" href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Cancel</a>&nbsp;&nbsp;
            <button  class="btn btn-info pull-right">Update</button>
        </div>

    </div>

</form>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.date').datepicker({
        format: 'yyyy-m-d'
    });

    $(function () {
        var status="<?php echo e($professional->status); ?>";
        if(status==1){
            $('#courseDuration').hide();

        }

        $('.js-example-basic-single').select2();


    });

    $('#resultSydtem').on('change', function() {

        var resultSydtem =$('#resultSydtem').val();
        if (resultSydtem == "<?php echo e(OTHERS); ?>"){

            $("#resultSydtemNameDiv").show();
        }else {


            $("#resultSydtemNameDiv").hide();


        }

    });

    function checkProfessionalQualification(){

        var certificateName=$('#certificateName').val();
        var institutionName=$('#institutionName').val();
//        var result=$('#result').val();
        var start=$('#start').val();
        var end=$('#end').val();
        var status=$('#professinalCertificateStatus').val();
        var resultSystem=$('#resultSystem').val();


//        if(certificateName==""){
//
//            var errorMsg='Please type certificate name first!!';
//            validationError(errorMsg);
//            return false;
//        }
//        if (certificateName.length > 100){
//
//            var errorMsg='Certificate name should not more than 100 charecter length!!';
//            validationError(errorMsg);
//            return false;
//
//        }
//        // if(institutionName==""){
//        //
//        //     var errorMsg='Please Type instituteName First!!'
//        //     validationError(errorMsg)
//        //     return false;
//        //
//        // }
//        if(resultSystem==""){
//
//            var errorMsg='Please select resultSystem first!!'
//            validationError(errorMsg)
//            return false;
//
//        }
//        if (institutionName.length > 255){
//
//            var errorMsg='Institute name should not more than 255 charecter length!!'
//            validationError(errorMsg)
//            return false;
//
//        }
//
//        if(status==""){
//
//            var errorMsg='Please select a status first!!'
//            validationError(errorMsg)
//            return false;
//
//        }
//        //return false;


        if(certificateName==""){

            var errorMsg='Please type certificate name first!!'
            validationError(errorMsg)
            return false;
        }
        if (certificateName.length > 100){

            var errorMsg='Certificate name should not more than 100 charecter length!!'
            validationError(errorMsg)
            return false;

        }
//        if(institutionName==""){
//
//            var errorMsg='Please type institute name first!!'
//            validationError(errorMsg)
//            return false;
//
//        }
        if (institutionName.length > 255){

            var errorMsg='Institute name should not more than 255 charecter length!!';
            validationError(errorMsg);
            return false;

        }

//        if(resultSystem==""){
//
//            var errorMsg='Please select result system first!!'
//            validationError(errorMsg)
//            return false;
//        }

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


    function changeResult(x) {
        // alert($(x).val());
        var value=$(x).val();


        if(value==4){
            $('#otherField').html(' <div class="form-group col-md-12">\n' +
                '                                    <label for="inputPassword4">Grade</label>\n' +
                '                                    <input type="text" class="form-control" name="grade"  placeholder="">\n' +
                '                                </div>');
        }

        else{
            $('#otherField').html('');
        }

    }

</script>