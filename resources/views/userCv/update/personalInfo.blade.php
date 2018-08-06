@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div class="card-body">

                    <form style="margin-top: 20px;width: 70%" id="regForm" action="">
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Personal Details </h2>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="firstName" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Fathers Name</label>
                                    <input type="text" name="fathersName" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mothers Name</label>
                                    <input type="text" name="mothersName" class="form-control" id="" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Gender</label>
                                    <select name="gender" class="form-control" id="sel1">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Religion</label>
                                    <select name="religion"class="form-control" id="sel1">
                                        <option>Muslim</option>
                                        <option>Hindu</option>
                                        <option>Christian</option>
                                        <option>Buddhist</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Ethnicity</label>
                                    <select name="ethnicity" class="form-control" id="sel1">
                                        <option>Bangali</option>
                                        <option>Adibashi</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Disability</label>
                                    <select name="disability" class="form-control" id="sel1">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Date of Birth</label>
                                    <input type="text" name="dob" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Skype</label>
                                    <input type="text" name="skype" class="form-control" id="" placeholder="">
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nationality</label>
                                    <select name="nationality" class="form-control" id="sel1">
                                        <option>Bangladeshi</option>
                                        <option>Others</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">NID </label>
                                    <input type="text" name="nId" class="form-control" id="" placeholder="">
                                </div>

                            </div>



                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Alternate Email</label>
                                    <input type="text" name="alternateEmail" class="form-control" id="" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Home Telephone</label>
                                    <input type="text" name="homeTelephone" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">office Telephone</label>
                                    <input type="text" name="officeTelephone" class="form-control" id="" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Telephone No.</label>
                                    <input type="text" name="telephone" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Personal Mobile</label>
                                    <input type="text" name="personalMobile" class="form-control" id="" placeholder="">
                                </div>
                            </div>




                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Current Address</label>
                                    <input type="text" name="currentAddress" class="form-control" id="" placeholder="">
                                </div>

                            </div>



                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="">Permanent Address</label>
                                    <input type="text" name="permanentAddress" class="form-control" id="" placeholder="">
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image" id="" placeholder="">
                                </div>

                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">

                                    <button type="button" id="submitBtn">Save</button>
                                    <a href="{{route('candidate.cvCareerObjective')}}"><button type="button" id="nextBtn">Next</button></a>
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
                        </div>

                    </form>

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