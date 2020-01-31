<?php $__env->startSection('content'); ?>
    <style>
        @media  only screen and (max-width: 400px) {
            .top{
                margin-top: 4%;
            }
        }
    </style>

    <div class="row ">

        <div class="col-12 ">

            <div class="card updateCard">


                <div style="background-color: #F1F1F1; height: 1500px;" class="card-body" >

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="<?php echo e(route('candidate.cvPersonalInfo')); ?>">Personal details</a>
                            <a href="<?php echo e(route('candidate.cvQuesObj')); ?>">Career objective and application information</a>
                            <a href="<?php echo e(route('candidate.cvEducation')); ?>">Education</a>
                            <a href="<?php echo e(route('candidate.language.index')); ?>" >Language</a>
                            <a href="<?php echo e(route('candidate.computerSkill.index')); ?>" >Computer-skill</a>
                            
                            <a href="<?php echo e(route('cv.OthersInfo')); ?>" >Other information</a>
                            <a href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>">Training certification</a>
                            <a href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Professional certification</a>
                            <a  href="<?php echo e(route('JobExperience.index')); ?>">Job experience</a>
                            <a  href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>">Previous work information in Caritas Bangladesh</a>
                            <a   href="<?php echo e(route('candidate.membershipInSocialNetwork.index')); ?>">Certification of membership in professional network/ forum</a>
                            <a    href="<?php echo e(route('refree.index')); ?>">Referee</a>
                            <a  class="activeNav" href="<?php echo e(route('relativeInCaritas.getRelationInfo')); ?>">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>



                    <div  id="regForm" class="tab col-md-9">

                        <h2 style="margin-bottom: 30px;">Do you have any relatives working in Caritas Bangladesh?</h2>



                        <div >


                            <form action="<?php echo e(route('submit.relativeYesOrNo')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <div class="  form-group">
                                    <label>Do you have any relatives working in Caritas Bangladesh ?</label>
                                    <div class="col-md-3 mb-3">
                                        <input class="form-check-input" onclick="myradio()" <?php if($relativeInCB->relativeInCB =='1'): ?> checked <?php endif; ?> class="form-control" type="radio" value="1" name="relativeincb" required> YES
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input class="form-check-input" onclick="myradio()" <?php if($relativeInCB->relativeInCB =='0'): ?> checked <?php endif; ?> class="form-control" type="radio" value="0" name="relativeincb" required> NO
                                    </div>


                                </div>


                                <div style="overflow:auto;" id="ques">
                                    <div style="float:right;">
                                        <a href="<?php echo e(route('refree.index')); ?>"><button type="button" id="btnPevious" >Back</button></a>
                                        <?php if($employee->cvStatus == 1): ?>
                                        <a href="<?php echo e(route('candidate.viewUserCv')); ?>"><button type="button" id="btntes" >Done</button></a>
                                        <?php endif; ?>

                                        <button id="submitBtn" type="submit" class="top" >Save</button>


                                        
                                        
                                        

                                    </div>
                                </div>


                            </form>

                        </div>



                        <div id="insertfull" style="display: none">
                            <form  action="<?php echo e(route('submit.relative')); ?>" method="post">
                                <!-- One "tab" for each step in the form: -->
                                <?php echo e(csrf_field()); ?>




                                <div id="TextBoxesGroup">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">First name<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="firstName[]" id="firstName" placeholder="first name" required>
                                        </div>



                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Last name<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="lastName[]" id="lastName" placeholder="last name" required>
                                        </div>



                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Designation<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="degisnation[]" id="degisnation" placeholder="degisnation" required>
                                        </div>


                                    </div>


                                </div>



                                <button type="button" id="addButton" class="btn btn-success">Add more</button>
                                <button type="button" id="removeButton" class="btn btn-success" >Remove</button>



                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <a href="<?php echo e(route('refree.index')); ?>"><button type="button" id="btnPevious" >Back</button></a>
                                        
                                        <button type="submit" id="submitBtn">Save</button>
                                        
                                        
                                        

                                    </div>
                                </div>

                            </form>
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
            x[(n+6)].className += " active";
        }
    </script>



    <script type="text/javascript">
        $(function () {
//            $('.date').datepicker({
//                format: 'yyyy-m-d'
//            });
////            $('#end').datepicker({
//                format: 'yyyy-m-d'
//            });

            <?php if(Session::has('CVcomplete')): ?>
            <?php if(Session::get('CVcomplete')=='done' && $employee->cvStatus == 1): ?>

            $.alert({
                title: 'Congratulation',
                type: 'green',
                content: '<?php echo CV_COMPLITING_MSG; ?>',
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-green',
                        action: function () {

                        }
                    }
                }
            });
            $("#submitBtn").hide();
            <?php endif; ?>
            <?php endif; ?>
            <?php if($employee->cvStatus != 1): ?>
            $("#submitBtn").show();
            <?php endif; ?>


        });

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();



            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 section allow per time!!");
                    return false;
                }
                $("#btnPevious").hide();


                if (counter == 1 ){

                    var firstName=$('#firstName').val();
                    var lastName=$('#lastName').val();
                    var degisnation=$('#degisnation').val();


                    var chk=/^[0-9]*$/;
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



                    if(firstName==""){

                        var errorMsg='Please type first name first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (firstName.length > 45){

                        var errorMsg='First name should not more than 45 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(lastName==""){

                        var errorMsg='Please type last name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (lastName.length > 45){

                        var errorMsg='Last name should not more than 45 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(degisnation==""){

                        var errorMsg='Please type present position first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='present position should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }




                }
                else {

                    var firstName=$('#firstName'+(counter-1)).val();
                    var lastName=$('#lastName'+(counter-1)).val();
                    var degisnation=$('#degisnation'+(counter-1)).val();

                    var chk=/^[0-9]*$/;
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



                    if(firstName==""){

                        var errorMsg='Please type first name first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (firstName.length > 45){

                        var errorMsg='First name should not more than 45 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(lastName==""){

                        var errorMsg='Please type last name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (lastName.length > 45){

                        var errorMsg='Last name should not more than 45 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(degisnation==""){

                        var errorMsg='Please type present position first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Present position should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }




                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+
                    '  <div class="row"> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputEmail4">First name<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="firstName[]" id="firstName'+counter+'" placeholder="first name" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputEmail4">Last name<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="lastName[]" id="lastName'+counter+'" placeholder="last name" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputEmail4">Present position<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="degisnation[]" id="degisnation'+counter+'" placeholder="degisnation" required> ' +
                    '</div> '

                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                }

            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast one course section is needed!!");
                    return false;
                }
                counter--;
                if(counter<2){
                    $("#removeButton").hide();
                }
                $("#TextBoxDiv" + counter).remove();
            });


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

        function myradio()
        {
            x = document.querySelector('input[name="relativeincb"]:checked').value;

            if (x==1){
                document.getElementById('ques').style.display= "none";
                document.getElementById('insertfull').style.display= "block";
                $("#submitBtn").show();
                $("#btntes").hide();


            }else {
                document.getElementById('ques').style.display= "block";
                document.getElementById('insertfull').style.display= "none";
                $("#btntes").hide();
                $("#submitBtn").show();
            }
        }
    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>