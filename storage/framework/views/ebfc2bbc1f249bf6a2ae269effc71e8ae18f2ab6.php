<form method="post" action="<?php echo e(route('manage.degisnation.update',['id'=>$editDesignation->designationId])); ?>">
    <?php echo e(csrf_field()); ?>


    <div class="form-group">
        <label for="">Designation</label>
        <input type="text" maxlength="50" class="form-control" value="<?php echo e($editDesignation->designationName); ?>" placeholder="designation" name="designationName" required>
    </div>
    
        
        
    

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            <?php $__currentLoopData = STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>" <?php echo e($editDesignation->status == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>