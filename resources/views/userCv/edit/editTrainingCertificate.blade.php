<form method="post" onsubmit="return checkTrainingCertificate()" action="{{route('update.cvtraning')}}">
    {{csrf_field()}}
    <input type="hidden" name="traningId" value="{{$training->traningId}}">
<div class="row">
    <div class="form-group col-md-10">

        <label for="inputEmail4">Name of the training<span style="color: red">*</span></label>
        <input type="text" class="form-control" name="trainingName" value="{{$training->trainingName}}" id="trainingName" placeholder="training name" required>
    </div>
    {{--<div class="form-group col-md-2 ">--}}
        {{--<button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$training->traningId}})"><i class="fa fa-edit"></i></button>--}}
        {{--<button type="button" class="btn btn-danger btn-sm " onclick="deleteTraining({{$training->traningId}})"><i class="fa fa-trash"></i></button>--}}

    {{--</div>--}}
</div>

<div class="row">
    <div class="form-group col-md-8">
        <label for="inputEmail4">Venue </label>
        <input type="text" class="form-control" name="venue" value="{{$training->vanue}}" id="vanue" placeholder="venue" >
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4" style="display: block">Country</label>
        {{--<input type="text" class="form-control"  id="inputPassword4" placeholder="">--}}

        <select  class="form-control " id="country" name="countryId">
            <option value="">Select country</option>
            @foreach($countries as $country)
                <option value="{{$country->countryId}}" @if($training->countryId == $country->countryId) selected @endif>{{$country->countryName}}</option>

            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="inputPassword4">Start date</label>
        <input type="text" class="form-control date" name="startDate" value="{{$training->startDate}}" id="start" placeholder="date">
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">End date</label>
        <input type="text" class="form-control date" name="endDate"  value="{{$training->endDate}}" id="end" placeholder="date">
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">Status<span style="color: red">*</span></label>
        <select required class="form-control"id="trainingCertificateStatus" name="status" onchange="selectStatus(this)">

            <option value="">Select status</option>
            @foreach(COMPLETING_STATUS as $key=>$value)
                <option @if($training->status == $value) selected @endif value="{{$value}}">{{$key}}</option>
            @endforeach
        </select>
    </div>
</div>

    <div id="courseDuration" class="row">




        <label>duration</label>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Hour</label>
            <select  class="form-control js-example-basic-single"id="trainingCertificatehour" name="hour">

                <option value="">Select hour</option>
               @for($i = 1 ; $i <=300 ; $i++)
                    <option value="{{$i}}" @if($training->hour == $i)selected @endif>{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Day</label>
            <select  class="form-control js-example-basic-single"id="trainingCertificateday" name="day">

                <option value="">Select day</option>
                @for($i = 1 ; $i <=365 ; $i++)
                    <option value="{{$i}}" @if($training->day == $i)selected @endif>{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Week</label>
            <select  class="form-control js-example-basic-single"id="trainingCertificateweek" name="week">

                <option value="">Select week</option>
                @for($i = 1 ; $i <=52 ; $i++)
                    <option value="{{$i}}" @if($training->week == $i)selected @endif>{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Month</label>
            <select  class="form-control js-example-basic-single"id="trainingCertificatemonth" name="month">

                <option value="">Select month</option>
                @for($i = 1 ; $i <=12 ; $i++)
                    <option value="{{$i}}" @if($training->month == $i)selected @endif>{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group col-md-2">
        <label for="inputPassword4">Year</label>
        <select  class="form-control js-example-basic-single"id="trainingCertificateyear" name="year">

            <option value="">Select year</option>
            @for($i = 1 ; $i <51 ; $i++)
                <option value="{{$i}}" @if($training->year == $i)selected @endif>{{$i}}</option>
            @endfor
        </select>
    </div>
    </div>

<div class="row">
    <div class="form-group col-md-12 ">
        <a class="btn btn-danger pull-left" href="{{route('candidate.cvTrainingCertificate')}}">Cancel</a>&nbsp;&nbsp;
        <button  class="btn btn-info pull-right">Update</button>
    </div>
</div>




</form>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
    $('.js-example-basic-single').select2();
    $(function () {
        var value="{{$training->status }}";

        if(value==1){
            $('#courseDuration').hide();
        }
        else if(value==2){
            $('#courseDuration').show();
        }

    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.date').datepicker({
        format: 'yyyy-m-d'
    });

    function checkTrainingCertificate(){

        var trainingName=$('#trainingName').val();
        var vanue=$('#vanue').val();
        var country=$('#country').val();

        var start=$('#start').val();
        var end=$('#end').val();
        var trainingCertificateStatus=$('#trainingCertificateStatus').val();



        if(trainingName==""){

            var errorMsg='Please type a training name first!!'
            validationError(errorMsg)
            return false;
        }
        if (trainingName.length > 100){

            var errorMsg='Training name should not more than 100 charecter length!!'
            validationError(errorMsg)
            return false;

        }
//        if(vanue==""){
//
//            var errorMsg='Please type a venue first!!'
//            validationError(errorMsg)
//            return false;
//
//        }
        if (vanue.length > 255){

            var errorMsg='value should not more than 255 charecter length!!';
            validationError(errorMsg)
            return false;

        }
//        if(country==""){
//
//            var errorMsg='Please select a country first!!';
//            validationError(errorMsg)
//            return false;
//
//        }

//        if(start==""){
//            var errorMsg='Please select a strat date first!!';
//            validationError(errorMsg)
//            return false;
//        }
//        if(end==""){
//            var errorMsg='Please Select a End Date First!!';
//            validationError(errorMsg)
//            return false;
//        }

        if(trainingCertificateStatus==""){
            var errorMsg='Please select a status first!!';
            validationError(errorMsg)
            return false;
        }

        if (start != "") {

            if (end != "") {


                if (Date.parse(end) < Date.parse(start)) {
                    var errorMsg = 'End date should after start date!!';
                    validationError(errorMsg);
                    return false;
                }
            }
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

    function selectStatus(x) {
        var value=$(x).val();

        if(value==1){
            $('#courseDuration').hide();
        }
        else if(value==2){
            $('#courseDuration').show();
        }
        // alert(value);

    }
    </script>