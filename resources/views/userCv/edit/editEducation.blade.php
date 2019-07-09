
<form  method="post" action="{{route('cv.updatePersonalEducation')}}" onsubmit="return checkEducation()" >

{{csrf_field()}}

        <input type="hidden" name="educationId" value="{{$education->educationId}}">
        <div  class="row">
            <div class="form-group col-md-4">

                <label for="">Education exam/level<span style="color: red">*</span></label>
                <select name="educationLevel" class="form-control" required="" id="educationLevel">
                    <option value="">Select Education Level</option>
                    @foreach($educationLevel as $edulevel)
                        <option @if($edulevel->educationLevelId==$education->educationLevelId)selected @endif value="{{$edulevel->educationLevelId}}">{{$edulevel->educationLevelName}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-md-8">

                <label for="">Subject/Group<span style="color: red">*</span></label>
                <select name="degree" class="form-control" required id="degree">
                    <option value="">Select degree</option>
                    <option  selected value="{{$education->degreeId}}">{{$education->degreeName}}</option>
                    <option  value="{{OTHERS}}">{{OTHERS}}</option>


                </select>

            </div>

            <div style="display: none" id="degreeNameDiv" class="form-group col-md-12">
                <label for="">Degree name</label>
                <input type="text" maxlength="255" name="degreeName" class="form-control" id="degreeName"  placeholder="">

            </div>

            {{--@if($education->eduLvlUnder == 2 || $education->eduLvlUnder==null )--}}

            <div @if($education->eduLvlUnder == 2 || $education->eduLvlUnder==null ) style=" dispaly:none" @endif id="instituteNameDiv" class="form-group col-md-12">
                <label for="">School/College/Institution name<span style="color: red">*</span></label>
                <input type="text" name="instituteName"  class="form-control" required id="instituteName" value="{{$education->institutionName}}" placeholder="">
            </div>

            {{--@endif--}}



            <div @if(($education->eduLvlUnder != 2 || $education->eduLvlUnder== null) && $education->universityType == null) style=" display: none" @endif id="instituteNameDiv" class="form-group col-md-3">
                <label for="">University type</label>
                <select name="universityType" class="form-control" id="universityType">
                    <option value="" >Select type</option>
                    @foreach(UNIVERSITY_TYPE as $key=>$value)
                        <option @if($value == $education->universityType) selected @endif value="{{$value}}" >{{$key}}</option>
                    @endforeach
                </select>

            </div>





            <div @if($education->eduLvlUnder != 1 || $education->eduLvlUnder==null ) style="display: none" @endif id="boardDiv" class="form-group col-md-3">
                <label for="">Board/University</label>
                <select name="board" class="form-control" id="board">
                    <option value="" >Select doard</option>
                    @foreach($boards as $board)
                        <option value="{{$board->boardId}}" @if($board->boardId == $education->fkboardId) selected @endif >{{$board->boardName}}</option>
                    @endforeach
                    <option value="{{OTHERS}}" >{{OTHERS}}</option>
                </select>
            </div>

            <div style="display: none" id="boardNameDiv" class="form-group col-md-3">
                <label for="">Board name</label>
                <input type="text" maxlength="255" name="boardName" class="form-control" id="boardName"  placeholder="">

            </div>


            <div class="form-group col-md-9">
                <label for="">Major</label>
                <select name="major"  class="form-control js-example-basic-single" id="majorSub">
                    <option value="">Select Major</option>

                    @foreach($major as $mj)
                    <option @if($mj->educationMajorId == $education->fkMajorId) selected @endif value="{{$mj->educationMajorId}}">{{$mj->educationMajorName}}</option>
                    @endforeach

                    <option value="{{OTHERS}}">{{OTHERS}}</option>
                </select>
            </div>
            <div style="display: none" id="subjectNameDiv" class="form-group col-md-6">
                <label for="">Subject name</label>
                <input type="text" name="subjectName" maxlength="255" class="form-control" id="subjectName"  placeholder="">

            </div>



            <div class="form-group col-md-3">
                <label for="">Country<span style="color: red">*</span></label>
                <select  name="country" class="form-control js-example-basic-single" required id="country">
                    <option value="">Select country</option>
                    @foreach($country as $coun)
                        <option @if($coun->countryId == $education->fkcountryId )selected @endif value="{{$coun->countryId}}">{{$coun->countryName}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="">Status<span style="color: red">*</span></label>
                <select name="status"class="form-control" required id="educationStatus">
                    @foreach(COMPLETING_STATUS as $key=>$value)
                        <option @if($value == $education->status) selected @endif value="{{$value}}">{{$key}}</option>
                    @endforeach

                </select>
            </div>


            <div class="form-group col-md-3">
                <label for="">Passing year</label>
                <input name="passingYear" type="text" class="form-control date" value="{{$education->passingYear}}" id="passingYear"  placeholder="passing Year">
            </div>
            <div class="form-group col-md-3">
                <label for="">Result system<span style="color: red">*</span></label>
                <select name="resultSystem" class="form-control" required id="resultSydtem">
                    <option value="">Select System</option>
                    @if($education->resultSystem!=4)
                    @foreach(RESULT_SYSTEM as $key=>$value)
                        <option @if($value==$education->resultSystem)selected @endif value="{{$value}}">{{$key}}</option>

                    @endforeach
                        <option value="{{OTHERS}}" >{{OTHERS}}</option>
                    @else
                    <option selected value="{{OTHERS}}" >{{OTHERS}}</option>
                    @endif
                </select>
            </div>

            <div @if($education->resultSystem !=4)style="display: none" @endif id="resultSydtemNameDiv" class="form-group col-md-3">
                <label for="">Result system name</label>
                <input type="text" maxlength="255" name="resultSydtemName" value="{{$education->resultSystemName}}" class="form-control" id="resultSydtemName"  placeholder="">

            </div>

            <div class="form-group col-md-3">
                <label for="">Result/CGPA/Score</label>
                <input name="result" type="text" class="form-control" value="{{$education->result}}"  id="cgpa" maxlength="10" placeholder="">
            </div>
            <div class="form-group col-md-3">
                <label for="">Out of</label>
                <input type="text" name="resultOutOf" class="form-control" id="resultOutOf"  value="{{$education->resultOutOf}}"placeholder="CGPA Out of">
            </div>



        </div>
    <div class="form-group col-md-12">
        {{--<a class="btn btn-danger pull-left" href="{{route('candidate.cvEducation')}}">Cancel</a>&nbsp;&nbsp;--}}
        <button class="btn btn-danger pull-left" onclick="{{route('candidate.cvEducation')}}">Cancel</button>&nbsp;&nbsp;
        <button class="btn btn-success">Update</button>

    </div>

</form>


<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
    $('.js-example-basic-single').select2();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
        $('.date').datepicker({
            viewMode: "years",
            minViewMode: "years",
            format: 'yyyy'
        });
    });

    $('#majorSub').on('change', function() {

        var major =$('#majorSub').val();
        if (major == "{{OTHERS}}"){

            $("#subjectNameDiv").show();
        }else {
            $("#subjectNameDiv").hide();
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

    $('#resultSydtem').on('change', function() {

        var resultSydtem =$('#resultSydtem').val();
        if (resultSydtem == "{{OTHERS}}"){

            $("#resultSydtemNameDiv").show();
        }else {


            $("#resultSydtemNameDiv").hide();


        }

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

    function checkEducation(){

        var educationLevel=$('#educationLevel').val();
        var degree=$('#degree').val();
        var instituteName=$('#instituteName').val();

        var country=$('#country').val();
        var year=$('#passingYear').val();
        var resultSydtem=$('#resultSydtem').val();
        var cgpa=$('#cgpa').val();

        var status=$('#educationStatus').val();
        var major=$('#majorSub').val();

        var universityType=$('#universityType').val();

        if(major=="{{OTHERS}}" && $("#subjectName").val()=="" ){
            var errorMsg='Please Type a Subject Name First!!'
            validationError(errorMsg);
            return false;
        }

        if(educationLevel==""){

            var errorMsg='Please Select a Education Level First!!';
            validationError(errorMsg);
            return false;
        }

        if(degree==""){

            var errorMsg='Please Select Degree First!!';
            validationError(errorMsg);
            return false;

        }

        if(instituteName!="") {

            if (instituteName == "") {

                var errorMsg = 'Please Type instituteName First!!';
                validationError(errorMsg);
                return false;

            }
            if (instituteName.length > 255) {

                var errorMsg = 'Institute Name Should not more than 255 Charecter Length!!';
                validationError(errorMsg);
                return false;

            }
        }

        if(universityType!="") {
            if (universityType == "") {

                var errorMsg = 'Please Type universityType First!!';
                validationError(errorMsg);
                return false;

            }
        }



        if(country==""){

            var errorMsg='Please Select a Country First!!';
            validationError(errorMsg);
            return false;

        }
        if(year!="") {
            if (year == "") {

                var errorMsg = 'Please Select a Year First!!';
                validationError(errorMsg);
                return false;

            }
        }
        if(resultSydtem==""){

            var errorMsg='Please Select a Result System First!!';
            validationError(errorMsg);
            return false;

        }
        if(cgpa!="") {
            if (cgpa == "") {

                var errorMsg = 'Please Type Your Result/CGPA First!!';
                validationError(errorMsg);
                return false;

            }
        }
        if(status==""){

            var errorMsg='Please Select a status First!!'
            validationError(errorMsg);
            return false;

        }
        //return false;

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

</script>