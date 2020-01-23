<!DOCTYPE html>
<html lang="en">
<body>

<div> <h3>Cordial Greetings from Caritas Bangladesh!</h3></div><br><br>

You are welcome to our Caritas Family. Your account has been created, thank you for joining with us. <br> <br>

Username: <?php echo e($email); ?><br>
Password: <?php echo e($pass); ?><br><br>

To active your account and for completing the process please click the link below:<br>

<a href="<?php echo e(route('account.active',['email'=>$email,'userToken'=>$userToken])); ?>">Please click this link to activate your account</a><br><br>

------------------------<br><br>

<b>Please note that, if clicking on the link doesn't work, try copying and pasting it into your browser.</b><br><br>

Best wishes,<br><br>

<b>Caritas Bangladesh</b><br><br>

<b>To know more about Caritas Bangladesh, you are welcome to our website/ facebook page/ YouTube:</b><br><br>
<b>Web:</b> https://www.caritasbd.org<br>
<b>Facebook:</b> https://www.facebook.com/Caritasbangladesh2016/



</body>
</html>