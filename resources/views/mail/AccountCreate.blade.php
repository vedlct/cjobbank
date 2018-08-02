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
        <input type="hidden"  class="form-control" id="userEmail" name="userEmail" value="{{$email}}" placeholder="User Email" required />
        <input type="hidden"  class="form-control" id="pass" name="pass" value="{{$pass}}" placeholder="User Pass" required />
        <input type="hidden"  class="form-control" id="q1" name="q1" value="{{$q1}}" placeholder="User q1" required />
        <input type="hidden"  class="form-control" id="q2" name="q2" value="{{$q2}}" placeholder="User q2" required />
        <input type="hidden"  class="form-control" id="q3" name="q3" value="{{$q3}}" placeholder="User q1" required />
        <input type="hidden"  class="form-control" id="q4" name="q4" value="{{$q4}}" placeholder="User q1" required />
        <input type="hidden"  class="form-control" id="name" name="name" value="{{$name}}" placeholder="name" required />
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