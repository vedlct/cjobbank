<form method="post" action="<?php echo e(route('manage.otherSkill.update',['id'=>$skill->id])); ?>">
    <?php echo e(csrf_field()); ?>


    <div class="form-group">
        <label for="">Skill</label>
        <input type="text" class="form-control" value="<?php echo e($skill->skillName); ?>" placeholder="skill" name="skillName" required>
    </div>
    
    
    
    

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            <?php $__currentLoopData = STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>" <?php echo e($skill->status == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>