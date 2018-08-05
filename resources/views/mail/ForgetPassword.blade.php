<!DOCTYPE html>
<html lang="en">
<body>

<div align="center"> <h3>We received a request to reset your password !</h3></div>
Use the link below to set up a new password for your account. If you did not request to reset your password, Please Contact Us.<br>
------------------------<br>
Username: {{$email}}<br>
Password: {{$pass}}<br>
------------------------<br>



<a href="{{route('account.changePassForgetPassword',['email'=>$email,'password'=>$pass,'userToken'=>$userToken])}}">Please click this link to Change Your Password</a>


</body>
</html>