<?php $__env->startSection('content'); ?>
<style>
    @media  only screen and (max-width: 1299px) {
        #button {
            margin-top: 10%;
        }
        .left{
            margin-left: 7%;
        }
    }
    @media  only screen and (min-width: 1201px) and (max-width: 1299px) {
        .left1{
            margin-left: 4%;
        }
    }

    @media  only screen and (min-width: 1300px) and (max-width: 1679px) {
        .top{
            margin-top: -8%;
        }
    }
    @media  only screen and (min-width: 1300px) and (max-width: 1371px) {
        .top1{
            margin-top:4%;
        }
        .left3{
            margin-left: 5%;
        }
    }
    @media  only screen and (min-width: 1371px) and (max-width: 1679px) {
        .bottom{
            margin-top:-4%;
        }
        .left2{
            margin-left: 4%;
        }
    }

</style>

    <div class="row">

        <div class="col-md-2">

            <div style="background-color: white;margin-bottom: 20px;" class="card-body">


                <div class=" form-group ">
                    <label>Age From</label>&nbsp;<span style="color: red">(Year)</span>
                    <input class="form-control" id="ageFromFilter" name="ageFromFilter"
                           onkeypress="return isNumberKey(event)" type="text">
                </div>
                <div class=" form-group ">
                    <label>Age to</label>&nbsp;<span style="color: red">(Year)</span>
                    <input class="form-control" id="ageToFilter" name="ageToFilter"
                           onkeypress="return isNumberKey(event)" type="text">
                </div>
                <div class=" form-group ">
                    <label>Gender</label>
                    <select name="genderFilter" id="genderFilter" class="form-control">
                        <option value="">Select a Gender</option>
                        <?php $__currentLoopData = GENDER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>

                <div class=" form-group ">
                    <label>Marital Status</label>
                    <select name="maritalStatusFilter" id="maritalStatusFilter" class="form-control">
                        <option value="">Select marital status</option>
                        <?php $__currentLoopData = MARITAL_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>


                <div class=" form-group">
                    <label>Religion</label>
                    <select name="religionFilter" id="religionFilter" class="form-control">
                        <option value="">Select a Religion</option>
                        <?php $__currentLoopData = $religion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($reli->religionId); ?>"><?php echo e($reli->religionName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                <div class=" form-group">
                    <label>Ethnicity</label>
                    <select name="ethnicityFilter" id="ethnicityFilter" class="form-control">
                        <option value="">Select a Ethnicity</option>
                        <?php $__currentLoopData = $ethnicity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ethi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($ethi->ethnicityId); ?>"><?php echo e($ethi->ethnicityName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>

                <div class=" form-group ">
                    <label>Cv status</label>
                    <select name="cvStatusFilter" id="cvStatusFilter" class="form-control">
                        <option value="">Select Status</option>

                        <option value="complete">Completed cv</option>
                        <option value="incomplete">Incompleted cv</option>


                    </select>
                </div>

                <hr>


            </div>
        </div>

        <div class="col-md-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Manage CV</h4>
                </div>
                <div class="card-body">


                    <div class="table table-responsive">
                        <table id="managecv" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>

                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th width="8%">Age(Year.Month)</th>
                                <th>Gender</th>
                                <th>Email</th>

                                <th width="10%">Action</th>
                            </tr>
                            </thead>


                        </table>
                    </div>


                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->





<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot-js'); ?>

    <script src="<?php echo e(url('public/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script type="text/javascript">
        var gend = [];

        $('.date').datepicker({
            format: 'yyyy-m-d',
            todayHighlight: true,
            autoclose: true
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {


            table = $('#managecv').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ordering": false,
                "ajax": {
                    "url": "<?php echo route('cv.admin.manageApplicationData'); ?>",
                    "type": "POST",
                    data: function (d) {

                        d._token = "<?php echo e(csrf_token()); ?>";

                        if ($('#maritalStatusFilter').val()!=""){
                            d.maritalStatusFilter=$('#maritalStatusFilter').val();
                        }
                        if ($('#genderFilter').val() != "") {
                            d.genderFilter = $('#genderFilter').val();
                        }
                        if ($('#religionFilter').val() != "") {
                            d.religionFilter = $('#religionFilter').val();
                        }
                        if ($('#ethnicityFilter').val() != "") {
                            d.ethnicityFilter = $('#ethnicityFilter').val();
                        }
                        if ($('#ageFromFilter').val() != "") {
                            d.ageFromFilter = $('#ageFromFilter').val();
                        }
                        if ($('#ageToFilter').val() != "") {
                            d.ageToFilter = $('#ageToFilter').val();
                        }
                        if ($('#cvStatusFilter').val() != "") {
                            d.cvStatusFilter = $('#cvStatusFilter').val();
                        }


                    },
                },
                columns: [

                    {
                        "name": "image",
                        "data": "image",
                        "render": function (data, type, full, meta) {
                            if (data != '') {
                                return "<img src=\"<?php echo e(url('public/candidateImages/thumb')); ?>" + "/" + data + "\" height=\"50\"/>";
                            } else {
                                return "<img src=\"<?php echo e(url('public/candidateImages/thumb/1cvImage.jpg')); ?>" + "\" height=\"50\"/>";
                            }

                        },
                        "title": "Image",
                        "orderable": false,
                        "searchable": false,
                    },

//                    { data: 'name', name: 'name',"orderable": false, "searchable":true },


                    {data: 'firstName', name: 'firstName', "orderable": false, "searchable": true},
                    {data: 'lastName', name: 'lastName', "orderable": false, "searchable": true},

                    {
                        "data": function (data) {

                            if (data.age1 > 0) {

                                return data.age1 + "." + parseInt((data.age2) / (12 * data.age1));

                            } else {
                                return data.age1 + "." + parseInt((data.age2));
                            }
                        },
                        "orderable": true, "searchable": true,
                    },


//                    { data: 'age1', name: 'age', "orderable": false, "searchable":true },
//                    { data: 'gender', name: 'gender', "orderable": false, "searchable":true },

                    {
                        "data": function (data) {

                            if (data.gender != null) {
                                if (data.gender == "M") {
                                    return "Male"
                                } else if (data.gender == "F") {
                                    return "Female"
                                } else if (data.gender == "T") {
                                    return "Transgender"
                                }

                            } else {
                                return '';
                            }


                        },
                        "orderable": true, "searchable": true,
                    },

                    {data: 'email', name: 'email', "orderable": false, "searchable": true},

                    {
                        "data": function (data) {
                            return '<div class="btn-group" role="group" aria-label="Action">\n' +
                                '  <button type="button" class="btn btn-sm btn-primary" onclick="viewEmpCv(' + data.employeeId + ')"><i class="fa fa-eye" title="View"></i></button>\n' +
                                '  <button type="button" class="btn btn-sm btn-info" onclick="getEmpCv(' + data.employeeId + ')"><i class="fa fa-file-pdf-o" title="Pdf"></i></button>\n' +
                                '  <button type="button" class="btn btn-sm btn-danger" onclick="EmpCvDelete(' + data.employeeId + ')" title="Remove"><i class="fa fa-trash-o"></i></button>\n' +
                                '</div>';
                        },
                        "orderable": false, "searchable": false
                    },


                ],

            });

        });
        var selecteds = [];

        function selected_rows(x) {

            btn = $(x).data('panel-id');
            var index = selecteds.indexOf(btn.toString());

            if (index == "-1") {
                selecteds.push(btn.toString());
            } else {

                selecteds.splice(index, 1);
            }


        }

        $("#selectall2").click(function () {

            if ($('#selectall2').is(":checked")) {
                selecteds = [];
                //$('#selectall1').prop('checked',true);
                checkboxes = document.getElementsByName('selected_rows[]');
                for (var i in checkboxes) {
                    checkboxes[i].checked = 'TRUE';
                }

                /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
                $(".chk:checked").each(function () {
                    selecteds.push($(this).val());
                });


            } else {
                selecteds = [];
                $(':checkbox:checked').prop('checked', false);

            }

        });



        function exportSelectedCv() {

            if (selecteds.length > 0) {
                for (var i = 0; i < selecteds.length; i++) {
//                    console.log(selecteds[i]);

                    $.ajax({
                        type: 'GET',
                        url: "<?php echo route('userCv.post'); ?>",
                        cache: false,
                        data: {'id': selecteds[i]},
                        success: function (data) {

                            // console.log(data);

                        }
                    });

                }
                
                
                
                
                
                

                

                
                
            } else {

                $.alert({
                    title: 'Alert',
                    type: 'red',
                    content: 'Please Select First',
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


        }

        //        $('#genderFilter').change(function(){ //button filter event click
        ////                table.search("").draw(); //just redraw myTableFilter
        //            table.ajax.reload();  //just reload table
        //        });
        //        $('#religionFilter').change(function(){ //button filter event click
        ////                table.search("").draw(); //just redraw myTableFilter
        //            table.ajax.reload();  //just reload table
        //
        //        });
        //        $('#ethnicityFilter').change(function(){ //button filter event click
        ////                table.search("").draw(); //just redraw myTableFilter
        //            table.ajax.reload();  //just reload table
        //        });

        //        $("#ageFromFilter").keyup(function(){
        //            // table.search("").draw(); //just redraw myTableFilter
        //            table.ajax.reload();  //just reload table
        //        });
        //        $("#ageToFilter").keyup(function(){
        //            // table.search("").draw(); //just redraw myTableFilter
        //            table.ajax.reload();  //just reload table
        //        });

        $("#ageFromFilter").keyup(function () {
            // table.search("").draw(); //just redraw myTableFilter
            emptySelect();

            if ($('#ageFromFilter').val() != "") {


                if ($('#ageToFilter').val() != "") {

                    if (Date.parse($('#ageToFilter').val()) < Date.parse($('#ageFromFilter').val())) {

                        var errorMsg = 'Age From should not after Age To!!';
                        validationError(errorMsg);
                        $('#ageFromFilter').val("");
                        $('#ageFromFilter').css("background-color", "#FFF").css('color', 'black');

                    } else {
                        $('#ageFromFilter').css("background-color", "#7c9").css('color', 'white');
                        table.ajax.reload();
                    }


                } else {
                    $('#ageFromFilter').css("background-color", "#7c9").css('color', 'white');
                    table.ajax.reload();


                }
            } else {
                table.ajax.reload();  //just reload table
                $('#ageFromFilter').css("background-color", "#FFF").css('color', 'black');
            }


        });
        $("#ageToFilter").keyup(function () {
            // table.search("").draw(); //just redraw myTableFilter
            // table.ajax.reload();  //just reload table
            emptySelect();

            if ($('#ageToFilter').val() != "") {

                if ($('#ageFromFilter').val() != "") {

                    if (Date.parse($('#ageToFilter').val()) < Date.parse($('#ageFromFilter').val())) {

                        var errorMsg = 'Age To should not less than Age From!!';
                        validationError(errorMsg);
                        $('#ageToFilter').val("");
                        $('#ageToFilter').css("background-color", "#FFF").css('color', 'black');

                    } else {
                        $('#ageToFilter').css("background-color", "#7c9").css('color', 'white');
                        table.ajax.reload();

                    }


                } else {
                    // $("#age").css('background-color', 'green');
                    $('#ageToFilter').css("background-color", "#7c9").css('color', 'white');
                    table.ajax.reload();

                }
            } else {
                table.ajax.reload();  //just reload table
                $('#ageToFilter').css("background-color", "#FFF").css('color', 'black');
            }

        });

        // maritial status
        $('#maritalStatusFilter').change(function(){
            table.ajax.reload();
            emptySelect();
            if ($('#maritalStatusFilter').val()!=""){

                $('#maritalStatusFilter').css("background-color", "#7c9").css('color', 'white');
            }else {
                $('#maritalStatusFilter').css("background-color", "#FFF").css('color', 'black');
            }
        });

        $('#genderFilter').change(function () { //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
            emptySelect();

            if ($('#genderFilter').val() != "") {

                $('#genderFilter').css("background-color", "#7c9").css('color', 'white');
            } else {
                $('#genderFilter').css("background-color", "#FFF").css('color', 'black');
            }

        });
        $('#cvStatusFilter').change(function () { //button filter event click

//                table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
            emptySelect();

            if ($('#cvStatusFilter').val() != "") {

                $('#cvStatusFilter').css("background-color", "#7c9").css('color', 'white');
            } else {
                $('#cvStatusFilter').css("background-color", "#FFF").css('color', 'black');
            }

        });
        $('#religionFilter').change(function () { //button filter event click
//                table.search("").draw(); //just redraw myTableFilter

            table.ajax.reload();  //just reload table

            emptySelect();

            if ($('#religionFilter').val() != "") {

                $('#religionFilter').css("background-color", "#7c9").css('color', 'white');
            } else {
                $('#religionFilter').css("background-color", "#FFF").css('color', 'black');
            }


        });
        $('#ethnicityFilter').change(function () { //button filter event click
//                table.search("").draw(); //just redraw myTableFilter

            table.ajax.reload();  //just reload table
            emptySelect();
            if ($('#ethnicityFilter').val() != "") {

                $('#ethnicityFilter').css("background-color", "#7c9").css('color', 'white');
            } else {
                $('#ethnicityFilter').css("background-color", "#FFF").css('color', 'black');
            }
        });

        $("#ageFromFilter").keyup(function () {
            // table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
            emptySelect();
        });
        $("#ageToFilter").keyup(function () {
            // table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
            emptySelect();

            if ($('#ethnicityFilter').val() != "") {

                $('#ethnicityFilter').css("background-color", "#7c9").css('color', 'white');
            } else {
                $('#ethnicityFilter').css("background-color", "#FFF").css('color', 'black');
            }


        });

        function getEmpCv(id){
            var url = "<?php echo e(route('userCv.get', ':empId')); ?>";
            url = url.replace(':empId', id);
            window.open(url, '_blank');
        }

        function viewEmpCv(id) {
            var url = "<?php echo e(route('userCv.view', ':empId')); ?>";
            url = url.replace(':empId', id);
            window.open(url, '_blank');
        }

        function EmpCvDelete(id) {

            $.alert({
                title: 'Error',
                content: 'Are you sure to delete this applicants cv?',
                type: 'red',
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-green',
                        action: function () {
                            $.ajax({
                                type: 'post',
                                url: "<?php echo route('userCv.delete'); ?>",
                                cache: false,
                                data: {'id': id, _token: "<?php echo e(csrf_token()); ?>"},
                                success: function (data) {
                                    if (data != 0) {
                                        $.confirm({
                                            title: 'Confirm!',
                                            content: 'This user allready applied for ' + data + ' job',
                                            buttons: {
                                                confirm: function () {
                                                    $.ajax({
                                                        type: 'post',
                                                        url: "<?php echo route('userCv.confirm.delete'); ?>",
                                                        cache: false,
                                                        data: {'id': id, _token: "<?php echo e(csrf_token()); ?>"},
                                                        success: function (data) {
                                                            $.alert({
                                                                title: 'Success',
                                                                type: 'green',
                                                                content: 'This user deleted successfully',
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
                                                        }
                                                    });
                                                }
                                            }
                                        });

                                    } else {

                                        $.alert({
                                            title: 'Success',
                                            type: 'green',
                                            content: 'This user deleted successfully',
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
                                    }
                                }
                            });
                        }
                    },
                    close: {
                        text: 'close',
                        btnClass: 'btn-red',
                    }
                }
            });
        }


        function emptySelect() {

            selecteds = [];
            $(':checkbox:checked').prop('checked', false);

        }


        function validationError(errorMsg) {

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

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>