@extends('main')

@section('content')

    <style>
        strong{
            color: red;
        }
        notice{
            color: blue;
        }
        #imageMsg,#signMsg{
            display: none;
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

        .sidenav a {
        padding: 15px 8px 15px 16px;
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

        @media only screen and (max-width: 1300px) and (min-width: 801px) {
            .sidenav {
            width: 250px;
        }
        }

        @media screen and (max-width: 800px) {
        .sidenav {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidenav a {
            text-align: center;
            float: none;
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
    </style>

    

    <div style="position: relative;" class="row ">

        <div class="col-12">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">
                    <div class="col-md-">

                            <div class="sidenav">
                                <a href="#" class="activeNav">Personal Details</a>
                                <a href="#">Career Objective and Application Information</a>
                                <a href="#">Step 3</a>
                                <a href="#">Step 4</a>
                                <a href="#">Step 5</a>
                                <a href="#">Step 6</a>
                                <a href="#">Step 7</a>
                            </div>
                    
                    </div>



                        <div class="col-md-" id="regForm">

                            <h2 style="margin-bottom: 40px; text-align: center;">Personal Details</h2>
                            <div id="edit">

                        {{--{{csrf_field()}}--}}
                        <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                @foreach($employeeCvPersonalInfo as $personalInfo)

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">First name:</label>{{$personalInfo->firstName}}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Last name:</label>{{$personalInfo->lastName}}

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Father name:</label>{{ $personalInfo->fathersName }}

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mother name:</label>{{ $personalInfo->mothersName }}

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Gender:</label>
                                        @foreach(GENDER as $key=>$value)
                                            @if($personalInfo->gender == $value) {{$key}} @endif
                                        @endforeach

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Religion:</label>
                                        @foreach($religion as $reli)
                                             @if($personalInfo->fkreligionId == $reli->religionId) {{$reli->religionName}}  @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Ethnicity</label>
                                        @foreach($ethnicity as $ethi)
                                            @if($personalInfo->ethnicityId == $ethi->ethnicityId) {{$ethi->ethnicityName}} @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Disability:</label>
                                        @foreach(DISABILITY as $key=>$value)
                                            @if($personalInfo->disability == $value) {{$key}} @endif
                                        @endforeach

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Date of birth:</label>
                                        {{ $personalInfo->dateOfBirth }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Blood group</label>
                                        @foreach(BLOOD_GROUP as $key=>$value)
                                            @if($personalInfo->bloodGroup == $value) {{$key}} @endif
                                        @endforeach
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Marital status:</label>
                                        @foreach(MARITAL_STATUS as $key=>$value)
                                           @if($personalInfo->maritalStatus == $value) {{$key}} @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Name of spouse:</label>
                                        {{$personalInfo->spouse}}
                                    </div>



                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Nationality:</label>
                                        @foreach($natinality as $natio)
                                            @if($personalInfo->fknationalityId == $natio->nationalityId ) {{$natio->nationalityName}} @endif
                                        @endforeach
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">NID / BID:</label>
                                        {{ $personalInfo->nationalId }}
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Passport:</label>
                                        {{$personalInfo->passport}}
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Email:</label>
                                        {{$personalInfo->email }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Alternate email:</label>
                                        {{$personalInfo->alternativeEmail }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Skype:</label>
                                        {{$personalInfo->skype }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Telephone no:</label>
                                        {{ $personalInfo->telephone }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Personal phone number:</label>
                                        {{ $personalInfo->personalMobile }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Alternative phone no:</label>
                                        {{ $personalInfo->alternativePhoneNo }}
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Home telephone:</label>
                                        {{ $personalInfo->homeNumber }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Office telephone:</label>
                                        {{$personalInfo->officeNumber }}
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Current address</label>
                                        <br>
                                        {{$personalInfo->presentAddress }}
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="">Permanent address</label>
                                        <br>
                                        {{$personalInfo->parmanentAddress }}
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="">Image :</label>
                                        <br>
                                        @if($personalInfo->image != null)
                                            <div>
                                                <img style="width: 150px;height: 150px" src="{{url('public/candidateImages/thumb'."/".$personalInfo->image)}}">

                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Signature</label>

                                        <br>
                                        @if($personalInfo->sign != null)
                                            <div>
                                                <img style="width: 150px;height: 100px" src="{{url('public/candidateSigns/thumb'."/".$personalInfo->sign)}}">

                                            </div>
                                        @endif
                                    </div>

                                </div>

                                <div style="overflow:auto;">
                                    <div style="float:right;">

                                        <a href="{{route('personalInfo.edit')}}"><button type="submit"  id="submitBtn">Edit</button></a>
                                        {{--<a href="{{route('candidate.cvEducation')}}"><button type="button" id="nextBtn">Next</button></a>--}}
                                        <a href="{{route('candidate.cvQuesObj')}}"><button type="button" id="nextBtn">Next</button></a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            </div>

                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>

                        </div>




                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


@endsection

@section('foot-js')

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
//        $(function () {
//            $('#dob').datepicker({
//                format: 'yyyy-m-d'
//            });
//            $("#image").focus(function(){
//                $("#imageMsg").show();
//            });
//            $("#image").focusout(function(){
//                $("#imageMsg").css("display", "none");
//            });
//            $("#sign").focus(function(){
//                $("#signMsg").css("display", "inline");
//            });
//            $("#sign").focus(function(){
//                $("#signMsg").css("display", "inline");
//            });
//        });

        function editPersonalInfo() {



            $.ajax({
                type: 'POST',
                url: "{!! route('personalInfo.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}"},
                success: function (data) {
//                    console.log(data);
                    $('#edit').html(data);


                }
            });

        }



    </script>


@endsection