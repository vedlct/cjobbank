<!DOCTYPE html>
<html lang="en">
<body>
Dear <?php if($gender=="M"): ?><?php echo e('Mr. '); ?><?php elseif($gender=="F"): ?><?php echo e('Mrs. '); ?><?php else: ?><?php echo e(" "); ?><?php endif; ?><?php echo e($firstName); ?> <?php echo e($lastName); ?><br><br>
<h3>Cordial Greetings from Caritas Bangladesh!</h3><br>
We have received a request from you that, you forgotten your password. We are happy to help you. <br><br>

Username: <?php echo e($email); ?><br>
Password: <?php echo e($pass); ?><br>
To reactivate your account please click the link below:<br>

<a href="<?php echo e(route('account.changePassForgetPassword',['email'=>$email,'password'=>$pass,'userToken'=>$userToken])); ?>">Please click this link to Change Your Password</a><br>
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