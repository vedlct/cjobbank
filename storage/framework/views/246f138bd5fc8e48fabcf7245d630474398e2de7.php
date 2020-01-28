
<form  method="post" action="<?php echo e(route('cv.updatePersonalEducation')); ?>" onsubmit="return checkEducation()" >

<?php echo e(csrf_field()); ?>


        <input type="hidden" name="educationId" value="<?php echo e($education->educationId); ?>">
        <div  class="row">
            <div class="form-group col-md-4">

                <label for="">Exam/level<span style="color: red">*</span></label>
                <select name="educationLevel" class="form-control" required="" id="educationLevel">
                    <option value="">Select Education Level</option>
                    <?php $__currentLoopData = $educationLevel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edulevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($edulevel->educationLevelId==$education->educationLevelId): ?>selected <?php endif; ?> value="<?php echo e($edulevel->educationLevelId); ?>"><?php echo e($edulevel->educationLevelName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>
            <div class="form-group col-md-8">

                <label for="">Subject/Group<span style="color: red">*</span></label>
                <select name="degree" class="form-control" required id="degree">
                    <option value="">Select degree</option>
                    <option  selected value="<?php echo e($education->degreeId); ?>"><?php echo e($education->degreeName); ?></option>
                    <option  value="<?php echo e(OTHERS); ?>"><?php echo e(OTHERS); ?></option>


                </select>

            </div>

            <div style="display: none" id="degreeNameDiv" class="form-group col-md-12">
                <label for="">Degree name</label>
                <input type="text" maxlength="255" name="degreeName" class="form-control" id="degreeName"  placeholder="">

            </div>

            

            <div <?php if($education->eduLvlUnder == 2 || $education->eduLvlUnder==null ): ?> style=" dispaly:none" <?php endif; ?> id="instituteNameDiv" class="form-group col-md-12">
                <label for="">School/College/Institution name<span style="color: red">*</span></label>
                <input type="text" name="instituteName"  class="form-control" required id="instituteName" value="<?php echo e($education->institutionName); ?>" placeholder="">
            </div>

            



            <div <?php if(($education->eduLvlUnder != 2 || $education->eduLvlUnder== null) && $education->universityType == null): ?> style=" display: none" <?php endif; ?> id="instituteNameDiv" class="form-group col-md-3">
                <label for="">University type</label>
                <select name="universityType" class="form-control" id="universityType">
                    <option value="" >Select type</option>
                    <?php $__currentLoopData = UNIVERSITY_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($value == $education->universityType): ?> selected <?php endif; ?> value="<?php echo e($value); ?>" ><?php echo e($key); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>





            <div <?php if($education->eduLvlUnder != 1 || $education->eduLvlUnder==null ): ?> style="display: none" <?php endif; ?> id="boardDiv" class="form-group col-md-3">
                <label for="">Board/University</label>
                <select name="board" class="form-control" id="board">
                    <option value="" >Select doard</option>
                    <?php $__currentLoopData = $boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($board->boardId); ?>" <?php if($board->boardId == $education->fkboardId): ?> selected <?php endif; ?> ><?php echo e($board->boardName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e(OTHERS); ?>" ><?php echo e(OTHERS); ?></option>
                </select>
            </div>

            <div style="display: none" id="boardNameDiv" class="form-group col-md-3">
                <label for="">Board name</label>
                <input type="text" maxlength="255" name="boardName" class="form-control" id="boardName"  placeholder="">

            </div>


            <div class="form-group col-md-9">
                <label for="">Major</label>
                <select name="major"  class="form-control js-example-basic-single" id="majorSub">
                    <option value="">Select Major</option>

                    <?php $__currentLoopData = $major; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($mj->educationMajorId == $education->fkMajorId): ?> selected <?php endif; ?> value="<?php echo e($mj->educationMajorId); ?>"><?php echo e($mj->educationMajorName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e(OTHERS); ?>"><?php echo e(OTHERS); ?></option>
                </select>
            </div>
            <div style="display: none" id="subjectNameDiv" class="form-group col-md-6">
                <label for="">Subject name</label>
                <input type="text" name="subjectName" maxlength="255" class="form-control" id="subjectName"  placeholder="">

            </div>



            <div class="form-group col-md-3">
                <label for="">Country<span style="color: red">*</span></label>
                <select  name="country" class="form-control js-example-basic-single" required id="country">
                    <option value="">Select country</option>
                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($coun->countryId == $education->fkcountryId ): ?>selected <?php endif; ?> value="<?php echo e($coun->countryId); ?>"><?php echo e($coun->countryName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="">Status<span style="color: red">*</span></label>
                <select name="status"class="form-control" required id="educationStatus">
                    <?php $__currentLoopData = COMPLETING_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($value == $education->status): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
            </div>


            <div class="form-group col-md-3">
                <label for="">Passing year</label>
                <input name="passingYear" type="text" class="form-control date" value="<?php echo e($education->passingYear); ?>" id="passingYear"  placeholder="passing Year">
            </div>
            <div class="form-group col-md-3">
                <label for="">Result system<span style="color: red">*</span></label>
                <select name="resultSystem" class="form-control" required id="resultSydtem">
                    <option value="">Select System</option>
                    <?php if($education->resultSystem!=4): ?>
                    <?php $__currentLoopData = RESULT_SYSTEM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($value==$education->resultSystem): ?>selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(OTHERS); ?>" ><?php echo e(OTHERS); ?></option>
                    <?php else: ?>
                    <option selected value="<?php echo e(OTHERS); ?>" ><?php echo e(OTHERS); ?></option>
                    <?php endif; ?>
                </select>
            </div>

            <div <?php if($education->resultSystem !=4): ?>style="display: none" <?php endif; ?> id="resultSydtemNameDiv" class="form-group col-md-3">
                <label for="">Result system name</label>
                <input type="text" maxlength="255" name="resultSydtemName" value="<?php echo e($education->resultSystemName); ?>" class="form-control" id="resultSydtemName"  placeholder="">

            </div>

            <div class="form-group col-md-3">
                <label for="">Result/CGPA/Score</label>
                <input name="result" type="text" class="form-control" value="<?php echo e($education->result); ?>"  id="cgpa" maxlength="10" placeholder="">
            </div>
            <div class="form-group col-md-3">
                <label for="">Out of</label>
                <input type="text" name="resultOutOf" class="form-control" id="resultOutOf"  value="<?php echo e($education->resultOutOf); ?>"placeholder="CGPA Out of">
            </div>



        </div>
    <div class="form-group col-md-12">
        
        <button class="btn btn-danger pull-left" onclick="<?php echo e(route('candidate.cvEducation')); ?>">Cancel</button>&nbsp;&nbsp;
        <button class="btn btn-success">Update</button>

    </div>

</form>


<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<script>
    $('.js-example-basic-single').select2();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
        $('.date').datepicker({
            viewMode: "years",
            minViewMode: "years",
            format: 'yyyy'
        });
    });

    $('#majorSub').on('change', function() {

        var major =$('#majorSub').val();
        if (major == "<?php echo e(OTHERS); ?>"){

            $("#subjectNameDiv").show();
        }else {
            $("#subjectNameDiv").hide();
        }


    });

    $('#board').on('change', function() {

        var board =$('#board').val();
        if (board == "<?php echo e(OTHERS); ?>"){

            $("#boardNameDiv").show();
        }else {


            $("#boardNameDiv").hide();


        }



    });
    $('#educationLevel').on('change', function() {

        $.ajax({
            type:'POST',
            url:'<?php echo e(route('cv.getDegreeForEducation')); ?>',
            data:{id:this.value},
            cache: false,
            success:function(data) {
                document.getElementById("degree").innerHTML = data;

            }
        });

        $.ajax({
            type:'POST',
            url:'<?php echo e(route('cv.getBoradOrUniversity')); ?>',
            data:{id:this.value},
            cache: false,
            success:function(data) {

                if(data==0){

                    $("#instituteNameDiv").show();
                    $("#boardDiv").show();
                    $("#board").val($("#board option:first").val());
                    $("#universityType").val($("#universityType option:first").val());
                    $("#resultSydtem").val($("#resultSydtem option:first").val());
                    $("#resultSydtemNameDiv").hide();
                    $("#boardNameDiv").hide();
                    $("#universityTypeDiv").hide();
                    $("#degreeNameDiv").hide();
                    $("#subjectNameDiv").hide();
                    $('#majorSub').children('option:not(:first,:last)').remove();

                }else if (data == 1){
                    $("#instituteNameDiv").show();
                    $("#boardDiv").show();
                    $("#board").val($("#board option:first").val());
                    $("#universityType").val($("#universityType option:first").val());
                    $("#resultSydtem").val($("#resultSydtem option:first").val());
                    $("#resultSydtemNameDiv").hide();

                    $("#boardNameDiv").hide();
                    $("#universityTypeDiv").hide();
                    $("#degreeNameDiv").hide();
                    $("#subjectNameDiv").hide();
                    $('#majorSub').children('option:not(:first,:last)').remove();

                }else if (data == 2){
                    $("#instituteNameDiv").show();
                    $("#universityTypeDiv").show();
                    $("#boardDiv").hide();
                    $("#board").val($("#board option:first").val());
                    $("#universityType").val($("#universityType option:first").val());
                    $("#resultSydtem").val($("#resultSydtem option:first").val());
                    $("#resultSydtemNameDiv").hide();

                    $("#boardNameDiv").hide();
                    $("#degreeNameDiv").hide();
                    $("#subjectNameDiv").hide();
                    $('#majorSub').children('option:not(:first,:last)').remove();
                }

            }
        });


    });

    $('#resultSydtem').on('change', function() {

        var resultSydtem =$('#resultSydtem').val();
        if (resultSydtem == "<?php echo e(OTHERS); ?>"){

            $("#resultSydtemNameDiv").show();
        }else {


            $("#resultSydtemNameDiv").hide();


        }

    });

    $('#degree').on('change', function() {




        var degree =$('#degree').val();
        if (degree == "<?php echo e(OTHERS); ?>"){

            $("#degreeNameDiv").show();
            $("#subjectNameDiv").show();

            $('#majorSub').children('option:not(:first,:last)').remove();
            $("#majorSub option[value='<?php echo e(OTHERS); ?>']").attr("selected", true);
            $("#resultSydtem").val($("#resultSydtem option:first").val());

        }else {


            $("#degreeNameDiv").hide();
            $("#subjectNameDiv").hide();
            $("#resultSydtem").val($("#resultSydtem option:first").val());


            $.ajax({
                type:'POST',
                url:'<?php echo e(route('cv.getMajorForEducation')); ?>',
                data:{id:this.value},
                cache: false,
                success:function(data) {
                    document.getElementById("majorSub").innerHTML = data;

                }
            });
        }

    });

    function checkEducation(){

        var educationLevel=$('#educationLevel').val();
        var degree=$('#degree').val();
        var instituteName=$('#instituteName').val();

        var country=$('#country').val();
        var year=$('#passingYear').val();
        var resultSydtem=$('#resultSydtem').val();
        var cgpa=$('#cgpa').val();

        var status=$('#educationStatus').val();
        var major=$('#majorSub').val();

        var universityType=$('#universityType').val();

        if(major=="<?php echo e(OTHERS); ?>" && $("#subjectName").val()=="" ){
            var errorMsg='Please Type a Subject Name First!!'
            validationError(errorMsg);
            return false;
        }

        if(educationLevel==""){

            var errorMsg='Please Select a Education Level First!!';
            validationError(errorMsg);
            return false;
        }

        if(degree==""){

            var errorMsg='Please Select Degree First!!';
            validationError(errorMsg);
            return false;

        }

        if(instituteName!="") {

            if (instituteName == "") {

                var errorMsg = 'Please Type instituteName First!!';
                validationError(errorMsg);
                return false;

            }
            if (instituteName.length > 255) {

                var errorMsg = 'Institute Name Should not more than 255 Charecter Length!!';
                validationError(errorMsg);
                return false;

            }
        }

        if(universityType!="") {
            if (universityType == "") {

                var errorMsg = 'Please Type universityType First!!';
                validationError(errorMsg);
                return false;

            }
        }



        if(country==""){

            var errorMsg='Please Select a Country First!!';
            validationError(errorMsg);
            return false;

        }
        if(year!="") {
            if (year == "") {

                var errorMsg = 'Please Select a Year First!!';
                validationError(errorMsg);
                return false;

            }
        }
        if(resultSydtem==""){

            var errorMsg='Please Select a Result System First!!';
            validationError(errorMsg);
            return false;

        }
        if(cgpa!="") {
            if (cgpa == "") {

                var errorMsg = 'Please Type Your Result/CGPA First!!';
                validationError(errorMsg);
                return false;

            }
        }
        if(status==""){

            var errorMsg='Please Select a status First!!'
            validationError(errorMsg);
            return false;

        }
        //return false;

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

    $('#educationStatus').on('change', function() {

        var educationStatus =$('#educationStatus').val();
        if (educationStatus == '<?php echo e(COMPLETING_STATUS['On going']); ?>'){

            $("#cgpa").prop('required',false);
            $("#passingYear").prop('required',false);

        }else {

            $("#cgpa").prop('required',true);
            $("#passingYear").prop('required',true);
        }


    });

</script>