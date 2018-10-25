<!DOCTYPE html>
<html lang="en">
<body>

<div align="center"> <h3>Thanks for signing up!</h3></div>
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br>

------------------------<br>
Username: {{$email}}<br>
Password: {{$pass}}<br>
------------------------<br>




<a href="{{route('account.active',['email'=>$email,'userToken'=>$userToken])}}">Please click this link to activate your account</a>


</body>
</html>