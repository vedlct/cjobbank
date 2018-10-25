@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div class="card-body">

                    <form id="regForm" action="">
                        <!-- One "tab" for each step in the form: -->


                            <div class="tab">

                                <h2 style="margin-bottom: 40px; text-align: center;">Career Objective </h2>

                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" rows="5" id=""></textarea>
                                    </div>

                                </div>

                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">

                                    <button type="button" id="submitBtn">Save</button>
                                    <a href="{{route('candidate.cvEducation')}}"><button type="button" id="nextBtn" >Next</button></a>
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
            x[(n+1)].className += " active";
        }
    </script>



@endsection