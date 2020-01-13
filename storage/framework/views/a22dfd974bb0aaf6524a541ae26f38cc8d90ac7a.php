<form method="post" action="<?php echo e(route('manage.education.update',['id'=>$education->educationLevelId])); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="">Education Name</label>
        <input type="text" maxlength="128" class="form-control" value="<?php echo e($education->educationLevelName); ?>" placeholder="education" name="education" required>
    </div>

    <div class="form-group">
        <label for="">Education Level is Under :</label><br>
        <label class="radio-inline">
            <input type="radio" <?php if($education->eduLvlUnder == '1'): ?> checked <?php endif; ?> value="1" required name="eduLvlUnder">Board
        </label>
        <label class="radio-inline" style="margin-left: 6%;">
            <input type="radio" required value="2" <?php if($education->eduLvlUnder == '2'): ?> checked <?php endif; ?> name="eduLvlUnder">University
        </label>

    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            <?php $__currentLoopData = STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($key== $education->status): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>