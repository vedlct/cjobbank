<?php $__env->startSection('content'); ?>
    <div class="container" >
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4>Manage Application</h4>
                </div>
                <div class="card-body">
                    <?php if($jobApplyList != null): ?>
                    <div class="table table-responsive">

                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>

                            <th>Job Title</th>
                            <th>Zone</th>
                            <th>Apply Date</th>
                            <th>Detailes</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $jobApplyList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applyList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($applyList->title); ?></td>
                            <td><?php echo e($applyList->zoneName); ?></td>
                            <td><?php echo e(date('Y-m-d',strtotime($applyList->applydate))); ?></td>
                            <td>
                                <?php if($applyList->pdflink != null): ?>
                                    <a target="_blank" href="<?php echo e(url('public/jobPdf').'/'.$applyList->pdflink); ?>">Download</a>
                                    <?php endif; ?>

                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>

                    </table>

                    </div>
                    <?php endif; ?>



                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    </div>






<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot-js'); ?>

    <script src="<?php echo e(url('public/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo e(url('public/assets/plugins/datatables/dataTables.buttons.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#manageapplication').DataTable(

                {
                    "columnDefs": [
                        {
                            "targets": [0,1,3], //first column / numbering column
                            "orderable": false, //set not orderable

                        },

                    ]
                }
            );
        } );

        <?php if($jobApplyList == null): ?>

        $.alert({
            title: 'Error',
            type: 'red',
            content: 'Your CV information is not found ,please make your CV first',
            buttons: {
                tryAgain: {
                    text: 'Ok',
                    btnClass: 'btn-green',
                    action: function () {

                    }
                }
            }
        });

        <?php endif; ?>

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>