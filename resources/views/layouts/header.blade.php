<!DOCTYPE html>
<html>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:43:36 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Job Bank</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Techcloud" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="{{url('public/logo/TCL_logo.png')}}">

    <!--Morris Chart CSS -->
{{--<link rel="stylesheet" href="{{url('public/assets/plugins/morris/morris.css')}}">--}}

<!-- App css -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    {{--<script href="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.dev.js"></script>--}}
    {{--Jquery Alert--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <!-- DataTables -->
    <link href="{{asset('public/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <style>


        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }


        #regForm {
            background-color: #ffffff;
            font-family: Raleway;
            margin: 10px auto;
            min-width: 300px;
            padding: 40px;
            width: 50%;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }



        .select2-container--default .select2-selection--single {
            height: 36px;
        }


        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 35px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            top: 5px;
        }
        .sidenav {
            width: 350px;
            position: fixed;
            z-index: 1;
            /* top: 20px;
            left: 10px; */
            background: #D3D3D3;
            overflow-x: hidden;
            padding: 0;
            margin-top: 12px;

        }


        @media only screen and (max-height: 800px) {
            .sidenav{
                overflow-y: scroll;
                height:400px;
            }
        }

        .sidenav a {
            padding: 8px 8px 8px 16px;
            text-decoration: none;
            color: #000;
            display: block;
            transition: all 0.3s;
            border-bottom:1px solid #FBFBFB;
        }

        .sidenav a:hover {
            color: #fff;
            background: #1FB0E5;
        }

        .sidenav .activeNav {
            color: #fff;
            background: #1FB0E5;
        }

        .sidenav .incomplete:hover {
            background: transparent;
            color:#000;
        }

        @media only screen and (max-width: 1450px) and (min-width: 801px) {
            .sidenav {
                width: 200px;
            }

            .sidenav a {
            padding: 5px 8px 5px 16px;
            }

        }


        @media screen and (max-width: 800px) {

            .sidenav {
                width: 450%;
                height: auto;
                position: relative;
            }

            #regForm {

                min-width: 93%;

            }

            .sidenav a {
                text-align: center;
                float: none;
            }
        }
            @media screen and (max-width: 500px) {
                .sidenav {
                    width: 100%;
                }

                .sidenav a {
                    text-align: center;
                    float: none;
                }
            }



        @media screen and (min-width: 1920px) {
            .updateCard {
            height:1500px;
            }
        }

        @media screen and (max-width: 500px) {
            .updateCard {
                height:3000px;
            }
        }

        /*.updateCard {*/
            /*height:1500px;*/
        /*}*/


    </style>



    @yield('header')

</head>
