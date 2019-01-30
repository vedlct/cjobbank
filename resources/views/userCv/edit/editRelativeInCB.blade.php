<form method="post" onsubmit="return checkRelative()" action="{{route('update.relative')}}">
    {{csrf_field()}}
    <input type="hidden" name="relativeId" value="{{$relative->relativeId}}">
    <div class="row">

        <div class="form-group col-md-6">
            <label for="inputEmail4">First name<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="firstName" value="{{$relative->firstName}}" id="firstName" placeholder="first name" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Last name<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="lastName" value="{{$relative->lastName}}" id="lastName" placeholder="last name" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Designation<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="degisnation" value="{{$relative->degisnation}}" id="degisnation" placeholder="degisnation" required>
        </div>



        <div class="form-group col-md-12">
            <a class="btn btn-danger pull-left" href="{{route('relativeInCaritas.getRelationInfo')}}">Cancel</a>&nbsp;&nbsp;
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



    function checkRelative(){

        var firstName=$('#firstName').val();
        var lastName=$('#lastName').val();
        var degisnation=$('#degisnation').val();


        var chk=/^[0-9]*$/;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



        if(firstName==""){

            var errorMsg='Please type first name first!!';
            validationError(errorMsg);
            return false;
        }
        if (firstName.length > 45){

            var errorMsg='First name should not more than 45 charecter length!!';
            validationError(errorMsg);
            return false;

        }
        if(lastName==""){

            var errorMsg='Please type last name first!!'
            validationError(errorMsg)
            return false;
        }
        if (lastName.length > 45){

            var errorMsg='Last name should not more than 45 charecter length!!'
            validationError(errorMsg)
            return false;

        }

        if(degisnation==""){

            var errorMsg='Please type present position first!!'
            validationError(errorMsg)
            return false;

        }
        if (degisnation.length > 100){

            var errorMsg='Present position should not more than 100 charecter length!!';
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