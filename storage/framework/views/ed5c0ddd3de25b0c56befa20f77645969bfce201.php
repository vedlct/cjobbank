<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>caritas job bank</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- App css -->
    <link href="<?php echo e(url('public/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(url('public/assets/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(url('public/assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />
    <style>

        .wrapper-page{
            width: 50%;
            max-width:90% !important;
        }
        .card-body{
            max-height: 600px;
            overflow-y: scroll;
        }
    </style>

    <style>
        .accountbg {
            background-position-x: center;
            background-position-y: 50%;
        }
    </style>

</head>



<body>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <h2 class="text-muted text-center font-18">Agreements</h2>

            <div class="p-3">
                <form class="form-horizontal m-t-20" method="post" action="<?php echo e(route('register.newUserAgreement')); ?>">

                    <?php echo e(csrf_field()); ?>


                    
                    
                    
                    

                    <input type="hidden" name="userEmail" value="<?php echo e($userEmail); ?>">
                    <input type="hidden" name="userPass" value="<?php echo e($userPass); ?>">
                    <input type="hidden" name="userToken" value="<?php echo e($userToken); ?>">
                    <input type="hidden" name="userFirstName" value="<?php echo e($userFirstName); ?>">
                    <input type="hidden" name="userLastName" value="<?php echo e($userLastName); ?>">





                    <?php $__currentLoopData = $aggrementsQues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group row">
                            <div class="col-8">
                                <p><?php echo e($ques->qus); ?></p>
                            </div>
                            <div class="col-4">
                                <input type="hidden" name="qesId[]" value="<?php echo e($ques->agreementQusId); ?>">
                                <label class="checkbox-inline"><input type="radio" name="qesans[]<?php echo e($ques->agreementQusId); ?>" required value="Y"> Yes</label>
                                <label class="checkbox-inline"><input type="radio" name="qesans[]<?php echo e($ques->agreementQusId); ?>"  required value="N"> No</label>
                                <label class="checkbox-inline"><input type="radio" name="qesans[]<?php echo e($ques->agreementQusId); ?>"  required value="NA"> Not Agree</label>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


</body>



</html>

<!-- jQuery  -->
<script src="<?php echo e(url('public/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/modernizr.min.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/waves.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/jquery.slimscroll.js')); ?>"></script>

<script src="<?php echo e(url('public/assets/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/jquery.scrollTo.min.js')); ?>"></script>

<!-- App js -->
<script src="<?php echo e(url('public/assets/js/app.js')); ?>"></script>