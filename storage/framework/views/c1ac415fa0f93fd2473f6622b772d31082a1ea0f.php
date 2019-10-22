<form method="post" action="<?php echo e(route('admin.zone.update',['id'=>$zone->zoneId])); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="">Zone Name</label>
        <input type="text" class="form-control" value="<?php echo e($zone->zoneName); ?>" placeholder="zone" name="zone" required>
    </div>
    <div class="form-group">
        <label >Office Address</label>
        <input type="text" class="form-control" value="<?php echo e($zone->officeAddress); ?>" name="officeAddress">
    </div>
    <div class="form-group">
        <label >Phone</label>
        <input type="text" class="form-control" value="<?php echo e($zone->zonePhone); ?>" name="zonePhone">
        <small>If more than one then put it in comma separated form.</small>
    </div>
    <div class="form-group">
        <label >Email</label>
        <input type="text" class="form-control" value="<?php echo e($zone->zoneEmail); ?>" name="zoneEmail">
        <small>If more than one then put it in comma separated form.</small>
    </div>
    <div class="form-group">
        <label >Website</label>
        <input type="text" class="form-control" value="<?php echo e($zone->zoneWeb); ?>" name="zoneWeb">
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            <?php $__currentLoopData = STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($key== $zone->status): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
