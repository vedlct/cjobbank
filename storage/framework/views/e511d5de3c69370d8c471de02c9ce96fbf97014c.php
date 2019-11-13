<form method="post" onsubmit="return checkReferee()" action="<?php echo e(route('update.refree')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="refereeId" value="<?php echo e($refree->refereeId); ?>">
<div class="row">
    <div class="form-group col-md-6">
        <label for="inputEmail4">First Name<span style="color: red">*</span></label>
        <input type="text" class="form-control" name="firstName" value="<?php echo e($refree->firstName); ?>" id="firstName" placeholder="first name" required>
    </div>



    <div class="form-group col-md-6">
        <label for="inputEmail4">Last Name<span style="color: red">*</span></label>
        <input type="text" class="form-control" name="lastName" value="<?php echo e($refree->lastName); ?>" id="lastName" placeholder="last name" required>
    </div>



    <div class="form-group col-md-6">
        <label for="inputEmail4">Present position<span style="color: red">*</span></label>
        <input type="text" class="form-control" name="presentposition" value="<?php echo e($refree->presentposition); ?>" id="presentposition" placeholder="position" required>
    </div>

    <div class="form-group col-md-6">
        <label for="inputPassword4">Organization<span style="color: red">*</span></label>
        <input type="text" class="form-control" name="organization" value="<?php echo e($refree->organization); ?>" id="organization" placeholder="organization" required>
    </div>

    <div class="form-group col-md-6">
        <label for="inputPassword4">Email<span style="color: red">*</span></label>
        <input type="email" class="form-control" name="email" value="<?php echo e($refree->email); ?>" id="email" placeholder="email" required>
    </div>

    <div class="form-group col-md-6">
        <label for="inputPassword4">phone<span style="color: red">*</span></label>
        <input type="text" class="form-control" name="phone" value="<?php echo e($refree->phone); ?>" id="phone" placeholder="email" required>
    </div>

    <div class="form-group col-md-6">
        <label for="inputPassword4">relation<span style="color: red">*</span></label>
        <input type="text" class="form-control" name="relation" value="<?php echo e($refree->relation); ?>" id="relation" placeholder="relation" required>
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



    function checkReferee(){

        var firstName=$('#firstName').val();
        var lastName=$('#lastName').val();
        var presentposition=$('#presentposition').val();
        var organization=$('#organization').val();
        var email=$('#email').val();
        var phone=$('#phone').val();
        var relation=$('#relation').val();

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

        if(presentposition==""){

            var errorMsg='Please Type Present Position First!!'
            validationError(errorMsg)
            return false;

        }
        if (presentposition.length > 100){

            var errorMsg='Present Position Should not more than 100 Charecter Length!!';
            validationError(errorMsg);
            return false;

        }
        if(organization==""){

            var errorMsg='Please Type Organization First!!'
            validationError(errorMsg)
            return false;

        }
        if (organization.length > 100){

            var errorMsg='Organization Should not more than 100 Charecter Length!!';
            validationError(errorMsg);
            return false;

        }
        if(relation==""){

            var errorMsg='Please Type Relation First!!'
            validationError(errorMsg)
            return false;

        }
        if (relation.length > 45){

            var errorMsg='Relation Should not more than 45 Charecter Length!!';
            validationError(errorMsg);
            return false;

        }

        if(phone==""){

            var errorMsg='Please Type a Phone Number First!!'
            validationError(errorMsg)
            return false;

        }

        if(!phone.match(chk)) {

            var errorMsg='Please enter a valid Phone number!!';
            validationError(errorMsg);
            return false;

        }
        if(phone.length >20) {

            var errorMsg='Phone number must be less than 20 charecter!!';
            validationError(errorMsg);
            return false;

        }

        if(email==""){

            var errorMsg='Please Type a Email First!!'
            validationError(errorMsg)
            return false;

        }

        if(!email.match(mailformat))
        {
            var errorMsg='You have entered an invalid email address!';
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