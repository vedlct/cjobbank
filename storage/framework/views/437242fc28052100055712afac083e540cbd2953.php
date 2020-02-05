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
        <div class="card-body">

            <h3 align="center">Caritas Job Bank</h3>

            <h4 class="text-muted text-center font-18"><b>Register</b></h4>
            <div>
                <?php if(Session::has('notActive')): ?>
                    <p class="alert alert-info"><?php echo e(Session::get('notActive')); ?></p>
                <?php endif; ?>
            </div>

            <div class="p-3">
                <form class="form-horizontal m-t-20" method="post" action="<?php echo e(route('register.createUserShowAggrement')); ?>">

                    <?php echo e(csrf_field()); ?>


                    <div class="form-group row">
                        <div class="col-12 <?php echo e($errors->has('firstName') ? ' has-error' : ''); ?>">
                            <input class="form-control" type="text" required="" value="<?php echo e(old('firstName')); ?>" name="firstName" placeholder="First Name">
                            <?php if($errors->has('firstName')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('firstName')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-12 <?php echo e($errors->has('lastName') ? ' has-error' : ''); ?>">
                            <input class="form-control" type="text" required="" value="<?php echo e(old('lastName')); ?>" name="lastName" placeholder="Last Name">
                            <?php if($errors->has('lastName')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('lastName')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <input class="form-control" type="email" required="" value="<?php echo e(old('email')); ?>" name="email" placeholder="Email">
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-12 <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                            <input class="form-control" id="password-field" type="password" required="" value="<?php echo e(old('password')); ?>" name="password" placeholder="Password">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <p id="passwordHelpBlock" class="form-text text-muted" style="font-size: small">
                                Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
                            </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="terms" required id="customCheck1">
                                <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="<?php echo e(route('terms_and_condition.show')); ?>" target="_blank" class="text-muted">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>

                    <div align="center" class="form-group m-t-10 mb-0">
                        <a href="<?php echo e(route('account.activationResend')); ?>" class="text-muted"><i class="mdi mdi-email"></i> Resend Activation Mail</a>
                    </div>

                    <div class="form-group m-t-10 mb-0">
                        <div class="col-12 m-t-20 text-center">
                            <a href="<?php echo e(url('/')); ?>" class="text-muted"><i class="mdi mdi-account-key"></i>Sign In</a>
                        </div>
                    </div>

                </form>
                <div class="form-group m-t-10 mb-0">
                    <div class="col-12 m-t-20 text-center">
                        <p>HELP: CBGENERAL@CARITASBD.ORG</p>
                    </div>
                </div>

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
