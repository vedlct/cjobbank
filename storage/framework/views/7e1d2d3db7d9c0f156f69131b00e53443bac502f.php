<?php $__env->startSection('content'); ?>

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                    <form id="regForm" action="">
                        <!-- One "tab" for each step in the form: -->


                        <div class="tab">

                            <h2 style="margin-bottom: 30px;">Professional Certification </h2>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Institution Name</label>
                                    <input type="text" class="form-control" name="institutionName" id="inputEmail4" placeholder="institution">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="inputEmail4">Institute Name</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Passing Year</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="">
                                </div>
                            </div>

                            <button type="button" class="btn btn-success">Add More</button>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <button type="button" id="submitBtn">Save</button>
                                <a href="<?php echo e(route('candidate.cvEducation')); ?>"><button type="button" id="nextBtn" >Next</button></a>
                            </div>
                        </div>



                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
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
            x[(n+3)].className += " active";
        }
    </script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>