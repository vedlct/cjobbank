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
                            <a href="{{route('candidate.cvPersonalInfo')}}" class="activeNav">Personal details</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvQuesObj')}}">Career objective and application information</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvEducation')}}">Education</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.language.index')}}">Language</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.computerSkill.index')}}">Computer-skill</a>
                            {{--<a onclick="return false;" class="incomplete" href="{{route('candidate.skill.index')}}">Other Skill Information</a>--}}
                            <a onclick="return false;" class="incomplete" href="{{route('cv.OthersInfo')}}">Other information</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('JobExperience.index')}}">Job experience</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" enctype="multipart/form-data" method="post" action="{{route('cv.insertPersonalInfo')}}">

                        {{csrf_field()}}
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Personal details </h2>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Given name<span style="color: red">*</span></label>
                                    <input type="text" name="firstName" class="form-control {{ $errors->has('firstName') ? ' is-invalid' : '' }}" value="{{ old('firstName') }}" id="" required placeholder="First name">
                                    @if ($errors->has('firstName'))

                                        <span class="">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Surname<span style="color: red">*</span></label>
                                    <input type="text" name="lastName" class="form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}" value="{{ old('lastName') }}" id="" required placeholder="Last name">
                                    @if ($errors->has('lastName'))

                                        <span class="">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Father name<span style="color: red">*</span></label>
                                    <input type="text" name="fathersName" class="form-control {{ $errors->has('fathersName') ? ' is-invalid' : '' }}" value="{{ old('fathersName') }}" id="" required placeholder="Father's name">
                                    @if ($errors->has('fathersName'))

                                        <span class="">
                                        <strong>{{ $errors->first('fathersName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mother name<span style="color: red">*</span></label>
                                    <input type="text" name="mothersName" class="form-control {{ $errors->has('mothersName') ? ' is-invalid' : '' }}" value="{{ old('mothersName') }}" required id="" placeholder="Mother's name">
                                    @if ($errors->has('mothersName'))

                                        <span class="">
                                        <strong>{{ $errors->first('mothersName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Gender<span style="color: red">*</span></label>
                                    <select required name="gender" class="form-control" id="sel1">
                                        <option selected value="">Select gender</option>
                                        @foreach(GENDER as $key=>$value)
                                        <option @if (old('gender') == $value) selected @endif value="{{$value}}">{{$key}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Religion<span style="color: red">*</span></label>
                                    <select required name="religion"class="form-control" id="sel1">
                                        <option selected value="">Select religion</option>
                                        @foreach($religion as $reli)
                                        <option @if (old('religion') == $reli->religionId) selected @endif value="{{$reli->religionId}}">{{$reli->religionName}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Ethnicity<span style="color: red">*</span></label>
                                    <select required name="ethnicity" class="form-control" id="sel1">
                                        <option selected value="">Select ethnicity</option>
                                        @foreach($ethnicity as $ethi)
                                            <option @if (old('ethnicity') == $ethi->ethnicityId) selected @endif value="{{$ethi->ethnicityId}}">{{$ethi->ethnicityName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Disability<span style="color: red">*</span></label>
                                    <select required name="disability" class="form-control" id="sel1">
                                        <option selected value="">Select disability</option>
                                        @foreach(DISABILITY as $key=>$value)
                                            <option @if (old('disability') == $value) selected @endif value="{{$value}}">{{$key}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Date of birth<span style="color: red">*</span></label>
                                    <input type="text" name="dob" required class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{ old('dob') }}" id="dob" placeholder="Date of birth">
                                    @if ($errors->has('dob'))

                                        <span class="">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Blood group<span style="color: red">*</span></label>
                                    <select class="form-control" name="bloodGroup" required>
                                        <option value="">Select Group</option>
                                        @foreach(BLOOD_GROUP as $key=>$value)
                                            {{--<option @if($personalInfo->disability == $value) selected @endif value="{{$value}}">{{$key}}</option>--}}
                                            <option  @if (old('bloodGroup') == $value) selected @endif value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('bloodGroup'))

                                        <span class="">
                                        <strong>{{ $errors->first('bloodGroup') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Marital status<span style="color: red">*</span></label>
                                    <select class="form-control" name="maritalStatus" required>
                                        <option value="">Select status</option>
                                        @foreach(MARITAL_STATUS as $key=>$value)
                                            {{--<option @if($personalInfo->disability == $value) selected @endif value="{{$value}}">{{$key}}</option>--}}
                                            <option @if (old('maritalStatus') == $value) selected @endif value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('maritalStatus'))

                                        <span class="">
                                        <strong>{{ $errors->first('maritalStatus') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Name of spouse</label>
                                    <input type="text"  name="spouse" class="form-control" value="{{old('spouse')}}"  id="" placeholder="Husband / Wife">
                                    @if ($errors->has('spouse'))
                                        <span class="">
                                        <strong>{{ $errors->first('spouse') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nationality<span style="color: red">*</span></label>
                                    <select required name="nationality" class="form-control js-example-basic-single" id="sel1">
                                        <option selected value="">Select nationality</option>
                                        @foreach($natinality as $natio)
                                            <option @if (old('nationality') == $natio->nationalityId) selected @endif value="{{$natio->nationalityId}}">{{$natio->nationalityName}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{--<div class="form-group col-md-6">--}}
                                    {{--<label for="">NID / BID<span style="color: red">*</span></label>--}}
                                    {{--<input type="text" required name="nId" class="form-control {{ $errors->has('nId') ? ' is-invalid' : '' }}" value="{{ old('nId') }}" id="" placeholder="National Id">--}}
                                    {{--@if ($errors->has('nId'))--}}
                                        {{--<span class="">--}}
                                        {{--<strong>{{ $errors->first('nId') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}

                                <div class="form-group col-md-6">
                                    <label for="">Passport</label>
                                    <input type="text" placeholder="If any" onkeypress="return isAlfaNumberKey(event)" class="form-control" value="{{old('passport')}}" name="passport">
                                    @if ($errors->has('passport'))

                                        <span class="">
                                        <strong>{{ $errors->first('passport') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div id="radioBtn" class="form-group col-md-6">
                                    <label for="idProvided">Select NID/BID</label>
                                    <div class="col-sm-2 col-md-2"></div>
                                    <a  @if(old('nId')) class="btn btn-primary btn-sm active" @else class="btn btn-primary btn-sm notActive" @endif id="chkNid" data-toggle="idProvided" data-title="NID" onclick="nid()">NID</a>
                                    <a  @if(old('bId')) class="btn btn-primary btn-sm active" @else class="btn btn-primary btn-sm notActive" @endif id="chkBid" data-toggle="idProvided" data-title="BID"onclick="bid()">BID</a>
                                    <input type="hidden" name="idProvided" id="idProvided">
                                    {{--<button type="button" class="btn " style="margin-top: 15px; margin-bottom: 5px" onclick="nid()">NID</button > <button type="button" style="margin-top: 15px; margin-bottom: 5px" class="btn" onclick="bid()">BID</button>--}}
                                </div>


                                <div class="form-group col-md-6" id="nid">
                                    <label for=""> NID <span style="color: red">*</span></label>
                                    <input  type="text" name="nId" class="form-control {{ $errors->has('nId') ? ' is-invalid' : '' }}" value="{{ old('nId') }}" id="nidField" placeholder="">
                                    @if ($errors->has('nId'))

                                        <span class="">
                                        <strong>{{ $errors->first('nId') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6" id="bid" style="display: none">
                                    <label for="">  BID <span style="color: red">*</span></label>
                                    <input  type="text" name="bId" class="form-control {{ $errors->has('bId') ? ' is-invalid' : '' }}" value="{{ old('bId') }}" id="bidField" placeholder="">
                                    @if ($errors->has('bId'))

                                        <span class="">
                                        <strong>{{ $errors->first('bId') }}</strong>
                                            </span>
                                    @endif
                                </div>

                            </div>



                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Email<span style="color: red">*</span></label>
                                    <input type="text" required name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="" placeholder="Email">
                                    @if ($errors->has('email'))

                                        <span class="">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Alternate email</label>
                                    <input type="text" name="alternateEmail"  class="form-control {{ $errors->has('alternateEmail') ? ' is-invalid' : '' }}" value="{{ old('alternateEmail') }}" id="" placeholder="Alternate email">
                                    @if ($errors->has('alternateEmail'))

                                        <span class="">
                                        <strong>{{ $errors->first('alternateEmail') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Skype</label>
                                    <input type="text" name="skype"  class="form-control {{ $errors->has('skype') ? ' is-invalid' : '' }}" value="{{ old('skype') }}" id="" placeholder="Skype Id">
                                    @if ($errors->has('skype'))

                                        <span class="">
                                        <strong>{{ $errors->first('skype') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="">Telephone no.</label>
                                    <input type="text"  maxlength="20" onkeypress="return isNumberKey(event)" name="telephone" class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" value="{{ old('telephone') }}" id="" placeholder="Telephone number">
                                    @if ($errors->has('telephone'))

                                        <span class="">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="">Personal phone number<span style="color: red">*</span></label>
                                    <input required type="text" maxlength="20" onkeypress="return isNumberKey(event)"name="personalMobile" class="form-control {{ $errors->has('personalMobile') ? ' is-invalid' : '' }}" value="{{ old('personalMobile') }}" id="" placeholder="Personal mobile number">
                                    @if ($errors->has('personalMobile'))

                                        <span class="">
                                        <strong>{{ $errors->first('personalMobile') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Alternative phone no.</label>
                                    <input  type="text" maxlength="20" onkeypress="return isNumberKey(event)" name="alternativePhoneNo" class="form-control {{ $errors->has('alternativePhoneNo') ? ' is-invalid' : '' }}" value="{{ old('alternativePhoneNo') }}" id="" placeholder="Alternative no">
                                    @if ($errors->has('alternativePhoneNo'))

                                        <span class="">
                                        <strong>{{ $errors->first('alternativePhoneNo') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Home telephone</label>
                                    <input type="text" name="homeTelephone" onkeypress="return isNumberKey(event)" maxlength="20" class="form-control {{ $errors->has('homeTelephone') ? ' is-invalid' : '' }}" value="{{ old('homeTelephone') }}" id="" placeholder="Home telephone number">
                                    @if ($errors->has('homeTelephone'))

                                        <span class="">
                                        <strong>{{ $errors->first('homeTelephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Office telephone</label>
                                    <input type="text" maxlength="20" onkeypress="return isNumberKey(event)" name="officeTelephone" class="form-control {{ $errors->has('officeTelephone') ? ' is-invalid' : '' }}" value="{{ old('officeTelephone') }}" id="" placeholder="Office telephone number">
                                    @if ($errors->has('officeTelephone'))

                                        <span class="">
                                        <strong>{{ $errors->first('officeTelephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>






                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Current address<span style="color: red">*</span></label>
                                    <textarea required placeholder="Current Address" rows="3" name="currentAddress" class="form-control {{ $errors->has('currentAddress') ? ' is-invalid' : '' }}">{{ old('currentAddress') }}</textarea>
                                    {{--<input type="text" name="currentAddress" class="form-control {{ $errors->has('currentAddress') ? ' is-invalid' : '' }}" value="{{ old('currentAddress') }}" id="" placeholder="">--}}
                                    @if ($errors->has('currentAddress'))

                                        <span class="">
                                        <strong>{{ $errors->first('currentAddress') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>



                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="">Permanent address<span style="color: red">*</span></label>
                                    <textarea required placeholder="" rows="3" name="permanentAddress" class="form-control {{ $errors->has('permanentAddress') ? ' is-invalid' : '' }}">{{ old('permanentAddress') }}</textarea>
                                    {{--<input type="text" name="permanentAddress" class="form-control {{ $errors->has('permanentAddress') ? ' is-invalid' : '' }}" value="{{ old('permanentAddress') }}" id="" placeholder="">--}}
                                    @if ($errors->has('permanentAddress'))

                                        <span class="">
                                        <strong>{{ $errors->first('permanentAddress') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="">Please upload your updated picture</label>&nbsp;<notice>(Maximum Size 100Kb)</notice>
                                    <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                                    @if ($errors->has('image'))

                                        <span class="">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Signature</label>&nbsp;<notice>(Maximum size 50Kb)</notice>
                                    @if ($errors->has('sign'))

                                        <span class="">
                                        <strong>{{ $errors->first('sign') }}</strong>
                                    </span>
                                    @endif
                                    <input type="file" class="form-control" name="sign" id="sign" placeholder="Signature">

                                </div>

                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="submit" id="submitBtn">Save</button>
                                </div>
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

                    </form>

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