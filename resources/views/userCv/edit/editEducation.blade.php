<form  method="post" action="{{route('cv.updatePersonalEducation')}}" onsubmit="return checkEducation()" >

{{csrf_field()}}

        <input type="hidden" name="educationId" value="{{$education->educationId}}">
        <div  class="row">
            <div class="form-group col-md-4">

                <label for="">Education Level<span style="color: red">*</span></label>
                <select name="educationLevel" class="form-control" required="" id="educationLevel">
                    <option value="">Select Education Level</option>
                    @foreach($educationLevel as $edulevel)
                        <option @if($edulevel->educationLevelId==$education->educationLevelId)selected @endif value="{{$edulevel->educationLevelId}}">{{$edulevel->educationLevelName}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-md-8">

                <label for="">Degree<span style="color: red">*</span></label>
                <select name="degree" class="form-control" required id="degree">
                    <option value="">Select Degree</option>
                    <option  selected value="{{$education->degreeId}}">{{$education->degreeName}}</option>

                </select>

            </div>

            <div class="form-group col-md-12">
                <label for="">Institute Name<span style="color: red">*</span></label>
                <input type="text" name="instituteName" required class="form-control" id="instituteName" value="{{$education->institutionName}}" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="">Major</label>
                <select name="major" class="form-control" id="major">
                    <option value="">Select Major</option>
                    <option value="{{$education->educationMajorId}}">{{$education->educationMajorName}}</option>
                </select>
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

    function checkEducation(){

        var educationLevel=$('#educationLevel').val();
        var degree=$('#degree').val();
        var instituteName=$('#instituteName').val();

        var country=$('#country').val();
        var year=$('#passingYear').val();
        var resultSydtem=$('#resultSydtem').val();
        var cgpa=$('#cgpa').val();

        var status=$('#educationStatus').val();

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
        if(instituteName==""){

            var errorMsg='Please Type instituteName First!!';
            validationError(errorMsg);
            return false;

        }
        if (instituteName.length > 255){

            var errorMsg='Institute Name Should not more than 255 Charecter Length!!';
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