<form method="post" action="<?php echo e(route('manage.degree.update',['id'=>$degree->degreeId])); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="">Education Level</label>
        <select class="form-control" name="educationLevel">
            <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($education->educationLevelId); ?>" <?php echo e($degree->educationLevelId == $education->educationLevelId ? 'selected' : ''); ?>><?php echo e($education->educationLevelName); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Degree Name</label>
        <input type="text" class="form-control" value="<?php echo e($degree->degreeName); ?>" placeholder="degree" name="degree" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>