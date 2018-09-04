<form method="post" onsubmit="return checkTrainingCertificate()" action="{{route('update.cvtraning')}}">
    {{csrf_field()}}
    <input type="hidden" name="traningId" value="{{$training->traningId}}">
<div class="row">
    <div class="form-group col-md-10">

        <label for="inputEmail4">Name Of The Training</label>
        <input type="text" class="form-control" name="trainingName" value="{{$training->trainingName}}" id="trainingName" placeholder="training name" required>
    </div>
    {{--<div class="form-group col-md-2 ">--}}
        {{--<button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$training->traningId}})"><i class="fa fa-edit"></i></button>--}}
        {{--<button type="button" class="btn btn-danger btn-sm " onclick="deleteTraining({{$training->traningId}})"><i class="fa fa-trash"></i></button>--}}

    {{--</div>--}}
</div>

<div class="row">
    <div class="form-group col-md-8">
        <label for="inputEmail4">Vanue </label>
        <input type="text" class="form-control" name="vanue" value="{{$training->vanue}}" id="vanue" placeholder="vanue" required >
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">country</label>
        {{--<input type="text" class="form-control"  id="inputPassword4" placeholder="">--}}
        <select class="form-control" id="country" name="countryId">
            @foreach($countries as $country)
                <option value="{{$country->countryId}}" @if($training->countryId == $country->countryId) selected @endif>{{$country->countryName}}</option>

            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="inputPassword4">Start Date</label>
        <input type="text" class="form-control date" name="startDate" value="{{$training->startDate}}" id="start" placeholder="date" required>
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">End Date</label>
        <input type="text" class="form-control date" name="endDate"  value="{{$training->endDate}}" id="end" placeholder="date">
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

    function checkTrainingCertificate(){

        var trainingName=$('#trainingName').val();
        var vanue=$('#vanue').val();
        var country=$('#country').val();

        var start=$('#start').val();
        var end=$('#end').val();



        if(trainingName==""){

            var errorMsg='Please Type a Training Name First!!'
            validationError(errorMsg)
            return false;
        }
        if (trainingName.length > 100){

            var errorMsg='Training Name Should not more than 100 Charecter Length!!'
            validationError(errorMsg)
            return false;

        }
        if(vanue==""){

            var errorMsg='Please Type a Vanue First!!'
            validationError(errorMsg)
            return false;

        }
        if (vanue.length > 255){

            var errorMsg='value Should not more than 255 Charecter Length!!';
            validationError(errorMsg)
            return false;

        }
        if(country==""){

            var errorMsg='Please Select a Country First!!';
            validationError(errorMsg)
            return false;

        }

        if(start==""){
            var errorMsg='Please Select a Strat Date First!!';
            validationError(errorMsg)
            return false;
        }
        if(end==""){
            var errorMsg='Please Select a End Date First!!';
            validationError(errorMsg)
            return false;
        }

        if(Date.parse(end)<Date.parse(start)){
            var errorMsg='End date should after Start Date!!';
            validationError(errorMsg);
            return false;
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