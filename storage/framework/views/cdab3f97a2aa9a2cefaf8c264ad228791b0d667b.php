<!DOCTYPE html>
<html lang="en">
<body>

Dear <?php if($employeeInfo['gender'] == "M"): ?><?php echo e("Mr. "); ?><?php elseif($employeeInfo['gender'] == "F"): ?><?php echo e("Ms. "); ?><?php endif; ?><?php echo e($employeeInfo['firstName'].' '.$employeeInfo['lastName']); ?>,<br>


Please see the attached file with this email.<br>

Thanks.


<hr>
For any kind of inquiry please contact support@caritasbd.com.





</body>
</html>
