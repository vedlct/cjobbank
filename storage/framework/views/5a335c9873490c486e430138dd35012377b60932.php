<?php $__env->startSection('content'); ?>

    <style>
        strong{
            color: red;
        }
        notice{
            color: blue;
        }
        #imageMsg,#signMsg{
            display: none;
        }

    </style>



    <div style="position: relative;" class="row ">

        <div class="col-12">
            <div style="background-color: #F1F1F1;" class="card updateCard">
                <div class="card-body">


                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="<?php echo e(route('candidate.cvPersonalInfo')); ?>" class="activeNav">Personal details</a>
                            <a href="<?php echo e(route('candidate.cvQuesObj')); ?>">Career objective and application information</a>
                            <a href="<?php echo e(route('candidate.cvEducation')); ?>">Education</a>
                            <a href="<?php echo e(route('candidate.language.index')); ?>">Language</a>
                            <a href="<?php echo e(route('candidate.computerSkill.index')); ?>">Computer-skill</a>
                            
                            <a href="<?php echo e(route('cv.OthersInfo')); ?>">Other information</a>
                            <a href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>">Training certification</a>
                            <a href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Professional certification</a>
                            <a href="<?php echo e(route('JobExperience.index')); ?>">Job experience</a>
                            <a href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>">Previous work information in Caritas Bangladesh</a>
                            <a href="<?php echo e(route('candidate.membershipInSocialNetwork.index')); ?>">Certification of membership in professional network/ forum</a>
                            <a href="<?php echo e(route('refree.index')); ?>">Referee</a>
                            <a href="<?php echo e(route('relativeInCaritas.getRelationInfo')); ?>">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>



                        <div class="col-md-9" id="regForm">

                            <h2 style="margin-bottom: 40px; text-align: center;">Personal details</h2>
                            <div id="edit">

                        
                        <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                <?php $__currentLoopData = $employeeCvPersonalInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personalInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Given name:</label><?php echo e($personalInfo->firstName); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Surname:</label><?php echo e($personalInfo->lastName); ?>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Father name:</label><?php echo e($personalInfo->fathersName); ?>


                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mother name:</label><?php echo e($personalInfo->mothersName); ?>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Gender:</label>
                                        <?php $__currentLoopData = GENDER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($personalInfo->gender == $value): ?> <?php echo e($key); ?> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Religion:</label>
                                        <?php $__currentLoopData = $religion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php if($personalInfo->fkreligionId == $reli->religionId): ?> <?php echo e($reli->religionName); ?>  <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Ethnicity</label>
                                        <?php $__currentLoopData = $ethnicity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ethi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($personalInfo->ethnicityId == $ethi->ethnicityId): ?> <?php echo e($ethi->ethnicityName); ?> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Disability:</label>
                                        <?php $__currentLoopData = DISABILITY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($personalInfo->disability == $value): ?> <?php echo e($key); ?> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Date of birth:</label>
                                        <?php echo e($personalInfo->dateOfBirth); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Blood group</label>
                                        <?php $__currentLoopData = BLOOD_GROUP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($personalInfo->bloodGroup == $value): ?> <?php echo e($key); ?> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Marital status:</label>
                                        <?php $__currentLoopData = MARITAL_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <?php if($personalInfo->maritalStatus == $value): ?> <?php echo e($key); ?> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Name of spouse:</label>
                                        <?php echo e($personalInfo->spouse); ?>

                                    </div>



                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Nationality:</label>
                                        <?php $__currentLoopData = $natinality; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $natio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($personalInfo->fknationalityId == $natio->nationalityId ): ?> <?php echo e($natio->nationalityName); ?> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php if(!is_null($personalInfo->nationalId)): ?>
                                    <div class="form-group col-md-6">
                                        <label for="">NID:</label>
                                        <?php echo e($personalInfo->nationalId); ?>

                                    </div>
                                    <?php elseif(!is_null($personalInfo->birthID)): ?>
                                    <div class="form-group col-md-6">
                                        <label for="">BID:</label>
                                        <?php echo e($personalInfo->birthID); ?>

                                    </div>
                                    <?php endif; ?>

                                    <div class="form-group col-md-6">
                                        <label for="">Passport:</label>
                                        <?php echo e($personalInfo->passport); ?>

                                    </div>

                                </div>



                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Email:</label>
                                        <?php echo e($personalInfo->email); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Alternate email:</label>
                                        <?php echo e($personalInfo->alternativeEmail); ?>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Skype:</label>
                                        <?php echo e($personalInfo->skype); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Telephone no:</label>
                                        <?php echo e($personalInfo->telephone); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Personal phone number:</label>
                                        <?php echo e($personalInfo->personalMobile); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Alternative phone no:</label>
                                        <?php echo e($personalInfo->alternativePhoneNo); ?>

                                    </div>


                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Home telephone:</label>
                                        <?php echo e($personalInfo->homeNumber); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Office telephone:</label>
                                        <?php echo e($personalInfo->officeNumber); ?>

                                    </div>


                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Current address</label>
                                        <br>
                                        <?php echo e($personalInfo->presentAddress); ?>

                                    </div>

                                </div>



                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="">Permanent address</label>
                                        <br>
                                        <?php echo e($personalInfo->parmanentAddress); ?>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="">Image :</label>
                                        <br>
                                        <?php if($personalInfo->image != null): ?>
                                            <div>
                                                <img style="width: 150px;height: 150px" src="<?php echo e(url('public/candidateImages/thumb'."/".$personalInfo->image)); ?>">

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Signature</label>

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

                                        <a href="<?php echo e(route('personalInfo.edit')); ?>"><button type="submit"  id="submitBtn">Edit</button></a>
                                        
                                        <a href="<?php echo e(route('candidate.cvQuesObj')); ?>"><button type="button" id="nextBtn">Next</button></a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

                        </div>




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
//        $(function () {
//            $('#dob').datepicker({
//                format: 'yyyy-m-d'
//            });
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
//        });

        function editPersonalInfo() {


            $.ajax({
                type: 'POST',
                url: "<?php echo route('personalInfo.edit'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>"},
                success: function (data) {
//                    console.log(data);
                    $('#edit').html(data);


                }
            });

        }



    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>