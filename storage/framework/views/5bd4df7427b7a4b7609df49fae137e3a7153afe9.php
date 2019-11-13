<?php $__env->startSection('content'); ?>

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">
                    <div id="regForm">



                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Relative in CB </h2>
                            <?php ($tempHr=0); ?>

                            <?php $__currentLoopData = $relativeInCaritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($tempHr>0): ?>
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                <?php endif; ?>
                                <div id="edit<?php echo e($relative->relativeId); ?>">
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">First Name: </label>
                                            <?php echo e($relative->firstName); ?>

                                            
                                        </div>



                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">Last Name: </label>
                                            <?php echo e($relative->lastName); ?>

                                            
                                        </div>
                                        <div class="form-group col-md-2 ">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo(<?php echo e($relative->relativeId); ?>)"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm " onclick="deleteRelative(<?php echo e($relative->relativeId); ?>)"><i class="fa fa-trash"></i></button>

                                        </div>



                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Degisnation: </label>
                                            <?php echo e($relative->degisnation); ?>

                                            
                                        </div>


                                    </div>
                                </div>
                                <?php ($tempHr++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <form  action="<?php echo e(route('submit.relative')); ?>" method="post">
                                <!-- One "tab" for each step in the form: -->
                                <?php echo e(csrf_field()); ?>


                                <div id="TextBoxesGroup">

                                </div>



                                

                                <button type="button" id="addButton" class="btn btn-success">Add More</button>
                                <button type="button" id="removeButton" class="btn btn-success" >remove</button>



                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <a href="<?php echo e(route('refree.index')); ?>"><button type="button" id="btnPevious" >Back</button></a>
                                        <button type="submit" id="submitBtn">Save</button>
                                        
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
                url: "<?php echo route('relative.edit'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'relativeId': x},
                success: function (data) {
//                    $("#btnPevious").hide();
                    $('#edit'+x).html(data);

                }
            });
        }
        function deleteRelative(x) {
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo route('relative.delete'); ?>",
                            cache: false,
                            data: {_token: "<?php echo e(csrf_token()); ?>",'relativeId': x},
                            success: function (data) {
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
        });

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();


            $("#addButton").click(function () {
//                $("#btnPevious").hide();
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter >1 ){

                    var firstName=$('#firstName'+(counter-1)).val();
                    var lastName=$('#lastName'+(counter-1)).val();
                    var degisnation=$('#degisnation'+(counter-1)).val();

                    var chk=/^[0-9]*$/;
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



                    if(firstName==""){

                        var errorMsg='Please Type First Name First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (firstName.length > 45){

                        var errorMsg='First Name Should not more than 45 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(lastName==""){

                        var errorMsg='Please Type Last Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (lastName.length > 45){

                        var errorMsg='Last Name Should not more than 45 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(degisnation==""){

                        var errorMsg='Please Type Present Position First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Present Position Should not more than 100 Charecter Length!!';
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
                        '<label for="inputEmail4">First Name<span style="color: red">*</span></label> ' +
                        '<input type="text" class="form-control" name="firstName[]" id="firstName'+counter+'" placeholder="first name" required> ' +
                        '</div> ' +
                        '<div class="form-group col-md-6"> ' +
                        '<label for="inputEmail4">Last Name<span style="color: red">*</span></label> ' +
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
                    $("#removeButton").show();
                    $("#submitBtn").show();
                }

            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast One Course Section is needed!!");
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

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>