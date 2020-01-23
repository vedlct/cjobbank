<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
    .Border{
        border: 2px solid ;
    }


    td{
        wrap-text:true;
        vertical-align: top;
    }
    .bold{
        font-weight: bold;
    }
    .noTopBorder{
        border-top: none !important ;
        border-bottom: none !important ;
        border-right: 2px solid !important ;
        border-left: 2px solid !important ;
    }
    .testStyle{
        border-right: 2px solid !important ;
        border-left: 2px solid !important ;
    }
</style>

<body>


<table class="table">

    <tr>

        <td class="Border"colspan="34" style="text-align: center;vertical-align: top;height: 20"></td>

    </tr>
    <tr >
        <td class="Border"colspan="34" style="text-align: center;vertical-align: top;height: 20"><span style="font-weight: bold">CARITAS BANGLADESH</span></td>
    </tr>

    <tr>

        <td class="Border"colspan="34" style="text-align: center;">
            <span id="red" style="color: #FF0000"><?php echo e(strtoupper($jobTitle)); ?></span>
            <b>- <?php echo e($excelName); ?></b>
        </td>

    </tr>


</table>

<table class="table" style="font-size:10">
    <tr style="font-weight: bold">
        <td class="Border" colspan="1" style="text-align: center">Sl No.</td>
        <td class="Border" colspan="4" style="text-align: center">Name and personal information</td>
        <td class="Border" colspan="4" style="text-align: center">Questionnaire</td>
        <td class="Border" colspan="4" style="text-align: center">Educational/ professional/Training Information</td>
        <td class="Border" colspan="6" style="text-align: center">Job Experiences/ Employment History</td>
        <td class="Border" colspan="8" style="text-align: center">Extracurricular activities/ other skills</td>
        <td class="Border" colspan="4" style="text-align: center">References</td>
        <td class="Border" colspan="3" style="text-align: center">Remarks</td>
    </tr>
    <?php $sl=0; ?>
    <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td colspan="1" class="Border" height="620" style="text-align: left;border-right: 2px solid black!important"><?php echo e(++$sl); ?></td>
        <td colspan="4" height="620" class="testStyle" style="text-align: left;border-left: 2px solid black!important">
            <span style="text-align: left"><?php echo e($emp->firstName); ?> <?php echo e($emp->lastName); ?></span>
            <br>
            <span style="text-align: left">
                Telephone: <?php echo e($emp->telephone); ?><br>
                Personal Phone no:  <?php echo e($emp->personalMobile); ?><br>
                Alternative phone no: <?php echo e($emp->alternativePhoneNo); ?><br>
                Home Phone: <?php echo e($emp->homeNumber); ?><br>
                Office Phone: <?php echo e($emp->officeNumber); ?><br>
                Email: <?php echo e($emp->email); ?><br>
                Alternative Email: <?php echo e($emp->alternativeEmail); ?><br>
                Skype :  <?php echo e($emp->skype); ?><br>
                Date Of Birth: <?php echo e($emp->dateOfBirth); ?><br>

                <?php if(!is_null($emp->nationalId)): ?>

                National ID No. :<?php echo e($emp->nationalId); ?><br>

                <?php elseif(!is_null($emp->birthID)): ?>

                Birth Identification No. :<?php echo e($emp->birthID); ?><br>

                <?php endif; ?>

                
                Passport No:  <?php echo e($emp->passport); ?><br>

                Permanent Address: <?php echo e($emp->parmanentAddress); ?><br>


                Present Address: <?php echo e($emp->presentAddress); ?><br>

            </span>


        </td>




        <td colspan="4" class="Border" height="620" style="text-align: left;">


            <?php $__currentLoopData = $empQuestionAns->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($ans->ques); ?> <br>  <?php echo e($ans->ans); ?> <br>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>



        <td colspan="4" class="Border" height="620" style="text-align: left;">
            <?php  $temp=0; ?>
            <?php $__currentLoopData = $education->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(++$temp); ?>. Degree title : <?php echo e($edu->degreeName); ?><br>
                Major Subject: <?php echo e($edu->educationMajorName); ?><br>
                Passing Year: <?php echo e($edu->passingYear); ?> , Board: <?php echo e($edu->boardName); ?><br>
                Name of Institution/school/college/university: <br>
                    <?php echo e($edu->institutionName); ?><br>
                Status : <?php if($edu->status==1): ?> Ongoing <?php elseif($edu->status==2): ?> Complete <?php endif; ?> , Result: <?php echo e($edu->result); ?><br><br>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td colspan="6" class="Border" height="620"   style="text-align: left;">
            <?php $tJEY=0;$tJEM=0;$tJED=0; $totalexpyr = 0;$totalexpDay = 0; $totalexpmonth = 0;$subDay=0; ?>
            <?php $temp=0; $totalday  = 0; ?>
            <?php $__currentLoopData = $jobExperience->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(++$temp); ?>. Position: <?php echo e($job->degisnation); ?><br>
            Organization name: <?php echo e($job->organization); ?><br>
            Organizarion type: <?php echo e($job->organizationTypeName); ?><br>

            Type of Employment: <?php echo e($job->employmentType); ?><br>
            Served From /To: <?php echo e($job->startDate); ?> - <?php if($job->startDate!=null && $job->endDate==null): ?> Running <?php else: ?> <?php echo e($job->endDate); ?><?php endif; ?><br>
            Job location/Address: <?php echo e($job->address); ?><br>
            Name of Supervisor: <?php echo e($job->supervisorName); ?><br>

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






                <br><br>
                    <?php






                    $totalexpDay = $totalexpDay + $subDay ;
//                    $totalexpmonth = $totalexpmonth + $job->expMonth ;
//                    $totalexpyr = $totalexpyr + $job->expYear ;

                    ?>



            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <br>
                <?php

                $now = \Carbon\Carbon::now();
                $nextDate=\Carbon\Carbon::now()->addDays($totalexpDay);
                $diff=$now->diff($nextDate)->format('%y years, %m months and %d days');

//                $result = array($totalexpDay);
//                $sub_struct_month = floor($result[0] / 30) ;
//                $sub_struct_months = floor($sub_struct_month%12);
//                $sub_struct_year = floor($sub_struct_month / 12) ;
//                $sub_struct_days = floor($result[0] % 30); // the rest of days
//                $sub_struct = $sub_struct_year."years ".$sub_struct_months."months ".$sub_struct_days."days";

                ?>
                Total job experience :
                
                <?php echo e($diff); ?>

                
        </td>
        <td colspan="8" class="Border" height="620" style="text-align: left;">
            Extracurricular activities<br>
            1. Interests:<br>
            <?php echo e($emp->interests); ?><br>
            2.Awards received:<br>
            <?php echo e($emp->awardReceived); ?><br>
            3.Research/Publciation:<br>
            <?php echo e($emp->researchPublication); ?><br>


            
            
                
            

            Computer skill:<br>
            <?php $__currentLoopData = $computerSkill->where('fk_empId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                Name: <?php echo e($skill->computerSkillName); ?>  -<?php if($skill->SkillAchievement==1): ?> General <?php else: ?> Advanced <?php endif; ?> <br><br>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            Language Proficiency<br>
            <?php $__currentLoopData = $languageHead->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                Name: <?php echo e($lh->languagename); ?> <br>
                <?php $__currentLoopData = $language->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($lh->fklanguageHead == $l->fklanguageHead): ?>
                        Skill: <?php echo e($l->languageSkillName); ?>  -Rate: <?php echo e($l->rate); ?><br>


                    <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </td>
        <td colspan="4" class="Border" height="620" style="text-align: left;">
            <?php $temp=0;  ?>
            <?php $__currentLoopData = $reference->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(++$temp); ?>. <?php echo e($ref->firstName); ?> <?php echo e($ref->lastName); ?><br>
            <?php echo e($ref->presentposition); ?><br>
            <?php echo e($ref->organization); ?><br>
            Relation: <?php echo e($ref->relation); ?> <br>
            Cell Phone: <?php echo e($ref->phone); ?>              E-mail:<?php echo e($ref->email); ?><br><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td colspan="3" class="Border" height="620" style="text-align: left;"></td>

    </tr>
    <tr>
        <td colspan="1" class="Border" height="450" style="text-align: left;border-right: 2px solid black!important;border-bottom: 2px solid black!important "></td>
        <td colspan="4" class="testStyle" height="450" style="text-align: left;border-left: 2px solid black!important">



















        </td>
        <td colspan="4" class="Border" height="450" style="text-align: left;">
            
            
                
            
        </td>
        <td colspan="4" class="Border" height="450" style="text-align: left;">
            Professional Qualification:<br>
            <?php  $temp=1; ?>
            <?php $__currentLoopData = $pQualification->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($temp); ?>. Certificate Name: <?php echo e($qualification->certificateName); ?><br>
            Institution: <?php echo e($qualification->institutionName); ?><br>
            Duration: <?php echo e($qualification->startDate); ?> - <?php echo e($qualification->endDate); ?><br>

            Result: <?php echo e($qualification->result); ?><br>
                <?php  $temp++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td colspan="6" class="Border" height="450"   style="text-align: left;">
            <?php $temporary=0; ?>
            <?php $__currentLoopData = $jobExperience->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e(++$temporary); ?>.<?php echo e($job->organization); ?>-><?php echo e($job->degisnation); ?><br>
                Major Job responsibility: <?php echo $job->majorResponsibilities; ?><br>
                Key Achievement: <?php echo $job->keyAchivement; ?><br>
                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




            Previous work information in Caritas Bangladesh (If )<br>

                <?php $__currentLoopData = $previousWorkExperienceInCB->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pExp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            Position in Caritas: <?php echo e($pExp->designation); ?><br>
                            Served from/to: <?php echo e($pExp->startDate); ?>  To <?php echo e($pExp->endDate); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td colspan="8" class="Border" height="450" style="text-align: left;">

        </td>
        <td colspan="4" class="Border" height="450" style="text-align: left;">

            
            



        </td>
        <td colspan="3" class="Border" height="450" style="text-align: left;"></td>

    </tr>

    <tr>

        <td colspan="1" class="Border" height="550" style="text-align: left;"></td>
        <td colspan="4" class="Border"  height="550" style="text-align: left;"><span style="text-align: left">
                Fathers Name: <?php echo e($emp->fathersName); ?><br>
                Mothers Name: <?php echo e($emp->mothersName); ?><br>
                Spouse Name: <?php echo e($emp->spouse); ?><br>
                Blood Group: <?php echo e($emp->bloodGroup); ?><br>
                Gender: <?php echo e($emp->gender); ?><br>
                Nationality: <?php echo e($emp->nationalityName); ?><br>
                Ethnicity: <?php echo e($emp->ethnicityName); ?><br>
                Disability: <?php echo e($emp->disability); ?><br>
                Religion: <?php echo e($emp->religionName); ?><br>

            </span></td>
        <td colspan="4" class="Border" height="550" style="text-align: left;">
            Do you have any relatives working in Caritas Bangladesh?*<br>

            <?php $__currentLoopData = $relative->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($rel->firstName); ?>

                <?php echo e($rel->lastName); ?><br>
                <?php echo e($rel->degisnation); ?><br>
                Relation: <?php echo e($rel->relation); ?><br><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($relative->where('fkemployeeId',$emp->employeeId)->count() == 0): ?>
                No

            <?php endif; ?>



        </td>
        <td colspan="4" class="Border" height="550" style="text-align: left;">
            Training information:<br>
            <?php  $te=1; ?>
            <?php $__currentLoopData = $training->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($te); ?>. Training title: <?php echo e($t->trainingName); ?><br>
            Institute: <?php echo e($t->vanue); ?><br>
            Duration: <?php echo e($t->startDate); ?> - <?php echo e($t->endDate); ?><br>
            Country: <?php echo e($t->countryName); ?><br>
                <?php  $te++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td colspan="6" class="Border" height="550"   style="text-align: left;">
            Do you have any reservation contacting your employer?
            <?php $__currentLoopData = $jobExperience->where('fkemployeeId',$emp->employeeId)->where('endDate',null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($job->reservationContactingEmployer); ?>

                <br><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td colspan="8" class="Border" height="550" style="text-align: left;">

        </td>
        <td colspan="4" class="Border" height="550" style="text-align: left;">

        </td>
        <td colspan="3" class="Border" height="550" style="text-align: left;"></td>

    </tr>



    <tr>
        <td colspan="1" class="Border" height="300" style="text-align: left;"></td>
        <td colspan="4" class="Border" height="300" style="text-align: left;"><span style="text-align: left">
                Membership in Social Network :<br>
                <?php $__currentLoopData = $social->where('fkemployeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                Name of Network: <?php echo e($s->networkName); ?><br>
                Type of Membership: <?php echo e($s->membershipType); ?><br>
                Duration: <?php echo e($s->duration); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </span>

        </td>
        <td colspan="4" class="Border" height="300" style="text-align: left;">
            Answers of declaration form:
            <?php $__currentLoopData = $agreement->where('employeeId',$emp->employeeId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <?php echo e($ag->qus); ?> : <?php echo e($ag->ans); ?> <br>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </td>
        <td colspan="4"class="Border"  height="300" style="text-align: left;">

        </td>
        <td colspan="6" class="Border" height="300"   style="text-align: left;">

        </td>
        <td colspan="8"class="Border"  height="300" style="text-align: left;">

        </td>
        <td colspan="4" class="Border" height="300" style="text-align: left;">

        </td>
        <td colspan="3" class="Border" height="300" style="text-align: left;"></td>

    </tr>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

</body>
</html>
