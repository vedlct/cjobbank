
<html>

<style>

    table, th, td {
        border: 2px solid ;
    }

</style>

<table class="table">


    <tr>
        <td colspan="18"><span style="text-align: center"><h4>LIST OF CANDIDATES FOR THE POSITION OF  <?php echo e(strtoupper($jobTitle['title'])); ?> FOR CARITAS CENTRAL OFFICE</h4></span></td>
    </tr>

    <tr>
        <td colspan="7"></td>
        <td colspan="3"><span style="text-align: center"><h4>Last date: <?php echo e($jobTitle['deadline']); ?></h4> </span></td>
        <td colspan="8"> </td>
    </tr>

</table>




<table class="table">
    <thead>

    <tr >
        <th>Sl No.</th>
        <th>NAME</th>
        <th>Gender</th>
        <th>Disability</th>
        <th>Ethnicity</th>
        <th width="10">  AGE  </th>
        <th>Educational Qualification and name of Institution</th>
        <th>Professional Qualification</th>
        <th>Training</th>
        <th>Job Experiences/ Employment History </th>
        <th>Salary</th>
        <th>National ID Card</th>
        <th>Photo</th>
        <th>Name of  two Referees (2)</th>
        <th>Relative in CB</th>
        <th>Remarks</th>

    </tr>
    </thead>
    <?php
        $sl=1;
    ?>
    <?php $__currentLoopData = $AppliedCandidateList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $eduList=array();
        $qList=array();
        $trainList=array();
        $jobList=array();
        $salList=array();
        $refList=array();
        $relList=array();

    
        ?>
        <?php $__currentLoopData = $educationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($education['fkemployeeId'] == $list['employeeId']): ?>
                <?php

                    array_push($eduList,$education);
                    ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $qualificationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($q['fkemployeeId'] == $list['employeeId']): ?>
                    <?php
                    array_push($qList,$q);
                    ?>
                <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $trainingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($tList['fkemployeeId'] == $list['employeeId']): ?>
                    <?php
                    array_push($trainList,$tList);
                    ?>
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $jobExperienceList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($jList['fkemployeeId'] == $list['employeeId']): ?>
                    <?php
                    array_push($jobList,$jList);
                    ?>
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $salaryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($sList['fkemployeeId'] == $list['employeeId']): ?>
                    <?php
                    array_push($salList,$sList);
                    ?>
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $refreeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($rList['fkemployeeId'] == $list['employeeId']): ?>
                    <?php
                    array_push($refList,$rList);
                    ?>
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $relativeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($reList['fkemployeeId'] == $list['employeeId']): ?>
                    <?php
                    array_push($relList,$reList);
                    ?>
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <?php
            $count=8;



            if(count($eduList) >$count){
                $count=count($eduList)*2;
            }
            if(count($trainList) >$count){
                $count=count($trainList)*2;
            }
            if(count($jobList) >$count){
                $count=count($jobList)*2;
            }

            ?>


    <tbody>


        <tr>
            <td rowspan="<?php echo e($count); ?>" style="text-align: center" valign="middle"><?php echo e($sl); ?></td>
            <td><b><?php echo e($list['firstName']." ".$list['lastName']); ?></b></td>

            <td valign="middle" rowspan="<?php echo e($count); ?>">
                            <span style="text-align: center">

                                <?php $__currentLoopData = GENDER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($value==$list['gender']): ?> <?php echo e($key); ?> <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
            </td>

            <td valign="middle" rowspan="<?php echo e($count); ?>">

                <span style="text-align: center">

                                <?php $__currentLoopData = DISABILITY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value==$list['disability']): ?> <?php echo e($key); ?> <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </span>

            </td>
            <td valign="middle" rowspan="<?php echo e($count); ?>">

                <span style="text-align: center">

                    <?php $__currentLoopData = $ethnicity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($eth->ethnicityId==$list['ethnicityId']): ?> <?php echo e($eth->ethnicityName); ?> <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </span>

            </td>
            <td valign="middle" rowspan="<?php echo e($count); ?>" style="text-align: center">
                <?php echo e($list['AgeYear']); ?>.<?php echo e(substr($list['AgeMonth'],0,1)); ?>yrs
            </td>
            <td>

            </td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td valign="middle" rowspan="<?php echo e($count); ?>" style="text-align: center">
                <?php echo e($list['nationalId']); ?>


            </td>
            <td valign="middle" align="center" rowspan="<?php echo e($count); ?>" style="text-align: center">
                <?php if($list['image']): ?>
                    Yes
                <?php else: ?>
                    No
                <?php endif; ?>

            </td>

            <td></td>
            <td></td>

            <td valign="middle" align="center" rowspan="<?php echo e($count); ?>" style="text-align: center">

            </td>

        </tr>




        <?php for($i=0 ;$i<$count;$i++): ?>
            <tr>

                <td>
                    <?php if($i==0): ?> <?php endif; ?>
                    <?php if($i==1): ?> Cell-<?php echo e($list['personalMobile']); ?>, <?php echo e($list['homeNumber']); ?>  <?php endif; ?>
                    <?php if($i==2): ?> <?php endif; ?>
                    <?php if($i==3): ?> Skype address: <?php echo e($list['skype']); ?> <?php endif; ?>
                    <?php if($i==4): ?>  Email-<?php echo e($list['email']); ?> <?php endif; ?>
                    <?php if($i==5): ?>Alternative Mail:<?php echo e($list['alternativeEmail']); ?> <?php endif; ?>
                    <?php if($i==6): ?> <?php endif; ?>
                    <?php if($i==7): ?> <?php endif; ?>
                    <?php if($i==8): ?> Present Address : <?php endif; ?>
                    <?php if($i==9): ?><?php echo e($list['presentAddress']); ?>  <?php endif; ?>
                    <?php if($i==10): ?> <?php endif; ?>
                    <?php if($i==11): ?> Parmanent Address : <?php endif; ?>
                    <?php if($i==12): ?><?php echo e($list['parmanentAddress']); ?> <?php endif; ?>
                    <?php if($i==13): ?> <?php endif; ?>


                </td>
                <td>
                    <?php if($i==0): ?> <?php endif; ?>
                    <?php if($i==1): ?>  <?php endif; ?>
                    <?php if($i==2): ?> <?php endif; ?>
                    <?php if($i==3): ?> <?php endif; ?>
                    <?php if($i==4): ?> <?php endif; ?>
                    <?php if($i==5): ?> <?php endif; ?>
                    <?php if($i==6): ?> <?php endif; ?>
                    <?php if($i==7): ?> <?php endif; ?>
                    <?php if($i==8): ?> <?php endif; ?>
                    <?php if($i==9): ?> <?php endif; ?>
                    <?php if($i==10): ?> <?php endif; ?>
                    <?php if($i==11): ?> <?php endif; ?>
                    <?php if($i==12): ?> <?php endif; ?>
                    <?php if($i==13): ?> <?php endif; ?>
                </td>
                <td>

                </td>
                
                <td>
                    <?php if($i==0 && count($eduList)>0): ?>
                        <?php echo e($eduList[0]['educationLevelName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($eduList[0]['institutionName']); ?><br>&nbsp;&nbsp;
                        Result:<?php echo e($eduList[0]['result']); ?><br>&nbsp;&nbsp;
                        <?php if($eduList[0]['educationMajorName']): ?>
                        Major:<?php echo e($eduList[0]['educationMajorName']); ?><br>
                        <?php endif; ?>
                        <?php if($eduList[0]['boardName']): ?>
                        Board:<?php echo e($eduList[0]['boardName']); ?><br>
                        <?php endif; ?>


                    <?php endif; ?>
                        <?php if($i%2==0 && count($eduList)>$i/2): ?>
                        <?php echo e($eduList[$i/2]['institutionName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($eduList[$i/2]['institutionName']); ?><br>&nbsp;&nbsp;
                        Result:<?php echo e($eduList[$i/2]['result']); ?><br>&nbsp;&nbsp;
                        <?php if($eduList[$i/2]['educationMajorName']): ?>
                        Major:<?php echo e($eduList[$i/2]['educationMajorName']); ?><br>
                        <?php endif; ?>
                        <?php if($eduList[$i/2]['boardName']): ?>
                        Board:<?php echo e($eduList[$i/2]['boardName']); ?><br>
                        <?php endif; ?>

                        <?php endif; ?>
                    
                            
                            
                            
                            
                                
                            
                            
                                
                            

                        

                    
                            
                            
                            
                            
                                
                            
                            
                                
                            

                        
                    
                    
                            
                            
                            
                            
                                
                            
                            
                                
                            


                        
                    
                    
                            
                            
                            
                            
                                
                            
                            
                                
                            
                        
                    
                    
                            
                            
                            
                            
                                
                            
                            
                                
                            

                        
                    
                    
                            
                            
                            
                            
                                
                            
                            
                                
                            
                        

                    
                            
                            
                            
                            
                                
                            
                            
                                
                            
                        
                </td>


                <td></td>
                <td> </td>
                <td></td>
                
                <td>

                    <?php if($i==0 && count($qList) >0): ?>
                        <?php echo e($qList[0]['certificateName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[0]['institutionName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[0]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[0]['endDate']); ?><br>&nbsp;&nbsp;


                    <?php endif; ?>

                    <?php if($i==2 && count($qList) >1): ?>
                        <?php echo e($qList[1]['certificateName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[1]['institutionName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[1]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[1]['endDate']); ?><br>&nbsp;&nbsp;
                    <?php endif; ?>

                    <?php if($i==4 && count($qList) >2): ?>
                        <?php echo e($qList[2]['certificateName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[2]['institutionName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[2]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[2]['endDate']); ?><br>&nbsp;&nbsp;

                    <?php endif; ?>

                    <?php if($i==6 && count($qList) >3): ?>
                        <?php echo e($qList[3]['certificateName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[3]['institutionName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[3]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[3]['endDate']); ?><br>&nbsp;&nbsp;

                    <?php endif; ?>
                    <?php if($i==8 && count($qList) >4): ?>
                        <?php echo e($qList[4]['certificateName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[4]['institutionName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[4]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[4]['endDate']); ?><br>&nbsp;&nbsp;

                    <?php endif; ?>

                    <?php if($i==10 && count($qList) >5): ?>
                        <?php echo e($qList[5]['certificateName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[5]['institutionName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[5]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[5]['endDate']); ?><br>&nbsp;&nbsp;
                    <?php endif; ?>

                    <?php if($i==12 && count($qList) >6): ?>
                        <?php echo e($qList[6]['certificateName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[6]['institutionName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[6]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($qList[6]['endDate']); ?><br>&nbsp;&nbsp;
                    <?php endif; ?>


                </td>
                
                <td>

                    <?php if($i==0 && count($trainList) >0): ?>
                        <?php echo e($trainList[0]['trainingName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[0]['vanue']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[0]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[0]['endDate']); ?><br>&nbsp;&nbsp;
                        
                    <?php endif; ?>

                    <?php if($i==2 && count($trainList) >1): ?>
                        <?php echo e($trainList[1]['trainingName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[1]['vanue']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[1]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[1]['endDate']); ?><br>&nbsp;&nbsp;
                    <?php endif; ?>

                    <?php if($i==4 && count($trainList) >2): ?>
                        <?php echo e($trainList[2]['trainingName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[2]['vanue']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[2]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[2]['endDate']); ?><br>&nbsp;&nbsp;

                    <?php endif; ?>

                    <?php if($i==6 && count($trainList) >3): ?>
                        <?php echo e($trainList[3]['trainingName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[3]['vanue']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[3]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[3]['endDate']); ?><br>&nbsp;&nbsp;

                    <?php endif; ?>
                    <?php if($i==8 && count($trainList) >4): ?>
                        <?php echo e($trainList[4]['trainingName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[4]['vanue']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[4]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[4]['endDate']); ?><br>&nbsp;&nbsp;

                    <?php endif; ?>

                    <?php if($i==10 && count($trainList) >5): ?>
                        <?php echo e($trainList[5]['trainingName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[5]['vanue']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[5]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[5]['endDate']); ?><br>&nbsp;&nbsp;
                    <?php endif; ?>

                    <?php if($i==12 && count($trainList) >6): ?>
                        <?php echo e($trainList[6]['trainingName']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[6]['vanue']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[6]['startDate']); ?><br>&nbsp;&nbsp;
                        <?php echo e($trainList[6]['endDate']); ?><br>&nbsp;&nbsp;
                    <?php endif; ?>


                </td>
                
                <td>
                    <?php if($i==0 && count($jobList) >0): ?>
                            <?php echo e($jobList[0]['organization']); ?><br>&nbsp;&nbsp;
                            <?php echo e($jobList[0]['degisnation']); ?><br>&nbsp;&nbsp;
                           From <?php echo e($jobList[0]['startDate']); ?> To
                            <?php if($jobList[0]['endDate']): ?>
                            <?php echo e($jobList[0]['endDate']); ?>

                            <?php else: ?>
                                Running
                            <?php endif; ?>


                    <?php endif; ?>

                    <?php if($i==2 && count($jobList) >1): ?>
                        <?php echo e($jobList[1]['organization']); ?><br>&nbsp;&nbsp;
                        <?php echo e($jobList[1]['degisnation']); ?><br>&nbsp;&nbsp;
                        From <?php echo e($jobList[1]['startDate']); ?> To
                        <?php if($jobList[1]['endDate']): ?>
                            <?php echo e($jobList[1]['endDate']); ?>

                        <?php else: ?>
                            Running
                        <?php endif; ?>

                    <?php endif; ?>

                    <?php if($i==4 && count($jobList) >2): ?>
                        <?php echo e($jobList[2]['organization']); ?><br>&nbsp;&nbsp;
                        <?php echo e($jobList[2]['degisnation']); ?><br>&nbsp;&nbsp;
                        From <?php echo e($jobList[2]['startDate']); ?> To
                        <?php if($jobList[2]['endDate']): ?>
                            <?php echo e($jobList[2]['endDate']); ?>

                        <?php else: ?>
                            Running
                        <?php endif; ?>

                    <?php endif; ?>

                    <?php if($i==6 && count($jobList) >3): ?>
                        <?php echo e($jobList[3]['organization']); ?><br>&nbsp;&nbsp;
                        <?php echo e($jobList[3]['degisnation']); ?><br>&nbsp;&nbsp;
                        From <?php echo e($jobList[3]['startDate']); ?> To
                        <?php if($jobList[3]['endDate']): ?>
                            <?php echo e($jobList[3]['endDate']); ?>

                        <?php else: ?>
                            Running
                        <?php endif; ?>

                    <?php endif; ?>

                    <?php if($i==8 && count($jobList) >4): ?>
                        <?php echo e($jobList[4]['organization']); ?><br>&nbsp;&nbsp;
                        <?php echo e($jobList[4]['degisnation']); ?><br>&nbsp;&nbsp;
                        From <?php echo e($jobList[4]['startDate']); ?> To
                        <?php if($jobList[4]['endDate']): ?>
                            <?php echo e($jobList[4]['endDate']); ?>

                        <?php else: ?>
                            Running
                        <?php endif; ?>


                    <?php endif; ?>

                    <?php if($i==10 && count($jobList) >5): ?>
                        <?php echo e($jobList[5]['organization']); ?><br>&nbsp;&nbsp;
                        <?php echo e($jobList[5]['degisnation']); ?><br>&nbsp;&nbsp;
                        From <?php echo e($jobList[5]['startDate']); ?> To
                        <?php if($jobList[5]['endDate']): ?>
                            <?php echo e($jobList[5]['endDate']); ?>

                        <?php else: ?>
                            Running
                        <?php endif; ?>


                    <?php endif; ?>

                    <?php if($i==12 && count($jobList) >6): ?>
                        <?php echo e($jobList[6]['organization']); ?><br>&nbsp;&nbsp;
                        <?php echo e($jobList[6]['degisnation']); ?><br>&nbsp;&nbsp;
                        From <?php echo e($jobList[6]['startDate']); ?> To
                        <?php if($jobList[6]['endDate']): ?>
                            <?php echo e($jobList[6]['endDate']); ?>

                        <?php else: ?>
                            Running
                        <?php endif; ?>

                    <?php endif; ?>



                </td>
                
                <td>
                    <?php if($i==0): ?> Current Salary : <?php echo e($salList[0]['currentSalary']); ?>  <?php endif; ?>
                    <?php if($i==1): ?> Expected Salary : <?php echo e($salList[0]['expectedSalary']); ?><?php endif; ?>
                </td>
                
                <td>
                    <?php if($i==0 && count($refList) >0): ?>
                        <?php echo e($refList[0]['firstName']); ?>  <?php echo e($refList[0]['lastName']); ?><br>&nbsp;&nbsp;
                       Email : <?php echo e($refList[0]['email']); ?><br>&nbsp;&nbsp;
                       Phone : <?php echo e($refList[0]['phone']); ?>

                    <?php endif; ?>
                    <?php if($i==2 && count($refList) >1): ?>
                            <?php echo e($refList[1]['firstName']); ?>  <?php echo e($refList[1]['lastName']); ?><br>;&nbsp;&nbsp;
                            Email : <?php echo e($refList[1]['email']); ?><br>&nbsp;&nbsp;
                            Phone : <?php echo e($refList[1]['phone']); ?>


                        <?php endif; ?>
                    <?php if($i==4 && count($refList) >2): ?>
                            <?php echo e($refList[2]['firstName']); ?>  <?php echo e($refList[2]['lastName']); ?><br>&nbsp;&nbsp;
                            Email : <?php echo e($refList[2]['email']); ?><br>&nbsp;&nbsp;
                            Phone : <?php echo e($refList[2]['phone']); ?>


                        <?php endif; ?>
                    <?php if($i==6 && count($refList) >3): ?>
                            <?php echo e($refList[3]['firstName']); ?>  <?php echo e($refList[3]['lastName']); ?><br>&nbsp;&nbsp;
                            Email : <?php echo e($refList[3]['email']); ?><br>&nbsp;&nbsp;
                            Phone : <?php echo e($refList[3]['phone']); ?>


                        <?php endif; ?>
                    <?php if($i==8 && count($refList) >4): ?>
                            <?php echo e($refList[4]['firstName']); ?>  <?php echo e($refList[1]['lastName']); ?><br>&nbsp;&nbsp;
                            Email : <?php echo e($refList[4]['email']); ?><br>&nbsp;&nbsp;
                            Phone : <?php echo e($refList[4]['phone']); ?>


                    <?php endif; ?>


                </td>
                <td></td>
                <td></td>

                <td>
                    <?php if($i==0 && count($relList) >0): ?>
                        <?php echo e($relList[0]['firstName']); ?>  <?php echo e($relList[0]['lastName']); ?><br>&nbsp;&nbsp;
                        Designation : <?php echo e($relList[0]['degisnation']); ?><br>&nbsp;&nbsp;

                    <?php endif; ?>
                    <?php if($i==2 && count($relList) >1): ?>
                        <?php echo e($relList[1]['firstName']); ?>  <?php echo e($relList[1]['lastName']); ?><br>;&nbsp;&nbsp;
                        Designation : <?php echo e($relList[1]['degisnation']); ?><br>&nbsp;&nbsp;


                    <?php endif; ?>
                    <?php if($i==4 && count($relList) >2): ?>
                        <?php echo e($relList[2]['firstName']); ?>  <?php echo e($relList[2]['lastName']); ?><br>&nbsp;&nbsp;
                        Designation : <?php echo e($relList[2]['degisnation']); ?><br>&nbsp;&nbsp;


                    <?php endif; ?>
                    <?php if($i==6 && count($relList) >3): ?>
                        <?php echo e($relList[3]['firstName']); ?>  <?php echo e($relList[3]['lastName']); ?><br>&nbsp;&nbsp;
                        Designation : <?php echo e($relList[3]['degisnation']); ?><br>&nbsp;&nbsp;


                    <?php endif; ?>
                    <?php if($i==8 && count($relList) >4): ?>
                        <?php echo e($relList[4]['firstName']); ?>  <?php echo e($relList[1]['lastName']); ?><br>&nbsp;&nbsp;
                        Designation : <?php echo e($relList[4]['degisnation']); ?><br>&nbsp;&nbsp;
                    <?php endif; ?>




                </td>




            </tr>


        <?php endfor; ?>


        

            
            
            
            




        
        
        
            
            
            

        

        
            
            
            
            
        

        
            
            
            
            

        

        
            
                
            
            
            
            
        
        
            
            
            
            

        
        
            
            
            
            
        
        
            
            
            
            

        

        
            
            
            
            
        
        
            
            
            
            
        
        
            
        
        
            
            
            
            

        
        
            
            
            
            

        








            

                   
                

                


            


                        


                        
                            
                            
                        

                
                


                    
                        
                    



                    
                        
                    

                


                    
                        
                    



                    
                        
                    

                    
                    




            








            

            
            

            
            
            
            
            
            
            
            
            
            
            
            
            
            



    </tbody>
        <?php $sl++;
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</html>
