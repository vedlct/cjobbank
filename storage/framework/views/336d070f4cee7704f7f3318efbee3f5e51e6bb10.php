<form method="post" action="<?php echo e(route('manage.major.update',['id'=>$editMajor->educationMajorId])); ?>">
    <?php echo e(csrf_field()); ?>


    <div class="form-group">
        <label for="">Major</label>
        <input type="text" class="form-control" maxlength="255" value="<?php echo e($editMajor->educationMajorName); ?>" placeholder="major" name="major" required>
    </div>

    <div class="form-group">
        <label for="">Degree<span style="color: red">*</span></label>
        <select name="degree" class="form-control" required id="degree">
            <option value="">Select Degree </option>
            <?php $__currentLoopData = $degree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($editMajor->fkDegreeId==$d->degreeId): ?>selected <?php endif; ?> value="<?php echo e($d->degreeId); ?>"><?php echo e($d->degreeName); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <?php $__currentLoopData = STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>" <?php echo e($editMajor->status == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="global">Global<span style="color: red">*</span></label>
        <input type="checkbox" name="global" class="form-control" id="global" <?php if($editMajor->type=='g'): ?> checked <?php endif; ?>>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
