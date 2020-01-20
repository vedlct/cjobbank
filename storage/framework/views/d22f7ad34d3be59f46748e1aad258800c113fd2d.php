<!DOCTYPE html>
<html>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:47:39 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Caritas Job Bank</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo e(url('public/logo/TCL_logo.png')); ?>">


    <!-- App css -->
    <link href="<?php echo e(url('public/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(url('public/assets/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(url('public/assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />

    <style>
        .accountbg {
            background-position-x: center;
            background-position-y: 50%;
        }
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }

        .container{
            padding-top:50px;
            margin: auto;
        }
    </style>

</head>


<body>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-header">
            <h4 class="text-center">
                <b class="waves-effect waves-light">Caritas Job Bank</b>
            </h4>

        </div>
        <div class="card-body">


            <div align="center">
                <img src="<?php echo e(url('public/logo/TCL_logo.png')); ?>" height="150" width="200">
            </div>
            <div>
                <?php if(Session::has('notActive')): ?>
                    <p class="alert alert-info"><?php echo e(Session::get('notActive')); ?></p>
                <?php endif; ?>
            </div>

            <div class="p-3">
                <form method="POST" class="form-horizontal m-t-20" action="<?php echo e(route('account.changeForgetPass')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group row">
                        <div class="col-12">
                            
                            <input id="email" type="text" placeholder="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>


                            <?php if($errors->has('email')): ?>

                                <span class="">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            
                            <input id="password-field" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="New Password"  required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                            <?php if($errors->has('password')): ?>

                                <span class="">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                        <p id="passwordHelpBlock" class="form-text text-muted" style="font-size: small">
                            Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
                        </p>
                    </div>


                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Change Password</button>

                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-sm-7 m-t-20">
                            <a href="<?php echo e(url('/')); ?>" class="text-muted"><i class="mdi mdi-account-key"></i>Sign In</a>
                        </div>
                        <div class="col-sm-5 m-t-20">
                            <a href="<?php echo e(route('register')); ?>" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                        </div>
                    </div>
                    <div align="center" class="form-group m-t-10 mb-0">
                        <a href="<?php echo e(route('account.activationResend')); ?>" class="text-muted"><i class="mdi mdi-email"></i> Resend Activation Mail</a>
                    </div>


                </form>
            </div>

        </div>

        <div class="card-footer">

            <div style="text-align: center">
                © <?php echo e(date('Y')); ?> CARITAS JOB BANK<br>
                HELP: CBGENERAL@CARITASBD.ORG
            </div>


        </div>
    </div>
</div>



<!-- jQuery  -->
<script src="<?php echo e(url('public/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/modernizr.min.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/waves.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/jquery.slimscroll.js')); ?>"></script>

<script src="<?php echo e(url('public/assets/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(url('public/assets/js/jquery.scrollTo.min.js')); ?>"></script>

<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

</body>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:47:39 GMT -->
</html>