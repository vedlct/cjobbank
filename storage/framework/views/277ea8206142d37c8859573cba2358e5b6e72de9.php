<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card updateCard">
                <div class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="<?php echo e(route('candidate.cvPersonalInfo')); ?>">Personal details</a>
                            <a href="<?php echo e(route('candidate.cvQuesObj')); ?>" class="activeNav">Career objective and
                                application information</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('candidate.cvEducation')); ?>">Education</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('candidate.language.index')); ?>">Language</a>
                            <a onclick="return false;" class="incomplete"
                               href="<?php echo e(route('candidate.computerSkill.index')); ?>">Computer-skill</a>
                            
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('cv.OthersInfo')); ?>">Other
                                information</a>
                            <a onclick="return false;" class="incomplete"
                               href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>">Training certification</a>
                            <a onclick="return false;" class="incomplete"
                               href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Professional certification</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('JobExperience.index')); ?>">Job
                                experience</a>
                            <a onclick="return false;" class="incomplete"
                               href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>">Previous work information in Caritas
                                Bangladesh</a>
                            <a onclick="return false;" class="incomplete"
                               href="<?php echo e(route('candidate.membershipInSocialNetwork.index')); ?>">Certification of membership
                                in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="<?php echo e(route('refree.index')); ?>">Referee</a>
                            <a onclick="return false;" class="incomplete"
                               href="<?php echo e(route('relativeInCaritas.getRelationInfo')); ?>">Relatives working in Caritas
                                Bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" method="post" action="<?php echo e(route('cv.insertQuesObj')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Career objective and application
                                information</h2>

                            <div class="form-group">
                                <label for="">Objective <span
                                            style="color: blue">(Max Limit 2500 character)</span></label>
                                <textarea type="text" name="objective" maxlength="2500" rows="10"
                                          class="form-control<?php echo e($errors->has('objective') ? ' is-invalid' : ''); ?>"
                                          id="objective"
                                          placeholder="Career Objective"><?php echo e(old('objective')); ?></textarea>
                                <?php if($errors->has('objective')): ?>

                                    <span class="">
                                        <strong><?php echo e($errors->first('objective')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Possible joining date</label>
                                    <input type="text" class="date" onkeypress="return isNumberKey(event)"
                                           placeholder="Possible joining date" name="readyToJoinAfter">
                                </div>


                            </div>

                            <div class="form-group">
                                <label for=""><?php echo e(CAREER_QUES['Ques0']); ?><span style="color: red">*</span></label>
                                
                                <div class="row">
                                    <div class="form-group col-md-12">

                                        <div class="col-md-10 mb-3">
                                            <input class="form-check-input" type="radio" required name="hasOtherSkill"
                                                   value="1" onclick="checkFreshers(this)"> Yes&nbsp;&nbsp;
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-check-input" type="radio" required name="hasOtherSkill"
                                                   value="0" onclick="hideFresher()"> No&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>

                                

                                
                                
                                
                                
                            </div>


                            <div id="compulsoryQuestions">


                                <?php
                                    $st=1;
                                ?>


                                <?php $__currentLoopData = $employeeCvQuesObjQues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empCvObjQues): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" name="qesId<?php echo e($st); ?>" value="<?php echo e($empCvObjQues->id); ?>">
                                    <div class="form-group">
                                        <label for="">Ques-<?php echo e($st); ?>: <?php echo e($empCvObjQues->ques); ?><span
                                                    style="color: red">*</span></label>
                                        <textarea type="text" name="CareerQues<?php echo e($st); ?>" maxlength="300" rows="3"
                                                  class="form-control <?php echo e($errors->has('CareerQues'.$st) ? ' is-invalid' : ''); ?>"
                                                  id="CareerQues<?php echo e($st); ?>"
                                                  placeholder="Career Question"><?php echo e(old('CareerQues'.$st)); ?></textarea>
                                        <?php if($errors->has('CareerQues'.$st)): ?>

                                            <span class="">
                                        <strong><?php echo e($errors->first('CareerQues'.$st)); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>

                                    <?php
                                        $st++;
                                    ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>


                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <a href="<?php echo e(route('candidate.cvPersonalInfo')); ?>">
                                    <button type="button" id="btnPevious">Back</button>
                                </a>

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
            x[(n + 1)].className += " active";
        }
    </script>

    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
            $('#compulsoryQuestions').hide();
        });


        function submitForm() {
            // objective
            var obj = $('#objective').val();
            // alert(obj.length);
            //
            // return false;
            if (obj.length > 2500) {

                $.alert({
                    title: 'Error',
                    type: 'red',
                    content: "Objective should not exceed more than 2500 character",
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-green',
                            action: function () {

                            }
                        }
                    }
                });

                return false;
            }
            return true;
        }


        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

        function checkFreshers(x) {
            // $('#compulsoryQuestions').show();
            // if($(x).prop("checked") == true){}

            $('#compulsoryQuestions').show();


        }

        function hideFresher() {
            $('#compulsoryQuestions').hide();
        }


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>