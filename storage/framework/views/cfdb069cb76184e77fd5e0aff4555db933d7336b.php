<?php $__env->startSection('mail_content'); ?>
    <div class="col-md-9" id="regForm" >
        <div class="tab">

            <h2 style="margin-bottom: 40px; text-align: center;">Change Interview template </h2>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <div style="margin: 0px 30px 0px 30px;">

                                <form method="post" action="<?php echo e(route('changeemailtemplate.updateemailtemplate')); ?>">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group">
                                        <?php if(($email_data)): ?>
                                            <input type="hidden" name="contant_id" value="<?php echo e($email_data->email_id); ?>">
                                        <?php endif; ?>

                                        <input type="hidden" name="contant_type" value="<?php if(($email_data)): ?><?php echo e($email_data->emailfor); ?><?php else: ?> interview <?php endif; ?>">

                                        <textarea class="form-control ckeditor" name="contents" rows="6"><?php if(($email_data)): ?><?php echo e($email_data->emailbody); ?><?php endif; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>
                <!-- end col -->
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('emailTemplte.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>