<?php $__env->startSection('content'); ?>

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                    <form id="regForm" action="<?php echo e(route('submit.cvProfessionalCertificate')); ?>" method="post">
                        <!-- One "tab" for each step in the form: -->
                        <?php echo e(csrf_field()); ?>


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Professional Certification </h2>
                            <div class="row">
                            <div class="form-group">
                                <label class="control-label">Has Professional Certification?<span style="color: red" class="required">*</span>:</label>
                                <div class="col-md-10">
                                    <input type="radio" required <?php if ($hasProfCertificate=='1'){?>checked<?php } ?> name="hasProfCertificate" value="1"> Yes&nbsp;&nbsp;
                                    <input type="radio" required <?php if ($hasProfCertificate=='0'){?>checked<?php } ?> name="hasProfCertificate" value="0"> No&nbsp;&nbsp;
                                </div>
                            </div>
                            </div>

                            <div style="display: none" id="profCertificateDiv">
                            <div id="TextBoxesGroup">

                                <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Certificate Name<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="certificateName[]" id="certificateName" placeholder="certificate" >
                                </div>
                            </div>

                                <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="inputEmail4">Institute Name<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="institutionName[]" id="institutionName" placeholder="institution">
                                </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Result System<span style="color: red">*</span></label>
                                        <select name="resultSystem[]" class="form-control"  id="resultSydtem">
                                            <option value="">Select System</option>
                                            <?php $__currentLoopData = RESULT_SYSTEM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Result</label>
                                    <input type="text" class="form-control" name="result[]" id="result" placeholder="">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Start Date<span style="color: red">*</span></label>
                                    <input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">End Date</label>
                                    <input type="text" class="form-control date" name="endDate[]" id="end" placeholder="date">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Staus<span style="color: red">*</span></label>
                                    <select  class="form-control"id="professinalCertificateStatus" name="status[]">

                                        <option value="">Select Status</option>
                                        <?php $__currentLoopData = COMPLETING_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                            </div>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <button type="submit" id="submitBtn">Save</button>
                                <?php if($hasProfCertificate == 1 || $hasProfCertificate == 0 ): ?>
                                <a href="<?php echo e(route('candidate.cvTrainingCertificate')); ?>"><button type="button" id="nextBtn" >Next</button></a>
                                <?php endif; ?>
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
            x[(n+2)].className += " active";
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
        });

        $("input[name=hasProfCertificate]").click( function () {

            if ($(this).val()=='1'){
                $('#profCertificateDiv').show();
            }else {
                $('#profCertificateDiv').hide();
            }
        });

        $(document).ready(function(){
            if ('<?php echo $hasProfCertificate?>'== '0'){

                $('#profCertificateDiv').hide();

            }else if ('<?php echo $hasProfCertificate?>'== '1'){
                $('#profCertificateDiv').show();

            }
        });


        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter == 1 ){

                    var certificateName=$('#certificateName').val();
                    var institutionName=$('#institutionName').val();
//                    var result=$('#result').val();
                    var start=$('#start').val();
                    var end=$('#end').val();
                    var status=$('#professinalCertificateStatus').val();
                    var resultSystem=$('#resultSystem').val();


                    if(certificateName==""){

                        var errorMsg='Please Type certificateName First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if(resultSystem==""){

                        var errorMsg='Please Select resultSystem First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (certificateName.length > 100){

                        var errorMsg='certificateName Should not more than 100 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(institutionName==""){

                        var errorMsg='Please Type instituteName First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (institutionName.length > 255){

                        var errorMsg='Institute Name Should not more than 255 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
//                    if(result==""){
//
//                        var errorMsg='Please Type a Result First!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }
//                    if (result.length > 10){
//
//                        var errorMsg='Result Should not more than 10 Charecter Length!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }
                    if(start==""){

                        var errorMsg='Please Select a Strat Date First!!';
                        validationError(errorMsg);
                        return false;

                    }
//                    if(end==""){
//
//                        var errorMsg='Please Select a End Date First!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }
                    if (end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after Start Date!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    if(status==""){

                        var errorMsg='Please Select a status First!!';
                        validationError(errorMsg);
                        return false;

                    }



                }
                else {

                    var certificateName=$('#certificateName'+(counter-1)).val();
                    var institutionName=$('#institutionName'+(counter-1)).val();
//                    var result=$('#result'+(counter-1)).val();
                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();
                    var status=$('#professinalCertificateStatus'+(counter-1)).val();
                    var resultSystem=$('#resultSystem'+(counter-1)).val();


                    if(certificateName==""){

                        var errorMsg='Please Type certificateName First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (certificateName.length > 100){

                        var errorMsg='certificateName Should not more than 100 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(institutionName==""){

                        var errorMsg='Please Type instituteName First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (institutionName.length > 255){

                        var errorMsg='Institute Name Should not more than 255 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(resultSystem==""){

                        var errorMsg='Please Select resultSystem First!!'
                        validationError(errorMsg)
                        return false;
                    }

//                    if(result==""){
//
//                        var errorMsg='Please Type a Result First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
//                    if (result.length > 10){
//
//                        var errorMsg='Result Should not more than 10 Charecter Length!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if(start==""){

                        var errorMsg='Please Select a Strat Date First!!'
                        validationError(errorMsg)
                        return false;

                    }
//                    if(end==""){
//
//                        var errorMsg='Please Select a End Date First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }

                    if (end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after Start Date!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    if(status==""){

                        var errorMsg='Please Select a status First!!'
                        validationError(errorMsg)
                        return false;

                    }


                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+
                    '<div id="TextBoxesGroup">'+
                    '<div class="row">'+
                    '<div class="form-group col-md-12">'+
                    '<label for="inputEmail4">Certificate Name<span style="color: red">*</span></label>'+
                '<input type="text" class="form-control" name="certificateName[]" id="certificateName'+counter+'" placeholder="certificate" >'+
                '</div>'+
                '</div>'+
                '<div class="row">'+
                    '<div class="form-group col-md-8">'+
                    '<label for="inputEmail4">Institute Name<span style="color: red">*</span></label>'+
                '<input type="text" class="form-control" name="institutionName[]" id="institutionName'+counter+'" placeholder="institution" >'+
                '</div>'+
                    '<div class="form-group col-md-4">'+
                    '<label for="">Result System<span style="color: red">*</span></label>'+
                    '<select name="resultSystem[]" class="form-control"  id="resultSydtem'+counter+'">'+
                    '<option value="">Select System</option>'+
                <?php $__currentLoopData = RESULT_SYSTEM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                '<option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>'+
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    '</select>'+
                    '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Result</label>'+
                    '<input type="text" class="form-control" name="result[]" id="result'+counter+'" placeholder="">'+
                    '</div>'+

                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Start Date<span style="color: red">*</span></label>'+
                '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date" >'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">End Date</label>'+
                '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'"  placeholder="date">'+
                    '</div>'+

                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Staus<span style="color: red">*</span></label>'+
                    '<select  class="form-control" id="professinalCertificateStatus'+counter+'" name="status[]">'+
                    '<option value="">Select Status</option>'+
                    <?php $__currentLoopData = COMPLETING_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    '<option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>'+
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                }
                $('.date').datepicker({
                    format: 'yyyy-m-d'
                });
            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast One Course Section is needed!!");
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

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>