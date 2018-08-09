<form  method="post" action="{{route('cv.updatePersonalEducation')}}">

{{csrf_field()}}

        <input type="hidden" name="educationId" value="{{$education->educationId}}">
        <div  class="row">
            <div class="form-group col-md-4">

                <label for="">Education Level</label>
                <select name="educationLevel" class="form-control" required="" id="educationLevel">
                    <option value="">Select Education Level</option>
                    @foreach($educationLevel as $edulevel)
                        <option @if($edulevel->educationLevelId==$education->educationLevelId)selected @endif value="{{$edulevel->educationLevelId}}">{{$edulevel->educationLevelName}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-md-8">

                <label for="">Degree</label>
                <select name="degree" class="form-control" required id="degree">
                    <option value="{{$education->degreeId}}">{{$education->degreeName}}</option>

                </select>

            </div>

            <div class="form-group col-md-12">
                <label for="">Institute Name</label>
                <input type="text" name="instituteName" required class="form-control" id="" value="{{$education->institutionName}}" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="">Major</label>
                <select name="major" class="form-control" id="major">
                    <option value="{{$education->educationMajorId}}">{{$education->educationMajorName}}</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="">Country</label>
                <select name="country" class="form-control" required id="sel1">
                    @foreach($country as $coun)
                        <option @if($coun->countryId == $education->fkcountryId )selected @endif value="{{$coun->countryId}}">{{$coun->countryName}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-3">
                <label for="">Year</label>
                <input name="passingYear" type="text" class="form-control date" value="{{$education->passingYear}}" id="" required placeholder="passing Year">
            </div>
            <div class="form-group col-md-3">
                <label for="">Result System</label>
                <select name="resultSystem" class="form-control" required id="sel1">
                    <option value="">Select System</option>
                    @foreach(RESULT_SYSTEM as $key=>$value)
                        <option @if($value==$education->resultSystem)selected @endif value="{{$value}}">{{$key}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="">CGPA</label>
                <input name="result" type="text" class="form-control" value="{{$education->result}}" required id="" placeholder="">
            </div>
            <div class="form-group col-md-3">
                <label for="">Out of</label>
                <input type="text" name="resultOutOf" class="form-control" id=""  value="{{$education->resultOutOf}}"placeholder="CGPA Out of">
            </div>
            <div class="form-group col-md-3">
                <label for="">Status</label>
                <select name="status"class="form-control" required id="sel1">
                    @foreach(COMPLETING_STATUS as $key=>$value)
                        <option @if($value == $education->status) selected @endif value="{{$value}}">{{$key}}</option>
                    @endforeach

                </select>
            </div>


        </div>
    <div class="form-group col-md-12">
        <button  class="btn btn-success pull-left">Update</button>
        <a href="{{route('candidate.cvEducation')}}"><button  class="btn btn-danger pull-left">Cancel</button></a>
    </div>
        <br>
    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>


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

</script>