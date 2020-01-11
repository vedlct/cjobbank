<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Caritas Job Bank</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="{{url('public/logo/TCL_logo.png')}}">


    <!-- App css -->
    <link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

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
        <div class="card-header">
            <h4 class="text-center">
                <b class="waves-effect waves-light">Caritas Job Bank</b>
            </h4>

        </div>
        <div class="card-body">


            <div align="center">
                <img src="{{url('public/logo/TCL_logo.png')}}" height="150" width="200">
            </div>
            <div>
                @if(Session::has('notActive'))
                    <p class="alert alert-info">{{ Session::get('notActive') }}</p>
                @endif
            </div>

            <div class="p-3">
                <form method="POST" class="form-horizontal m-t-20" action="{{ route('account.resendActivationMail') }}">
                    {{csrf_field()}}

                    <div class="form-group row">
                        <div class="col-12">

                            <input id="email" type="text" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))

                                <span class="">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Resend</button>

                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-sm-7 m-t-20">
                            <a href="{{route('account.forgetPass')}}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 m-t-20">
                            <a href="{{route('register')}}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0">
                        <div class="col-12 m-t-20 text-center">
                            <a href="{{url('/')}}" class="text-muted"><i class="mdi mdi-account-key"></i>Sign In</a>
                        </div>
                    </div>



                </form>
            </div>

        </div>

        <div class="card-footer">

            <div style="text-align: center">
                © {{date('Y')}} CARITAS JOB BANK <br>
                HELP: CBGENERAL@CARITASBD.ORG
            </div>


        </div>
    </div>
</div>



<!-- jQuery  -->
<script src="{{url('public/assets/js/jquery.min.js')}}"></script>
<script src="{{url('public/assets/js/popper.min.js')}}"></script>
<script src="{{url('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/assets/js/modernizr.min.js')}}"></script>
<script src="{{url('public/assets/js/waves.js')}}"></script>
<script src="{{url('public/assets/js/jquery.slimscroll.js')}}"></script>

<script src="{{url('public/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('public/assets/js/jquery.scrollTo.min.js')}}"></script>




</body>
</html>