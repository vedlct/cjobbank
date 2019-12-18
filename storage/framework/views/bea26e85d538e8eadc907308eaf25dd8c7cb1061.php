<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4>Job Info Edit</h4>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $jobInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <form method="POST" action="<?php echo e(route('job.admin.update')); ?>" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" required id="jobId" name="jobId" value="<?php echo e($info->jobId); ?>">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Title<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" name="title" id="title" value="<?php echo e($info->title); ?>" placeholder="job Title" required>
                            <?php if($errors->has('title')): ?>

                                <span class="">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Position<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?php echo e($errors->has('position') ? ' is-invalid' : ''); ?>" id="position" name="position" value="<?php echo e($info->position); ?>" placeholder="position" required>
                            <?php if($errors->has('position')): ?>

                                <span class="">
                                        <strong><?php echo e($errors->first('position')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Salary<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?php echo e($errors->has('salary') ? ' is-invalid' : ''); ?>" name="salary" id="salary" value="<?php echo e($info->salary); ?>" placeholder="salary" required>
                            <?php if($errors->has('salary')): ?>

                                <span class="">
                                        <strong><?php echo e($errors->first('salary')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jobStatus">job Status<span style="color: red">*</span></label>
                            <select class="form-control <?php echo e($errors->has('jobStatus') ? ' is-invalid' : ''); ?>" id="jobStatus" name="jobStatus" required >
                                <option value="">select Job Status</option>
                                <option <?php if($info->jobstatus =='1'): ?> selected <?php endif; ?> value="1">Part Time</option>
                                <option <?php if($info->jobstatus =='2'): ?> selected <?php endif; ?> value="2">Full Time</option>
                                <option <?php if($info->jobstatus =='3'): ?> selected <?php endif; ?> value="3">Other</option>

                            </select>

                            <?php if($errors->has('jobStatus')): ?>

                                <span class="">
                                        <strong><?php echo e($errors->first('jobStatus')); ?></strong>
                                    </span>
                            <?php endif; ?>

                        </div>
                    </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Deadline<span style="color: red">*</span></label>
                            <input type="text" class="form-control date <?php echo e($errors->has('deadline') ? ' is-invalid' : ''); ?>" name="deadline" id="deadline" value="<?php echo e($info->deadline); ?>" required>
                            <?php if($errors->has('deadline')): ?>

                                <span class="">
                                        <strong><?php echo e($errors->first('deadline')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jobStatus">Status<span style="color: red">*</span></label>
                            <select required class="form-control" id="activestatus" name="status" >
                                <option value="">select Status</option>

                                <?php $__currentLoopData = JOB_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($info->status == $value ): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </select>

                        </div>
                    </div>
                      <div class="row">

                        <div class="form-group col-md-6">
                            <label for="jobStatus">Zone<span style="color: red">*</span></label>
                            <select class="form-control" id="zone" name="zone" required>
                                <option value="">select zone</option>
                                <?php $__currentLoopData = $allZone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($zone->zoneId == $info->fkzoneId ): ?> selected <?php endif; ?> value="<?php echo e($zone->zoneId); ?>"><?php echo e($zone->zoneName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                        </div>
                          <div class="form-group col-md-6">
                              <label for="">pdf</label>
                              <input type="file" name="jobPdf" accept="application/pdf">
                              <?php if(!empty($info->pdflink)): ?>
                              <a target="_blank" href="<?php echo e($info->pdflink); ?>"></a>
                               <?php endif; ?>
                          </div>

                    </div>
                      <div class="row">

                        <div class="form-group col-md-12">
                            <label for="jobStatus">Details</label>
                            <textarea class="form-control" rows="5" id="jobDetails" name="jobDetails"><?php echo e($info->details); ?></textarea>

                        </div>


                    </div>
                      <div class="form-group">

                        <button type="submit" class="btn btn-success"> Submit</button>


                    </div>

                  </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->






<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot-js'); ?>

<script>
    $(function () {
        $('.date').datepicker({
            format: 'yyyy-m-d',
            todayHighlight: true,
            startDate: new Date(),
            autoclose: true,
        });

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>