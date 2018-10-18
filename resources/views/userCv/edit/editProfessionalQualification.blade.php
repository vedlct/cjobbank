<form method="post" onsubmit="return checkProfessionalQualification()" action="{{route('update.cvProfessionalCertificate')}}">
    {{csrf_field()}}
    <input type="hidden" name="professionalQualificationId" value="{{$professional->professionalQualificationId}}">
    <div class="row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Certificate Name :<span style="color: red">*</span></label></label>
            <input type="text" class="form-control" name="certificateName" id="certificateName" value="{{$professional->certificateName}}" placeholder="certificate" required>
        </div>
        {{--<div class="form-group col-md-2 ">--}}
            {{--<button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$professional->professionalQualificationId}})"><i class="fa fa-edit"></i></button>--}}
            {{--<button type="button" class="btn btn-danger btn-sm " onclick="deleteProfession({{$professional->professionalQualificationId}})"><i class="fa fa-trash"></i></button>--}}

        {{--</div>--}}

    </div>

    <div class="row">
        <div class="form-group col-md-8">
            <label for="inputEmail4">Institute Name<span style="color: red">*</span></label> :</label>
            <input type="text" class="form-control" name="institutionName" id="institutionName" value="{{$professional->institutionName}}" placeholder="institution" required>
        </div>

        <div class="form-group col-md-4">
            <label for="">Result System<span style="color: red">*</span></label>
            <select name="resultSystem" class="form-control"  id="resultSydtem">
                <option value="">Select System</option>
                @foreach(RESULT_SYSTEM as $key=>$value)
                    <option @if($value == $professional->resultSystem ) selected @endif value="{{$value}}">{{$key}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="inputPassword4">Result :</label>
            <input type="text" class="form-control" name="result" value="{{$professional->result}}" id="result" placeholder="">
        </div>

        <div class="form-group col-md-4">
            <label for="inputPassword4">Start Date <span style="color: red">*</span></label>:</label>
            <input type="text" class="form-control date" name="startDate" value="{{$professional->startDate}}" id="start" placeholder="date" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">End Date <span style="color: red">*</span></label>:</label>
            <input type="text" class="form-control date" name="endDate" value="{{$professional->endDate}}" id="end" placeholder="date">
        </div>

        <div class="form-group col-md-4">
            <label for="inputPassword4">Staus <span style="color: red">*</span></label>:</label>
            <select required class="form-control" id="professinalCertificateStatus" name="status">
                <option value="">Select Status</option>
                @foreach(COMPLETING_STATUS as $key=>$value)
                    <option @if($value == $professional->status) selected @endif value="{{$value}}">{{$key}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-12">
            <button  class="btn btn-info pull-right">Update</button>
        </div>

    </div>

</form>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.date').datepicker({
        format: 'yyyy-m-d'
    });

    function checkProfessionalQualification(){

        var certificateName=$('#certificateName').val();
        var institutionName=$('#institutionName').val();
//        var result=$('#result').val();
        var start=$('#start').val();
        var end=$('#end').val();
        var status=$('#professinalCertificateStatus').val();
        var resultSystem=$('#resultSystem').val();


        if(certificateName==""){

            var errorMsg='Please Type certificateName First!!'
            validationError(errorMsg)
            return false;
        }
        if (certificateName.length > 100){

            var errorMsg='certificateName Should not more than 100 Charecter Length!!'
            validationError(errorMsg)
            return false;

        }
        if(institutionName==""){

            var errorMsg='Please Type instituteName First!!'
            validationError(errorMsg)
            return false;

        }
        if(resultSystem==""){

            var errorMsg='Please Select resultSystem First!!'
            validationError(errorMsg)
            return false;

        }
        if (institutionName.length > 255){

            var errorMsg='Institute Name Should not more than 255 Charecter Length!!'
            validationError(errorMsg)
            return false;

        }
//        if(result==""){
//
//            var errorMsg='Please Type a Result First!!'
//            validationError(errorMsg)
//            return false;
//
//        }
//        if (result.length > 10){
//
//            var errorMsg='Result Should not more than 10 Charecter Length!!'
//            validationError(errorMsg)
//            return false;
//
//        }
        if(start==""){

            var errorMsg='Please Select a Strat Date First!!'
            validationError(errorMsg)
            return false;

        }
//        if(end==""){
//
//            var errorMsg='Please Select a End Date First!!'
//            validationError(errorMsg)
//            return false;
//
//        }
        if (end != "") {


            if (Date.parse(end) < Date.parse(start)) {

                var errorMsg = 'End date should after Start Date!!'
                validationError(errorMsg)
                return false;

            }
        }

        if(status==""){

            var errorMsg='Please Select a status First!!'
            validationError(errorMsg)
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