@extends('main')

@section('content')

    <style>
        strong{
            color: red;
        }
        notice{
            color: blue;
        }
        #radioBtn .notActive{
            color: #3276b1;
            background-color: #fff;
        }
        /*#imageMsg,#signMsg{*/
        /*display: none;*/
        /*}*/
    </style>

    <div class="row ">


        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card updateCardclass="incomplete" ">
            <div class="card-body">

                <div class="col-md-3">

                    <div class="sidenav">
{{--                        <a href="{{route('candidate.cvPersonalInfo')}}" class="activeNav">Personal details</a>--}}
                        <a class="incomplete" href="{{route('changeemailtemplate.interviewcard')}}">Interview card</a>
                        <a class="incomplete" href="{{route('changeemailtemplate.panellisted')}}">Panel listed</a>
                        <a class="incomplete" href="{{route('changeemailtemplate.notselected')}}">Not selected</a>
                        <a class="incomplete" href="{{route('changeemailtemplate.acknowledgement')}}">Acknowledgement</a>
                    </div>

                </div>

                @yield('mail_content')

            </div>
        </div>


@endsection

@section('foot-js')

    <script type="text/javascript" src="{{url('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        fixStepIndicator(currentTab); // Display the crurrent tab



        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var x1 = document.getElementsByClassName("tab");
            x1[n].style.display = "block";
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>


    <script type="text/javascript">
        $(function () {
            $('#dob').datepicker({
                format: 'yyyy-m-d'
            });

            if($("#chkNid" ).hasClass( "active" )) {
                $('#nid').show();
                $('#idProvided').val("NID");
                $("#nidField").attr("required", true);
                $("#bidField").attr("required", false);
                $('#bid').hide();
            }else if($("#chkBid" ).hasClass( "active" )) {
                $('#bid').show();
                $('#idProvided').val("BID");
                $("#bidField").attr("required", true);
                $("#nidField").attr("required", false);

                $('#nid').hide();
            }

        });

        $('#radioBtn a').on('click', function(){
            var sel = $(this).data('title');
            var tog = $(this).data('toggle');
            $('#'+tog).prop('value', sel);

            $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
            $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
        });

        function nid() {
            //  alert("nid");
            document.getElementById("nid").style.display = "block";
            document.getElementById("bid").style.display = "none";
            $('#idProvided').val("NID");
            $("#nidField").attr("required", true);
            $("#bidField").attr("required", false);
        }
        function bid() {
            // alert("bid");
            document.getElementById("bid").style.display = "block";
            document.getElementById("nid").style.display = "none";
            $('#idProvided').val("BID");
            $("#bidField").attr("required", true);
            $("#nidField").attr("required", false);
        }

        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
        function isAlfaNumberKey(evt)
        {
            var code = (evt.which) ? evt.which : event.keyCode;

            if (!(code > 47 && code < 58) && // numeric (0-9)
                !(code > 64 && code < 91) && // upper alpha (A-Z)
                !(code > 96 && code < 123)) { // lower alpha (a-z)
                return false;
            }
            return true;
        }

        $("#image").change(function() {

            var val = $(this).val();

            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png': case 'jpeg':

                    break;
                default:
                    $(this).val('');
                    // error message here
                    var errorMsg="Please select a valid image";
                    validationError(errorMsg);
                    break;
            }
            var picsize = (this.files[0].size);
            if ((picsize/1024) > 100){
                var errorMsg="Image size should be less then 100 KB";
                validationError(errorMsg);
                $(this).val('');

            }

        });
        $("#sign").change(function() {

            var val = $(this).val();

            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png': case 'jpeg':

                    break;
                default:
                    $(this).val('');
                    // error message here
                    var errorMsg="Please select a valid image";
                    validationError(picsize);
                    break;
            }
            var picsize = (this.files[0].size);
            if ((picsize/1024) > 50){
                var errorMsg="Image size should be less then 50 KB";
                validationError(errorMsg);
                $(this).val('');

            }

        });

        function validationError(errorMsg){

            $.alert({
                title: 'Error',
                type: 'red',
                content: errorMsg,
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-green',
                        action: function () {

                        }
                    }
                }
            });

        }

        $('.js-example-basic-single').select2();

    </script>


@endsection