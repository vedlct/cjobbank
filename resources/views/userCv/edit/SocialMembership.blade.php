<form  action="{{route('candidate.membershipInSocialNetwork.update')}}" onsubmit="return checkmembership()" method="post">
    <!-- One "tab" for each step in the form: -->
    {{csrf_field()}}
    <input type="hidden" name="membershipId" value="{{$socialMembership->membershipId}}">



    <div class="row">


            <div class="form-group col-md-12">
                <label for="inputEmail4">Name of Network<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="networkName" value="{{$socialMembership->networkName}}" id="networkName" placeholder="networkName" required>
            </div>

            <div class="form-group col-md-6">
                <label for="inputEmail4">Type of Membership<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="membershipType" value="{{$socialMembership->membershipType}}" id="membershipType" placeholder="membership Type" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Duration<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="duration" id="duration" value="{{$socialMembership->duration}}" placeholder="duration" required>
            </div>


        <div class="form-group col-md-12">
            <a class="btn btn-danger pull-right" href="{{route('candidate.membershipInSocialNetwork.index')}}">Cancel</a>
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

    function checkmembership(){

        var networkName=$('#networkName').val();
        var membershipType=$('#membershipType').val();
        var duration=$('#duration').val();



        if(networkName==""){

            var errorMsg='Please Type Network Name First!!';
            validationError(errorMsg);
            return false;
        }
        if (networkName.length > 255){

            var errorMsg='Network Name Should not more than 255 Charecter Length!!';
            validationError(errorMsg);
            return false;

        }
        if(membershipType==""){

            var errorMsg='Please Type Membership-Type First!!'
            validationError(errorMsg)
            return false;

        }
        if (membershipType.length > 255){

            var errorMsg='Membership-Type Should not more than 255 Charecter Length!!';
            validationError(errorMsg);
            return false;

        }
        if(duration==""){

            var errorMsg='Please Duration First!!';
            validationError(errorMsg);
            return false;

        }
        if (duration.length > 10){

            var errorMsg='Duration Should not more than 10 Charecter Length!!';
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
</script>