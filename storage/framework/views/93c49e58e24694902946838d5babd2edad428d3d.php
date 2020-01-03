<?php $__env->startSection('content'); ?>

    <div class="card container">
        <div class="card-body ">
            <h3 align="center">Edit User</h3>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form method="post" action="<?php echo e(route('admin.manageUser.update',['id'=>$hr->hrId])); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="form-group col-md-4">
                    </div>
                    <div class="form-group col-md-4">
                        <label>User Type<span style="color: red">*</span></label>
                        <select class="form-control" name="userType" required>
                            <option value="">Select</option>
                            <?php $__currentLoopData = USER_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value != 'user' ): ?>
                                    <option <?php if($hr->fkuserTypeId == $value): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>

                    <div class="form-group col-md-4">
                    </div>


                    <div class="form-group col-md-6">
                        <label>First Name<span style="color: red">*</span></label>
                        <input required type="text" class="form-control" placeholder="first name" value="<?php echo e($hr->firstName); ?>" name="firstName">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name<span style="color: red">*</span></label>
                        <input required type="text" class="form-control" placeholder="last name" value="<?php echo e($hr->lastName); ?>" name="lastName">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email<span style="color: red">*</span></label>
                        <input required type="email" class="form-control" placeholder="email" value="<?php echo e($hr->email); ?>" name="email">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Phone<span style="color: red">*</span></label>
                        <input required type="text" class="form-control" placeholder="phone" value="<?php echo e($hr->phone); ?>" name="phone">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Designation<span style="color: red">*</span></label>
                        <select class="form-control" name="designationId" required>
                            <option value="">Select Designation</option>
                            <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($designation->designationId); ?>" <?php echo e($hr->fkdesignationId == $designation->designationId ? 'selected' : ''); ?>><?php echo e($designation->designationName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Zone<span style="color: red">*</span></label>
                        <select class="form-control" name="zoneId" required>
                            <option value="">Select Zone</option>
                            <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($zone->zoneId); ?>" <?php echo e($hr->fkzoneId == $zone->zoneId ? 'selected' : ''); ?>><?php echo e($zone->zoneName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Gender<span style="color: red">*</span></label>
                        <select class="form-control" name="gender" required>
                            <option value="">Select</option>
                            <?php $__currentLoopData = GENDER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($hr->gender==$value): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Address<span style="color: red">*</span></label>
                        <textarea name="address" placeholder="address" class="form-control" required><?php echo e($hr->address); ?></textarea>
                    </div>
                </div>
                <button class="btn btn-success">Update</button>
            </form>

        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>