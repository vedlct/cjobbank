@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    <form id="regForm" action="">
                        <!-- One "tab" for each step in the form: -->


                        <div class="tab">

                            <h2 style="margin-bottom: 30px; text-align:center">Education </h2>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4>SSC</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="">Institute name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Group</label>
                                    <select class="form-control" id="sel1">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">CGPA</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4 style="margin-top:30px; ">HSC</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="">Institute name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Group</label>
                                    <select class="form-control" id="">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">CGPA</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4 style="margin-top:30px; ">Undergrade</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="">Institute name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Department</label>
                                    <select class="form-control" id="">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">CGPA</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>


                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4 style="margin-top:30px; ">Masters</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="">Institute name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Department</label>
                                    <select class="form-control" id="">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">CGPA</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>

                            <button type="button" class="btn btn-success">Add More</button>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <button type="button" id="submitBtn">Save</button>
                                <a href="{{route('candidate.cvProfessionalCertificate')}}"><button type="button" id="nextBtn">Next</button></a>
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
            x[(n+2)].className += " active";
        }
    </script>



@endsection