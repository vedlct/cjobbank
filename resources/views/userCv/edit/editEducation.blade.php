<form  method="post" action="{{route('cv.updatePersonalEducation')}}" onsubmit="return checkEducation()" >

{{csrf_field()}}

        <input type="hidden" name="educationId" value="{{$education->educationId}}">
        <div  class="row">
            <div class="form-group col-md-4">

                <label for="">Education Degree<span style="color: red">*</span></label>
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
                    <option value="">Select Degree</option>
                    <option  selected value="{{$education->degreeId}}">{{$education->degreeName}}</option>

                </select>

            </div>

            {{--@if($education->eduLvlUnder == 2 || $education->eduLvlUnder==null )--}}

            <div @if($education->eduLvlUnder == 2 || $education->eduLvlUnder==null ) style=" dispaly:none" @endif id="instituteNameDiv" class="form-group col-md-12">
                <label for="">Institute Name</label>
                <input type="text" name="instituteName"  class="form-control" id="instituteName" value="{{$education->institutionName}}" placeholder="">
            </div>

            {{--@endif--}}



            <div @if(($education->eduLvlUnder == 2 || $education->eduLvlUnder== null) && $education->universityType != null) style=" display: none" @endif id="instituteNameDiv" class="form-group col-md-3">
                <label for="">University Type</label>
                <select name="universityType" class="form-control" id="universityType">
                    <option value="" >Select Type</option>
                    @foreach(UNIVERSITY_TYPE as $key=>$value)
                        <option @if($value == $education->universityType) selected @endif value="{{$value}}" >{{$key}}</option>
                    @endforeach
                </select>

            </div>





            <div @if($education->eduLvlUnder == 1 || $education->eduLvlUnder==null ) style="display: none" @endif id="boardDiv" class="form-group col-md-3">
                <label for="">Board</label>
                <select name="board" class="form-control" id="board">
                    <option value="" >Select Board</option>
                    @foreach($boards as $board)
                        <option value="{{$board->boardId}}" @if($board->boardId == $education->fkboardId) selected @endif >{{$board->boardName}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-3">
                <label for="">Major</label>
                <select name="major" class="form-control" id="majorSub">
                    <option value="">Select Major</option>
                    <option selected value="{{$education->educationMajorId}}">{{$education->educationMajorName}}</option>
                    <option value="{{OTHERS}}">{{OTHERS}}</option>
                </select>
            </div>
            <div style="display: none" id="subjectNameDiv" class="form-group col-md-6">
                <label for="">Subject Name</label>
                <input type="text" name="subjectName" maxlength="255" class="form-control" id="subjectName"  placeholder="">

            </div>



            <div class="form-group col-md-3">
                <label for="">Country<span style="color: red">*</span></label>
                <select name="country" class="form-control" required id="country">
                    <option value="">Select Country</option>
                    @foreach($country as $coun)
                        <option @if($coun->countryId == $education->fkcountryId )selected @endif value="{{$coun->countryId}}">{{$coun->countryName}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-3">
                <label for="">Year<span style="color: red">*</span></label>
                <input name="passingYear" type="text" class="form-control date" value="{{$education->passingYear}}" id="passingYear" required placeholder="passing Year">
            </div>
            <div class="form-group col-md-3">
                <label for="">Result System<span style="color: red">*</span></label>
                <select name="resultSystem" class="form-control" required id="resultSydtem">
                    <option value="">Select System</option>
                    @foreach(RESULT_SYSTEM as $key=>$value)
                        <option @if($value==$education->resultSystem)selected @endif value="{{$value}}">{{$key}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="">CGPA<span style="color: red">*</span></label>
                <input name="result" type="text" class="form-control" value="{{$education->result}}" required id="cgpa" placeholder="">
            </div>
            <div class="form-group col-md-3">
                <label for="">Out of</label>
                <input type="text" name="resultOutOf" class="form-control" id="resultOutOf"  value="{{$education->resultOutOf}}"placeholder="CGPA Out of">
            </div>
            <div class="form-group col-md-3">
                <label for="">Status<span style="color: red">*</span></label>
                <select name="status"class="form-control" required id="educationStatus">
                    @foreach(COMPLETING_STATUS as $key=>$value)
                        <option @if($value == $education->status) selected @endif value="{{$value}}">{{$key}}</option>
                    @endforeach

                </select>
            </div>


        </div>
    <div class="form-group col-md-12">
        <a class="btn btn-danger pull-left" href="{{route('candidate.cvEducation')}}">Cancel</a>&nbsp;&nbsp;
        <button class="btn btn-success pull-left">Update</button>

    </div>

</form>


<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>

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
        if (major == "others"){

            $("#subjectNameDiv").show();
        }else {
            $("#subjectNameDiv").hide();
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

                    $("#universityTypeDiv").hide();

                }else if (data == 1){
                    $("#instituteNameDiv").hide();
                    $("#boardDiv").show();
                    $("#universityTypeDiv").hide();

                }else if (data == 2){
                    $("#instituteNameDiv").show();
                    $("#boardDiv").hide();
                    $("#universityTypeDiv").show();
                }

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
                document.getElementById("majorSub").innerHTML = data;

            }
        });

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

        if(educationLevel==""){

            var errorMsg='Please Select a Education Level First!!';
            validationError(errorMsg);
            return false;
        }
        if(major=="others" && $("#subjectName").val()=="" ){

            var errorMsg='Please Type a Subject Name First!!';
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


            if (universityType == "") {

                var errorMsg = 'Please Type universityType First!!';
                validationError(errorMsg);
                return false;

            }



        if(country==""){

            var errorMsg='Please Select a Country First!!';
            validationError(errorMsg);
            return false;

        }
        if(year==""){

            var errorMsg='Please Select a Year First!!';
            validationError(errorMsg);
            return false;

        }
        if(resultSydtem==""){

            var errorMsg='Please Select a Result System First!!';
            validationError(errorMsg);
            return false;

        }
        if(cgpa==""){

            var errorMsg='Please Type Your Result/CGPA First!!';
            validationError(errorMsg);
            return false;

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

</script>