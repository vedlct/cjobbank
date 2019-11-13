<form  method="post" action="<?php echo e(route('cv.updatePersonalEducation')); ?>" onsubmit="return checkEducation()" >

<?php echo e(csrf_field()); ?>


        <input type="hidden" name="educationId" value="<?php echo e($education->educationId); ?>">
        <div  class="row">
            <div class="form-group col-md-4">

                <label for="">Education Degree<span style="color: red">*</span></label>
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
                    <option value="">Select Degree</option>
                    <option  selected value="<?php echo e($education->degreeId); ?>"><?php echo e($education->degreeName); ?></option>

                </select>

            </div>

            <div class="form-group col-md-12">
                <label for="">Institute Name<span style="color: red">*</span></label>
                <input type="text" name="instituteName" required class="form-control" id="instituteName" value="<?php echo e($education->institutionName); ?>" placeholder="">
            </div>
            <div class="form-group col-md-3">
                <label for="">Major</label>
                <select name="major" class="form-control" id="major">
                    <option value="">Select Major</option>
                    <option value="<?php echo e($education->educationMajorId); ?>"><?php echo e($education->educationMajorName); ?></option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="">Board</label>
                <select name="board" class="form-control" id="board">
                    <option value="" >Select Board</option>
                    <?php $__currentLoopData = $boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($board->boardId); ?>" <?php if($board->boardId == $education->fkboardId): ?> selected <?php endif; ?>><?php echo e($board->boardName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="">Country<span style="color: red">*</span></label>
                <select name="country" class="form-control" required id="country">
                    <option value="">Select Country</option>
                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($coun->countryId == $education->fkcountryId ): ?>selected <?php endif; ?> value="<?php echo e($coun->countryId); ?>"><?php echo e($coun->countryName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>


            <div class="form-group col-md-3">
                <label for="">Year<span style="color: red">*</span></label>
                <input name="passingYear" type="text" class="form-control date" value="<?php echo e($education->passingYear); ?>" id="passingYear" required placeholder="passing Year">
            </div>
            <div class="form-group col-md-3">
                <label for="">Result System<span style="color: red">*</span></label>
                <select name="resultSystem" class="form-control" required id="resultSydtem">
                    <option value="">Select System</option>
                    <?php $__currentLoopData = RESULT_SYSTEM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($value==$education->resultSystem): ?>selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="">CGPA<span style="color: red">*</span></label>
                <input name="result" type="text" class="form-control" value="<?php echo e($education->result); ?>" required id="cgpa" placeholder="">
            </div>
            <div class="form-group col-md-3">
                <label for="">Out of</label>
                <input type="text" name="resultOutOf" class="form-control" id="resultOutOf"  value="<?php echo e($education->resultOutOf); ?>"placeholder="CGPA Out of">
            </div>
            <div class="form-group col-md-3">
                <label for="">Status<span style="color: red">*</span></label>
                <select name="status"class="form-control" required id="educationStatus">
                    <?php $__currentLoopData = COMPLETING_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($value == $education->status): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
            </div>


        </div>
    <div class="form-group col-md-12">
        <a class="btn btn-danger pull-left" href="<?php echo e(route('candidate.cvEducation')); ?>">Cancel</a>&nbsp;&nbsp;
        <button class="btn btn-success pull-left">Update</button>

    </div>

</form>


<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<script>

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

    });
    $('#degree').on('change', function() {

        $.ajax({
            type:'POST',
            url:'<?php echo e(route('cv.getMajorForEducation')); ?>',
            data:{id:this.value},
            cache: false,
            success:function(data) {
                document.getElementById("major").innerHTML = data;

            }
        });

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
        if(instituteName==""){

            var errorMsg='Please Type instituteName First!!';
            validationError(errorMsg);
            return false;

        }
        if (instituteName.length > 255){

            var errorMsg='Institute Name Should not more than 255 Charecter Length!!';
            validationError(errorMsg);
            return false;

        }
        if(country==""){

            var errorMsg='Please Select a Country First!!';
            validationError(errorMsg);
            return false;

        }
        if(year==""){

            var errorMsg='Please Select a Year First!!';
            validationError(errorMsg);
            return false;

        }
        if(resultSydtem==""){

            var errorMsg='Please Select a Result System First!!';
            validationError(errorMsg);
            return false;

        }
        if(cgpa==""){

            var errorMsg='Please Type Your Result/CGPA First!!';
            validationError(errorMsg);
            return false;

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

</script>