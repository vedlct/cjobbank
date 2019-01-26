@extends('main')

@section('content')

    <style>
        strong{
            color: red;
        }
        #imageMsg,#signMsg{
            display: none;
        }
    </style>

    

    <div style="position: relative;" class="row ">



        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">


                        <div id="regForm">

                            <h2 style="margin-bottom: 40px; text-align: center;">Personal Details</h2>
                            <div id="edit">

                        {{--{{csrf_field()}}--}}
                        <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                @foreach($employeeCvPersonalInfo as $personalInfo)

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">First Name:</label>{{$personalInfo->firstName}}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Last Name:</label>{{$personalInfo->lastName}}

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Father Name:</label>{{ $personalInfo->fathersName }}

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mother Name:</label>{{ $personalInfo->mothersName }}

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
                                        <label for="">Date of Birth:</label>
                                        {{ $personalInfo->dateOfBirth }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Blood Group</label>
                                        @foreach(BLOOD_GROUP as $key=>$value)
                                            @if($personalInfo->bloodGroup == $value) {{$key}} @endif
                                        @endforeach
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Marital Status:</label>
                                        @foreach(MARITAL_STATUS as $key=>$value)
                                           @if($personalInfo->maritalStatus == $value) {{$key}} @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Name Of Spouse:</label>
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
                                        <label for="">Alternate Email:</label>
                                        {{$personalInfo->alternativeEmail }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Skype:</label>
                                        {{$personalInfo->skype }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Telephone No:</label>
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
                                        <label for="">Home Telephone:</label>
                                        {{ $personalInfo->homeNumber }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">office Telephone:</label>
                                        {{$personalInfo->officeNumber }}
                                    </div>


                                </div>








                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Current Address</label>
                                        <br>
                                        {{$personalInfo->presentAddress }}
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="">Permanent Address</label>
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