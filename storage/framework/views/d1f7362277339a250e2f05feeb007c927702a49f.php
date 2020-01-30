<style>
    @media  only screen and (max-width: 420px) {
        .top{
            margin-top: 4%;
        }
    }
</style>

<?php $__env->startSection('content'); ?>

    <div class="row ">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card updateCard">
                <div class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="<?php echo e(route('candidate.cvPersonalInfo')); ?>">Personal details</a>
                            <a href="<?php echo e(route('candidate.cvQuesObj')); ?>">Career Objective and application information</a>
                            <a href="<?php echo e(route('candidate.cvEducation')); ?>" class="activeNav">Education</a>
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

                    <div class="col-md-9" id="regForm" >
                        <!-- One "tab" for each step in the form: -->


                        <div class="tab">

                            <h2 style="margin-bottom: 30px; text-align:center">Education </h2>
                            <?php $R=0;
                                    ?>
                            <?php $__currentLoopData = $employeeCvEducationInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educationInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($R>0): ?>
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                <?php endif; ?>
                            <div id="edit<?php echo e($educationInfo->educationId); ?>" class="row">


                                    <div class="form-group col-md-4">

                                        <label for="">Exam/Level :</label>
                                        <?php echo e($educationInfo->educationLevelName); ?>

                                    </div>

                                <div class="form-group col-md-6">

                                    <label for="">Subject/Group :</label>
                                    <?php echo e($educationInfo->degreeName); ?>


                                </div>
                                    <div class="form-group col-md-2 ">
                                        <button type="button" class="btn btn-info btn-sm " onclick="editInfo(<?php echo e($educationInfo->educationId); ?>)"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm " onclick="deleteProfession(<?php echo e($educationInfo->educationId); ?>)"><i class="fa fa-trash"></i></button>

                                    </div>

                                <?php if($educationInfo->eduLvlUnder ==2 || $educationInfo->eduLvlUnder==null ): ?>

                                <div class="form-group col-md-12">
                                    <label for="">School/College/Institution name :</label>
                                    <?php echo e($educationInfo->institutionName); ?>

                                    
                                </div>
                                <?php endif; ?>

                                <?php if(($educationInfo->eduLvlUnder == 2 || $educationInfo->eduLvlUnder==null) && $educationInfo->universityType != null ): ?>
                                    <div class="form-group col-md-3">
                                        <label for="">University type :</label>
                                        <?php $__currentLoopData = UNIVERSITY_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value==$educationInfo->universityType): ?> <?php echo e($key); ?> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </div>
                                <?php endif; ?>

                                <?php if($educationInfo->eduLvlUnder ==1 || $educationInfo->eduLvlUnder==null ): ?>
                                    <div class="form-group col-md-3">
                                        <label for="">Board:</label>
                                        <?php echo e($educationInfo->boardName); ?>


                                    </div>
                                <?php endif; ?>

                                <div class="form-group col-md-3">
                                    <label for="">Major :</label>
                                    <label for=""><?php echo e($educationInfo->educationMajorName); ?></label>

                                </div>


                                <div class="form-group col-md-3">
                                    <label for="">Country :</label>

                                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($educationInfo->fkcountryId ==$coun->countryId): ?>
                                            <?php echo e($coun->countryName); ?>

                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="">Passing year :</label>
                                    <?php echo e($educationInfo->passingYear); ?>


                                    
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Result system :</label>
                            <?php if($educationInfo->resultSystem!=4): ?>

                                            <?php $__currentLoopData = RESULT_SYSTEM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($educationInfo->resultSystem ==$value): ?>
                                                <?php echo e($key); ?>

                                                <?php endif; ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <?php echo e($educationInfo->resultSystemName); ?>

                                <?php endif; ?>

                                </div>

                                    <div class="form-group col-md-3">
                                        <label for="">CGPA :</label>
                                        <?php echo e($educationInfo->result); ?>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Scale/ Out of :</label>
                                        <?php echo e($educationInfo->resultOutOf); ?>


                                    </div>
                                    <div class="form-group col-md-3">

                                        <label for="">Status :</label>

                                            <?php $__currentLoopData = COMPLETING_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($educationInfo->status ==$value): ?>
                                                <?php echo e($key); ?>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </div>



                                </div>
                                        <?php $R++;
                                        ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        <form id="" action="<?php echo e(route('cv.insertPersonalEducation')); ?>"  method="post">
                            <!-- One "tab" for each step in the form: -->
                            <?php echo e(csrf_field()); ?>

                            <div id="TextBoxesGroup">


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                            <div style="overflow:auto;" class="top">
                                <div style="float:right;">
                                    <a href="<?php echo e(route('candidate.cvQuesObj')); ?>"><button type="button" id="btnPevious">Back</button></a>
                                    <button type="submit" id="submitBtn">Save</button>
                                    <a href="<?php echo e(route('candidate.language.index')); ?>"><button type="button" id="nextBtn" >Next</button></a>
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


        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('foot-js'); ?>

        <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function checkMajor(x) {
                var major =$('#majorSub'+x).val();
               //  alert(x);
                if (major == "OTHERSMajor"){
                    $("#subjectNameDiv"+x).show();

                }else {
                    $("#subjectNameDiv"+x).hide();
                }
            }

            function editInfo(x) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo route('cv.educationEdit'); ?>",
                    cache: false,
                    data: {_token: "<?php echo e(csrf_token()); ?>",'id': x},
                    success: function (data) {

                        $("#addButton").hide();
                        $("#submitBtn").hide();
                        $("#nextBtn").hide();
                        $("#btnPevious").hide();

                        $('#edit'+x).html(data);

                     //   console.log(data);

                    }
                });
            }
            function deleteProfession(x) {

                $.confirm({
                    title: 'Confirm!',
                    content: 'Are you sure to delete this education?',
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
                                    url: '<?php echo e(route('cv.PersonalEducationDelete')); ?>',
                                    data: {id: x},
                                    success: function (data) {
                                        $.alert({
                                            title: 'Success!',
                                            type: 'green',
                                            content: 'Education deleted successfully',
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

            var currentTab = 0; // Current tab is set to be the first tab (0)
            fixStepIndicator(currentTab); // Display the crurrent tab

            function fixStepIndicator(n) {
                var x1 = document.getElementsByClassName("tab");
                x1[n].style.display = "block";
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                }
                x[(n+1)].className += " active";
            }


            $(function () {
                $('.date').datepicker({
                    viewMode: "years",
                    minViewMode: "years",
                    format: 'yyyy'
                });
            });

            $(document).ready(function(){

                var counter = 2;
                $("#removeButton").hide();
                $("#btnPevious").show();
                $("#nextBtn").show();
                $("#submitBtn").hide();


                $("#addButton").click(function () {
                    if(counter>10){
                        alert("Only 10 section allow per time!!");
                        return false;
                    }
                    if (counter > 2 ){
                        var educationLevel=$('#educationLevel'+(counter-1)).val();
                        var degree=$('#degree'+(counter-1)).val();
                        var instituteName=$('#instituteName'+(counter-1)).val();
                        var country=$('#country'+(counter-1)).val();
                        var year=$('#passingYear'+(counter-1)).val();
                        var resultSydtem=$('#resultSydtem'+(counter-1)).val();
                        var cgpa=$('#cgpa'+(counter-1)).val();
                        var status=$('#educationStatus'+(counter-1)).val();
                        var major=$('#majorSub'+(counter-1)).val();
                        var universityType=$('#universityType'+(counter-1)).val();

                        if(major=="OTHERSMajor" && $("#subjectName"+(counter-1)).val()=="" ){
                            var errorMsg='Please type a subject name first!!'
                            validationError(errorMsg);
                            return false;
                        }

                        if(educationLevel==""){
                            var errorMsg='Please select a education level first!!'
                            validationError(errorMsg)
                            return false;
                        }

                        if(degree==""){
                            var errorMsg='Please select degree first!!'
                            validationError(errorMsg)
                            return false;
                        }

                        if(instituteName!="") {
                            if (instituteName == "") {
                                var errorMsg = 'Please type institute name first!!'
                                validationError(errorMsg)
                                return false;
                            }
                            if (instituteName.length > 255) {
                                var errorMsg = 'Institute name should not more than 255 charecter length!!'
                                validationError(errorMsg)
                                return false;
                            }
                        }

                        if(universityType!="") {
                            if (universityType == "") {
                                var errorMsg = 'Please type university type first!!';
                                validationError(errorMsg);
                                return false;
                            }
                        }

                        if(country==""){
                            var errorMsg='Please select a country first!!'
                            validationError(errorMsg);
                            return false;
                        }

                        if(year!="") {
                            if (year == "") {
                                var errorMsg = 'Please select a year first!!'
                                validationError(errorMsg);
                                return false;
                            }
                        }

                        if(resultSydtem==""){
                            var errorMsg='Please select a result system first!!'
                            validationError(errorMsg);
                            return false;
                        }

                        if(cgpa!="") {
                            if (cgpa == "") {
                                var errorMsg = 'Please type your result/CGPA first!!'
                                validationError(errorMsg);
                                return false;
                            }
                        }

                        if(status==""){
                            var errorMsg='Please select a status first!!'
                            validationError(errorMsg);
                            return false;
                        }
                    }

                    var newTextBoxDiv = $(document.createElement('div'))
                        .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                    newTextBoxDiv.after().html('<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'
                        +'<div class="form-group col-md-4">'+
                        '<label for="">Exam/Level<span style="color: red">*</span></label>'+
                        '<select name="educationLevel[]" class="form-control" data-panel-id="'+ counter+'" required onchange="getDegree(this)"id="educationLevel'+counter+'">'+
                        '<option value="">Select education level</option>'+
                            <?php $__currentLoopData = $educationLevel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edulevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<option value="<?php echo e($edulevel->educationLevelId); ?>"><?php echo e($edulevel->educationLevelName); ?></option>'+
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                '</select>'+
                        '</div>'+
                        '<div class="form-group col-md-8">'+

                        '<label for="">Subject/Group<span style="color: red">*</span></label>'+
                        '<select name="degree[]" class="form-control" data-panel-id="'+ counter+'" required onchange="getMajor(this)" id="degree'+counter+'">'+
                        '<option value="">Select degree</option>'+

                        '</select>'+

                        '</div>'+
                        '<div style="display: none" id="degreeNameDiv'+ counter+'" class="form-group col-md-12">'+
                        '<label for="">Degree name</label>'+
                        '<input type="text" maxlength="255" name="degreeName[]" class="form-control" id="degreeName'+ counter+'"  placeholder="">'+

                        '</div>'+

                        '<div id="instituteNameDiv'+counter+'" class="form-group col-md-12">'+
                        '<label for="">Institution<span style="color: red">*</span></label>'+
                        '<input type="text" name="instituteName[]" class="form-control"  id="instituteName'+counter+'" placeholder="" required>'+
                        '</div>'+
                        '<div style="display: none" id="universityTypeDiv'+counter+'" class="form-group col-md-3">'+
                        '<label for="">University type</label>'+
                        '<select name="universityType[]" class="form-control" id="universityType'+counter+'">'+
                        '<option value="" >Select type</option>'+
                            <?php $__currentLoopData = UNIVERSITY_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<option value="<?php echo e($value); ?>" ><?php echo e($key); ?></option>'+
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                '</select>'+
                        '</div>'+
                        '<div id="boardDiv'+counter+'"  class="form-group col-md-3">'+
                        '<label for="">Board</label>' +
                        '<select name="board[]" class="form-control" onchange="getBoardName('+counter+')" id="board'+counter+'"> ' +
                        '<option value="" >Select board</option>'+
                            <?php $__currentLoopData = $boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<option value="<?php echo e($board->boardId); ?>" ><?php echo e($board->boardName); ?></option>'+
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                '<option value="OTHERSBoard" ><?php echo e(OTHERS); ?></option>'+
                        '</select>' +
                        '</div>'+

                        '<div style="display: none" id="boardNameDiv'+counter+'" class="form-group col-md-3">'+
                        '<label for="">Board name</label>'+
                        '<input type="text" maxlength="255" name="boardName[]" class="form-control" id="boardName'+counter+'"  placeholder="">'+

                        '</div>'+

                        '<div class="form-group col-md-9">'+
                        '<label for="">Major</label>'+
                        '<select name="major[]" class="form-control js-example-basic-single" onchange="checkMajor('+counter+')" id="majorSub'+counter+'">'+
                        '<option value="">Select Major</option>'+
                        '<option value="OTHERSMajor"><?php echo e(OTHERS); ?></option>'+
                        '</select>'+
                        '</div>'+
                        '<div style="display: none" id="subjectNameDiv'+counter+'" class="form-group col-md-6">'+
                        '<label for="">Subject name</label>'+
                        '<input type="text" maxlength="255" name="subjectName[]" class="form-control" id="subjectName'+counter+'"  placeholder="Subject name">'+

                        '</div>'+


                        '<div class="form-group col-md-3">'+
                        '<label for="">Country<span style="color: red">*</span></label>'+
                        ' <select name="country[]" class="form-control js-example-basic-single" required id="country'+counter+'">'+
                        '<option value="">Select country</option>'+
                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<option value="<?php echo e($coun->countryId); ?>"><?php echo e($coun->countryName); ?></option>'+
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                '</select>'+
                        ' </div>'+

                        '<div class="form-group col-md-3">'+
                        '<label for="">Status<span style="color: red">*</span></label>'+
                        '<select name="status[]"class="form-control" onchange="checkeducationStatus('+counter+')" required id="educationStatus'+counter+'">'+
                        '<option value="">Select status</option>'+
                            <?php $__currentLoopData = COMPLETING_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>'+
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                '</select>'+
                        '</div>'+

                        '<div class="form-group col-md-3">'+
                        '<label for="">Passing year</label>'+
                        ' <input name="passingYear[]" type="text" class="form-control date" id="passingYear'+counter+'" placeholder="passing year">'+
                        ' </div>'+
                        '<div class="form-group col-md-3">'+
                        '<label for="">Result system<span style="color: red">*</span></label>'+
                        '<select name="resultSystem[]" class="form-control" onchange="getResultSystemName('+counter+')" required id="resultSydtem'+counter+'">'+
                        '<option value="">Select system</option>'+
                            <?php $__currentLoopData = RESULT_SYSTEM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>'+
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                '<option value="<?php echo e(OTHERS); ?>" ><?php echo e(OTHERS); ?></option>'+
                        '</select>'+
                        '</div>'+

                        '<div style="display: none" id="resultSydtemNameDiv'+counter+'" class="form-group col-md-3">'+
                        '<label for="">Result system name</label>'+
                        '<input type="text" maxlength="255" name="resultSydtemName[]" class="form-control" id="resultSydtemName'+counter+'"  placeholder="Result system name">'+

                        '</div>'+

                        ' <div class="form-group col-md-3">'+
                        '<label for="">Result/CGPA/Score</label>'+
                        '<input name="result[]" type="text" class="form-control" id="cgpa'+counter+'"   placeholder="CGPA">'+
                        '</div>'+
                        '<div class="form-group col-md-3">'+
                        '<label for="">Scale/ Out of</label>'+
                        '<input type="text" name="resultOutOf[]" class="form-control" id="resultOutOf'+counter+'" placeholder="CGPA Out of">'+
                        '</div>'

                    );
                    newTextBoxDiv.appendTo("#TextBoxesGroup");
                    $('.date').datepicker({
                        viewMode: "years",
                        minViewMode: "years",
                        format: 'yyyy'
                    });

                    if(counter>=2){
                        $("#removeButton").show();
                        $("#submitBtn").show();
                    }

                    counter++;
                    $('.js-example-basic-single').select2();

                });

                $("#removeButton").click(function () {
                    counter--;
                    if(counter<=2){
                        $("#removeButton").hide();

                        $("#submitBtn").hide();
                    }
                    $("#TextBoxDiv" + counter).remove();
                });
            });

            function getDegree(x){
                btn = $(x).data('panel-id');
                var educationLavel=document.getElementById("educationLevel"+btn).value;
                $.ajax({
                    type:'POST',
                    url:'<?php echo e(route('cv.getDegreeForEducation')); ?>',
                    data:{id:educationLavel},
                    cache: false,
                    success:function(data) {
                        document.getElementById("degree"+btn).innerHTML = data;
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'<?php echo e(route('cv.getBoradOrUniversity')); ?>',
                    data:{id:educationLavel},
                    cache: false,
                    success:function(data) {
                        if(data==0){
                            $("#instituteNameDiv"+btn).show();
                            $("#boardDiv"+btn).show();
                            $("#universityTypeDiv"+btn).hide();
                            $("#board"+btn).val($("#board"+btn+"option:first").val());
                            $("#universityType"+btn).val($("#universityType"+btn+"option:first").val());
                            $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());
                            $("#resultSydtemNameDiv"+btn).hide();
                            $("#boardNameDiv"+btn).hide();
                            $("#degreeNameDiv"+btn).hide();
                            $("#subjectNameDiv"+btn).hide();
                            $('#majorSub'+btn).children('option:not(:first,:last)').remove();
                            $("#majorSub"+btn).val($("#majorSub"+btn+"option:first").val());
                        }else if (data == 1){
                            $("#instituteNameDiv"+btn).show();
                            $("#boardDiv"+btn).show();
                            $("#universityTypeDiv"+btn).hide();
                            $("#board"+btn).val($("#board"+btn+" option:first").val());
                            $("#universityType"+btn).val($("#universityType"+btn+" option:first").val());
                            $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());
                            $("#resultSydtemNameDiv"+btn).hide();
                            $("#boardNameDiv"+btn).hide();
                            $("#degreeNameDiv"+btn).hide();
                            $("#subjectNameDiv"+btn).hide();
                            $('#majorSub'+btn).children('option:not(:first,:last)').remove();
                            $("#majorSub"+btn).val($("#majorSub"+btn+"option:first").val());
                        }else if (data == 2){
                            $("#instituteNameDiv"+btn).show();
                            $("#boardDiv"+btn).hide();
                            $("#universityTypeDiv"+btn).show();
                            $("#board"+btn).val($("#board"+btn+" option:first").val());
                            $("#universityType"+btn).val($("#universityType"+btn+" option:first").val());
                            $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());
                            $("#resultSydtemNameDiv"+btn).hide();
                            $("#boardNameDiv"+btn).hide();
                            $("#degreeNameDiv"+btn).hide();
                            $("#subjectNameDiv"+btn).hide();
                            $('#majorSub'+btn).children('option:not(:first,:last)').remove();
                            $("#majorSub"+btn).val($("#majorSub"+btn+"option:first").val());
                        }

                    }
                });

            }
            function getMajor(x){

                btn = $(x).data('panel-id');
                var degree=document.getElementById("degree"+btn).value;


                if (degree == "<?php echo e(OTHERS); ?>"){
                    $("#degreeNameDiv"+btn).show();
                   // $("#subjectNameDiv"+btn).show();

                    $('#majorSub'+btn).children('option:not(:first,:last)').remove();
                   // $("#majorSub"+btn+" option[value='OTHERSMajor']").attr("selected", true);
                    $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());

                }else {


                    $("#degreeNameDiv"+btn).hide();
                    $("#subjectNameDiv"+btn).hide();
                    $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());


                    $.ajax({
                        type:'POST',
                        url:'<?php echo e(route('cv.getMajorForEducation')); ?>',
                        data:{id:degree},
                        cache: false,
                        success:function(data) {
                            document.getElementById("majorSub"+btn).innerHTML = data;
                        }
                    });
                }
            }

            function getBoardName(x){
                var board=document.getElementById("board"+x).value;
                if (board == "OTHERSBoard"){
                    $("#boardNameDiv"+btn).show();
                }else {
                    $("#boardNameDiv"+btn).hide();
                }
            }

            function getResultSystemName(x){
                var resultSydtem=document.getElementById("resultSydtem"+x).value;
                if (resultSydtem == "<?php echo e(OTHERS); ?>"){
                    $("#resultSydtemNameDiv"+btn).show();
                }else {
                    $("#resultSydtemNameDiv"+btn).hide();
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
                            btnClass: 'btn-green'
                        }
                    }
                });

            }
            $('.js-example-basic-single').select2();

            function checkeducationStatus(x) {

                var educationStatus =$('#educationStatus'+x).val();
                if (educationStatus == '<?php echo e(COMPLETING_STATUS['On going']); ?>'){

                    $("#cgpa"+x).prop('required',false);
                    $("#passingYear"+x).prop('required',false);

                }else {

                    $("#cgpa"+x).prop('required',true);
                    $("#passingYear"+x).prop('required',true);
                }


            }
        </script>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>