<form  action="<?php echo e(route('update.jobExperience')); ?>" method="post">
    <!-- One "tab" for each step in the form: -->
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="jobExperienceId" value="<?php echo e($experience->jobExperienceId); ?>">



            <div class="row">
                <div class="form-group col-md-10">
                    <label for="inputEmail4">Company Name</label>
                    <input type="text" class="form-control" name="organization" value="<?php echo e($experience->organization); ?>" id="inputEmail4" placeholder="organization" required>
                </div>
                <div class="form-group col-md-2 ">
                    <button type="button" class="btn btn-info btn-sm " onclick="editInfo(<?php echo e($experience->jobExperienceId); ?>)"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm " onclick="deleteExperience(<?php echo e($experience->jobExperienceId); ?>)"><i class="fa fa-trash"></i></button>
                </div>
                    <div class="form-group col-md-4">
                    <label for="inputEmail4">Designation</label>
                    <input type="text" class="form-control" name="degisnation" value="<?php echo e($experience->degisnation); ?>"  id="inputEmail4" placeholder="designation" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Start Date</label>
                    <input type="text" class="form-control date" name="startDate" value="<?php echo e($experience->startDate); ?>"  id="start" placeholder="date" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">End Date</label>
                    <input type="text" class="form-control date" name="endDate" value="<?php echo e($experience->endDate); ?>"  id="end" placeholder="date">
                </div>
                <div class="form-group col-md-8">
                    <label for="inputPassword4">Address</label>
                    <textarea class="form-control" name="address" placeholder="address"><?php echo e($experience->address); ?> </textarea>
                </div>
                <div class="form-group col-md-12">
                    <button  class="btn btn-info pull-right">Update</button>
                </div>
            </div>



    </form>