<div class="modal" id="jobModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="jobModalTitle"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="jobModalBody">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                
            </div>

        </div>
    </div>
</div>

<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-10">
                <div class="card-body">

                    <div  class="media">
                        <div class="media-body">
                            <h4 style="margin-bottom: 5px;" class="mt-0 font-20 mb-1"><?php echo e($job->title); ?></h4>
                            <p class="text-muted font-14"><?php echo e($job->details); ?> </p>
                            <p class="font-14" ><b>Deadline: <span style="color: red"><?php echo e($job->deadline); ?></span></b></p>
                            <?php if($job->pdflink != null ): ?>
                            <p class=""> <a class="btn btn-info btn-sm" target="_blank" href="<?php echo e(url('public/jobPdf').'/'.$job->pdflink); ?>"><b>Details</b></a> </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div style="float: right; position: absolute; bottom: 10%; right: 1%;" class="applynow">

                        <?php
                            $flag= "False"
                        ?>
                        <?php if(isset($applyjob) && $applyjob != null): ?>
                        <?php $__currentLoopData = $applyjob; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($job->jobId ==  $aj->fkjobId): ?>

                                <h5><span class="badge badge-success">Applied</span></h5>

                            <?php
                            $flag= "True"
                            ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php if($flag == "True"): ?>
                        <?php else: ?>
                            <?php if(isset($cvStatus) && $cvStatus == null): ?>
                                 <label style="color: red">Please complete your cv to apply job</label>
                             <?php else: ?>
                        
                                <button type="button" class="btn btn-info btn-lg" data-job-title="<?php echo e($job->title); ?>" data-panel-id="<?php echo e($job->jobId); ?>" onclick="applyJob(this)" id="apply-button">Apply Now</button>
                            <?php endif; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<ul class="pagination">
    <li class="page-item <?php if($jobs->currentPage()== 1): ?> disabled <?php endif; ?>"> <a data-id="<?php echo e($jobs->previousPageUrl()); ?>" href="javascript:void(0)" class="page-link pagiNextPrevBtn"><i class="ion-ios-arrow-left"></i>Prev</a></li>

    <?php for($i=$jobs->perPage(); $i <= $jobs->total();$i=($i+$jobs->perPage())): ?>
        <li  <?php if($jobs->currentPage() == $i): ?> class="page-item active " <?php else: ?> class="page-item" <?php endif; ?>> <a class="page-link pagiNextPrevBtn" data-id="<?php echo e($jobs->url($i)); ?>" href="javascript:void(0)"><?php echo e($i); ?></a></li>
    <?php endfor; ?>

        <li  class="page-item <?php if($jobs->lastPage()==$jobs->currentPage()): ?> disabled <?php endif; ?>"><a data-id="<?php echo e($jobs->nextPageUrl()); ?>" href="javascript:void(0)"  class="page-link pagiNextPrevBtn">Next<i class="ion-ios-arrow-right"></i></a></li>

</ul>

<script>
    $(".pagiNextPrevBtn").on("click",function() {
        var page=$(this).data('id').split('page=')[1];
        getData(page);
    });

    function applyJob(x) {
        var id=$(x).data('panel-id');
        var title=$(x).data('job-title');
        $.ajax({
            type: 'POST',
            url: "<?php echo route('job.applyJobModal'); ?>",
            cache: false,
            data: {_token: "<?php echo e(csrf_token()); ?>", jobId: id, jobTitle: title},
            success: function (data) {
                $('#jobModalTitle').html(title);
                $('#jobModalBody').html(data);
                $('#jobModal').modal();
            }
        });
    }
</script>
