<!DOCTYPE html>
<html lang="en">
<body>
Dear @if($gender=="M"){{'Mr. '}}@elseif($gender=="F"){{'Mrs. '}}@else{{" "}}@endif{{$firstName }} {{ $lastName}}<br><br>
<h3>Cordial Greetings from Caritas Bangladesh!</h3><br>
We have received a request from you that, you forgotten your password. We are happy to help you. <br><br>

Username: {{$email}}<br>
Password: {{$pass}}<br>
To reactivate your account please click the link below:<br>

<a href="{{route('account.changePassForgetPassword',['email'=>$email,'password'=>$pass,'userToken'=>$userToken])}}">Please click this link to Change Your Password</a><br>
------------------------<br><br>

<b>
    Please note that, if clicking on the link doesn't work, communicate with our support team through the following address:<br>
    cbgeneral@caritasbd.org

</b><br><br>

Best wishes, <br><br>

<b>Caritas Bangladesh Support Team</b><br><br>

<b>To know more about Caritas Bangladesh, you are welcome to our website/ facebook page/ YouTube:</b><br><br>
<b>Web:</b> https://www.caritasbd.org<br>
<b>Facebook:</b> https://www.facebook.com/Caritasbangladesh2016/


</body>
</html>