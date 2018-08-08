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
                                    <select name="educationLevel[]" class="form-control" id="educationLevel">
                                        <option>Select Education Level</option>
                                        @foreach($educationLevel as $edulevel)
                                            <option value="{{$edulevel->educationLevelId}}">{{$edulevel->educationLevelName}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-8">

                                    <label for="">Degree</label>
                                    <select name="degree[]" class="form-control" id="degree">
                                        <option>Select Degree</option>

                                    </select>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Institute Name</label>
                                    <input type="text" name="instituteName[]" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Major</label>
                                    <select name="major[]" class="form-control" id="major">
                                        <option>Select Major</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Country</label>
                                    <select name="country[]" class="form-control" id="sel1">
                                        @foreach($country as $coun)
                                            <option value="{{$coun->countryId}}">{{$coun->countryName}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Year</label>
                                    <input name="passingYear[]" type="text" class="form-control" id="" placeholder="passing Year">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">CGPA</label>
                                    <input name="result[]" type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Out of</label>
                                    <input type="text" name="resultOutOf[]" class="form-control" id="" placeholder="CGPA Out of">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Status</label>
                                    <select name="status[]"class="form-control" id="sel1">
                                        @foreach(COMPLETING_STATUS as $key=>$value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>
                            <br>


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



    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@section('foot-js')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                newTextBoxDiv.after().html('<hr style="">'+'<div class="form-group col-md-4">'+

                '<label for="">Education Level</label>'+
                '<select name="educationLevel[]" class="form-control" id="educationLevel">'+
                    '<option>Select Education Level</option>'+
                @foreach($educationLevel as $edulevel)
                '<option value="{{$edulevel->educationLevelId}}">{{$edulevel->educationLevelName}}</option>'+
                        @endforeach
                    '</select>'+

                    '</div>'+
                    '<div class="form-group col-md-8">'+

                    '<label for="">Degree</label>'+
                    '<select name="degree[]" class="form-control" id="degree">'+
                    '<option>Select Degree</option>'+

                '</select>'+

                '</div>'+

                '<div class="form-group col-md-12">'+
                    '<label for="">Institute Name</label>'+
                '<input type="text" name="instituteName[]" class="form-control" id="" placeholder="">'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label for="">Major</label>'+
                    '<select name="major[]" class="form-control" id="major">'+
                    '<option>Select Major</option>'+
                '</select>'+
                '</div>'+

                '<div class="form-group col-md-6">'+
                    '<label for="">Country</label>'+
                   ' <select name="country[]" class="form-control" id="sel1">'+
                        @foreach($country as $coun)
                    '<option value="{{$coun->countryId}}">{{$coun->countryName}}</option>'+
                        @endforeach
                    '</select>'+
                   ' </div>'+

                    '<div class="form-group col-md-3">'+
                    '<label for="">Year</label>'+
                   ' <input name="passingYear[]" type="text" class="form-control" id="" placeholder="passing Year">'+
                   ' </div>'+
                   ' <div class="form-group col-md-3">'+
                    '<label for="">CGPA</label>'+
                    '<input name="result[]" type="text" class="form-control" id="" placeholder="">'+
                    '</div>'+
                    '<div class="form-group col-md-3">'+
                    '<label for="">Out of</label>'+
                '<input type="text" name="resultOutOf[]" class="form-control" id="" placeholder="CGPA Out of">'+
                    '</div>'+
                    '<div class="form-group col-md-3">'+
                    '<label for="">Status</label>'+
                    '<select name="status[]"class="form-control" id="sel1">'+
                        @foreach(COMPLETING_STATUS as $key=>$value)
                    '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach

                    '</select>'+
                    '</div>'
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

            $('#educationLevel').on('change', function() {

                $.ajax({
                    type:'POST',
                    url:'{{route('cv.getDegreeForEducation')}}',
                    data:{id:this.value},
                    cache: false,
                    success:function(data) {
                        document.getElementById("degree").innerHTML = data;

                    }
                });

            });
            $('#degree').on('change', function() {

                $.ajax({
                    type:'POST',
                    url:'{{route('cv.getMajorForEducation')}}',
                    data:{id:this.value},
                    cache: false,
                    success:function(data) {
                        document.getElementById("major").innerHTML = data;

                    }
                });

            });

        });

    </script>
    @endsection