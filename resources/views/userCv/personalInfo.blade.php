@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div class="card-body">

                    <form id="regForm" action="">
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Personal Details </h2>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Fathers Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mothers Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Gender</label>
                                    <select class="form-control" id="sel1">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Religion</label>
                                    <select class="form-control" id="sel1">
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
                                    <select class="form-control" id="sel1">
                                        <option>Bangali</option>
                                        <option>Adibashi</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Disability</label>
                                    <select class="form-control" id="sel1">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Date of Birth</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Skype</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nationality</label>
                                    <select class="form-control" id="sel1">
                                        <option>Bangladeshi</option>
                                        <option>Others</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">NID </label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>



                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Contact No.</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>




                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Current Address</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>



                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="">Permanent Address</label>
                                    <input type="text" class="form-control" id="" placeholder="">
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

//        function showTab(n) {
//            // This function will display the specified tab of the form...
//            var x = document.getElementsByClassName("tab");
//            x[n].style.display = "block";
//            //... and fix the Previous/Next buttons:
//            if (n == 0) {
//                document.getElementById("prevBtn").style.display = "none";
//            } else {
//                document.getElementById("prevBtn").style.display = "inline";
//            }
//            if (n == (x.length - 1)) {
//                document.getElementById("nextBtn").innerHTML = "Submit";
//            } else {
//                document.getElementById("nextBtn").innerHTML = "Next";
//            }
//            //... and run a function that will display the correct step indicator:
//            fixStepIndicator(n)
//        }

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