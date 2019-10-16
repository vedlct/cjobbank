<?php $__env->startSection('content'); ?>

    <style>
        strong{
            color: red;
        }
        notice{
            color: blue;
        }
        /*#imageMsg,#signMsg{*/
        /*display: none;*/
        /*}*/
    </style>

    <div class="row">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card updateCard">
                <div class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="<?php echo e(route('candidate.cvPersonalInfo')); ?>">Personal details</a>
                            <a href="<?php echo e(route('candidate.cvQuesObj')); ?>">Career objective and application information</a>
                            <a href="<?php echo e(route('candidate.cvEducation')); ?>">Education</a>
                            <a href="<?php echo e(route('candidate.language.index')); ?>" >Language</a>
                            <a href="<?php echo e(route('candidate.computerSkill.index')); ?>" >Computer-skill</a>
                            
                            <a href="<?php echo e(route('cv.OthersInfo')); ?>" class="activeNav">Other information</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>">Training certification</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Professional certification</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('JobExperience.index')); ?>">Job experience</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>">Previous work information in caritas bangladesh</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('candidate.membershipInSocialNetwork.index')); ?>">Certification of membership in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('refree.index')); ?>">Referee</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('relativeInCaritas.getRelationInfo')); ?>">Relatives working in caritas bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" method="post" action="<?php echo e(route('insert.OthersInfo')); ?>">
                        <!-- One "tab" for each step in the form: -->

                        <?php echo e(csrf_field()); ?>

                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Other Information</h2>


                            <div class="form-group">
                                <label for="">Extracurricular activities <notice>(Max Limit 2500)</notice></label>
                                <textarea type="text" name="extraCurricularActivities" maxlength="2500"  rows="2"
                                          class="form-control<?php echo e($errors->has('extraCurricularActivities') ? ' is-invalid' : ''); ?>"
                                          id="objective" placeholder="Extra curricular activities"><?php echo e(old('extraCurricularActivities')); ?></textarea>
                                <?php if($errors->has('extraCurricularActivities')): ?>

                                    <span class="">
                                        <strong><?php echo e($errors->first('extraCurricularActivities')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Interests <notice>(Max Limit 2500)</notice></label>
                                <textarea type="text" name="interests" maxlength="2500"  rows="3"
                                          class="form-control <?php echo e($errors->has('interests') ? ' is-invalid' : ''); ?>"
                                          id="interests" placeholder="Interests"><?php echo e(old('interests')); ?></textarea>
                                <?php if($errors->has('interests')): ?>

                                    <span class="">
                                        <strong><?php echo e($errors->first('interests')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Award Received <notice>(Max Limit 2500)</notice></label>
                                <textarea type="text" name="awardReceived" maxlength="2500"  rows="3"
                                          class="form-control <?php echo e($errors->has('awardReceived') ? ' is-invalid' : ''); ?>"
                                          id="awardReceived" placeholder="Award received"><?php echo e(old('awardReceived')); ?></textarea>
                                <?php if($errors->has('awardReceived')): ?>

                                    <span class="">
                                        <strong><?php echo e($errors->first('awardReceived')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Research / Publication <notice>(Max Limit 2500)</notice></label>
                                <textarea type="text" name="researchPublication" maxlength="2500"
                                           rows="3" class="form-control <?php echo e($errors->has('researchPublication') ? ' is-invalid' : ''); ?>"
                                          id="researchPublication" placeholder="Research / Publication"><?php echo e(old('researchPublication')); ?></textarea>
                                <?php if($errors->has('researchPublication')): ?>

                                    <span class="">
                                        <strong><?php echo e($errors->first('researchPublication')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">


                                <a href="<?php echo e(route('candidate.skill.index')); ?>"><button type="button" id="btnPevious" >Back</button></a>

                                <button type="submit" id="submitBtn">Save</button>


                                
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
            x[(n+1)].className += " active";
        }
    </script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>