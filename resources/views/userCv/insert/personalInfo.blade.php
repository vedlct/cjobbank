@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    <form  id="regForm" enctype="multipart/form-data" method="post" action="{{route('cv.insertPersonalInfo')}}">

                        {{csrf_field()}}
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Personal Details </h2>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">First Name<span style="color: red">*</span></label>
                                    <input type="text" name="firstName" class="form-control {{ $errors->has('firstName') ? ' is-invalid' : '' }}" value="{{ old('firstName') }}" id="" required placeholder="First Name">
                                    @if ($errors->has('firstName'))

                                        <span class="">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last Name<span style="color: red">*</span></label>
                                    <input type="text" name="lastName" class="form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}" value="{{ old('lastName') }}" id="" required placeholder="Last Name">
                                    @if ($errors->has('lastName'))

                                        <span class="">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Fathers Name<span style="color: red">*</span></label>
                                    <input type="text" name="fathersName" class="form-control {{ $errors->has('fathersName') ? ' is-invalid' : '' }}" value="{{ old('fathersName') }}" id="" required placeholder="Father's Name">
                                    @if ($errors->has('fathersName'))

                                        <span class="">
                                        <strong>{{ $errors->first('fathersName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mothers Name<span style="color: red">*</span></label>
                                    <input type="text" name="mothersName" class="form-control {{ $errors->has('mothersName') ? ' is-invalid' : '' }}" value="{{ old('mothersName') }}" required id="" placeholder="Mother's Name">
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
                                        <option selected value="">Select Gender</option>
                                        @foreach(GENDER as $key=>$value)
                                        <option value="{{$value}}">{{$key}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Religion<span style="color: red">*</span></label>
                                    <select required name="religion"class="form-control" id="sel1">
                                        <option selected value="">Select Religion</option>
                                        @foreach($religion as $reli)
                                        <option value="{{$reli->religionId}}">{{$reli->religionName}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Ethnicity<span style="color: red">*</span></label>
                                    <select required name="ethnicity" class="form-control" id="sel1">
                                        <option selected value="">Select Ethnicity</option>
                                        @foreach($ethnicity as $ethi)
                                            <option value="{{$ethi->ethnicityId}}">{{$ethi->ethnicityName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Disability<span style="color: red">*</span></label>
                                    <select required name="disability" class="form-control" id="sel1">
                                        <option selected value="">Select Disability</option>
                                        @foreach(DISABILITY as $key=>$value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Date of Birth<span style="color: red">*</span></label>
                                    <input type="text" name="dob" required class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{ old('dob') }}" id="dob" placeholder="Date of Birth">
                                    @if ($errors->has('dob'))

                                        <span class="">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Skype<span style="color: red">*</span></label>
                                    <input type="text" name="skype" required class="form-control {{ $errors->has('skype') ? ' is-invalid' : '' }}" value="{{ old('skype') }}" id="" placeholder="Skype Id">
                                    @if ($errors->has('skype'))

                                        <span class="">
                                        <strong>{{ $errors->first('skype') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nationality<span style="color: red">*</span></label>
                                    <select required name="nationality" class="form-control" id="sel1">
                                        <option selected value="">Select Nationality</option>
                                        @foreach($natinality as $natio)
                                            <option value="{{$natio->nationalityId}}">{{$natio->nationalityName}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">NID<span style="color: red">*</span></label>
                                    <input type="text" required name="nId" class="form-control {{ $errors->has('nId') ? ' is-invalid' : '' }}" value="{{ old('nId') }}" id="" placeholder="National Id">
                                    @if ($errors->has('nId'))

                                        <span class="">
                                        <strong>{{ $errors->first('nId') }}</strong>
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
                                    <label for="">Alternate Email<span style="color: red">*</span></label>
                                    <input type="text" name="alternateEmail" required class="form-control {{ $errors->has('alternateEmail') ? ' is-invalid' : '' }}" value="{{ old('alternateEmail') }}" id="" placeholder="Alternate Email">
                                    @if ($errors->has('alternateEmail'))

                                        <span class="">
                                        <strong>{{ $errors->first('alternateEmail') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Home Telephone<span style="color: red">*</span></label>
                                    <input type="text" name="homeTelephone" required class="form-control {{ $errors->has('homeTelephone') ? ' is-invalid' : '' }}" value="{{ old('homeTelephone') }}" id="" placeholder="Home Telephone Number">
                                    @if ($errors->has('homeTelephone'))

                                        <span class="">
                                        <strong>{{ $errors->first('homeTelephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Office Telephone<span style="color: red">*</span></label>
                                    <input type="text" required name="officeTelephone" class="form-control {{ $errors->has('officeTelephone') ? ' is-invalid' : '' }}" value="{{ old('officeTelephone') }}" id="" placeholder="Office Telephone Number">
                                    @if ($errors->has('officeTelephone'))

                                        <span class="">
                                        <strong>{{ $errors->first('officeTelephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Telephone No.<span style="color: red">*</span></label>
                                    <input type="text" required name="telephone" class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" value="{{ old('telephone') }}" id="" placeholder="Telephone number">
                                    @if ($errors->has('telephone'))

                                        <span class="">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Personal Mobile<span style="color: red">*</span></label>
                                    <input type="text" name="personalMobile" class="form-control {{ $errors->has('personalMobile') ? ' is-invalid' : '' }}" value="{{ old('personalMobile') }}" id="" placeholder="Personal Mobile Number">
                                    @if ($errors->has('personalMobile'))

                                        <span class="">
                                        <strong>{{ $errors->first('personalMobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Current Address<span style="color: red">*</span></label>
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
                                    <label for="">Permanent Address<span style="color: red">*</span></label>
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

                                <div class="form-group col-md-12">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image" id="" placeholder="">
                                    @if ($errors->has('image'))

                                        <span class="">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">

                                    <button type="submit" id="submitBtn">Save</button>
                                    {{--<a href="{{route('candidate.cvEducation')}}"><button type="button" id="nextBtn">Next</button></a>--}}
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
        });



    </script>


@endsection