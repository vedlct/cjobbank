<form method="post" onsubmit="return checkTrainingCertificate()" action="{{route('candidate.previousWorkInCB.update')}}">
    {{csrf_field()}}

    <input type="hidden" name="id" value="{{$previousWorkInCB->id}}">
    <div class="row">


        <div class="form-group col-md-12">
            <label for="inputEmail4">Designation<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="degisnation" value="{{$previousWorkInCB->designation}}" id="degisnation" placeholder="designation" >
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Start date<span style="color: red">*</span></label>
            <input type="text" class="form-control date" name="startDate" value="{{$previousWorkInCB->startDate}}" id="start" placeholder="date">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">End date</label>
            /
            <input type="checkbox" class="col-md-4" id="currentlyRunning" name="currentlyRunning" @if($previousWorkInCB->currentlyRunning=='1')checked @endif value="1">Currently running

        @if($previousWorkInCB->currentlyRunning=='0')
                <input type="text" id="endDate"name="endDate" placeholder="End Date" value="{{$previousWorkInCB->endDate}}" class="form-control col-md-3 date"/>
            @else
                <input type="text" id="endDate"name="endDate" placeholder="End Date"  class="form-control col-md-3 date"/>
            @endif


        </div>

        <div class="form-group col-md-12">
            <a class="btn btn-danger pull-right" href="{{route('candidate.previousWorkInCB.index')}}">Cancel</a>&nbsp;&nbsp;
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

        var degisnation=$('#degisnation').val();
        var start=$('#start').val();
        var end=$('#endDate').val();

        if(degisnation==""){

            var errorMsg='Please Type Designation First!!'
            validationError(errorMsg)
            return false;

        }
        if (degisnation.length > 255){

            var errorMsg='Designation Should not more than 255 Charecter Length!!';
            validationError(errorMsg);
            return false;

        }
        if(start==""){

            var errorMsg='Please Select a Start Date First!!';
            validationError(errorMsg);
            return false;

        }
        if(end != "") {




            if (Date.parse(end) < Date.parse(start)) {

                var errorMsg = 'End date should after Start Date!!';
                validationError(errorMsg);
                return false;

            }
        }
        else {
            if ($("#currentlyRunning").prop('checked') != true){

                var errorMsg = 'Either End date or Currently Running Should be Selected!!';
                validationError(errorMsg);
                return false;

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
    </script>