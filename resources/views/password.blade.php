@extends('main')

@section('content')

    <style>
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
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                    </div>

                    <div class="form-group">
                        <label>User Type</label>
                        <input type="text" class="form-control" value="{{Auth::user()->fkuserTypeId}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Login Id</label>
                        <input type="text" class="form-control" value="{{Auth::user()->email}}" readonly>
                    </div>

                </div>

                {{--<div class="col-md-4"></div>--}}

                <div class="col-md-4">
                    <form class="form-horizontal" id="myform" method="post" action="{{route('password.change')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="oldPass" class="form-control">
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password"> New Password</label>
                            <input type="password" class="form-control" id="password-field" name="password" />
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <p id="passwordHelpBlock" class="form-text text-muted" style="font-size: small">
                            Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
                        </p>

                        <div class="form-group">
                            <label for="password_again">Enter New Password Again</label>
                            <input type="password" class="form-control" id="password_again" name="password_again" />
                            <span toggle="#password_again" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>


                <div class="col-md-2">
                    <button type="submit" style="" class="btn btn-success mt-4" >Change</button>

                </div>
                </form>

            </div>






        </div>
    </div>





@endsection

@section('foot-js')
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

@endsection