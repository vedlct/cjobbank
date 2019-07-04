@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card updateCard">
                <div class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal details</a>
                            <a href="{{route('candidate.cvQuesObj')}}">Career objective and application information</a>
                            <a href="{{route('candidate.cvEducation')}}" class="activeNav">Education</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.language.index')}}">Language</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.computerSkill.index')}}">Computer-skill</a>
                            {{--<a onclick="return false;" class="incomplete" href="{{route('candidate.skill.index')}}">Other Skill Information</a>--}}
                            <a onclick="return false;" class="incomplete" href="{{route('cv.OthersInfo')}}">Other information</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('JobExperience.index')}}">Job experience</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in caritas bangladesh</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in caritas bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" method="post" action="{{route('cv.insertPersonalEducation')}}">

                        {{csrf_field()}}

                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">

                            <h2 style="margin-bottom: 30px; text-align:center">Education </h2>

                            <div id="TextBoxesGroup" class="row">
                                <div class="form-group col-md-4">

                                    <label for="">Education exam/level<span style="color: red">*</span></label>
                                    <select name="educationLevel[]" class="form-control" required="" id="educationLevel">
                                        <option value="">Select education exam/level</option>
                                        @foreach($educationLevel as $edulevel)
                                            <option value="{{$edulevel->educationLevelId}}">{{$edulevel->educationLevelName}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-8">

                                    <label for="">Subject/Group<span style="color: red">*</span></label>
                                    <select  name="degree[]" class="form-control" required id="degree">
                                        <option value="">Select degree</option>
                                    </select>

                                </div>

                                <div style="display: none" id="degreeNameDiv" class="form-group col-md-12">
                                    <label for="">Degree name</label>
                                    <input type="text" maxlength="255" name="degreeName[]" class="form-control" id="degreeName"  placeholder="Degree name">

                                </div>


                                <div id="instituteNameDiv" class="form-group col-md-12">
                                    <label for="">School/College/Institution name <span style="color: red">*</span></label>
                                    <input type="text" name="instituteName[]" class="form-control" id="instituteName" placeholder="Institute name" required>
                                </div>
                                <div id="boardDiv" class="form-group col-md-3">
                                    <label for="">Board/University</label>
                                    <select name="board[]" class="form-control" id="board">
                                        <option value="" >Select board</option>
                                        @foreach($boards as $board)
                                            <option value="{{$board->boardId}}" >{{$board->boardName}}</option>
                                        @endforeach
                                        <option value="{{OTHERS}}" >{{OTHERS}}</option>
                                    </select>
                                </div>
                                <div style="display: none" id="boardNameDiv" class="form-group col-md-3">
                                    <label for="">Board name</label>
                                    <input type="text" maxlength="255" name="boardName[]" class="form-control" id="boardName"  placeholder="Board name">

                                </div>


                                <div style="display: none" id="universityTypeDiv" class="form-group col-md-3">
                                    <label for="">University type</label>
                                    <select name="universityType[]" class="form-control" id="universityType">
                                        <option value="" >Select type</option>
                                        @foreach(UNIVERSITY_TYPE as $key=>$value)
                                            <option value="{{$value}}" >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="">Major</label>
                                    <select name="major[]" class="form-control js-example-basic-single" id="majorSub">
                                        <option value="" >Select major</option>
                                        <option value="{{OTHERS}}" >{{OTHERS}}</option>
                                    </select>
                                </div>
                                <div style="display: none" id="subjectNameDiv" class="form-group col-md-6">
                                    <label for="">Subject name</label>
                                    <input type="text" maxlength="255" name="subjectName[]" class="form-control" id="subjectName"  placeholder="Subject name">

                                </div>



                                <div class="form-group col-md-3">
                                    <label for="">Country<span style="color: red">*</span></label>
                                    <select name="country[]" class="form-control js-example-basic-single" required id="country">
                                        <option value="">Select country</option>
                                        @foreach($country as $coun)
                                            <option value="{{$coun->countryId}}">{{$coun->countryName}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Status<span style="color: red">*</span></label>
                                    <select  name="status[]"class="form-control" required id="educationStatus">
                                        <option value="">Select status</option>
                                        @foreach(COMPLETING_STATUS as $key=>$value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <div class="form-group col-md-3">

                                    <label for="">Passing year</label>
                                    <input name="passingYear[]" type="text" class="form-control date" id="passingYear"  placeholder="passing year">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Result system<span style="color: red">*</span></label>
                                    <select name="resultSystem[]" class="form-control" required id="resultSydtem">
                                        <option value="">Select system</option>
                                        @foreach(RESULT_SYSTEM as $key=>$value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                        <option value="{{OTHERS}}" >{{OTHERS}}</option>
                                    </select>
                                </div>

                                <div style="display: none" id="resultSydtemNameDiv" class="form-group col-md-3">
                                    <label for="">Result system name</label>
                                    <input type="text" maxlength="255" name="resultSydtemName[]" class="form-control" id="resultSydtemName"  placeholder="Result system name">

                                </div>

                                <div class="form-group col-md-3">

                                    <label for="">Result/CGPA/Score</label>
                                    <input name="result[]" type="text" class="form-control"  id="cgpa" maxlength="10" placeholder="CGPA">

                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Scale/ Out of</label>
                                    <input type="text" name="resultOutOf[]" class="form-control" id="resultOutOf" placeholder="CGPA out of">
                                </div>



                            </div>
                            <br>


                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <a href="{{route('candidate.cvQuesObj')}}"><button type="button" id="btnPevious">Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                {{--<a href="{{route('candidate.language.index')}}"><button type="button" id="nextBtn" >Next</button></a>--}}
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

        $('#majorSub').on('change', function() {

            var major =$('#majorSub').val();
            if (major == "{{OTHERS}}"){

                $("#subjectNameDiv").show();
            }else {
                $("#subjectNameDiv").hide();
            }


        });
        $('#educationStatus').on('change', function() {

            var educationStatus =$('#educationStatus').val();

            if (educationStatus == '{{COMPLETING_STATUS['On going']}}'){

                $("#cgpa").prop('required',false);
                $("#passingYear").prop('required',false);

            }else {

                $("#cgpa").prop('required',true);
                $("#passingYear").prop('required',true);
            }


        });

        function checkMajor(x) {



            var major =$('#majorSub'+x).val();
            if (major == "{{OTHERS}}"){

                $("#subjectNameDiv"+x).show();
            }else {
                $("#subjectNameDiv"+x).hide();
            }

        }


        function checkeducationStatus(x) {

            var educationStatus =$('#educationStatus'+x).val();

            if (educationStatus == '{{COMPLETING_STATUS['On going']}}'){

                $("#cgpa"+x).prop('required',false);
                $("#passingYear"+x).prop('required',false);

            }else {

                $("#cgpa"+x).prop('required',true);
                $("#passingYear"+x).prop('required',true);
            }


        }




        $(document).ready(function(){

            $("#removeButton").hide();
            $("#btnPevious").show();
            $("#submitBtn").show();





            var counter = 1;

//            $('#majorSub'+(counter)).on('change', function() {
//
//                alert(1);
//
//                var major =$('#majorSub'+(counter)).val();
//                if (major == "{{OTHERS}}"){
//
//                    $("#subjectNameDiv"+(counter)).show();
//                }else {
//                    $("#subjectNameDiv"+(counter)).hide();
//                }
//
//
//            });



            $("#addButton").click(function () {

                if(counter>10){
                    alert("Only 10 section allow per time!!");
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

                    var major=$('#majorSub').val();
                    var universityType=$('#universityType').val();

                    if(major=="{{OTHERS}}" && $("#subjectName").val()=="" ){
                        var errorMsg='Please type a subject name first!!'
                        validationError(errorMsg);
                        return false;
                    }

                    if(educationLevel==""){

                        var errorMsg='Please select a education level first!!'
                       validationError(errorMsg)
                        return false;
                    }
                    if(degree==""){

                        var errorMsg='Please select degree first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(instituteName!="") {
                        if (instituteName == "") {

                            var errorMsg = 'Please type institute name first!!'
                            validationError(errorMsg)
                            return false;

                        }
                        if (instituteName.length > 255) {

                            var errorMsg = 'Institute name should not more than 255 charecter length!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }
                    if(universityType!="") {
                        if (universityType == "") {

                            var errorMsg = 'Please type university type first!!';
                            validationError(errorMsg);
                            return false;

                        }

                    }
                    if(country==""){

                        var errorMsg='Please select a country first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(year!="") {
                        if (year == "") {

                            var errorMsg = 'Please select a year first!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }
                    if(resultSydtem==""){

                        var errorMsg='Please select a result system first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(cgpa!="") {
                        if (cgpa == "") {

                            var errorMsg = 'Please type your result/CGPA first!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }
                    if(status==""){

                        var errorMsg='Please select a status first!!'
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

                    var major=$('#majorSub'+(counter-1)).val();
                    var universityType=$('#universityType'+(counter-1)).val();

                    if(major=="{{OTHERS}}" && $("#subjectName"+(counter-1)).val()=="" ){
                        var errorMsg='Please Type a Subject Name First!!'
                        validationError(errorMsg);
                        return false;
                    }



                    if(educationLevel==""){

                        var errorMsg='Please select a education level first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if(degree==""){

                        var errorMsg='Please select degree first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(instituteName!="") {
                        if (instituteName == "") {

                            var errorMsg = 'Please type instituteName first!!'
                            validationError(errorMsg)
                            return false;

                        }
                        if (instituteName.length > 255) {

                            var errorMsg = 'Institute name should not more than 255 charecter length!!'
                            validationError(errorMsg)
                            return false;
                        }
                    }
                    if(universityType!="") {
                        if (universityType == "") {

                            var errorMsg = 'Please type universityType first!!';
                            validationError(errorMsg);
                            return false;

                        }

                    }
                    if(country==""){

                        var errorMsg='Please select a country first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(year!="") {
                        if (year == "") {

                            var errorMsg = 'Please select a year first!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }
                    if(resultSydtem==""){

                        var errorMsg='Please select a result system first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(cgpa!="") {
                        if (cgpa == "") {

                            var errorMsg = 'Please type your result/CGPA first!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }
                    if(status==""){

                        var errorMsg='Please select a status first!!'
                        validationError(errorMsg)
                        return false;

                    }


                }


                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html('<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'
                    +'<div class="form-group col-md-4">'+
                '<label for="">Education level<span style="color: red">*</span></label>'+
                '<select name="educationLevel[]" class="form-control" data-panel-id="'+ counter+'" required onchange="getDegree(this)"id="educationLevel'+counter+'">'+
                    '<option value="">Select education level</option>'+
                @foreach($educationLevel as $edulevel)
                '<option value="{{$edulevel->educationLevelId}}">{{$edulevel->educationLevelName}}</option>'+
                        @endforeach
                    '</select>'+

                    '</div>'+
                    '<div class="form-group col-md-8">'+

                    '<label for="">Degree<span style="color: red">*</span></label>'+
                    '<select name="degree[]" class="form-control" data-panel-id="'+ counter+'" required onchange="getMajor(this)" id="degree'+counter+'">'+
                    '<option value="">Select degree</option>'+

                '</select>'+

                '</div>'+
                    '<div style="display: none" id="degreeNameDiv'+ counter+'" class="form-group col-md-12">'+
                    '<label for="">Degree name</label>'+
                '<input type="text" maxlength="255" name="degreeName[]" class="form-control" id="degreeName'+ counter+'"  placeholder="Degree name">'+

                    '</div>'+

                '<div id="instituteNameDiv'+counter+'" class="form-group col-md-12">'+
                    '<label for="">Institution<span style="color: red">*</span></label>'+
                '<input type="text" name="instituteName[]" class="form-control" required  id="instituteName'+counter+'" placeholder="Institute name">'+
                    '</div>'+
                    '<div style="display: none" id="universityTypeDiv'+counter+'" class="form-group col-md-3">'+
                    '<label for="">University type</label>'+
                '<select name="universityType[]" class="form-control" id="universityType'+counter+'">'+
                    '<option value="" >Select type</option>'+
                @foreach(UNIVERSITY_TYPE as $key=>$value)
                '<option value="{{$value}}" >{{$key}}</option>'+
                        @endforeach
                    '</select>'+
                    '</div>'+
                    '<div id="boardDiv'+counter+'"  class="form-group col-md-3">'+
                    '<label for="">Board</label>' +
                    '<select name="board[]" class="form-control" onchange="getBoardName('+counter+')" id="board'+counter+'"> ' +
                    '<option value="" >Select board</option>'+
                        @foreach($boards as $board)
                            '<option value="{{$board->boardId}}" >{{$board->boardName}}</option>'+
                        @endforeach
                    '<option value="{{OTHERS}}" >{{OTHERS}}</option>'+
                            '</select>' +
                    '</div>'+

                    '<div style="display: none" id="boardNameDiv'+counter+'" class="form-group col-md-3">'+
                    '<label for="">Board name</label>'+
                '<input type="text" maxlength="255" name="boardName[]" class="form-control" id="boardName'+counter+'"  placeholder="">'+

                    '</div>'+


                    '<div class="form-group col-md-9">'+
                    '<label for="">Major</label>'+
                    '<select name="major[]" class="form-control js-example-basic-single" onchange="checkMajor('+counter+')" id="majorSub'+counter+'">'+
                    '<option value="">Select major</option>'+
                    '<option value="{{OTHERS}}" >{{OTHERS}}</option>'+
                '</select>'+
                '</div>'+
                    '<div style="display: none" id="subjectNameDiv'+counter+'" class="form-group col-md-6">'+
                    '<label for="">Subject name</label>'+
                '<input type="text" maxlength="255" name="subjectName[]" class="form-control" id="subjectName'+counter+'"  placeholder="Subject name">'+

                    '</div>'+


                '<div class="form-group col-md-3">'+
                    '<label for="">Country<span style="color: red">*</span></label>'+
                   ' <select name="country[]" class="form-control js-example-basic-single" required id="country'+counter+'">'+
                    '<option value="">Select country</option>'+
                        @foreach($country as $coun)
                    '<option value="{{$coun->countryId}}">{{$coun->countryName}}</option>'+
                        @endforeach
                    '</select>'+
                   ' </div>'+

                    '<div class="form-group col-md-3">'+
                    '<label for="">Status<span style="color: red">*</span></label>'+
                    '<select name="status[]"class="form-control" onchange="checkeducationStatus('+counter+')" required id="educationStatus'+counter+'">'+
                    '<option value="">Select status</option>'+
                        @foreach(COMPLETING_STATUS as $key=>$value)
                            '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach

                            '</select>'+
                    '</div>'+

                    '<div class="form-group col-md-3">'+
                    '<label for="">Passing year</label>'+
                   ' <input name="passingYear[]" type="text" class="form-control date"  id="passingYear'+counter+'" placeholder="passing year">'+
                   ' </div>'+
                    '<div class="form-group col-md-3">'+
                    '<label for="">Result system<span style="color: red">*</span></label>'+
                '<select name="resultSystem[]" class="form-control" onchange="getResultSystemName('+counter+')" required id="resultSydtem'+counter+'">'+
                    '<option value="">Select system</option>'+
                @foreach(RESULT_SYSTEM as $key=>$value)
                '<option value="{{$value}}">{{$key}}</option>'+
                        @endforeach
                            '<option value="{{OTHERS}}" >{{OTHERS}}</option>'+
                    '</select>'+
                    '</div>'+

                    '<div style="display: none" id="resultSydtemNameDiv'+counter+'" class="form-group col-md-3">'+
                    '<label for="">Result system name</label>'+
                '<input type="text" maxlength="255" name="resultSydtemName[]" class="form-control" id="resultSydtemName'+counter+'"  placeholder="">'+

                    '</div>'+

                   ' <div class="form-group col-md-3">'+
                    '<label for="">Result/CGPA/Score</label>'+
                    '<input name="result[]" type="text" class="form-control" id="cgpa'+counter+'"   placeholder="">'+
                    '</div>'+
                    '<div class="form-group col-md-3">'+
                    '<label for="">Scale/ Out of</label>'+
                '<input type="text" name="resultOutOf[]" class="form-control" id="resultOutOf'+counter+'" placeholder="CGPA out of">'+
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
                $('.js-example-basic-single').select2();
                counter++;
            });

            $("#removeButton").click(function () {
                if(counter=='1'){
                    alert("Atleast one course section is needed!!");
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

            $.ajax({
                type:'POST',
                url:'{{route('cv.getBoradOrUniversity')}}',
                data:{id:this.value},
                cache: false,
                success:function(data) {
                    if(data==0){

                        $("#instituteNameDiv").show();
                        $("#boardDiv").show();
                        $("#board").val($("#board option:first").val());
                        $("#universityType").val($("#universityType option:first").val());
                        $("#resultSydtem").val($("#resultSydtem option:first").val());
                        $("#resultSydtemNameDiv").hide();
                        $("#boardNameDiv").hide();
                        $("#universityTypeDiv").hide();
                        $("#degreeNameDiv").hide();
                        $("#subjectNameDiv").hide();
                        $('#majorSub').children('option:not(:first,:last)').remove();

                    }else if (data == 1){
                        $("#instituteNameDiv").show();
                        $("#boardDiv").show();
                        $("#board").val($("#board option:first").val());
                        $("#universityType").val($("#universityType option:first").val());
                        $("#resultSydtem").val($("#resultSydtem option:first").val());
                        $("#resultSydtemNameDiv").hide();

                        $("#boardNameDiv").hide();
                        $("#universityTypeDiv").hide();
                        $("#degreeNameDiv").hide();
                        $("#subjectNameDiv").hide();
                        $('#majorSub').children('option:not(:first,:last)').remove();

                    }else if (data == 2){
                        $("#instituteNameDiv").show();
                        $("#universityTypeDiv").show();
                        $("#boardDiv").hide();
                        $("#board").val($("#board option:first").val());
                        $("#universityType").val($("#universityType option:first").val());
                        $("#resultSydtem").val($("#resultSydtem option:first").val());
                        $("#resultSydtemNameDiv").hide();

                        $("#boardNameDiv").hide();
                        $("#degreeNameDiv").hide();
                        $("#subjectNameDiv").hide();
                        $('#majorSub').children('option:not(:first,:last)').remove();
                    }

                }
            });

        });

        $('#degree').on('change', function() {

            var degree =$('#degree').val();
            if (degree == "{{OTHERS}}"){

                $("#degreeNameDiv").show();
                $("#subjectNameDiv").show();

                $('#majorSub').children('option:not(:first,:last)').remove();
                $("#majorSub option[value='{{OTHERS}}']").attr("selected", true);
                $("#resultSydtem").val($("#resultSydtem option:first").val());

            }else {


                $("#degreeNameDiv").hide();
                $("#subjectNameDiv").hide();
                $("#resultSydtem").val($("#resultSydtem option:first").val());


                $.ajax({
                    type:'POST',
                    url:'{{route('cv.getMajorForEducation')}}',
                    data:{id:this.value},
                    cache: false,
                    success:function(data) {
                        document.getElementById("majorSub").innerHTML = data;

                    }
                });
            }



        });
        $('#board').on('change', function() {

            var board =$('#board').val();
            if (board == "{{OTHERS}}"){

                $("#boardNameDiv").show();
            }else {


                $("#boardNameDiv").hide();


            }



        });

        $('#resultSydtem').on('change', function() {

            var resultSydtem =$('#resultSydtem').val();
            if (resultSydtem == "{{OTHERS}}"){

                $("#resultSydtemNameDiv").show();
            }else {


                $("#resultSydtemNameDiv").hide();


            }



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

            $.ajax({
                type:'POST',
                url:'{{route('cv.getBoradOrUniversity')}}',
                data:{id:educationLavel},
                cache: false,
                success:function(data) {
                    if(data==0){

                        $("#instituteNameDiv"+btn).show();
                        $("#boardDiv"+btn).show();

                        $("#universityTypeDiv"+btn).hide();
                        $("#board"+btn).val($("#board"+btn+"option:first").val());
                        $("#universityType"+btn).val($("#universityType"+btn+"option:first").val());
                        $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());
                        $("#resultSydtemNameDiv"+btn).hide();
                        $("#boardNameDiv"+btn).hide();

                        $("#degreeNameDiv"+btn).hide();
                        $("#subjectNameDiv"+btn).hide();
                        $('#majorSub'+btn).children('option:not(:first,:last)').remove();
                        $("#majorSub"+btn).val($("#majorSub"+btn+"option:first").val());


                    }else if (data == 1){
                        $("#instituteNameDiv"+btn).show();
                        $("#boardDiv"+btn).show();
                        $("#universityTypeDiv"+btn).hide();

                        $("#board"+btn).val($("#board"+btn+" option:first").val());
                        $("#universityType"+btn).val($("#universityType"+btn+" option:first").val());
                        $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());
                        $("#resultSydtemNameDiv"+btn).hide();

                        $("#boardNameDiv"+btn).hide();

                        $("#degreeNameDiv"+btn).hide();
                        $("#subjectNameDiv"+btn).hide();
                        $('#majorSub'+btn).children('option:not(:first,:last)').remove();
                        $("#majorSub"+btn).val($("#majorSub"+btn+"option:first").val());

                    }else if (data == 2){
                        $("#instituteNameDiv"+btn).show();
                        $("#boardDiv"+btn).hide();
                        $("#universityTypeDiv"+btn).show();



                        $("#board"+btn).val($("#board"+btn+" option:first").val());
                        $("#universityType"+btn).val($("#universityType"+btn+" option:first").val());
                        $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());
                        $("#resultSydtemNameDiv"+btn).hide();

                        $("#boardNameDiv"+btn).hide();
                        $("#degreeNameDiv"+btn).hide();
                        $("#subjectNameDiv"+btn).hide();
                        $('#majorSub'+btn).children('option:not(:first,:last)').remove();
                        $("#majorSub"+btn).val($("#majorSub"+btn+"option:first").val());

                    }

                }
            });


        }
        function getMajor(x){

            btn = $(x).data('panel-id');
            var degree=document.getElementById("degree"+btn).value;


            if (degree == "{{OTHERS}}"){

                $("#degreeNameDiv"+btn).show();
                $("#subjectNameDiv"+btn).show();

                $('#majorSub'+btn).children('option:not(:first,:last)').remove();
                $("#majorSub"+btn+" option[value='{{OTHERS}}']").attr("selected", true);
                $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());

            }else {


                $("#degreeNameDiv"+btn).hide();
                $("#subjectNameDiv"+btn).hide();
                $("#resultSydtem"+btn).val($("#resultSydtem"+btn+" option:first").val());


                $.ajax({
                    type:'POST',
                    url:'{{route('cv.getMajorForEducation')}}',
                    data:{id:degree},
                    cache: false,
                    success:function(data) {
                        document.getElementById("majorSub"+btn).innerHTML = data;

                    }
                });
            }

        }
        function getBoardName(x){




            var board=document.getElementById("board"+x).value;


            if (board == "{{OTHERS}}"){

                $("#boardNameDiv"+btn).show();
            }else {


                $("#boardNameDiv"+btn).hide();


            }

        }
        function getResultSystemName(x){


            var resultSydtem=document.getElementById("resultSydtem"+x).value;

            if (resultSydtem == "{{OTHERS}}"){

                $("#resultSydtemNameDiv"+btn).show();
            }else {


                $("#resultSydtemNameDiv"+btn).hide();


            }

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


        $('.js-example-basic-single').select2();
    </script>

    @endsection