@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    <div id="regForm" >
                        <!-- One "tab" for each step in the form: -->


                        <div class="tab">

                            <h2 style="margin-bottom: 30px; text-align:center">Other Information</h2>


                            <div id="edit{{$empOtherInfo->id}}" class="row">


                                <div class="form-group col-md-10">

                                    <label for="">Extra Curricular Activities</label><br>
                                    {{$empOtherInfo->extraCurricularActivities}}
                                </div>

                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$empOtherInfo->id}})">
                                        <i class="fa fa-edit"></i></button>
                                </div>

                                <div class="form-group col-md-12">

                                    <label for="">Interests </label><br>
                                    {{$empOtherInfo->interests}}

                                </div>

                                <div class="form-group col-md-12">

                                    <label for="">Awards received</label><br>
                                    {{$empOtherInfo->awardReceived}}

                                </div>
                                <div class="form-group col-md-12">

                                    <label for="">Research / Publciation </label><br>
                                    {{$empOtherInfo->researchPublication}}

                                </div>

                                <div class="form-group col-md-12" style="overflow:auto;">
                                    <div style="float:right;">

                                        <a href="{{route('candidate.skill.index')}}"><button type="button" id="btnPevious">Back</button></a>

                                        <a href="{{route('candidate.cvTrainingCertificate')}}"><button type="button" id="nextBtn" >Next</button></a>

                                    </div>
                                </div>




                                <div class="form-group col-md-12">
                                    <!-- Circles which indicates the steps of the form: -->
                                    <div style="text-align:center;margin-top:40px;">
                                        <span class="step"></span>
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
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
            x[(n+1)].className += " active";
        }

        function editInfo(x) {
            //alert(x);
            $.ajax({
                type: 'POST',
                url: "{!! route('edit.OthersInfo') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': x},
                success: function (data) {


                    $("#nextBtn").hide();
                    $("#btnPevious").hide();

                    $('#edit'+x).html(data);


                }
            });
        }

    </script>



@endsection