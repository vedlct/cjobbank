<?php $__env->startSection('content'); ?>


    <div class="row">

        <div class="col-md-2">

            <div style="background-color: white;margin-bottom: 20px;" class="card-body">

                <div class=" form-group">
                    <label>Zone</label>
                    <select class="form-control" id="zoneId">
                        <option value="">Select a Zone</option>
                        <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($zone->zoneId); ?>"><?php echo e($zone->zoneName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class=" form-group">
                    <label>Designation</label>
                    <select class="form-control" id="designationId" >
                        <option value="">Select a Designation</option>
                        <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($designation->designationId); ?>"><?php echo e($designation->designationName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                <hr>


            </div>
        </div>

        <div class="col-md-10">
            <div class="card m-b-30">
                <div class="card-header">
                <h4 class="pull-left">Manage User</h4>
                <a href="<?php echo e(route('admin.manageUser.add')); ?>"><button class="btn btn-success pull-right">Add New</button></a>
                </div>
                <div class="card-body">

                    <div class="table table-responsive">
                    <table id="managecv" class="table table-striped table-bordered " style="width:100%" >
                        <thead>
                        <tr>
                            
                            <th>Given name</th>
                            <th>Surname</th>
                            <th>Designation</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Zone</th>
                            <th>Status</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        </tbody>

                    </table>
                    </div>
                    <br>
                    <br>

                    
                    
                    <br><br>

                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot-js'); ?>

    <script src="<?php echo e(url('public/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    <script src="<?php echo e(url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            table = $('#managecv').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ordering": false,
                "ajax":{
                    "url": "<?php echo route('admin.getmanageUserData'); ?>",
                    "type": "POST",
                    data:function (d){
                        d._token="<?php echo e(csrf_token()); ?>";
                        d.zoneId=$('#zoneId').val();
                        d.designationId=$('#designationId').val();

                    },
                },
                columns: [


//                    { "data": function(data){
//                        return "<input type='checkbox'>";
//                        },
//                        "orderable": false, "searchable":false
//                    },

                    { data: 'firstName', name: 'firstName', "orderable": false, "searchable":true },
                    { data: 'lastName', name: 'lastName', "orderable": false, "searchable":true },
                    { data: 'designationName', name: 'designationName', "orderable": false, "searchable":true },

//                    { data: 'gender', name: 'gender', "orderable": false, "searchable":true },
                    { "data": function(data){


                        if( data.gender == "M"){
                            return "Male"
                        }else if (data.gender == "F") {
                            return "Female"
                        }

                        //return btn;
                    },
                        "orderable": false, "searchable":true
                    },

                    { data: 'email', name: 'email', "orderable": false, "searchable":true },
                    { data: 'zoneName', name: 'zoneName', "orderable": false, "searchable":true },
                    { "data": function(data){
                        if(data.status==1){
                            return "<select class='form-control' data-panel-id='"+data.hrId+"' onchange='deleteUser(this)'>" +
                                "<option value='1' selected>active</option>" +
                                "<option value='0'>deactive</option>" +
                                "</select>";
                        }
                        else if(data.status==0){
                            return "<select class='form-control' data-panel-id='"+data.hrId+"' onchange='deleteUser(this)'>" +
                                "<option value='1' >active</option>" +
                                "<option value='0' selected>deactive</option>" +
                                "</select>";
                        }

                       },
                        "orderable": false, "searchable":false
                    },

                    { "data": function(data){


                        if (data.cvStatus == 1){

                            var btn="<button class='btn btn-success btn-sm' data-panel-id='"+data.hrId+"' onclick='editUser(this)'>Edit</button>&nbsp;"+
                                '<button class="btn btn-smbtn-info" onclick="getEmpCv('+data.employeeId+')" ><i class="fa fa-file-pdf-o"></i></button>';
                        }else {
                            var btn="<button class='btn btn-success btn-sm' data-panel-id='"+data.hrId+"' onclick='editUser(this)'>Edit</button>"

                        }

                        return btn;
                        },
                        "orderable": false, "searchable":false
                    },


                ],

            });

        } );

        $('#zoneId').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
            emptySelect();
            if ($('#zoneId').val()!=""){

                $('#zoneId').css("background-color", "#7c9").css('color', 'white');
            }else {
                $('#zoneId').css("background-color", "#FFF").css('color', 'black');
            }
        });
        $('#designationId').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
            emptySelect();
            if ($('#designationId').val()!=""){

                $('#designationId').css("background-color", "#7c9").css('color', 'white');
            }else {
                $('#designationId').css("background-color", "#FFF").css('color', 'black');
            }
        });

//        function refreshTable() {
//            table.ajax.reload();
//        }
        function editUser(x) {
            var id=$(x).data('panel-id');
            var url = "<?php echo e(route('admin.editmanageUserData', ':id')); ?>";
            url = url.replace(':id', id);
            document.location.href=url;
        }
        function deleteUser(x) {

            var id=$(x).data('panel-id');

            $.ajax({
            type: 'POST',
            url: "<?php echo route('admin.changeUserStatus'); ?>",
            cache: false,
            data: {_token: "<?php echo e(csrf_token()); ?>",'id': id},
            success: function (data) {



                $.alert({
                    title: 'Success',
                    type: 'green',
                    content: 'User Status Changed Successfully',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-green',
                            action: function () {

                                table.ajax.reload();
                                emptySelect();

                            }
                        }
                    }
                });


            }
            });
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function getEmpCv(id) {

            var url = "<?php echo e(route('userCv.get', ':empId')); ?>";
            url = url.replace(':empId', id);
            window.open(url,'_blank');
        }
        function emptySelect(){

            selecteds=[];
            $(':checkbox:checked').prop('checked',false);

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

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>