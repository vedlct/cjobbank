<!DOCTYPE html>
<html lang="en">
<body>

<div align="center"> <h3>Thanks for Comming Again!</h3></div>
You can login with the following credentials after you have activated your account by pressing the url below.<br>

------------------------<br>
Username: {{$email}}<br>
------------------------<br>




<a href="{{route('account.Reactive',['email'=>$email,'userToken'=>$userToken])}}">Please click this link to activate your account</a>

</body>
</html>