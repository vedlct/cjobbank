<!DOCTYPE html>
<html lang="en">
<body>

<div align="center"> <h3>Thanks for signing up!</h3></div>
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br>

------------------------<br>
Username: {{$email}}<br>
Password: {{$pass}}<br>
------------------------<br>



<form class="form-horizontal" method="post" action="{{route('account.active')}}" >
    {{csrf_field()}}
    <div class="form-group">
        <input type="hidden"  class="form-control" id="userId" name="userId" value="{{$userId}}" placeholder="User Email" required />

    </div>



    <br>

    <div class="form-group">
        <div style="margin-left: 14%" class="col-md-8 custom-input-style">
            <input type="submit" value="Please click this link to activate your account:" class="btn btn-primary">
        </div>
    </div>

</form>


</body>
</html>