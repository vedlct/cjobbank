@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card updateCard">
                <div class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal details</a>
                            <a href="{{route('candidate.cvQuesObj')}}">Career Objective and application information</a>
                            <a href="{{route('candidate.cvEducation')}}" class="activeNav">Education</a>
                            <a href="{{route('candidate.language.index')}}">Language</a>
                            <a href="{{route('candidate.computerSkill.index')}}">Computer-skill</a>
                            {{--<a href="{{route('candidate.skill.index')}}">Other Skill Information</a>--}}
                            <a href="{{route('cv.OthersInfo')}}">Other information</a>
                            <a href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a href="{{route('JobExperience.index')}}">Job experience</a>
                            <a href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a href="{{route('refree.index')}}">Referee</a>
                            <a href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm" >
                        <!-- One "tab" for each step in the form: -->


                        <div class="tab">

                            <h2 style="margin-bottom: 30px; text-align:center">Education </h2>
                            @php $R=0;
                                    @endphp
                            @foreach($employeeCvEducationInfo as $educationInfo)
                                @if($R>0)
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                @endif
                            <div id="edit{{$educationInfo->educationId}}" class="row">


                                    <div class="form-group col-md-4">

                                        <label for="">Exam/Level :</label>
                                        {{$educationInfo->educationLevelName}}
                                    </div>

                                <div class="form-group col-md-6">

                                    <label for="">Subject/Group :</label>
                                    {{$educationInfo->degreeName}}

                                </div>
                                    <div class="form-group col-md-2 ">
                                        <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$educationInfo->educationId}})"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm " onclick="deleteProfession({{$educationInfo->educationId}})"><i class="fa fa-trash"></i></button>

                                    </div>

                                @if($educationInfo->eduLvlUnder ==2 || $educationInfo->eduLvlUnder==null )

                                <div class="form-group col-md-12">
                                    <label for="">School/College/Institution name :</label>
                                    {{$educationInfo->institutionName}}
                                    {{--<input type="text" name="instituteName[]" required class="form-control" id="" placeholder="">--}}
                                </div>
                                @endif

                                @if (($educationInfo->eduLvlUnder == 2 || $educationInfo->eduLvlUnder==null) && $educationInfo->universityType != null )
                                    <div class="form-group col-md-3">
                                        <label for="">University type :</label>
                                        @foreach(UNIVERSITY_TYPE as $key=>$value)
                                            @if($value==$educationInfo->universityType) {{$key}} @endif
                                        @endforeach


                                    </div>
                                @endif

                                @if($educationInfo->eduLvlUnder ==1 || $educationInfo->eduLvlUnder==null )
                                    <div class="form-group col-md-3">
                                        <label for="">Board:</label>
                                        {{$educationInfo->boardName}}

                                    </div>
                                @endif

                                <div class="form-group col-md-3">
                                    <label for="">Major :</label>
                                    <label for="">{{$educationInfo->educationMajorName}}</label>

                                </div>


                                <div class="form-group col-md-3">
                                    <label for="">Country :</label>

                                    @foreach($country as $coun)
                                        @if($educationInfo->fkcountryId ==$coun->countryId)
                                            {{$coun->countryName}}
                                        @endif

                                    @endforeach
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="">Passing year :</label>
                                    {{$educationInfo->passingYear}}

                                    {{--<input name="passingYear[]" type="text" class="form-control date" id="" required placeholder="passing Year">--}}
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Result system :</label>
                            @if($educationInfo->resultSystem!=4)

                                            @foreach(RESULT_SYSTEM as $key=>$value)
                                                @if($educationInfo->resultSystem ==$value)
                                                {{$key}}
                                                @endif


                            @endforeach
                                @else
                                {{$educationInfo->resultSystemName}}
                                @endif

                                </div>

                                    <div class="form-group col-md-3">
                                        <label for="">CGPA :</label>
                                        {{$educationInfo->result}}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Scale/ Out of :</label>
                                        {{$educationInfo->resultOutOf}}

                                    </div>
                                    <div class="form-group col-md-3">

                                        <label for="">Status :</label>

                                            @foreach(COMPLETING_STATUS as $key=>$value)
                                            @if($educationInfo->status ==$value)
                                                {{$key}}
                                            @endif
                                            @endforeach


                                    </div>



                                </div>
                                        @php $R++;
                                        @endphp
                                @endforeach



                        <form id="" action="{{route('cv.insertPersonalEducation')}}"  method="post">
                            <!-- One "tab" for each step in the form: -->
                            {{csrf_field()}}
                            <div id="TextBoxesGroup">


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <a href="{{route('candidate.cvQuesObj')}}"><button type="button" id="btnPevious">Back</button></a>
                                    <button type="submit" id="submitBtn">Save</button>
                                    <a href="{{route('candidate.language.index')}}"><button type="button" id="nextBtn" >Next</button></a>
                                </div>
                            </div>

                        </form>

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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


            function editInfo(x) {
                $.ajax({
                    type: 'POST',
                    url: "{!! route('cv.educationEdit') !!}",
                    cache: false,
                    data: {_token: "{{csrf_token()}}",'id': x},
                    success: function (data) {

                        $("#addButton").hide();
                        $("#submitBtn").hide();
                        $("#nextBtn").hide();
                        $("#btnPevious").hide();

                        $('#edit'+x).html(data);

                     //   console.log(data);

                    }
                });
            }
            function deleteProfession(x) {

                $.confirm({
                    title: 'Confirm!',
                    content: 'Are you sure To delete this Education?',
                    icon: 'fa fa-warning',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Yes',
                            btnClass: 'btn-red',
                            action: function(){

                                $.ajax({
                                    type: "POST",
                                    url: '{{route('cv.PersonalEducationDelete')}}',
                                    data: {id: x},
                                    success: function (data) {
                                        $.alert({
                                            title: 'Success!',
                                            type: 'green',
                                            content: 'Education deleted successfully',
                                            buttons: {
                                                tryAgain: {
                                                    text: 'Ok',
                                                    btnClass: 'btn-green',
                                                    action: function () {
                                                        location.reload();
                                                    }
                                                }
                                            }
                                        });
                                    },
                                });
                            }
                        },
                        No: function () {
                        },
                    }
                });



            }

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


            $(function () {
                $('.date').datepicker({
                    viewMode: "years",
                    minViewMode: "years",
                    format: 'yyyy'
                });
            });

            $(document).ready(function(){

                var counter = 2;
                $("#removeButton").hide();
                $("#btnPevious").show();
                $("#nextBtn").show();
                $("#submitBtn").hide();


                $("#addButton").click(function () {

                    if(counter>10){
                        alert("Only 10 section allow per time!!");
                        return false;
                    }

                    if (counter > 2 ){

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
                        '<input type="text" maxlength="255" name="degreeName[]" class="form-control" id="degreeName'+ counter+'"  placeholder="">'+

                        '</div>'+

                        '<div id="instituteNameDiv'+counter+'" class="form-group col-md-12">'+
                        '<label for="">Institution<span style="color: red">*</span></label>'+
                        '<input type="text" name="instituteName[]" class="form-control"  id="instituteName'+counter+'" placeholder="" required>'+
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
                        '<option value="">Select Major</option>'+
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
                        ' <input name="passingYear[]" type="text" class="form-control date" id="passingYear'+counter+'" placeholder="passing year">'+
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
                        '<input type="text" maxlength="255" name="resultSydtemName[]" class="form-control" id="resultSydtemName'+counter+'"  placeholder="Result system name">'+

                        '</div>'+

                        ' <div class="form-group col-md-3">'+
                        '<label for="">Result/CGPA/Score</label>'+
                        '<input name="result[]" type="text" class="form-control" id="cgpa'+counter+'"   placeholder="CGPA">'+
                        '</div>'+
                        '<div class="form-group col-md-3">'+
                        '<label for="">Scale/ Out of</label>'+
                        '<input type="text" name="resultOutOf[]" class="form-control" id="resultOutOf'+counter+'" placeholder="CGPA Out of">'+
                        '</div>'

                    );
                    newTextBoxDiv.appendTo("#TextBoxesGroup");
                    $('.date').datepicker({
                        viewMode: "years",
                        minViewMode: "years",
                        format: 'yyyy'
                    });

                    if(counter>=2){
    //                    document.getElementById("removeButton").style.display='block';
                        $("#removeButton").show();
                        $("#submitBtn").show();



                    }

                    counter++;

                    $('.js-example-basic-single').select2();

                });

                $("#removeButton").click(function () {


                    counter--;
                    if(counter<=2){
                        $("#removeButton").hide();

                        $("#submitBtn").hide();
                    }
                    $("#TextBoxDiv" + counter).remove();
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

                {{--btn = $(x).data('panel-id');--}}
                {{--var degree=document.getElementById("degree"+btn).value;--}}

                {{--$.ajax({--}}
                    {{--type:'POST',--}}
                    {{--url:'{{route('cv.getMajorForEducation')}}',--}}
                    {{--data:{id:degree},--}}
                    {{--cache: false,--}}
                    {{--success:function(data) {--}}
                        {{--document.getElementById("majorSub"+btn).innerHTML = data;--}}

                    {{--}--}}
                {{--});--}}

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
        </script>


    @endsection