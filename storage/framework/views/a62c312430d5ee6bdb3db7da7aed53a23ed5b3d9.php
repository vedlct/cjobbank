<?php $__env->startSection('content'); ?>


    <div class="row">

        <div class="col-2">

            <div style="background-color: white;margin-bottom: 20px;" class="card-body">

                <div class=" form-group">
                    <label>Zone</label>
                    <select class="form-control">
                        <option>Select a Zone</option>
                        <option>Dhaka</option>
                        <option>Khulna</option>
                        <option>Barishal</option>
                        <option>Rangpur</option>

                    </select>
                </div>
                <div class=" form-group">
                    <label>Post Date</label>
                    <input class="form-control" type="date">
                </div>
                <div class=" form-group">
                    <label>Deadline</label>
                    <input class="form-control" type="date">
                </div>
                <div class=" form-group">
                    <label>Job Status</label>
                    <select class="form-control">
                        <option>Select a Status</option>
                        <option>Posted</option>
                        <option>De-activate</option>

                    </select>
                </div>
                <hr>


            </div>
        </div>

        <div class="col-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Manage All Job</h4>
                    <a href="<?php echo e(route('job.admin.create')); ?>"><button class="btn btn-success pull-right">Post Job</button></a>
                </div>
                <div class="card-body">


                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Position</th>
                            <th>Deadline</th>
                            <th>Zone</th>
                            <th>Create by</th>
                            <th>Create date</th>
                            <th>update by</th>
                            <th>update date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $allJobList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><?php echo e($jobList->jobTitle); ?></td>
                                <td><?php echo e($jobList->jobPosition); ?></td>
                                <td><?php echo e($jobList->deadline); ?></td>
                                <td><?php echo e($jobList->zoneName); ?></td>
                                <td><?php echo e($jobList->createBy); ?></td>
                                <td><?php echo e(date('Y-m-d',strtotime($jobList->createDate))); ?></td>
                                <td><?php echo e($jobList->updateBy); ?></td>
                                <td><?php echo e(date('Y-m-d',strtotime($jobList->updateTime))); ?></td>
                                <td>
                                    <select class="form-control" data-panel-id="<?php echo e($jobList->jobId); ?>" onchange="changeJobStatus(this)" id="jobStatus<?php echo e($jobList->jobId); ?>" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if($jobList->status =='1'): ?> selected <?php endif; ?> value="1">Posted</option>
                                        <option <?php if($jobList->status =='2'): ?> selected <?php endif; ?> value="2">De-activate</option>

                                    </select>

                                </td>

                                <td><a href="<?php echo e(route('job.admin.edit',$jobList->jobId)); ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>&nbsp;
                                    <a data-panel-id="<?php echo e($jobList->jobId); ?>" onclick="deleteJob(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>&nbsp;
                                    <?php if(!empty($jobList->pdflink)): ?>
                                    <a target="_blank" href="<?php echo e($jobList->pdflink); ?>" class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i></a>&nbsp;
                                    <?php endif; ?>
                                </td>




                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>

                    </table>



                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->






<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot-js'); ?>

    <script src="<?php echo e(url('public/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    
    
    
    <script src="<?php echo e(url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            table=$('#manageapplication').DataTable(
                {

                    "columnDefs": [
                        {
                            "targets": [0,1,3,4,6,8,9], //first column / numbering column
                            "orderable": false, //set not orderable

                        },

                    ],

                }
            );
        } );

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function changeJobStatus(x) {

            btn = $(x).data('panel-id');
            var job = document.getElementById('jobStatus'+btn).value;

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure To change this Job Status?',
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
                                url: '<?php echo e(route('job.admin.changeJobStatus')); ?>',
                                data: {'id':btn,'status':job,'_token':"<?php echo e(csrf_token()); ?>"},
                                success: function (data) {

                                    $.alert({
                                        title: 'Success!',
                                        type: 'green',
                                        content: 'job Status change successfully',
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

                        location.reload();

                    },
                }
            });

        }

        function deleteJob(x) {

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure To Delete this Job?',
                icon: 'fa fa-warning',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-red',
                        action: function(){

                            btn = $(x).data('panel-id');

                            $.ajax({
                                type: "POST",
                                url: '<?php echo e(route('job.admin.delete')); ?>',
                                data: {'id':btn,'_token':"<?php echo e(csrf_token()); ?>"},
                                success: function (data) {

                                    $.alert({
                                        title: 'Success!',
                                        type: 'green',
                                        content: 'job Deleted successfully',
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

                        location.reload();


                    },
                }
            });


        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>