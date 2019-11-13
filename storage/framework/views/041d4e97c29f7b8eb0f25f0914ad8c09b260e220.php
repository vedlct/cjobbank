<form method="post" onsubmit="return checkRelative()" action="<?php echo e(route('update.relative')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="relativeId" value="<?php echo e($relative->relativeId); ?>">
    <div class="row">

        <div class="form-group col-md-6">
            <label for="inputEmail4">First Name<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="firstName" value="<?php echo e($relative->firstName); ?>" id="firstName" placeholder="first name" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Last Name<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="lastName" value="<?php echo e($relative->lastName); ?>" id="lastName" placeholder="last name" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Degisnation<span style="color: red">*</span></label>
            <input type="text" class="form-control" name="degisnation" value="<?php echo e($relative->degisnation); ?>" id="degisnation" placeholder="degisnation" required>
        </div>



        <div class="form-group col-md-12">
            <button  class="btn btn-info pull-right">Update</button>
        </div>

    </div>

</form>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
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

            var errorMsg='Please Type First Name First!!';
            validationError(errorMsg);
            return false;
        }
        if (firstName.length > 45){

            var errorMsg='First Name Should not more than 45 Charecter Length!!';
            validationError(errorMsg);
            return false;

        }
        if(lastName==""){

            var errorMsg='Please Type Last Name First!!'
            validationError(errorMsg)
            return false;
        }
        if (lastName.length > 45){

            var errorMsg='Last Name Should not more than 45 Charecter Length!!'
            validationError(errorMsg)
            return false;

        }

        if(degisnation==""){

            var errorMsg='Please Type Present Position First!!'
            validationError(errorMsg)
            return false;

        }
        if (degisnation.length > 100){

            var errorMsg='Present Position Should not more than 100 Charecter Length!!';
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