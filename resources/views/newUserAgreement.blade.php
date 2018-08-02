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
    <link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

</head>



<body>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <h2 class="text-muted text-center font-18">Agreements</h2>

            <div class="p-3">
                <form class="form-horizontal m-t-20" method="post" action="{{route('register.newUserAgreement')}}">

                    {{csrf_field()}}

                    <input type="hidden" name="firstName" value="{{$data['firstName']}}">
                    <input type="hidden" name="lastName" value="{{$data['lastName']}}">
                    <input type="hidden" name="email" value="{{$data['email']}}">
                    <input type="hidden" name="password" value="{{$data['password']}}">




                    <div class="form-group row">
                        <div class="col-8">
                            <p>It is a long established fact that a reader will be distracted ?</p>
                        </div>
                        <div class="col-4">
                            <label class="checkbox-inline"><input type="checkbox" name="q1" value="Y"> Yes</label>
                            <label class="checkbox-inline"><input type="checkbox" name="q1" value="N"> No</label>
                            <label class="checkbox-inline"><input type="checkbox" name="q1" value="NA"> Not Agree</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <p>It is a long established fact that a reader will be distracted ?</p>
                        </div>
                        <div class="col-4">
                            <label class="checkbox-inline"><input type="checkbox" name="q2" value="Y"> Yes</label>
                            <label class="checkbox-inline"><input type="checkbox" name="q2" value="N"> No</label>
                            <label class="checkbox-inline"><input type="checkbox" name="q2" value="NA"> Not Agree</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <p>It is a long established fact that a reader will be distracted ?</p>
                        </div>
                        <div class="col-4">
                            <label class="checkbox-inline"><input type="checkbox" name="q3" value="Y"> Yes</label>
                            <label class="checkbox-inline"><input type="checkbox" name="q3" value="N"> No</label>
                            <label class="checkbox-inline"><input type="checkbox" name="q3" value="NA"> Not Agree</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <p>It is a long established fact that a reader will be distracted ?</p>
                        </div>
                        <div class="col-4">
                            <label class="checkbox-inline"><input type="checkbox" name="q4" value="Y"> Yes</label>
                            <label class="checkbox-inline"><input type="checkbox" name="q4" value="N"> No</label>
                            <label class="checkbox-inline"><input type="checkbox" name="q4" value="NA"> Not Agree</label>
                        </div>
                    </div>


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
<script src="{{url('public/assets/js/jquery.min.js')}}"></script>
<script src="{{url('public/assets/js/popper.min.js')}}"></script>
<script src="{{url('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/assets/js/modernizr.min.js')}}"></script>
<script src="{{url('public/assets/js/waves.js')}}"></script>
<script src="{{url('public/assets/js/jquery.slimscroll.js')}}"></script>

<script src="{{url('public/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('public/assets/js/jquery.scrollTo.min.js')}}"></script>

<!-- App js -->
<script src="{{url('public/assets/js/app.js')}}"></script>