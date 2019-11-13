<form method="post" action="<?php echo e(route('update.cvtraning')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="traningId" value="<?php echo e($training->traningId); ?>">
<div class="row">
    <div class="form-group col-md-10">

        <label for="inputEmail4">Name Of The Training</label>
        <input type="text" class="form-control" name="trainingName" value="<?php echo e($training->trainingName); ?>" id="inputEmail4" placeholder="training name" required>
    </div>
    <div class="form-group col-md-2 ">
        <button type="button" class="btn btn-info btn-sm " onclick="editInfo(<?php echo e($training->traningId); ?>)"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger btn-sm " onclick="deleteTraining(<?php echo e($training->traningId); ?>)"><i class="fa fa-trash"></i></button>

    </div>
</div>

<div class="row">
    <div class="form-group col-md-8">
        <label for="inputEmail4">Vanue </label>
        <input type="text" class="form-control" name="vanue" value="<?php echo e($training->vanue); ?>" id="inputEmail4" placeholder="vanue" required>
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">country</label>
        
        <select class="form-control" name="countryId">
            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($country->countryId); ?>" <?php if($training->countryId == $country->countryId): ?> selected <?php endif; ?>><?php echo e($country->countryName); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="inputPassword4">Start Date</label>
        <input type="text" class="form-control date" name="startDate" value="<?php echo e($training->startDate); ?>" id="start" placeholder="date" required>
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">End Date</label>
        <input type="text" class="form-control date" name="endDate"  value="<?php echo e($training->endDate); ?>" id="end" placeholder="date">
    </div>
    <div class="form-group col-md-12">
        <button  class="btn btn-info pull-right">Update</button>
    </div>


</div>
</form>