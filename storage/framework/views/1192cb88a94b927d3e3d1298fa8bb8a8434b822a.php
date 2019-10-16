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
                            <a href="<?php echo e(route('candidate.computerSkill.index')); ?>" >Computer-skill</a>
                            
                            <a href="<?php echo e(route('cv.OthersInfo')); ?>" >Other information</a>
                            <a href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>" class="activeNav">Training certification</a>
                            <a  href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Professional certification</a>
                            <a  href="<?php echo e(route('JobExperience.index')); ?>">Job experience</a>
                            <a  href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>">Previous work information in Caritas Bangladesh</a>
                            <a  href="<?php echo e(route('candidate.membershipInSocialNetwork.index')); ?>">Certification of membership in professional network/ forum</a>
                            <a  href="<?php echo e(route('refree.index')); ?>">Referee</a>
                            <a  href="<?php echo e(route('relativeInCaritas.getRelationInfo')); ?>">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm" >


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Training certification </h2>
                            <?php ($tempHr=0); ?>
                            <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($tempHr>0): ?>
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                <?php endif; ?>
                                <div id="edit<?php echo e($training->traningId); ?>">
                                    <div class="row">
                                        <div class="form-group col-md-10">

                                            <label for="inputEmail4">Name of the training :</label>
                                          <?php echo e($training->trainingName); ?>

                                        </div>

                                        <div class="form-group col-md-2 ">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo(<?php echo e($training->traningId); ?>)"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm " onclick="deleteTraining(<?php echo e($training->traningId); ?>)"><i class="fa fa-trash"></i></button>

                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Venue :</label>
                                            <?php echo e($training->vanue); ?>

                                            
                                        </div>

                                        <?php if($training->hour || $training->day || $training->week || $training->month || $training->year): ?>

                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Duration :</label>
                                           <?php echo e("H:".$training->hour." D:".$training->day." W:".$training->week." M:".$training->month." Y:".$training->year); ?>

                                            
                                        </div>
                                       <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Country :</label>
                                            <?php echo e($training->countryName); ?>


                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Start date :</label>
                                            <?php echo e($training->startDate); ?>

                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">End date :</label>
                                            <?php echo e($training->endDate); ?>

                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Status :</label>

                                                <?php $__currentLoopData = COMPLETING_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php if($training->status == $values): ?> <?php echo e($key); ?> <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                    <?php ($tempHr++); ?>


                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                            <form action="<?php echo e(route('insert.cvTrainingCertificate')); ?>" method="post">
                                <!-- One "tab" for each step in the form: -->

                                <input type="hidden" required name="hasTrainingInfo" value="1">
                                <?php echo e(csrf_field()); ?>


                            <div id="TextBoxesGroup">


                            </div>


                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>



                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="<?php echo e(route('cv.OthersInfo')); ?>"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                <a href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>"><button type="button" id="nextBtn" >Next</button></a>
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

        function editInfo(x) {

            $.ajax({
                type: 'POST',
                url: "<?php echo route('cvTrainingCertificate.edit'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'traningId': x},
                success: function (data) {

                    $('#edit'+x).html(data);

                }
            });
        }
        function deleteTraining(x) {


            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo route('cvTrainingCertificate.delete'); ?>",
                            cache: false,
                            data: {_token: "<?php echo e(csrf_token()); ?>",'traningId': x},
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



    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
//            $('#end').datepicker({
//                format: 'yyyy-m-d'
//            });
            $('.js-example-basic-single').select2();
        });

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 section allow per time!!");
                    return false;
                }

                if (counter >1)
                {
                    var trainingName=$('#trainingName'+(counter-1)).val();
                    var vanue=$('#vanue'+(counter-1)).val();
                    var country=$('#country'+(counter-1)).val();

                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();
                    var status=$('#trainingCertificateStatus'+(counter-1)).val();


                    if(trainingName==""){

                        var errorMsg='Please type a training name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (trainingName.length > 100){

                        var errorMsg='Training name should not more than 100 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
//                    if(vanue==""){
//
//                        var errorMsg='Please type a venue first!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if (vanue.length > 255){

                        var errorMsg='value should not more than 255 charecter length!!';
                        validationError(errorMsg)
                        return false;

                    }
//                    if(country==""){
//
//                        var errorMsg='Please select a country first!!';
//                        validationError(errorMsg)
//                        return false;
//
//                    }

//                    if(start==""){
//                        var errorMsg='Please select a strat date first!!';
//                        validationError(errorMsg)
//                        return false;
//                    }
                    if(status==""){
                        var errorMsg='Please select a status first!!';
                        validationError(errorMsg)
                        return false;
                    }
//                    if(end==""){
//                        var errorMsg='Please Select a End Date First!!';
//                        validationError(errorMsg)
//                        return false;
//                    }

                    if (start != "") {
                        if (end != "") {


                            if (Date.parse(end) < Date.parse(start)) {
                                var errorMsg = 'End date should after start Date!!';
                                validationError(errorMsg);
                                return false;
                            }
                        }
                    }

                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+

                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Name of the training<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="trainingName[]" id="trainingName'+counter+'" placeholder="training name" required> ' +
                    '</div> ' +

                    '<div class="form-group col-md-8"> ' +
                    '<label for="inputEmail4">Venue </label> ' +
                    '<input type="text" class="form-control" name="vanue[]" id="vanue'+counter+'" placeholder="venue" > ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Country</label>' +
                    '<select  class="form-control js-example-basic-single" id="country'+counter+'" name="countryId[]">'+
                    '<option value="">Select Country</option>'+
                    '<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'+
                    '<option value="<?php echo e($country->countryId); ?>"><?php echo e($country->countryName); ?></option>'+
                    '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>'+
                    '</select>'+
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Start date</label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date"> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">End date</label> ' +
                    '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'" placeholder="date"> ' +
                    '</div>'+
                '<div class="form-group col-md-4">'+
                '<label for="inputPassword4">Status<span style="color: red">*</span></label>'+
                '<select onchange="checkTrainingStatus('+counter+')" required class="form-control"id="trainingCertificateStatus'+counter+'" name="status[]">'+

                '<option value="">Select status</option>'+
                <?php $__currentLoopData = COMPLETING_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    '<option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>'+
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    '</select>'+
                '</div>'+
                '<div id="courseDuration'+counter+'" class="row">'+
                '<label>Duration</label>'+
                '<div class="form-group col-md-2">'+
                '<label for="inputPassword4">Hour</label>'+
                '<select  class="form-control js-example-basic-single"id="trainingCertificatehour" name="hour[]">'+

                '<option value="">Select hour</option>'+
                <?php for($i = 1 ; $i <=300 ; $i++): ?>
                    '<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>'+
                <?php endfor; ?>
                    '</select>'+
                '</div>'+
                '<div class="form-group col-md-2">'+
                '<label for="inputPassword4">Day</label>'+
                '<select  class="form-control js-example-basic-single"id="trainingCertificateday" name="day[]">'+

                '<option value="">Select day</option>'+
                <?php for($i = 1 ; $i <=365 ; $i++): ?>
                    '<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>'+
                <?php endfor; ?>
                    '</select>'+
                '</div>'+
                '<div class="form-group col-md-2">'+
                '<label for="inputPassword4">Week</label>' +
                '<select  class="form-control js-example-basic-single"id="trainingCertificateweek" name="week[]">'+

                '<option value="">Select week</option>'+
                <?php for($i = 1 ; $i <=52 ; $i++): ?>
                    '<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>'+
                <?php endfor; ?>
                    '</select>'+
                '</div>'+
                '<div class="form-group col-md-2">'+
                '<label for="inputPassword4">Month</label>'+
                '<select  class="form-control js-example-basic-single"id="trainingCertificatemonth" name="month[]">'+

                '<option value="">Select month</option>'+
                <?php for($i = 1 ; $i <=12 ; $i++): ?>
                    '<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>'+
                <?php endfor; ?>
                    '</select>'+
                '</div>'+
                '<div class="form-group col-md-2">'+
                '<label for="inputPassword4">Year</label>'+
                '<select  class="form-control js-example-basic-single"id="trainingCertificateyear" name="year[]">'+

                '<option value="">Select year</option>'+
                <?php for($i = 1 ; $i <51 ; $i++): ?>
                    '<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>'+
                <?php endfor; ?>
                    '</select>'+
                '</div>'+
                '</div>'
                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");
                $('#courseDuration'+counter).hide();

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                    $("#submitBtn").show();
                }
                $('.date').datepicker({
                    format: 'yyyy-m-d'
                });
                $('.js-example-basic-single').select2();
            });
            $('.js-example-basic-single').select2();
            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast one course section is needed!!");
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

        function checkTrainingStatus(x) {

            var trainingCertificateStatus =$('#trainingCertificateStatus'+x).val();

            if(trainingCertificateStatus==1){
                $('#courseDuration'+x).hide();
            }
            else if(trainingCertificateStatus==2){
                $('#courseDuration'+x).show();
            }




        }

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>