
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo e(url('public/css/exceltable.css')); ?>" rel="stylesheet">
</head>

<table class="table">


    <tr>
        <td colspan="22" style="text-align: center;vertical-align: top;height: 20;"><span style="font-weight: bold"><?php echo e(strtoupper($jobTitle['title'])); ?></span>
            <b>- <?php echo e($excelName); ?></b>
        </td>
    </tr>

    <tr>
        <td colspan="22" style="text-align: center;vertical-align: top;height: 20">
            <span style="font-weight: bold">Last date: <?php echo e($jobTitle['deadline']); ?> </span>
        </td>
        
        
        
    </tr>

</table>


<table class="table">
    <thead>

    <tr style="border: 2px solid #000000;">
        <th colspan="1"style="text-align: center;">Sl No.</th>
        <th colspan="3"style="text-align: center">NAME</th>
        
        
        
        <th colspan="1"style="text-align: center" >  AGE  </th>
        <th style="text-align: center" colspan="5">Educational Qualification</th>
        
        
        <th style="text-align: center" colspan="5">Job Experiences</th>
        <?php if($withoutsalary != 'true'): ?>
        <th style="text-align: center" colspan="1">Salary Information</th>
        <?php endif; ?>
        <th style="text-align: center" colspan="2">National ID No./ Birth Identification No.</th>
        <th style="text-align: center">Photo (2)</th>
        <th style="text-align: center">Name of  two Referees</th>
        


    </tr>
    </thead>
    <tbody>

    <?php $__currentLoopData = $AppliedCandidateList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="border: 2px solid #000000;">
            <td colspan="1"height="600" style="text-align: left;vertical-align: middle;">
             <?php echo e($key+1); ?>

            </td>
            <td colspan="3"height="600" style="text-align: left;vertical-align: top;">
                <?php echo e($emp['firstName']); ?>   <?php echo e($emp['lastName']); ?>

                <br>
                Cell: <?php echo e($emp['personalMobile']); ?> <br>
                Email: <?php echo e($emp['email']); ?> <br>

                <span class="bold">Present Address</span>:<br>
                <?php echo e($emp['presentAddress']); ?> <br>

                <span class="bold">Permanent Address:</span><br>
                <?php echo e($emp['parmanentAddress']); ?> <br>
            </td>
            
                
            
            
                
            
            
                
            
            <td colspan="1" height="600" style="text-align: center;vertical-align: middle;">
                <?php echo e($emp['AgeYear']); ?>.<?php echo e(substr($emp['AgeMonth'],0,1)); ?>yrs
            </td>
            <td colspan="5" height="600" style="text-align: left;vertical-align: top;">












                <?php  $temp=0; ?>
                <?php $__currentLoopData = $educationList->where('fkemployeeId',$emp['employeeId']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e(++$temp); ?>. Degree title : <?php echo e($edu->degreeName); ?><br>
                    Major Subject: <?php echo e($edu->educationMajorName); ?><br>
                    Passing Year: <?php echo e($edu->passingYear); ?> , Board: <?php echo e($edu->boardName); ?><br>
                    Name of Institution/school/college/university: <br>
                    <?php echo e($edu->institutionName); ?><br>
                    Status : <?php if($edu->status==1): ?> Ongoing <?php elseif($edu->status==2): ?> Complete <?php endif; ?> , Result: <?php echo e($edu->result); ?><br><br>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>

            
                
                    
                    
                    
                    
                    
                    


                 

            
            
                

                    
                    
                    
                    
                    

                

            
            <td colspan="5" height="600" style="text-align: left;vertical-align: top;">
                <?php $tJEY=0;$tJEM=0; $totalexpyr = 0;$totalexpDay = 0;$tJED=0; $totalexpmonth = 0;$subDay=0 ?>
                <?php $__currentLoopData = $jobExperienceList->where('fkemployeeId',$emp['employeeId']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    Position: <?php echo e($job->degisnation); ?><br>
                    Organization name: <?php echo e($job->organization); ?><br>
                    <?php echo e($job->address); ?><br>
                    years:
                        <?php if($job->startDate!=null && $job->endDate==null): ?>

                            <?php echo e($sub_struct=\Carbon\Carbon::parse($job->startDate)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days')); ?>

                            <?php
                            $subDay=\Carbon\Carbon::parse($job->startDate)->diffInDays(\Carbon\Carbon::now())
                            ?>
                        <?php else: ?>
                            <?php echo e($sub_struct=\Carbon\Carbon::parse($job->startDate)->diff(\Carbon\Carbon::parse($job->endDate))->format('%y years, %m months and %d days')); ?>

                            <?php
                                $subDay=\Carbon\Carbon::parse($job->startDate)->diffInDays(\Carbon\Carbon::parse($job->endDate))
                            ?>
                        <?php endif; ?>

<?php
//                        $result = array($job->expDay);
//
//
//                        $sub_struct_month = ($result[0] / 30) ;
//                        $sub_struct_month = floor($sub_struct_month);
//                        $sub_struct_months = floor($sub_struct_month%12);
//                        $sub_struct_year = floor($sub_struct_month / 12) ;
//                        $sub_struct_days = floor($result[0] % 30); // the rest of days
//                        echo $sub_struct = $sub_struct_year."years ".$sub_struct_months."months ".$sub_struct_days."days";
//
//
                        ?>

                    <br>
                    
                    
                    Served From /To: <?php echo e($job->startDate); ?> - <?php if($job->startDate!=null && $job->endDate==null): ?> Running <?php else: ?> <?php echo e($job->endDate); ?><?php endif; ?><br>
                    <br>

                        <?php

                        $totalexpDay = $totalexpDay + $subDay ;

                        ?>
                    <br>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <?php
                    $now = \Carbon\Carbon::now();
                    $nextDate=\Carbon\Carbon::now()->addDays($totalexpDay);
                    $diff=$now->diff($nextDate)->format('%y years, %m months and %d days');

//                    $result = array($totalexpDay);
//
//
//                    $sub_struct_month = ($result[0] / 30) ;
//                    $sub_struct_month = floor($sub_struct_month);
//
//                    $sub_struct_year = floor($sub_struct_month / 12) ;
//
//                    $sub_struct_months = floor($sub_struct_month % 12);
//
//                    $sub_struct_days = floor($result[0] % 30); // the rest of days
//
//                    $sub_struct = $sub_struct_year."years ".$sub_struct_months."months ".$sub_struct_days."days";


                    ?>
                    <br>
                    Total job experience : <?php echo e($diff); ?>


            </td>
            <?php if($withoutsalary != 'true'): ?>
            <td  height="600" style="text-align: left;vertical-align: middle;" colspan="1">
                <?php $__currentLoopData = $salaryList->where('fkemployeeId',$emp['employeeId']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    Current:<?php echo e($salary->currentSalary); ?><br>
                    Expected:<?php echo e($salary->expectedSalary); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </td>
            <?php endif; ?>
            <td height="600" style="text-align: center;vertical-align: middle;" colspan="2">

                
                    
                
                    
                
                    <?php if(!is_null($emp['nationalId'])): ?>

                    National ID No. :<?php echo e($emp['nationalId']); ?>


                    <?php elseif(!is_null($emp['birthID'])): ?>

                    Birth Identification No. :<?php echo e($emp['birthID']); ?>


                    <?php endif; ?>

            </td>
            <td height="600" style="text-align: center;vertical-align: middle;">

                <?php if($emp['image'] && $emp['sign']): ?>
                    Yes
                <?php else: ?>
                    No
                <?php endif; ?>
            </td>
            <td height="600" style="text-align: center;vertical-align: middle;">
                <?php if($refreeList->where('fkemployeeId',$emp['employeeId'])->count()>1): ?>
                    Yes
                <?php else: ?>
                    No
                <?php endif; ?>
                
                    
                    
                    
                

            </td>
            
                
                    
                    
                   
                 

            
        </tr>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

</html>
