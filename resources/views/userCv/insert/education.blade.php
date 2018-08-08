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

                            <div id="TextBoxesGroup" class="row">
                                <div class="form-group col-md-4">

                                    <label for="">Education Level</label>
                                    <select class="form-control" id="sel1">
                                        <option>Select Education Level</option>
                                        <option>SSC</option>
                                        <option>HSC</option>
                                        <option>BSc</option>
                                        <option>MS</option>
                                        <option>PhD</option>
                                    </select>

                                </div>
                                <div class="form-group col-md-8">

                                    <label for="">Degree</label>
                                    <select class="form-control" id="sel1">
                                        <option>BSc in Software Engineer</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Institute Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Major</label>
                                    <select class="form-control" id="sel1">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Country</label>
                                    <select class="form-control" id="sel1">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" id="" placeholder="passing Year">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">CGPA</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Out of</label>
                                    <input type="text" class="form-control" id="" placeholder="CGPA Out of">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Status</label>
                                    <select class="form-control" id="sel1">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>


                            </div><br>


                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
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

        $(document).ready(function(){

            var counter = 2;


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }


                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html('<div class="form-group col-md-4">'+

                    '<label for="">Degree</label>'+
                    '<select class="form-control" id="sel1">'+
                    '<option>Science</option>'+
                    '<option>Arts</option>'+
                    '<option>Commerce</option>'+
                    '</select>'+

                    '</div>'+
                    '<div class="form-group col-md-3">'+
                    '<label for="">Major</label>'+
                    '<select class="form-control" id="sel1">'+
                    '<option>Science</option>'+
                    '<option>Arts</option>'+
                    '<option>Commerce</option>'+
                    '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-5">'+
                    '<label for="">Institute Name</label>'+
                    '<input type="text" class="form-control" id="" placeholder="">'+
                    '</div>'+

                    '<div class="form-group col-md-3">'+
                    '<label for="">Year</label>'+
                    '<input type="text" class="form-control" id="" placeholder="passing Year">'+
                    '</div>'+
                    '<div class="form-group col-md-2">'+
                    '<label for="">CGPA</label>'+
                    '<input type="text" class="form-control" id="" placeholder="">'+
                    '</div>'+
                    '<div class="form-group col-md-2">'+
                    '<label for="">Out of</label>'+
                    '<input type="text" class="form-control" id="" placeholder="CGPA Out of">'+
                    '</div>'+
                    '<div class="form-group col-md-2">'+
                    '<label for="">Status</label>'+
                    '<select class="form-control" id="sel1">'+
                    '<option>Science</option>'+
                    '<option>Arts</option>'+
                    '<option>Commerce</option>'+
                    '</select>'+
                    '</div>'+

                    '<div class="form-group col-md-3">'+
                    '<label for="">Country</label>'+
                    '<select class="form-control" id="sel1">'+
                    '<option>Science</option>'+
                    '<option>Arts</option>'+
                    '<option>Commerce</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+'<hr>'
                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
            });

            $("#removeButton").click(function () {
                if(counter=='2'){
                    alert("Atleast One Course Section is needed!!");
                    return false;
                }
                counter--;
                $("#TextBoxDiv" + counter).remove();
            });

        });

    </script>
    @endsection