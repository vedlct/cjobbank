@extends('main')

@section('content')
    
    
<style>


    .sidenav {
        height: 700px;
        width: 230px;
        position: absolute;
        z-index: 1;
        top: 2%;
        left: 13%;
        background-color: #424858;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav a {
        padding: 15px 8px 6px 16px;
        text-decoration: none;
        font-size: 18px;
        color: #B9B9B9;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .main {
        margin-left: 160px; /* Same as the width of the sidenav */
        font-size: 28px; /* Increased text to enable scrolling */
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>
    

    <div style="position: relative;" class="row ">
        
        <div class="sidenav">
            <a href="{{route('candidate.cvPersonalInfo')}}" class="active">Personal details</a>
            <a href="#">Education</a>
            <a href="#">Professional qualification</a>
            <a href="#">Training</a>
            <a href="#">Experience</a>
            <a href="#">Referee</a>
        </div>

        <div class="main">

        </div>

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    @foreach($employeeCvPersonalInfo as $personalInfo)
                        <form  id="regForm" enctype="multipart/form-data" method="post" action="{{route('cv.updatePersonalInfo')}}">

                        {{csrf_field()}}
                        <!-- One "tab" for each step in the form: -->
                            <div class="tab">

                                <h2 style="margin-bottom: 40px; text-align: center;">Personal Details </h2>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">First Name</label>
                                        <input type="text" name="firstName" class="form-control {{ $errors->has('firstName') ? ' is-invalid' : '' }}" value="{{ $personalInfo->firstName }}" id="" placeholder="">
                                        @if ($errors->has('firstName'))

                                            <span class="">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Last Name</label>
                                        <input type="text" name="lastName" class="form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}" value="{{$personalInfo->lastName}}" id="" placeholder="">
                                        @if ($errors->has('lastName'))

                                            <span class="">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Fathers Name</label>
                                        <input type="text" name="fathersName" class="form-control {{ $errors->has('fathersName') ? ' is-invalid' : '' }}" value="{{ $personalInfo->fathersName }}" id="" placeholder="">
                                        @if ($errors->has('fathersName'))

                                            <span class="">
                                        <strong>{{ $errors->first('fathersName') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mothers Name</label>
                                        <input type="text" name="mothersName" class="form-control {{ $errors->has('mothersName') ? ' is-invalid' : '' }}" value="{{ $personalInfo->mothersName }}" id="" placeholder="">
                                        @if ($errors->has('mothersName'))

                                            <span class="">
                                        <strong>{{ $errors->first('mothersName') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Gender</label>
                                        <select name="gender" class="form-control" id="sel1">
                                            @foreach(GENDER as $key=>$value)
                                                <option @if($personalInfo->gender == $value) selected @endif value="{{$value}}">{{$key}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Religion</label>
                                        <select name="religion"class="form-control" id="sel1">
                                            @foreach($religion as $reli)
                                                <option @if($personalInfo->fkreligionId == $reli->religionId) selected @endif value="{{$reli->religionId}}">{{$reli->religionName}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Ethnicity</label>
                                        <select name="ethnicity" class="form-control" id="sel1">
                                            @foreach($ethnicity as $ethi)
                                                <option @if($personalInfo->ethnicityId == $reli->ethnicityId) selected @endif value="{{$ethi->ethnicityId}}">{{$ethi->ethnicityName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Disability</label>
                                        <select name="disability" class="form-control" id="sel1">

                                            @foreach(DISABILITY as $key=>$value)
                                                <option @if($personalInfo->disability == $value) selected @endif value="{{$value}}">{{$key}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Date of Birth</label>
                                        <input type="text" name="dob" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{ $personalInfo->dateOfBirth }}" id="dob" placeholder="">
                                        @if ($errors->has('dob'))

                                            <span class="">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Skype</label>
                                        <input type="text" name="skype" class="form-control {{ $errors->has('skype') ? ' is-invalid' : '' }}" value="{{$personalInfo->skype }}" id="" placeholder="">
                                        @if ($errors->has('skype'))

                                            <span class="">
                                        <strong>{{ $errors->first('skype') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Nationality</label>
                                        <select name="nationality" class="form-control" id="sel1">
                                            @foreach($natinality as $natio)
                                                <option @if($personalInfo->fknationalityId == $natio->nationalityId ) selected @endif value="{{$natio->nationalityId}}">{{$natio->nationalityName}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">NID </label>
                                        <input type="text" name="nId" class="form-control {{ $errors->has('nId') ? ' is-invalid' : '' }}" value="{{ $personalInfo->nationalId }}" id="" placeholder="">
                                        @if ($errors->has('nId'))

                                            <span class="">
                                        <strong>{{ $errors->first('nId') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$personalInfo->email }}" id="" placeholder="">
                                        @if ($errors->has('email'))

                                            <span class="">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Alternate Email</label>
                                        <input type="text" name="alternateEmail" class="form-control {{ $errors->has('alternateEmail') ? ' is-invalid' : '' }}" value="{{$personalInfo->alternativeEmail }}" id="" placeholder="">
                                        @if ($errors->has('alternateEmail'))

                                            <span class="">
                                        <strong>{{ $errors->first('alternateEmail') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Home Telephone</label>
                                        <input type="text" name="homeTelephone" class="form-control {{ $errors->has('homeTelephone') ? ' is-invalid' : '' }}" value="{{ $personalInfo->homeNumber }}" id="" placeholder="">
                                        @if ($errors->has('homeTelephone'))

                                            <span class="">
                                        <strong>{{ $errors->first('homeTelephone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">office Telephone</label>
                                        <input type="text" name="officeTelephone" class="form-control {{ $errors->has('officeTelephone') ? ' is-invalid' : '' }}" value="{{$personalInfo->officeNumber }}" id="" placeholder="">
                                        @if ($errors->has('officeTelephone'))

                                            <span class="">
                                        <strong>{{ $errors->first('officeTelephone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Telephone No.</label>
                                        <input type="text" name="telephone" class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" value="{{ $personalInfo->telephone }}" id="" placeholder="">
                                        @if ($errors->has('telephone'))

                                            <span class="">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Personal Mobile</label>
                                        <input type="text" name="personalMobile" class="form-control {{ $errors->has('personalMobile') ? ' is-invalid' : '' }}" value="{{ $personalInfo->personalMobile }}" id="" placeholder="">
                                        @if ($errors->has('personalMobile'))

                                            <span class="">
                                        <strong>{{ $errors->first('personalMobile') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Current Address</label>
                                        <input type="text" name="currentAddress" class="form-control {{ $errors->has('currentAddress') ? ' is-invalid' : '' }}" value="{{$personalInfo->presentAddress }}" id="" placeholder="">
                                        @if ($errors->has('currentAddress'))

                                            <span class="">
                                        <strong>{{ $errors->first('currentAddress') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="">Permanent Address</label>
                                        <input type="text" name="permanentAddress" class="form-control {{ $errors->has('permanentAddress') ? ' is-invalid' : '' }}" value="{{$personalInfo->parmanentAddress }}" id="" placeholder="">
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
                                        @if($personalInfo->image != null)
                                            <div>
                                                <img style="width: 150px;height: 150px" src="{{url('public/candidateImages/thumb'."/".$personalInfo->image)}}">

                                            </div>
                                        @endif
                                    </div>

                                </div>

                                <div style="overflow:auto;">
                                    <div style="float:right;">

                                        <button type="submit" id="submitBtn">Save</button>
                                        <a href="{{route('candidate.cvEducation')}}"><button type="button" id="nextBtn">Next</button></a>
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
                    @endforeach

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

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



@endsection