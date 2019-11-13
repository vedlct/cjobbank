<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?php echo e(Auth::user()->name); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>User Type</label>
                        <input type="text" class="form-control" value="<?php echo e(Auth::user()->fkuserTypeId); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Login Id</label>
                        <input type="text" class="form-control" value="<?php echo e(Auth::user()->email); ?>" readonly>
                    </div>

                </div>

                

                <div class="col-md-4">
                    <form class="form-horizontal" id="myform" method="post" action="<?php echo e(route('password.change')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="oldPass" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>

                        <div class="form-group">
                            <label for="password_again">Again</label>
                            <input type="password" class="form-control" id="password_again" name="password_again" />
                        </div>

                </div>
                <div class="col-md-2">
                    <button type="submit" style="" class="btn btn-success mt-4" >Change</button>

                </div>
                </form>

            </div>






        </div>
    </div>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot-js'); ?>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script>
        //        jQuery.validator.setDefaults({
        //            debug: true,
        //            success: "valid"
        //        });
        $( '#myform' ).validate({
            rules: {
                password: "required",
                password_again: {
                    equalTo: "#password"
                }
            }
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>