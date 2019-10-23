<?php $__env->startSection('content'); ?>

    <style>
        strong{
            color: red;
        }
        notice{
            color: blue;
        }
        #radioBtn .notActive{
            color: #3276b1;
            background-color: #fff;
        }
        /*#imageMsg,#signMsg{*/
            /*display: none;*/
        /*}*/
    </style>

    <div class="row ">
        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    <?php $__currentLoopData = $employeeCvPersonalInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personalInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form  id="regForm" enctype="multipart/form-data" method="post"  action="<?php echo e(route('cv.updatePersonalInfo')); ?>">

                        <?php echo e(csrf_field()); ?>

                        <!-- One "tab" for each step in the form: -->

                            


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Given name<span style="color: red">*</span></label>
                                        <input type="text" required name="firstName" class="form-control <?php echo e($errors->has('firstName') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->firstName); ?>" id="" placeholder="">
                                        <?php if($errors->has('firstName')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('firstName')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Surname<span style="color: red">*</span></label>
                                        <input type="text" required name="lastName" class="form-control <?php echo e($errors->has('lastName') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->lastName); ?>" id="" placeholder="">
                                        <?php if($errors->has('lastName')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('lastName')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Father name<span style="color: red">*</span></label>
                                        <input type="text" required name="fathersName" class="form-control <?php echo e($errors->has('fathersName') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->fathersName); ?>" id="" placeholder="">
                                        <?php if($errors->has('fathersName')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('fathersName')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mother name<span style="color: red">*</span></label>
                                        <input type="text" name="mothersName" required class="form-control <?php echo e($errors->has('mothersName') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->mothersName); ?>" id="" placeholder="">
                                        <?php if($errors->has('mothersName')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('mothersName')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Gender<span style="color: red">*</span> </label>
                                        <select required name="gender" class="form-control" id="sel1">
                                            <option selected value="">Select Gender</option>
                                            <?php $__currentLoopData = GENDER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($personalInfo->gender == $value): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Religion<span style="color: red">*</span></label>
                                        <select required name="religion"class="form-control" id="sel1">
                                            <option selected value="">Select Religion</option>
                                            <?php $__currentLoopData = $religion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($personalInfo->fkreligionId == $reli->religionId): ?> selected <?php endif; ?> value="<?php echo e($reli->religionId); ?>"><?php echo e($reli->religionName); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Ethnicity<span style="color: red">*</span></label>
                                        <select required name="ethnicity" class="form-control" id="sel1">
                                            <option selected value="">Select Ethnicity</option>
                                            <?php $__currentLoopData = $ethnicity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ethi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option <?php if($personalInfo->ethnicityId == $ethi->ethnicityId): ?> selected <?php endif; ?> value="<?php echo e($ethi->ethnicityId); ?>"><?php echo e($ethi->ethnicityName); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Disability<span style="color: red">*</span></label>
                                        <select required name="disability" class="form-control" id="sel1">
                                            <option selected value="">Select Disability</option>
                                            <?php $__currentLoopData = DISABILITY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($personalInfo->disability == $value): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Date of birth<span style="color: red">*</span></label>
                                        <input type="text" required name="dob" class="form-control <?php echo e($errors->has('dob') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->dateOfBirth); ?>" id="dob" placeholder="">
                                        <?php if($errors->has('dob')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('dob')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Blood group<span style="color: red">*</span></label>
                                        <select class="form-control" name="bloodGroup" required>
                                            <option value="">Select Group</option>
                                            <?php $__currentLoopData = BLOOD_GROUP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                
                                                <option  value="<?php echo e($value); ?>"  <?php if($personalInfo->bloodGroup == $value): ?> selected <?php endif; ?> ><?php echo e($key); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('bloodGroup')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('bloodGroup')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Marital status<span style="color: red">*</span></label>
                                        <select class="form-control" name="maritalStatus" required>
                                            <option value="">Select Status</option>
                                            <?php $__currentLoopData = MARITAL_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option  value="<?php echo e($value); ?>" <?php if($personalInfo->maritalStatus == $value): ?> selected <?php endif; ?>><?php echo e($key); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('maritalStatus')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('maritalStatus')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Name of spouse</label>
                                        <input type="text"  name="spouse" class="form-control"  value="<?php echo e($personalInfo->spouse); ?>" placeholder="Husband / Wife">
                                        <?php if($errors->has('spouse')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('spouse')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Nationality<span style="color: red">*</span></label>
                                        <select required name="nationality" class="form-control js-example-basic-single" id="sel1">
                                            <option selected value="">Select Nationality</option>
                                            <?php $__currentLoopData = $natinality; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $natio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($personalInfo->fknationalityId == $natio->nationalityId ): ?> selected <?php endif; ?> value="<?php echo e($natio->nationalityId); ?>"><?php echo e($natio->nationalityName); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Passport (if any)</label>
                                        <input type="text" placeholder="If any" onkeypress="return isAlfaNumberKey(event)" class="form-control" value="<?php echo e($personalInfo->passport); ?>" name="passport">
                                        <?php if($errors->has('passport')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('passport')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>

                                    <div id="radioBtn" class="form-group col-md-6">
                                        <label for="idProvided">Select NID/BID</label>
                                        <div class="col-sm-2 col-md-2"></div>
                                            <a <?php if(!is_null($personalInfo->nationalId)): ?>class="btn btn-primary btn-sm active" <?php else: ?> class="btn btn-primary btn-sm notActive" <?php endif; ?> data-toggle="idProvided" data-title="NID" onclick="nid()">NID</a>
                                            <a <?php if(!is_null($personalInfo->birthID)): ?>class="btn btn-primary btn-sm active" <?php else: ?> class="btn btn-primary btn-sm notActive" <?php endif; ?> data-toggle="idProvided" data-title="BID"onclick="bid()">BID</a>
                                            <input type="hidden" name="idProvided" id="idProvided">
                                        
                                    </div>


                                    <div class="form-group col-md-6" id="nid" style="display: none">
                                        <label for=""> NID <span style="color: red">*</span></label>
                                        <input  type="text" name="nId" class="form-control <?php echo e($errors->has('nId') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->nationalId); ?>" id="nidField" placeholder="">
                                        <?php if($errors->has('nId')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('nId')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group col-md-6" id="bid" style="display: none">
                                        <label for="">  BID <span style="color: red">*</span></label>
                                        <input  type="text" name="bId" class="form-control <?php echo e($errors->has('bId') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->birthID); ?>" id="bidField" placeholder="">
                                        <?php if($errors->has('bId')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('bId')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>




                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Email<span style="color: red">*</span></label>
                                        <input required type="text" name="email" class="form-control" value="<?php echo e(Auth::user()->email); ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Alternate email</label>
                                        <input  type="text" name="alternateEmail" class="form-control <?php echo e($errors->has('alternateEmail') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->alternativeEmail); ?>" id="" placeholder="">
                                        <?php if($errors->has('alternateEmail')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('alternateEmail')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Skype</label>
                                        <input type="text"  name="skype" class="form-control <?php echo e($errors->has('skype') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->skype); ?>" id="" placeholder="">
                                        <?php if($errors->has('skype')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('skype')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Telephone no.</label>
                                        <input  type="text" maxlength="20" onkeypress="return isNumberKey(event)" name="telephone" class="form-control <?php echo e($errors->has('telephone') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->telephone); ?>" id="" placeholder="">
                                        <?php if($errors->has('telephone')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('telephone')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Personal phone number<span style="color: red">*</span></label>
                                        <input required type="text" maxlength="20" onkeypress="return isNumberKey(event)" name="personalMobile" class="form-control <?php echo e($errors->has('personalMobile') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->personalMobile); ?>" id="" placeholder="">
                                        <?php if($errors->has('personalMobile')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('personalMobile')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Alternative phone no</label>
                                        <input  type="text" maxlength="20" onkeypress="return isNumberKey(event)" name="alternativePhoneNo" class="form-control <?php echo e($errors->has('alternativePhoneNo') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->alternativePhoneNo); ?>" id="" placeholder="">
                                        <?php if($errors->has('alternativePhoneNo')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('alternativePhoneNo')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Home telephone</label>
                                        <input  type="text" name="homeTelephone" onkeypress="return isNumberKey(event)" maxlength="20" class="form-control <?php echo e($errors->has('homeTelephone') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->homeNumber); ?>" id="" placeholder="">
                                        <?php if($errors->has('homeTelephone')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('homeTelephone')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">office telephone</label>
                                        <input  type="text" name="officeTelephone" onkeypress="return isNumberKey(event)" maxlength="20" class="form-control <?php echo e($errors->has('officeTelephone') ? ' is-invalid' : ''); ?>" value="<?php echo e($personalInfo->officeNumber); ?>" id="" placeholder="">
                                        <?php if($errors->has('officeTelephone')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('officeTelephone')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Current address<span style="color: red">*</span></label>
                                        <textarea rows="3" required name="currentAddress" class="form-control <?php echo e($errors->has('currentAddress') ? ' is-invalid' : ''); ?>"><?php echo e($personalInfo->presentAddress); ?></textarea>
                                        
                                        <?php if($errors->has('currentAddress')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('currentAddress')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="">Permanent address<span style="color: red">*</span></label>
                                        <textarea name="permanentAddress" class="form-control <?php echo e($errors->has('permanentAddress') ? ' is-invalid' : ''); ?>" required rows="3"><?php echo e($personalInfo->parmanentAddress); ?></textarea>
                                        
                                        <?php if($errors->has('permanentAddress')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('permanentAddress')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="">Please upload your updated picture</label>&nbsp;<span id="imageMsg"><notice>(Maximum Size 100Kb)</notice></span>
                                        <?php if($errors->has('image')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('image')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                        <input type="file" class="form-control" name="image" id="image" placeholder="">
                                        <br>
                                        <?php if($personalInfo->image != null): ?>
                                            <div>
                                                <img style="width: 150px;height: 150px" src="<?php echo e(url('public/candidateImages/thumb'."/".$personalInfo->image)); ?>">

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Signature</label>&nbsp;<span id="signMsg"><notice>(Maximum Size 50Kb)</notice></span>
                                        <?php if($errors->has('sign')): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('sign')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                        <input type="file" class="form-control" name="sign" id="sign" placeholder="">

                                        <br>
                                        <?php if($personalInfo->sign != null): ?>
                                            <div>
                                                <img style="width: 150px;height: 100px" src="<?php echo e(url('public/candidateSigns/thumb'."/".$personalInfo->sign)); ?>">

                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div style="overflow:auto;">
                                    <div style="float:right;">

                                        <button type="submit" id="submitBtn">Save</button>
                                        
                                        <a href="<?php echo e(route('candidate.cvQuesObj')); ?>"><button type="button" id="nextBtn">Next</button></a>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- end container -->
    </div>

    <!-- end wrapper -->


<?php $__env->stopSection(); ?>



<?php $__env->startSection('foot-js'); ?>


    <script type="text/javascript">
        $(function () {
            $('#dob').datepicker({
                format: 'yyyy-m-d'
            });
//            $("#image").focus(function(){
//                $("#imageMsg").show();
//            });
//            $("#image").focusout(function(){
//                $("#imageMsg").css("display", "none");
//            });
//            $("#sign").focus(function(){
//                $("#signMsg").css("display", "inline");
//            });
//            $("#sign").focus(function(){
//                $("#signMsg").css("display", "inline");
//            });

            <?php if(!is_null($personalInfo->nationalId)): ?>
                $('#nid').show();
            $('#idProvided').val("NID");
            $("#nidField").attr("required", true);
            $("#bidField").attr("required", false);
            $('#bid').hide();
            <?php else: ?>

                $('#bid').show();
            $('#idProvided').val("BID");
            $("#bidField").attr("required", true);
            $("#nidField").attr("required", false);
            $('#nid').hide();
            <?php endif; ?>



        });

        $('#radioBtn a').on('click', function(){
            var sel = $(this).data('title');
            var tog = $(this).data('toggle');
            $('#'+tog).prop('value', sel);

            $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
            $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
        });


        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

        $("#image").change(function() {

            var val = $(this).val();

            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png': case 'jpeg':

                break;
                default:
                    $(this).val('');
                    // error message here
                    var errorMsg="Please Select a valid Image";
                    validationError(errorMsg);
                    break;
            }
            var picsize = (this.files[0].size);
            if ((picsize/1024) > 100){
                var errorMsg="Image Size Should be less then 100 KB";
                validationError(errorMsg);
                $(this).val('');

            }

        });
        $("#sign").change(function() {

            var val = $(this).val();

            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png': case 'jpeg':

                break;
                default:
                    $(this).val('');
                    // error message here
                    var errorMsg="Please Select a valid Image";
                    validationError(picsize);
                    break;
            }
            var picsize = (this.files[0].size);
            if ((picsize/1024) > 50){
                var errorMsg="Image size should be less then 50 KB";
                validationError(errorMsg);
                $(this).val('');

            }

        });

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
        function nid() {
          //  alert("nid");
            document.getElementById("nid").style.display = "block";
            document.getElementById("bid").style.display = "none";
            $('#idProvided').val("NID");
            $("#nidField").attr("required", true);
            $("#bidField").attr("required", false);
        }
        function bid() {
           // alert("bid");
            document.getElementById("bid").style.display = "block";
            document.getElementById("nid").style.display = "none";
            $('#idProvided').val("BID");
            $("#bidField").attr("required", true);
            $("#nidField").attr("required", false);
        }

        function isAlfaNumberKey(evt)
        {
            var code = (evt.which) ? evt.which : event.keyCode;

            if (!(code > 47 && code < 58) && // numeric (0-9)
                !(code > 64 && code < 91) && // upper alpha (A-Z)
                !(code > 96 && code < 123)) { // lower alpha (a-z)
                return false;
            }
            return true;
        }


        $('.js-example-basic-single').select2();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>