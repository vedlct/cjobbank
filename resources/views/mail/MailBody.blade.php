<!DOCTYPE html>
<html lang="en">
<body>

Dear @if($employeeInfo['gender'] == "M"){{"Mr. "}}@elseif($employeeInfo['gender'] == "F"){{"Ms. "}}@endif{{$employeeInfo['firstName'].' '.$employeeInfo['lastName']}},<br>


Please see the attached file with this email.<br>

Thanks.


<hr>
For any kind of inquiry please contact support@caritasbd.com.





</body>
</html>
