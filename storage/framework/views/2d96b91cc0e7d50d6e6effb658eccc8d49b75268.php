<?php $__env->startSection('content'); ?>

    <div class="row ">

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
                            <a  href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>">Training certification</a>
                            <a href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Professional certification</a>
                            <a href="<?php echo e(route('JobExperience.index')); ?>">Job experience</a>
                            <a href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>">Previous work information in Caritas Bangladesh</a>
                            <a href="<?php echo e(route('candidate.membershipInSocialNetwork.index')); ?>">Certification of membership in professional network/ forum</a>
                            <a href="<?php echo e(route('refree.index')); ?>">Referee</a>
                            <a href="<?php echo e(route('relativeInCaritas.getRelationInfo')); ?>">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm" >
                        <!-- One "tab" for each step in the form: -->


                        <div class="tab">

                            <h2 style="margin-bottom: 30px; text-align:center">Other information</h2>


                            <div id="edit<?php echo e($empOtherInfo->id); ?>" class="row">


                                <div class="form-group col-md-10">

                                    <label for="">Extracurricular activities :</label><br>
                                    <?php echo e($empOtherInfo->extraCurricularActivities); ?>

                                </div>

                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-info btn-sm " onclick="editInfo(<?php echo e($empOtherInfo->id); ?>)">
                                        <i class="fa fa-edit"></i></button>
                                </div>

                                <div class="form-group col-md-12">

                                    <label for="">Interests :</label><br>
                                    <?php echo e($empOtherInfo->interests); ?>


                                </div>

                                <div class="form-group col-md-12">

                                    <label for="">Awards received :</label><br>
                                    <?php echo e($empOtherInfo->awardReceived); ?>


                                </div>
                                <div class="form-group col-md-12">

                                    <label for="">Research / Publication :</label><br>
                                    <?php echo e($empOtherInfo->researchPublication); ?>


                                </div>

                                <div class="form-group col-md-12" style="overflow:auto;">
                                    <div style="float:right;">

                                        <a href="<?php echo e(route('candidate.skill.index')); ?>"><button type="button" id="btnPevious">Back</button></a>

                                        <a href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>"><button type="button" id="nextBtn" >Next</button></a>

                                    </div>
                                </div>




                                <div class="form-group col-md-12">
                                    <!-- Circles which indicates the steps of the form: -->
                                    <div style="text-align:center;margin-top:40px;">
                                        <span class="step"></span>
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
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
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
            x[(n+1)].className += " active";
        }

        function editInfo(x) {
            //alert(x);
            $.ajax({
                type: 'POST',
                url: "<?php echo route('edit.OthersInfo'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'id': x},
                success: function (data) {


                    $("#nextBtn").hide();
                    $("#btnPevious").hide();

                    $('#edit'+x).html(data);


                }
            });
        }

    </script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>