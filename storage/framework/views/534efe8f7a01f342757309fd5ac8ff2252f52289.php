<form method="post" action="<?php echo e(route('admin.zone.update',['id'=>$zone->zoneId])); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="">Zone Name</label>
        <input type="text" class="form-control" value="<?php echo e($zone->zoneName); ?>" placeholder="zone" name="zone" required>
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>