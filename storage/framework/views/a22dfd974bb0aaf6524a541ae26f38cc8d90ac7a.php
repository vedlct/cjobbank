<form method="post" action="<?php echo e(route('manage.education.update',['id'=>$education->educationLevelId])); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="">Education Name</label>
        <input type="text" class="form-control" value="<?php echo e($education->educationLevelName); ?>" placeholder="education" name="education" required>
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>