<?php $__env->startSection('content'); ?>

    <div class="row ">

        <div class="col-12 ">
            <div class="card updateCard">
                <div style="background-color: #F1F1F1" class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="<?php echo e(route('candidate.cvPersonalInfo')); ?>">Personal details</a>
                            <a href="<?php echo e(route('candidate.cvQuesObj')); ?>">Career objective and application information</a>
                            <a href="<?php echo e(route('candidate.cvEducation')); ?>">Education</a>
                            <a href="<?php echo e(route('candidate.language.index')); ?>" >Language</a>
                            <a href="<?php echo e(route('candidate.computerSkill.index')); ?>" class="activeNav">Computer-skill</a>
                            
                            <a href="<?php echo e(route('cv.OthersInfo')); ?>">Other information</a>
                            <a  href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>">Training certification</a>
                            <a  href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Professional certification</a>
                            <a  href="<?php echo e(route('JobExperience.index')); ?>">Job experience</a>
                            <a  href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>">Previous work information in Caritas Bangladesh</a>
                            <a  href="<?php echo e(route('candidate.membershipInSocialNetwork.index')); ?>">Certification of membership in professional network/ forum</a>
                            <a  href="<?php echo e(route('refree.index')); ?>">Referee</a>
                            <a  href="<?php echo e(route('relativeInCaritas.getRelationInfo')); ?>">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>



                    <div class="col-md-9" id="regForm" class="tab">
                        <h2 style="margin-bottom: 30px;">Computer-skill</h2>

                            <?php $__currentLoopData = $empComputerSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="edit<?php echo e($skills->id); ?>">
                                <div id="" class="row">
                                    <div class="form-group col-md-5">
                                        <label for="inputEmail4">Skill : </label>


                                            
                                            
                                                <?php echo e($skills->computerSkillName); ?>

                                            

                                                

                                            

                                    </div>


                                    <div class="form-group col-md-5">

                                        <label for="inputEmail4">Skill-level : </label>

                                            <?php $__currentLoopData = ComputerSkillAchievement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php if($value==$skills->SkillAchievement): ?>
                                            <?php echo e($key); ?>

                                            <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </div>
                                    <div class="form-group col-md-2">

                                        <button class="btn btn-info btn-sm" onclick="editInfo(<?php echo e($skills->id); ?>)"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm " onclick="deleteSkill(<?php echo e($skills->id); ?>)"><i class="fa fa-trash"></i></button>


                                    </div>



                                </div>
                                </div>
                                <hr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <form id="" onsubmit="return chkComputerSkill()" action="<?php echo e(route('candidate.computerSkill.submit')); ?>" method="post">
                                    <!-- One "tab" for each step in the form: -->
                                    <?php echo e(csrf_field()); ?>


                            <div id="TextBoxesGroup">




                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>



                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="<?php echo e(route('candidate.language.index')); ?>"><button type="button" id="btnPevious" >Back</button></a>
                                
                                <button type="submit" id="submitBtn1">Save</button>

                                
                                <a href="<?php echo e(route('cv.OthersInfo')); ?>"><button type="button" id="btnNext" >Next</button></a>

                            </div>
                        </div>
                    </form>



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
            x[(n+5)].className += " active";
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
        });

        function skillchange(x) {


            var skill =$('#skill'+x).val();
            if (skill == "<?php echo e(OTHERS); ?>"){

                $("#computerSkillNameDiv"+x).show();
               // $("#computerSkillName"+x).attr("required", "true");
            }else {


                $("#computerSkillNameDiv"+x).hide();
              //  $("#computerSkillName"+x).attr("required", "false");


            }

        }

        function chkComputerSkill() {


            var computerSkillId=document.getElementsByName('computerSkillId[]');
            var SkillAchievement=document.getElementsByName('SkillAchievement[]');

            var computerSkillName=document.getElementsByName('computerSkillName[]');


            for (i=0;i<computerSkillId.length;i++){

                if(computerSkillId[i].value==""){

                    var errorMsg='Please select a computer skill first!!';
                    validationError(errorMsg);
                    return false;
                }

                if(SkillAchievement[i].value==""){

                    var errorMsg='Please type skill achievement first!!';
                    validationError(errorMsg);
                    return false;
                }

                if(computerSkillId[i].value=='<?php echo e(OTHERS); ?>' && computerSkillName[i].value==""){

                    var errorMsg='Please type computer skill name!!';
                    validationError(errorMsg);
                    return false;
                }


            }





        }



        function  checkUnique(x) {


            var values =  $('select[name="computerSkillId[]"]').map(function () {
                return this.value; // $(this).val()
            }).get();

            for( var i = values.length-1; i--;){
                if ( values[i] === '<?php echo e(OTHERS); ?>') values.splice(i, 1);
            }


            var unique = values.filter(function(itm, i, values) {
                return i == values.indexOf(itm);
            });

            if(values.length != unique.length){

                alert("Already Inserted");
                $(x).val('');

            }

            // alert($(x).val());

        }
        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();

            $("#submitBtn1").hide();
            $("#addButton").click(function () {



                if(counter>10){
                    alert("Only 10 section allow per time!!");
                    return false;
                }



                $("#btnPevious").hide();




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(

                    '                                    <div class="form-group col-md-6">\n' +
                    '                                        <label for="inputEmail4">Skill<span style="color: red">*</span></label>\n' +
                    '                                        <select name="computerSkillId[]" onchange="checkUnique(this);skillchange('+counter+')" id="skill'+counter+'" class="form-control" required>\n' +
                    '                                            <option value="">Select Skill</option>\n' +
                    '                                            <?php $__currentLoopData = $computerSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\n' +
                    '                                                <option value="<?php echo e($skill->id); ?>"><?php echo e($skill->computerSkillName); ?></option>\n' +
                    '                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\n' +
                    '<option value="<?php echo e(OTHERS); ?>" ><?php echo e(OTHERS); ?></option>'+
                    '                                        </select>\n' +
                    '                                    </div>\n' +
                    '<div style="display: none" id="computerSkillNameDiv'+counter+'" class="form-group col-md-6">'+
                    '<label for="">Skill name</label>'+
                    '<input type="text" maxlength="255" name="computerSkillName[]" class="form-control" id="computerSkillName'+counter+'"  placeholder="skill name">'+

                    '</div>'+
                    '\n' +
                    '\n' +
                    '                                    <div class="form-group col-md-6">\n' +
                    '\n' +
                    '                                        <label for="inputEmail4">Skill-level<span style="color: red">*</span></label>\n' +
                    '                                        <select name="SkillAchievement[]" id="" class="form-control" required>\n' +
                    '                                            <option value="">Select Level</option>\n' +
                    '                                            <?php $__currentLoopData = ComputerSkillAchievement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\n' +
                    '                                                <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>\n' +
                    '                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\n' +
                    '\n' +
                    '                                        </select>\n' +
                    '\n' +
                    '                                    </div>\n'
                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                    $("#submitBtn1").show();
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
                    $("#submitBtn1").hide();
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

        function  checkUnique(x) {


            var values =  $('select[name="computerSkillId[]"]').map(function () {
                return this.value; // $(this).val()
            }).get();

            for( var i = values.length-1; i--;){
                if ( values[i] === '<?php echo e(OTHERS); ?>') values.splice(i, 1);
            }


            var unique = values.filter(function(itm, i, values) {
                return i == values.indexOf(itm);
            });

            if(values.length != unique.length){

                alert("Already Inserted");
                $(x).val('');

            }

            // alert($(x).val());

        }



        function deleteSkill(x) {

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure to delete this computer skill?',
                icon: 'fa fa-warning',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-red',
                        action: function(){

                            $.ajax({
                                type: "POST",
                                url: '<?php echo e(route('candidate.computerSkill.delete')); ?>',

                                data: {_token:"<?php echo e(csrf_token()); ?>",id: x},
                                success: function (data) {
                                    $.alert({
                                        title: 'Success!',
                                        type: 'green',
                                        content: 'Computer skill deleted successfully',
                                        buttons: {
                                            tryAgain: {
                                                text: 'Ok',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    location.reload();
                                                }
                                            }
                                        }
                                    });
                                },
                            });
                        }
                    },
                    No: function () {
                    },
                }
            });



        }

        function editInfo(x){

            $.ajax({
                type: 'POST',
                url: "<?php echo route('candidate.computerSkill.edit'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'id': x},
                success: function (data) {
//                    console.log(data);
                    $('#edit'+x).html(data);
                    $("#addButton").hide();
                    $("#btnPevious").hide();
                    $("#btnNext").hide();
                    $("#submitBtn1").hide();

                }
            });
        }

    </script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>