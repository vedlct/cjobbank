<!DOCTYPE html>
<html lang="en">
<body>

<div align="center"> <h3>Thanks for signing up!</h3></div>
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br>

------------------------<br>
Username: <?php echo e($email); ?><br>
Password: <?php echo e($pass); ?><br>
------------------------<br>




<a href="<?php echo e(route('account.active',['email'=>$email,'userToken'=>$userToken])); ?>">Please click this link to activate your account</a>


</body>
</html>