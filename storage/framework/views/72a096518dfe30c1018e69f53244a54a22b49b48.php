<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                <h4 class="pull-left">Terms And Conditions</h4>
                
                </div>
                <div class="card-body">


                    <form method="post" action="<?php echo e(route('admin.termsAndCondition.update')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" maxlength="500" class="form-control" value="<?php if($terms): ?><?php echo e($terms->page_Header); ?><?php endif; ?>" placeholder="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Content &nbsp;</label>
                            <textarea class="form-control ckeditor" name="contents" rows="6"><?php if(($terms)): ?><?php echo e($terms->page_content); ?><?php endif; ?></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>






                </div>

            </div>
        </div>
        <!-- end col -->
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot-js'); ?>

    <script type="text/javascript" src="<?php echo e(url('public/assets/ckeditor/ckeditor.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>