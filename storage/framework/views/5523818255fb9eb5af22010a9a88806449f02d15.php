<?php $__env->startSection('content'); ?>
    <style>
        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            /*background: #d3d3d3;*/
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }


        @media  only screen and (max-width: 420px) {
            .top{
                margin-top: 4%;
            }
        }

    </style>

    <div class="row ">


        <div class="col-12 ">
            <div class="card updateCard">
                <div style="background-color: #F1F1F1" class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="<?php echo e(route('candidate.cvPersonalInfo')); ?>">Personal details</a>
                            <a href="<?php echo e(route('candidate.cvQuesObj')); ?>">Career objective and application information</a>
                            <a href="<?php echo e(route('candidate.cvEducation')); ?>">Education</a>
                            <a href="<?php echo e(route('candidate.language.index')); ?>" class="activeNav">Language</a>
                            <a href="<?php echo e(route('candidate.computerSkill.index')); ?>">Computer-skill</a>
                            
                            <a  href="<?php echo e(route('cv.OthersInfo')); ?>">Other information</a>
                            <a  href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>">Training certification</a>
                            <a  href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Professional certification</a>
                            <a  href="<?php echo e(route('JobExperience.index')); ?>">Job experience</a>
                            <a  href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>">Previous work information in Caritas Bangladesh</a>
                            <a  href="<?php echo e(route('candidate.membershipInSocialNetwork.index')); ?>">Certification of membership in professional network/ forum</a>
                            <a  href="<?php echo e(route('refree.index')); ?>">Referee</a>
                            <a  href="<?php echo e(route('relativeInCaritas.getRelationInfo')); ?>">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                        <div id="regForm">

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px; text-align: center">Language</h2>

                            <?php $__currentLoopData = $empLanguageGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languageHead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="language<?php echo e($languageHead->fklanguageHead); ?>">
                                <div class="form-group pull-right">
                                    <button class="btn btn-sm btn-info" data-panel-id="<?php echo e($languageHead->fklanguageHead); ?>" onclick="editLanguage(this)"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-panel-id="<?php echo e($languageHead->fklanguageHead); ?>" onclick="deleteLanguage(this)"><i class="fa fa-trash"></i></button>
                                </div>
                                <h5><?php echo e($languageHead->languagename); ?></h5>

                                <table class="table table-striped">
                                    <thead>
                                        <th>Language skill name</th>
                                        <th>Percentage</th>
                                    </thead>



                                <?php $__currentLoopData = $empLanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                    <?php if($languageHead->fklanguageHead== $language->fklanguageHead): ?>


                                        <td><?php echo e($language->languageSkillName); ?></td>
                                        <td><?php echo e($language->rate); ?></td>


                                    <?php endif; ?>
                                        </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                                </div>
                                <hr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <form  name="skillForm" action="<?php echo e(route('candidate.language.insert')); ?>"  method="post">
                                <!-- One "tab" for each step in the form: -->
                                <?php echo e(csrf_field()); ?>



                            <div style="display: block" id="otherSkillDiv">
                                <div id="TextBoxesGroup">




                                </div>

                                <button type="button" id="addButton" class="btn btn-success">Add more</button>
                                <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                            </div>


                        

                        <div style="overflow:auto;" class="top">
                            <div style="float:right;">
                                <a href="<?php echo e(route('candidate.cvEducation')); ?>"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                <a href="<?php echo e(route('candidate.computerSkill.index')); ?>"><button type="button" id="nextBtn" >Next</button></a>

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


        function editLanguage(x) {
            var id=$(x).data('panel-id');
            // alert(id);


            $.ajax({
                type: 'POST',
                url: "<?php echo route('candidate.language.edit'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'id': id},
                success: function (data) {

                    $('#language'+id).html(data);
                    // console.log(data);

                }
            });
        }


        function  checkUnique(x) {


            var values =  $('select[name="languagehead[]"]').map(function () {
                return this.value; // $(this).val()
            }).get();


            var unique = values.filter(function(itm, i, values) {
                return i == values.indexOf(itm);
            });

            if(values.length != unique.length){

                alert("Already Inserted");
                $(x).val('');

            }

            // alert($(x).val());

        }


        function deleteLanguage(x){
            var id=$(x).data('panel-id');
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure to delete this language?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo route('candidate.language.delete'); ?>",
                            cache: false,
                            data: {_token: "<?php echo e(csrf_token()); ?>",'id': id},
                            success: function (data) {

                                location.reload();

                            }
                        });

                    },
                    cancel: function () {
//                        $.alert('Canceled!');
                    }

                }
            });


        }


        $("input[name=hasOtherSkill]").click( function () {

            if ($(this).val()=='1'){
                $('#otherSkillDiv').show();
            }else {
                $('#otherSkillDiv').hide();
            }
        });





    </script>
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
            x[(n+4)].className += " active";
        }
    </script>



    <script type="text/javascript">


        $(document).ready(function(){

            var counter = 1;
            var limit = '<?php echo count($languagehead)?>';
            $("#removeButton").hide();

            $("#submitBtn").hide();

            $("#addButton").click(function () {


                if (counter == 1 ) {

                    var skill = $('#skill').val();
                    var myRange = $('#myRange').val();


                    if (skill == "") {

                        var errorMsg = 'Please select a skill first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (myRange == "") {

                        var errorMsg = 'Please select skill level first!!';
                        validationError(errorMsg);
                        return false;
                    }
                }else {

                    var skill = $('#skill'+counter).val();
                    var myRange = $('#myRange'+counter).val();


                    if (skill == "") {

                        var errorMsg = 'Please select a skill first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (myRange == "") {

                        var errorMsg = 'Please select skill level first!!';
                        validationError(errorMsg);
                        return false;
                    }

                }



                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputEmail4">Language<span style="color: red">*</span></label> ' +
                    '<select required name="languagehead[]" onchange="checkUnique(this)" class="form-control" id="skill'+counter+'"> ' +
                    '<option selected value="">Select Language</option>'+
                    '<?php $__currentLoopData = $languagehead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languageheads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'+
                    '<option value="<?php echo e($languageheads->id); ?>"><?php echo e($languageheads->languagename); ?></option>'+
                    '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>'+
                    '</select> ' +
                    '</div>'+
                    '<?php $__currentLoopData = $languageskill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'+
                    '<div class="col-sm-12 row">'+
                    '<div class="form-group col-md-4" style="margin-top: 20px">'+
                    '<label><?php echo e($ls->languageSkillName); ?></label>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label>Percentage of skill (out of 100)</label>'+
                    '<div class="slidecontainer">'+
                    '<input type="range" min="0" max="100" value="0" class="slider" onchange="myRangeChanged3('+'<?php echo e($ls->id); ?>,'+counter+')" name="languageskill[]" id="myRange1'+'<?php echo $ls->id?>'+counter+'">'+
                    '<p>Value: <span id="demo1'+'<?php echo $ls->id?>'+'"></span> %</p>'+
                    '<input type="hidden" id="skillPercentage'+'<?php echo $ls->id?>'+counter+'" name="langskillid" value="<?php echo e($ls->id); ?>" class="form-control"  />'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>'

                );

                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
                    $("#removeButton").show();
                    $("#submitBtn").show();
                }

            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast one language is needed!!");
                    return false;
                }
                counter--;
                if(counter<2){
                    $("#removeButton").hide();
                    $("#submitBtn").hide();
                }
                $("#TextBoxDiv" + counter).remove();
            });


        });


        function myRangeChanged2(x){


            var slider = document.getElementById("myRange"+x);

            var output = document.getElementById("demo"+x);
            output.innerHTML = slider.value;

            slider.oninput = function() {
                output.innerHTML = this.value;
                $("#skillPercentage"+x).val(this.value);
            }

        }

        function myRangeChanged3(x,y){

            //alert(x);
            // alert(y);


            var slider = document.getElementById("myRange1"+x+y);

            var output = document.getElementById("demo1"+x,y);
            output.innerHTML = slider.value;

            slider.oninput = function() {
                output.innerHTML = this.value;
                $("#skillPercentage"+x+y).val(this.value);
            }

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
        //        function checkSkill() {
        //
        //            var skill = document.skillForm.elements["skill[]"];
        //            var skillLevel = document.skillForm.elements["skillPercentage[]"];
        //
        //            alert(skillLevel.length);
        //
        ////            for(i=0;i<skill.length;i++)
        ////            {
        ////                if (skill[i].value != '' && skillLevel[i].value=='') {
        ////                    var errorMsg = 'Please Select a Skill '+ (i + 1)+'First!!';
        ////                    validationError(errorMsg);
        ////                    return false;
        ////                }
        ////                if (skill[i].value == '' && skillLevel[i].value != '')
        ////                {
        ////                    var errorMsg = 'Please Select a Skill Level '+ (i + 1)+'First!!';
        ////                    validationError(errorMsg);
        ////                    return false;
        ////                }
        ////            }
        //
        //            return false;
        //
        //
        //        }

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>