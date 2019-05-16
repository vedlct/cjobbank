


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

    <style>

        .wrapper-page{
            width: 50%;
            max-width:90% !important;
        }
        .card-body{
            max-height: 700px;
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

            <h3 align="center">{{$terms->page_Header}}</h3>

            {{--<h4 class="text-muted text-center font-18"><b>{{$terms->page_Header}}</b></h4>--}}
            {{--<div>--}}
                {{--@if(Session::has('notActive'))--}}
                    {{--<p class="alert alert-info">{{ Session::get('notActive') }}</p>--}}
                {{--@endif--}}
            {{--</div>--}}

            <div class="p-3">

                {!! $terms->page_content !!}

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