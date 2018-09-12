@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    <form id="regForm" method="post" action="{{route('cv.insertPersonalEducation')}}">

                        {{csrf_field()}}

                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">

                            <h2 style="margin-bottom: 30px; text-align:center">Education </h2>

                            <div id="TextBoxesGroup" class="row">
                                <div class="form-group col-md-4">

                                    <label for="">Education Level<span style="color: red">*</span></label>
                                    <select name="educationLevel[]" class="form-control" required="" id="educationLevel">
                                        <option value="">Select Education Level</option>
                                        @foreach($educationLevel as $edulevel)
                                            <option value="{{$edulevel->educationLevelId}}">{{$edulevel->educationLevelName}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-8">

                                    <label for="">Degree<span style="color: red">*</span></label>
                                    <select  name="degree[]" class="form-control" required id="degree">
                                        <option value="">Select Degree</option>

                                    </select>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Institute Name<span style="color: red">*</span></label>
                                    <input type="text" name="instituteName[]" required class="form-control" id="instituteName" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Major</label>
                                    <select name="major[]" class="form-control" id="major">
                                        <option value="" >Select Major</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Country<span style="color: red">*</span></label>
                                    <select name="country[]" class="form-control" required id="country">
                                        <option value="">Select Country</option>
                                        @foreach($country as $coun)
                                            <option value="{{$coun->countryId}}">{{$coun->countryName}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="">Year<span style="color: red">*</span></label>
                                    <input name="passingYear[]" type="text" class="form-control date" id="passingYear" required placeholder="passing Year">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Result System<span style="color: red">*</span></label>
                                    <select name="resultSystem[]" class="form-control" required id="resultSydtem">
                                        <option value="">Select System</option>
                                        @foreach(RESULT_SYSTEM as $key=>$value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">CGPA<span style="color: red">*</span></label>
                                    <input name="result[]" type="text" class="form-control" required id="cgpa" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Out of</label>
                                    <input type="text" name="resultOutOf[]" class="form-control" id="resultOutOf" placeholder="CGPA Out of">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Status<span style="color: red">*</span></label>
                                    <select name="status[]"class="form-control" required id="educationStatus">
                                        <option value="">Select Status</option>
                                        @foreach(COMPLETING_STATUS as $key=>$value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>
                            <br>


                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <a href="{{route('candidate.cvPersonalInfo')}}"><button type="button" id="btnPevious">Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>

                                {{--<a href="{{route('candidate.cvProfessionalCertificate')}}"><button type="button" id="nextBtn">Next</button></a>--}}
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



    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@section('foot-js')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.date').datepicker({
            viewMode: "years",
            minViewMode: "years",
            format: 'yyyy'
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

            $("#removeButton").hide();
            $("#btnPevious").show();
            $("#submitBtn").show();

            var counter = 1;



            $("#addButton").click(function () {

                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter == 1 ){
                    var educationLevel=$('#educationLevel').val();
                    var degree=$('#degree').val();
                    var instituteName=$('#instituteName').val();
//                    var major=$('#major').val();
                    var country=$('#country').val();
                    var year=$('#passingYear').val();
                    var resultSydtem=$('#resultSydtem').val();
                    var cgpa=$('#cgpa').val();
//                    var resultOutOf=$('#resultOutOf').val();
                    var status=$('#educationStatus').val();

                    if(educationLevel==""){

                        var errorMsg='Please Select a Education Level First!!'
                       validationError(errorMsg)
                        return false;
                    }
                    if(degree==""){

                        var errorMsg='Please Select Degree First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(instituteName==""){

                        var errorMsg='Please Type instituteName First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (instituteName.length > 255){

                        var errorMsg='Institute Name Should not more than 255 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(country==""){

                        var errorMsg='Please Select a Country First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(year==""){

                        var errorMsg='Please Select a Year First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(resultSydtem==""){

                        var errorMsg='Please Select a Result System First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(cgpa==""){

                        var errorMsg='Please Type Your Result/CGPA First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(status==""){

                        var errorMsg='Please Select a status First!!'
                        validationError(errorMsg)
                        return false;

                    }



                }
                else {

                    var educationLevel=$('#educationLevel'+(counter-1)).val();
                    var degree=$('#degree'+(counter-1)).val();
                    var instituteName=$('#instituteName'+(counter-1)).val();
//                    var major=$('#major'+(counter-1)).val();
                    var country=$('#country'+(counter-1)).val();
                    var year=$('#passingYear'+(counter-1)).val();
                    var resultSydtem=$('#resultSydtem'+(counter-1)).val();
                    var cgpa=$('#cgpa'+(counter-1)).val();
//                    var resultOutOf=$('#resultOutOf'+(counter-1)).val();
                    var status=$('#educationStatus'+(counter-1)).val();

                    if(educationLevel==""){

                        var errorMsg='Please Select a Education Level First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if(degree==""){

                        var errorMsg='Please Select Degree First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(instituteName==""){

                        var errorMsg='Please Type instituteName First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (instituteName.length > 255){

                        var errorMsg='Institute Name Should not more than 255 Charecter Length!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if(country==""){

                        var errorMsg='Please Select a Country First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(year==""){

                        var errorMsg='Please Select a Year First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(resultSydtem==""){

                        var errorMsg='Please Select a Result System First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(cgpa==""){

                        var errorMsg='Please Type Your Result/CGPA First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(status==""){

                        var errorMsg='Please Select a status First!!'
                        validationError(errorMsg)
                        return false;

                    }


                }


                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html('<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'
                    +'<div class="form-group col-md-4">'+
                '<label for="">Education Level<span style="color: red">*</span></label>'+
                '<select name="educationLevel[]" class="form-control" data-panel-id="'+ counter+'" required onchange="getDegree(this)"id="educationLevel'+counter+'">'+
                    '<option value="">Select Education Level</option>'+
                @foreach($educationLevel as $edulevel)
                '<option value="{{$edulevel->educationLevelId}}">{{$edulevel->educationLevelName}}</option>'+
                        @endforeach
                    '</select>'+

                    '</div>'+
                    '<div class="form-group col-md-8">'+

                    '<label for="">Degree<span style="color: red">*</span></label>'+
                    '<select name="degree[]" class="form-control" data-panel-id="'+ counter+'" required onchange="getMajor(this)" id="degree'+counter+'">'+
                    '<option value="">Select Degree</option>'+

                '</select>'+

                '</div>'+

                '<div class="form-group col-md-12">'+
                    '<label for="">Institute Name<span style="color: red">*</span></label>'+
                '<input type="text" name="instituteName[]" class="form-control" required id="instituteName'+counter+'" placeholder="">'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label for="">Major</label>'+
                    '<select name="major[]" class="form-control"  id="major'+counter+'">'+
                    '<option value="">Select Major</option>'+
                '</select>'+
                '</div>'+

                '<div class="form-group col-md-3">'+
                    '<label for="">Country<span style="color: red">*</span></label>'+
                   ' <select name="country[]" class="form-control" required id="country'+counter+'">'+
                    '<option value="">Select Country</option>'+
                        @foreach($country as $coun)
                    '<option value="{{$coun->countryId}}">{{$coun->countryName}}</option>'+
                        @endforeach
                    '</select>'+
                   ' </div>'+

                    '<div class="form-group col-md-3">'+
                    '<label for="">Year<span style="color: red">*</span></label>'+
                   ' <input name="passingYear[]" type="text" class="form-control date" required id="passingYear'+counter+'" placeholder="passing Year">'+
                   ' </div>'+
                    '<div class="form-group col-md-3">'+
                    '<label for="">Result System<span style="color: red">*</span></label>'+
                '<select name="resultSystem[]" class="form-control" required id="resultSydtem'+counter+'">'+
                    '<option value="">Select System</option>'+
                @foreach(RESULT_SYSTEM as $key=>$value)
                '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach
                    '</select>'+
                    '</div>'+
                   ' <div class="form-group col-md-3">'+
                    '<label for="">CGPA<span style="color: red">*</span></label>'+
                    '<input name="result[]" type="text" class="form-control" id="cgpa'+counter+'" required  placeholder="">'+
                    '</div>'+
                    '<div class="form-group col-md-3">'+
                    '<label for="">CGPA Out of</label>'+
                '<input type="text" name="resultOutOf[]" class="form-control" id="resultOutOf'+counter+'" placeholder="CGPA Out of">'+
                    '</div>'+
                    '<div class="form-group col-md-3">'+
                    '<label for="">Status<span style="color: red">*</span></label>'+
                    '<select name="status[]"class="form-control" required id="educationStatus'+counter+'">'+
                    '<option value="">Select Status</option>'+
                        @foreach(COMPLETING_STATUS as $key=>$value)
                    '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach

                    '</select>'+
                    '</div>'
                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");
                $('.date').datepicker({
                    viewMode: "years",
                    minViewMode: "years",
                    format: 'yyyy'
                });

                if(counter>=1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                    $("#submitBtn").show();
                    $("#btnPevious").show();

                }

                counter++;
            });

            $("#removeButton").click(function () {
                if(counter=='1'){
                    alert("Atleast One Course Section is needed!!");
                    return false;
                }
                if(counter<=2){
                    $("#removeButton").hide();

                }
                counter--;
                $("#TextBoxDiv" + counter).remove();
            });







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

        function getDegree(x){

            btn = $(x).data('panel-id');
            var educationLavel=document.getElementById("educationLevel"+btn).value;
            $.ajax({
                type:'POST',
                url:'{{route('cv.getDegreeForEducation')}}',
                data:{id:educationLavel},
                cache: false,
                success:function(data) {
                    document.getElementById("degree"+btn).innerHTML = data;

                }
            });

        }
        function getMajor(x){

            btn = $(x).data('panel-id');
            var degree=document.getElementById("degree"+btn).value;

            $.ajax({
                type:'POST',
                url:'{{route('cv.getMajorForEducation')}}',
                data:{id:degree},
                cache: false,
                success:function(data) {
                    document.getElementById("major"+btn).innerHTML = data;

                }
            });

        }
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



    </script>
    @endsection