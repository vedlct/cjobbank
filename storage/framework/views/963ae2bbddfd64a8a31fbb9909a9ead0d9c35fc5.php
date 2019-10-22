<?php $__env->startSection('content'); ?>
    <style>
        .updateCard {
            height:2500px;
        }

        @media  only screen and (max-width: 1450px) and (min-width: 801px) {
            .updateCard {
            height:3800px;
        }
        }
    </style>
    <style>
        #notice{
            color: blue;
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
                            <a href="<?php echo e(route('candidate.language.index')); ?>" >Language</a>
                            <a href="<?php echo e(route('candidate.computerSkill.index')); ?>" >Computer-skill</a>
                            
                            <a href="<?php echo e(route('cv.OthersInfo')); ?>" >Other information</a>
                            <a href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>">Training certification</a>
                            <a href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>">Professional certification</a>
                            <a class="activeNav" href="<?php echo e(route('JobExperience.index')); ?>">Job experience</a>
                            <a href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>">Previous work information in Caritas Bangladesh</a>
                            <a  href="<?php echo e(route('candidate.membershipInSocialNetwork.index')); ?>">Certification of membership in professional network/ forum</a>
                            <a  href="<?php echo e(route('refree.index')); ?>">Referee</a>
                            <a  href="<?php echo e(route('relativeInCaritas.getRelationInfo')); ?>">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm">
                        <div id="edit"></div>
                        <div id="TextBoxesGroup"></div>

                        <div id="all_data" class="tab">

                            <h2 style="margin-bottom: 30px;">Job experience</h2>
                            <?php ($tempHr=0); ?>
                            <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($tempHr>0): ?>
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                <?php endif; ?>
                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Organization type :</label>
                                                <?php echo e($experience->organizationTypeName); ?>

                                            </div>

                                            <div class="form-group col-md-10">
                                                <label for="inputEmail4">Organization name :</label>
                                              <?php echo e($experience->organization); ?>

                                            </div>

                                            <div class="form-group col-md-2">
                                                <button type="button" class="btn btn-info btn-sm " onclick="editInfo(<?php echo e($experience->jobExperienceId); ?>)"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm " onclick="deleteExperience(<?php echo e($experience->jobExperienceId); ?>)"><i class="fa fa-trash"></i></button>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Designation :</label>
                                                <?php echo e($experience->degisnation); ?>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Start date :</label>
                                                <?php echo e($experience->startDate); ?>


                                            </div>
                                            <div class="form-group col-md-4">

                                                <?php if($experience->endDate==null): ?>
                                                    <label for="inputPassword4">Status :</label>
                                                    Running
                                                <?php else: ?>
                                                    <label for="inputPassword4">End date :</label>
                                                <?php echo e($experience->endDate); ?>

                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Total experience :</label>
                                                <span id="TE<?php echo e($tempHr); ?>"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Organization address :</label>
                                                <?php echo e($experience->address); ?>

                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Major responsibilities :</label><br>
                                                <?php echo $experience->majorResponsibilities; ?>

                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Key achievement :</label><br>
                                                <?php echo $experience->keyAchivement; ?>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Name of supervisor :</label>
                                                <?php echo e($experience->supervisorName); ?>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Any reservation contacting your employer? :</label>
                                                <?php $__currentLoopData = YES_NO; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($value==$experience->reservationContactingEmployer): ?><?php echo e($key); ?> <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Type of employment :</label>
                                                <?php echo e($experience->employmentType); ?>

                                            </div>
                                            <?php if($experience->employmentType== OTHERS): ?>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Employment type (other) :</label>
                                                <?php echo e($experience->employmentTypeText); ?>

                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php ($tempHr++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <input class="form-check-input"  type="hidden"  name="hasProfCertificate" value="1">

                            <button type="button" onclick="add_new()" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <a href="<?php echo e(route('candidate.cvProfessionalCertificate')); ?>"><button type="button" id="btnPevious" >Back</button></a>
                                    
                                    <a href="<?php echo e(route('candidate.previousWorkInCB.index')); ?>"><button type="button" id="nextBtn" >Next</button></a>

                                </div>
                            </div>

                        </div>

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
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot-js'); ?>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        fixStepIndicator(currentTab); // Display the crurrent tab

        function editInfo(x){
            $("#all_data").hide();
            $.ajax({
                type: 'POST',
                url: "<?php echo route('JobExperience.edit'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'jobExperienceId': x},
                success: function (data) {
                    $('#edit').html(data);
                    $("#addButton").hide();
                }
            });
        }
        function add_new(){
            $("#all_data").hide();
            $.ajax({
                type: 'POST',
                url: "<?php echo route('JobExperience.add'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>"},
                success: function (data) {
                    $('#TextBoxesGroup').html(data);
                    $("#addButton").hide();
                }
            });
        }
        function deleteExperience(x){
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo route('JobExperience.delete'); ?>",
                            cache: false,
                            data: {_token: "<?php echo e(csrf_token()); ?>",'jobExperienceId': x},
                            success: function () {
                                location.reload();
                            }
                        });
                    },
                    cancel: function () {
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
            x[(n+4)].className += " active";
        }
    </script>



    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
           // var expss= '<?php echo e($experiences); ?>';

          //  console.log(expss[0]);



//            for (var $i=0;$i<=expss.length;$i++){
//
//                console.log(expss[0]['startDate']);

//            if((expss[$i]['startDate']) && (expss[$i]['endDate']))
//            document.getElementById("TE"+[0]).innerHTML = calcDate(new Date(expss[$i]['endDate']),new Date(expss[$i]['startDate']));
//            else if((expss[$i]['startDate']) && !(expss[$i]['endDate']))
//            document.getElementById("TE"+[$i]).innerHTML = calcDate(new Date(),new Date(expss[$i]['startDate']));


//            }


                <?php $ii=0;?>
                <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <?php if(!is_null($experience->startDate) && !is_null($experience->endDate)): ?>
                document.getElementById("TE"+'<?php echo e($ii); ?>').innerHTML = calcDate(new Date('<?php echo e($experience->endDate); ?>'),new Date('<?php echo e($experience->startDate); ?>'));
                <?php elseif(!is_null($experience->startDate) && is_null($experience->endDate)): ?>
                document.getElementById("TE"+'<?php echo e($ii); ?>').innerHTML = calcDate(new Date(),new Date('<?php echo e($experience->startDate); ?>'));
                <?php endif; ?>
            <?php $ii++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





        });

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();

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

        function checkJobExperience(){

                var organizationType=document.getElementsByName('organizationType[]');
                var organization=document.getElementsByName('organization[]');
                var degisnation=document.getElementsByName('degisnation[]');
                var start=document.getElementsByName('startDate[]');
                var end=document.getElementsByName('endDate[]');
                var address=document.getElementsByName('address[]');

                var majorResponsibilities=document.getElementsByName('majorResponsibilities[]');
                var keyAchivement=document.getElementsByName('keyAchivement[]');
                var supervisorName=document.getElementsByName('supervisorName[]');
                var reservationContactingEmployer=document.getElementsByName('reservationContactingEmployer[]');
                var employmentType=document.getElementsByName('employmentType[]');
                var employmentTypeText=document.getElementsByName('employmentTypeText[]');

                for (i=0;i<organization.length;i++){

                    if(end[i].value =="" && supervisorName[i].value==""){

                        var errorMsg='Please insert supervisor name for running job !!';
                        validationError(errorMsg)
                        return false;
                    }

                    if(organizationType[i].value==""){

                        var errorMsg='Please select a organization type first!!'
                        validationError(errorMsg)
                        return false;
                    }

                    // if(organization[i].value==""){
                    //
                    //     var errorMsg='Please type organization name first!!'
                    //     validationError(errorMsg)
                    //     return false;
                    // }
                    if (organization[i].value.length > 100){

                        var errorMsg='Organization name should not more than 100 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(degisnation[i].value==""){

                        var errorMsg='Please type designation first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation[i].value.length > 100){

                        var errorMsg='Designation should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start[i].value==""){

                        var errorMsg='Please select a strat date first!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(end[i].value != "") {


                        if (Date.parse(end[i].value) < Date.parse(start[i].value)) {

                            var errorMsg = 'End date should after start date!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }

//                if($.trim(address[i].value)==""){
//
//                    var errorMsg='Please type address first!!';
//                    validationError(errorMsg);
//                    return false;
//
//                }

                    // if(majorResponsibilities[i].value==""){
                    //
                    //     var errorMsg='Please type major responsibilities first!!';
                    //     validationError(errorMsg);
                    //     return false;
                    // }
                    if(majorResponsibilities[i].value!= "") {

                        if (majorResponsibilities[i].value.length > 5000) {

                            var errorMsg = 'Major responsibilities should not more than 5000 charecter length!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    if(keyAchivement[i].value!="") {
                        if (keyAchivement[i].value.length > 5000) {

                            var errorMsg = 'Key achivement should not more than 5000 charecter length!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    // if(supervisorName[i].value!="") {
                    //     if (supervisorName[i].value.length > 200) {
                    //
                    //         var errorMsg = 'Supervisor name should not more than 200 charecter length!!'
                    //         validationError(errorMsg)
                    //         return false;
                    //
                    //     }
                    // }

                    // if(reservationContactingEmployer[i].value==""){
                    //
                    //     var errorMsg='Please select reservation of contacting employer first!!'
                    //     validationError(errorMsg)
                    //     return false;
                    // }

                    if(employmentType[i].value==""){

                        var errorMsg='Please select employment type first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (employmentType[i].value != ""){

                        if (employmentType[i].value == "<?php echo e(OTHERS); ?>" && employmentTypeText[i].value != "" ){

                            var errorMsg='Please write employement other text first!!';
                            validationError(errorMsg);
                            return false;

                        }

                    }

                }



        }

        function employmentTypefunc(x) {

            var employmentType =$('#employmentType'+x).val();

            if (employmentType == "<?php echo e(OTHERS); ?>"){

                $("#employmentTypeTextDiv"+x).show();
            }else {
                $("#employmentTypeTextDiv"+x).hide();
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

        function getExp(counter) {

            if ($('#end'+counter).val()!="" && $('#start'+counter).val()!=""){

                var total_month='';

                var end = new Date($('#end'+counter).val());
                var start = new Date($('#start'+counter).val());
                var exp=calcDate(end,start)


                $("#totalExpValue"+counter).val(exp);

                $("#experienceDiv"+counter).show();


            }else {
                $("#experienceDiv"+counter).hide();
            }


        }
        function calcDate(date1,date2) {
            // var diff = Math.floor(date1.getTime() - date2.getTime());
            // var day = 1000 * 60 * 60 * 24;
            //
            // var days = Math.floor(diff/day);
            // var months = Math.floor((days%365)/31);
            // var years = Math.floor(days/365);
            // var daydiffs = Math.floor(days%30);
            //
            // if (days>0) {
            //
            //
            //     if (daydiffs == 0) {
            //         var month = (months + 1);
            //     } else {
            //         var month = months;
            //     }
            //
            // }
            //
            // // if (years > 0){
            // //     var month=Math.round((months-(12*years)+1));
            // // }else {
            // //     var month=months;
            // // }
            //
            // var message = years + "years ";
            // message += month + " months ";
            // message += daydiffs + "days ";
            //
            // return message;

            var now = date1;
            var today = date2;

            var yearNow = now.getYear();
            var monthNow = now.getMonth();
            var dateNow = now.getDate();

            // var dob = new Date(dateString.substring(6,10),
            //     dateString.substring(0,2)-1,
            //     dateString.substring(3,5)
            // );

            var yearDob = today.getYear();
            var monthDob = today.getMonth();
            var dateDob = today.getDate();
            var age = {};
            var ageString = "";
            var yearString = "";
            var monthString = "";
            var dayString = "";


            yearAge = yearNow - yearDob;

            if (monthNow >= monthDob)
                var monthAge = monthNow - monthDob;
            else {
                yearAge--;
                var monthAge = 12 + monthNow -monthDob;
            }

            if (dateNow >= dateDob)
                var dateAge = dateNow - dateDob;
            else {
                monthAge--;
                var dateAge = 31 + dateNow - dateDob;

                if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                }
            }

            age = {
                years: yearAge,
                months: monthAge,
                days: dateAge
            };

            if ( age.years > 1 ) yearString = " years";
            else yearString = " year";
            if ( age.months> 1 ) monthString = " months";
            else monthString = " month";
            if ( age.days > 1 ) dayString = " days";
            else dayString = " day";


            if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
                ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString ;
            else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
                ageString = age.days + dayString;
            else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
                ageString = age.years + yearString;
            else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
                ageString = age.years + yearString + " and " + age.months + monthString ;
            else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
                ageString = age.months + monthString + " and " + age.days + dayString;
            else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
                ageString = age.years + yearString + " and " + age.days + dayString;
            else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
                ageString = age.months + monthString
            else ageString = "Oops! Could not calculate !";

            return ageString;

        }

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>