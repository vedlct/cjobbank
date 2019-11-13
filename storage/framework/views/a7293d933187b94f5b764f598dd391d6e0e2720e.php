<?php $__env->startSection('content'); ?>

    <div class="row ">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    <form  id="regForm" enctype="multipart/form-data" method="post" action="<?php echo e(route('cv.insertPersonalInfo')); ?>">

                        <?php echo e(csrf_field()); ?>

                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Personal Details </h2>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">First Name<span style="color: red">*</span></label>
                                    <input type="text" name="firstName" class="form-control <?php echo e($errors->has('firstName') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('firstName')); ?>" id="" required placeholder="First Name">
                                    <?php if($errors->has('firstName')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('firstName')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last Name<span style="color: red">*</span></label>
                                    <input type="text" name="lastName" class="form-control <?php echo e($errors->has('lastName') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('lastName')); ?>" id="" required placeholder="Last Name">
                                    <?php if($errors->has('lastName')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('lastName')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Father Name<span style="color: red">*</span></label>
                                    <input type="text" name="fathersName" class="form-control <?php echo e($errors->has('fathersName') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('fathersName')); ?>" id="" required placeholder="Father's Name">
                                    <?php if($errors->has('fathersName')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('fathersName')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mother Name<span style="color: red">*</span></label>
                                    <input type="text" name="mothersName" class="form-control <?php echo e($errors->has('mothersName') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('mothersName')); ?>" required id="" placeholder="Mother's Name">
                                    <?php if($errors->has('mothersName')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('mothersName')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Gender<span style="color: red">*</span></label>
                                    <select required name="gender" class="form-control" id="sel1">
                                        <option selected value="">Select Gender</option>
                                        <?php $__currentLoopData = GENDER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Religion<span style="color: red">*</span></label>
                                    <select required name="religion"class="form-control" id="sel1">
                                        <option selected value="">Select Religion</option>
                                        <?php $__currentLoopData = $religion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($reli->religionId); ?>"><?php echo e($reli->religionName); ?></option>
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
                                            <option value="<?php echo e($ethi->ethnicityId); ?>"><?php echo e($ethi->ethnicityName); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Disability<span style="color: red">*</span></label>
                                    <select required name="disability" class="form-control" id="sel1">
                                        <option selected value="">Select Disability</option>
                                        <?php $__currentLoopData = DISABILITY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Date of Birth<span style="color: red">*</span></label>
                                    <input type="text" name="dob" required class="form-control <?php echo e($errors->has('dob') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('dob')); ?>" id="dob" placeholder="Date of Birth">
                                    <?php if($errors->has('dob')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('dob')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Blood Group<span style="color: red">*</span></label>
                                    <select class="form-control" name="bloodGroup" required>
                                        <option>Select Group</option>
                                        <?php $__currentLoopData = BLOOD_GROUP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <option  value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('bloodGroup')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('bloodGroup')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Marital Status<span style="color: red">*</span></label>
                                    <select class="form-control" name="maritalStatus" required>
                                        <option>Select Status</option>
                                        <?php $__currentLoopData = MARITAL_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <option  value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('maritalStatus')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('maritalStatus')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Name Of Spouse</label>
                                    <input type="text"  name="spouse" class="form-control"  id="" placeholder="Husband / Wife">
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
                                    <select required name="nationality" class="form-control" id="sel1">
                                        <option selected value="">Select Nationality</option>
                                        <?php $__currentLoopData = $natinality; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $natio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($natio->nationalityId); ?>"><?php echo e($natio->nationalityName); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">NID<span style="color: red">*</span></label>
                                    <input type="text" required name="nId" class="form-control <?php echo e($errors->has('nId') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('nId')); ?>" id="" placeholder="National Id">
                                    <?php if($errors->has('nId')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('nId')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                            </div>



                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Email<span style="color: red">*</span></label>
                                    <input type="text" required name="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" id="" placeholder="Email">
                                    <?php if($errors->has('email')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Alternate Email</label>
                                    <input type="text" name="alternateEmail"  class="form-control <?php echo e($errors->has('alternateEmail') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('alternateEmail')); ?>" id="" placeholder="Alternate Email">
                                    <?php if($errors->has('alternateEmail')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('alternateEmail')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Skype</label>
                                    <input type="text" name="skype"  class="form-control <?php echo e($errors->has('skype') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('skype')); ?>" id="" placeholder="Skype Id">
                                    <?php if($errors->has('skype')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('skype')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Personal Mobile<span style="color: red">*</span></label>
                                    <input type="text" name="personalMobile" class="form-control <?php echo e($errors->has('personalMobile') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('personalMobile')); ?>" id="" placeholder="Personal Mobile Number">
                                    <?php if($errors->has('personalMobile')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('personalMobile')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Telephone No.</label>
                                    <input type="text"  name="telephone" class="form-control <?php echo e($errors->has('telephone') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('telephone')); ?>" id="" placeholder="Telephone number">
                                    <?php if($errors->has('telephone')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('telephone')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Home Telephone</label>
                                    <input type="text" name="homeTelephone"  class="form-control <?php echo e($errors->has('homeTelephone') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('homeTelephone')); ?>" id="" placeholder="Home Telephone Number">
                                    <?php if($errors->has('homeTelephone')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('homeTelephone')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Office Telephone</label>
                                    <input type="text"  name="officeTelephone" class="form-control <?php echo e($errors->has('officeTelephone') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('officeTelephone')); ?>" id="" placeholder="Office Telephone Number">
                                    <?php if($errors->has('officeTelephone')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('officeTelephone')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>






                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Current Address<span style="color: red">*</span></label>
                                    <textarea required placeholder="Current Address" rows="3" name="currentAddress" class="form-control <?php echo e($errors->has('currentAddress') ? ' is-invalid' : ''); ?>"><?php echo e(old('currentAddress')); ?></textarea>
                                    
                                    <?php if($errors->has('currentAddress')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('currentAddress')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                            </div>



                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="">Permanent Address<span style="color: red">*</span></label>
                                    <textarea required placeholder="" rows="3" name="permanentAddress" class="form-control <?php echo e($errors->has('permanentAddress') ? ' is-invalid' : ''); ?>"><?php echo e(old('permanentAddress')); ?></textarea>
                                    
                                    <?php if($errors->has('permanentAddress')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('permanentAddress')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="">Image</label>&nbsp;<strong>(Maximum Image Size 100Kb)</strong>
                                    <input type="file" class="form-control" name="image" id="" placeholder="">
                                    <?php if($errors->has('image')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('image')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Signature</label>&nbsp;<strong>(Maximum Signature Size 50Kb)</strong>
                                    <?php if($errors->has('sign')): ?>

                                        <span class="">
                                        <strong><?php echo e($errors->first('sign')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="sign" id="" placeholder="">

                                </div>

                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">

                                    <button type="submit" id="submitBtn">Save</button>
                                    
                                </div>
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

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot-js'); ?>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        fixStepIndicator(currentTab); // Display the crurrent tab



        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var x1 = document.getElementsByClassName("tab");
            x1[n].style.display = "block";
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>


    <script type="text/javascript">
        $(function () {
            $('#dob').datepicker({
                format: 'yyyy-m-d'
            });
        });



    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>