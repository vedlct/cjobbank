<?php error_reporting(0); ?>
<html lang="en">
<head>
    <title>Curriculam Vitae of <?php echo e($personalInfo->firstName); ?> <?php echo e($personalInfo->lastName); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }

        input {
            border: medium none;
            padding: 0;
        }
        .label{
            background-color: #eff0f1;
        }

        @page  {
            margin-bottom:5px;margin-top: 15px;
        }
    </style>

</head>
<body style="margin-bottom:5px;">
<div style="margin-bottom:0px;" class="">
    <div style="background: #fff;margin-bottom:0px; " class="">

        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <tr>
                <td style="border: none;text-align: center"><h2 style="font-size: 24px; border: none; text-align: center"><span style="border-bottom: 1px solid #000">Curriculam Vitae</span> </h2></td>
            </tr>

        </table>
        <table border="0" style="width:100%; border: none;">
            <tr>
                <td style="text-align: left; border: none;width: 85%; ">
                    <h3 style=""><?php echo e($personalInfo->firstName); ?> <?php echo e($personalInfo->lastName); ?></h3>
                    <p style="max-width: 300px">Cell No: <?php echo e($personalInfo->personalMobile); ?> <br>
                        Email: <?php echo e($personalInfo->email); ?> <br>
                        Address: <?php echo e($personalInfo->presentAddress); ?>

                    </p>

                </td>
                <?php if(isset($viewMode)): ?>
                <td style="width: 15%; border: none; "><img height="150px" width="150px" src="<?php echo e(url('public/candidateImages/thumb').'/'.$personalInfo->image); ?>" alt=""></td>
                <?php else: ?>
                <td style="width: 15%; border: none; "><img height="150px" width="150px" src="<?php echo e(public_path().'/candidateImages/thumb/'.$personalInfo->image); ?>" alt=""></td>
                <?php endif; ?>
            </tr>

        </table>


        <?php if($personalInfo->objective): ?>
            <table border="0" style="width:100%;border: none;">
                <tr>
                    <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Objective</b> </td>
                </tr>
            </table>
            <table border="0" style="width:100%; margin-top: 10px; border: none;">
                <tr>
                    <td style="width: 100%;border: none;text-align: justify"><?php echo e($personalInfo->objective); ?></td>
                </tr>
            </table>

        <?php endif; ?>


        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Education</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; ">
            <thead>
            <tr>
                <th style="text-align: center" >Degree</th>
                <th style="text-align: center" >Institution / Board</th>
                <th style="text-align: center" >Passing Year</th>
                <th style="text-align: center" >Result</th>
            </tr>
            </thead>
            <tbody >
            <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Key => $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($edu->passingYear==null): ?>
                    <tr>
                        <td style="text-align: center"><?php echo e($edu->educationLevelName); ?> in <?php echo e($edu->degreeName); ?> </td>
                        
                        <td style="text-align: center"><?php echo e($edu->institutionName); ?>

                            <?php if($edu->boardName): ?>
                                /<?php echo e($edu->boardName); ?>

                            <?php endif; ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo e($edu->passingYear); ?>

                        </td>

                        <td style="text-align: center"> <?php echo e($edu->result); ?></td>
                    </tr>
                    <?php unset($education[$Key]); ?>
                    <?php break; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align: center"><?php echo e($edu->educationLevelName); ?> in <?php echo e($edu->degreeName); ?> </td>
                    
                    <td style="text-align: center"><?php echo e($edu->institutionName); ?>

                        <?php if($edu->boardName): ?>
                            /<?php echo e($edu->boardName); ?>

                        <?php endif; ?>
                    </td>

                    <td style="text-align: center">
                        <?php echo e($edu->passingYear); ?>

                    </td>

                    <td style="text-align: center"> <?php echo e($edu->result); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Job Experience</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <?php if($jobExperience->isEmpty()): ?><tr><td style=" border: none; text-align: center"> <strong>None </strong> </td> </tr><?php else: ?>

                <?php $count=1;$flag=0;?>
                <?php $__currentLoopData = $jobExperience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td width="5%" style="border: none; vertical-align: top">
                            <span class="bold"><?php echo e($count++); ?>.</span>
                        </td>
                        <td>

                            <span class="bold"> Company Name : </span> &nbsp;&nbsp; <?php echo e($exp->organization); ?>  &nbsp;&nbsp;
                            <div class="pull-right"><span class="bold">Position:</span>&nbsp;<?php echo e($exp->degisnation); ?> </div><br>
                            <p><span class="bold" > Major Responsibilities :</span>&nbsp;&nbsp;
                                <span style="text-align: justify"><?php echo $exp->majorResponsibilities; ?></span> <br></p>
                            <span class="bold"> Address:</span>&nbsp;&nbsp;&nbsp; <?php echo e($exp->address); ?> <br>
                            <span class="bold"> Duration:</span>&nbsp;&nbsp;&nbsp; <?php echo e($exp->startDate); ?> -  <?php if($exp->endDate): ?> <?php echo e($exp->endDate); ?> <?php else: ?>
                                Continuing
                            <?php endif; ?>
                            <br>

                            <span class="bold"> Total job experience:</span>

                            <?php if($exp->startDate!=null && $exp->endDate==null): ?>
                                <?php echo e($sub_struct=\Carbon\Carbon::parse($exp->startDate)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days')); ?>

                            <?php else: ?>
                                <?php echo e($sub_struct=\Carbon\Carbon::parse($exp->startDate)->diff(\Carbon\Carbon::parse($exp->endDate))->format('%y years, %m months and %d days')); ?>

                            <?php endif; ?>
                        </td>
                    </tr>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </table>

        
        
        
        
        
        
        

        
        
        
        
        
        

        
        
        
        
        


        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000; background-color: #eff0f1;" ><b>Training Certificate</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <?php if($trainingCertificate->isEmpty()): ?><tr><td style=" border: none; text-align: center"> <strong>None </strong> </td></tr> <?php endif; ?>

            <?php $count=1;?>


            <?php $__currentLoopData = $trainingCertificate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td width="5%" style="border: none; vertical-align: top">
                        <span><?php echo e($count++); ?>.</span>
                    </td>
                    <td style="border: none;">
                        Training Name : <?php echo e($certificate->trainingName); ?> <br>
                        Vanue: <?php echo e($certificate->vanue); ?> <br>
                        Duration: <?php echo e($certificate->startDate); ?> -  <?php if($certificate->endDate): ?> <?php echo e($certificate->endDate); ?> <?php else: ?>
                            Continuing
                        <?php endif; ?>
                        (<?php echo e($certificate->year); ?>Y - <?php echo e($certificate->month); ?>M - <?php echo e($certificate->week); ?>W - <?php echo e($certificate->day); ?>D - <?php echo e($certificate->hour); ?>H)
                        .

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>

        
        
        

        <table border="0" style="width:100%;border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Professional Certificate</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <?php if($professionalCertificate->isEmpty()): ?><tr><td style=" border: none; text-align: center"> <strong>None </strong> </td></tr> <?php endif; ?>

            <?php $__currentLoopData = $professionalCertificate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td style="border: none; width: 20%">Certificate Name</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;"><b><?php echo e($certificate->certificateName); ?></b> </td>
                </tr>
                <tr>

                    <td style="border: none; width: 20%">Institution Name</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;"><?php echo e($certificate->institutionName); ?> </td>
                </tr>
                <tr>

                    <td style="border: none; width: 20%">Session</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;"><?php echo e($certificate->startDate); ?> - <?php echo e($certificate->endDate); ?>

                        (<?php echo e($certificate->year); ?>Y - <?php echo e($certificate->month); ?>M - <?php echo e($certificate->week); ?>W - <?php echo e($certificate->day); ?>D - <?php echo e($certificate->hour); ?>H)
                    </td>
                </tr>

                <tr>
                    <td style="border: none; width: 20%">Status</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;">
                        <?php if($certificate->status == 1): ?> On Going
                        <?php else: ?>
                            Completed
                        <?php endif; ?>

                    </td>
                </tr>

                <tr>

                    <td style="border: none; width: 20%">Result</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;"><?php echo e($certificate->result); ?></td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table >

        

        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        

        

        

        
        
        
        



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Computer Skill</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <thead>
            <tr>
                <th style="width: 70%;text-align: center" >Skill</th>
                <th style="width: 30%;text-align: center">Level</th>

            </tr>

            </thead>
            <?php $__currentLoopData = $empComputerSkill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td style="text-align: center"><?php echo e($skills->computerSkillName); ?></td>

                    <td style="text-align: center"><?php if($skills->SkillAchievement==1): ?>General <?php elseif($skills->SkillAchievement==2): ?>Advance <?php endif; ?></td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>






        
        <table border="0" style="width:100%; margin-top: 5px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Personal Info</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <tr>
                <td  style="border: none;">
                    <label>Father Name : </label><?php echo e($personalInfo->fathersName); ?>

                </td>


                <td style="border: none;">
                    <label> Mother Name :</label> <?php echo e($personalInfo->mothersName); ?>

                </td>
            </tr>
            <tr>
                <td  style="border: none;">
                    <label>Gender :</label>
                    <?php if($personalInfo->gender == "M"): ?>
                        <?php echo e("Male"); ?>

                    <?php else: ?>
                        <?php echo e("Female"); ?>

                    <?php endif; ?>
                </td>



                <td style="border: none;">
                    <label>Date of Birth :</label> <?php echo e($personalInfo->dateOfBirth); ?>

                </td>
            </tr>
            <tr>
                <td  style="border: none;">
                    <label> Religion : </label><?php echo e($personalInfo->religionName); ?>

                </td>


                <td style="border: none;">

                    <label> Nationality :</label> <?php echo e($personalInfo->nationalityName); ?>


                </td>
            </tr>

            <tr>
                <td  style="border: none;">
                    <label> Blood Group: </label><?php echo e(strtoupper($personalInfo->bloodGroup)); ?>

                </td>


                <td style="border: none;">
                    <?php $__currentLoopData = MARITAL_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($personalInfo->maritalStatus==$value): ?> <label>Marital Status :</label> <?php echo e($key); ?><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </td>
            </tr>


            <tr>
                <td  style="border: none;">
                    <label>Passport :</label> <?php echo e($personalInfo->passport); ?>

                </td>


                <td style="border: none;">
                    <?php if(!is_null($personalInfo->nationalId)): ?>
                        <label>National Id :</label> <?php echo e($personalInfo->nationalId); ?>

                    <?php elseif(!is_null($personalInfo->birthID)): ?>
                        <label>Birth Id :</label> <?php echo e($personalInfo->birthID); ?>


                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td  style="border: none;" colspan="2">
                    <label>Permanent address :</label> <?php echo e($personalInfo->parmanentAddress); ?>

                </td>
            </tr>

            
            
            
            
            



        </table>

        <?php if($empOtherInfo): ?>
            <table border="0" style="width:100%; margin-top: 25px; border: none;">
                <tr>
                    <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Other info</b> </td>
                </tr>
            </table>

            <table border="0" style="width:100%; margin-top: 10px; border: none;">

                <tr>
                    <td  style="border: none;">
                        <label><b>Extracurricular activities :</b></label><?php echo e($empOtherInfo->extraCurricularActivities); ?>

                    </td>
                </tr>
                <tr>

                    <td style="border: none;">
                        <label> <b>Interests :</b></label><?php echo e($empOtherInfo->interests); ?>

                    </td>
                </tr>
                <tr>
                    <td style="border: none;">
                        <label> <b>Awards received :</b></label><?php echo e($empOtherInfo->awardReceived); ?>

                    </td>
                </tr>
                <tr>
                    <td style="border: none;">
                        <label> <b>Research / Publication :</b></label><?php echo e($empOtherInfo->researchPublication); ?>

                    </td>
                </tr>
            </table>
        <?php endif; ?>

        
        
        
        
        
        
        

        

        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Languages</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 5px; ">

            <tr style=" ">
                <?php if($languageNames->isEmpty()): ?><td style=" border: none; text-align: center"> <strong>None </strong> </td> <?php endif; ?>
                <?php $__currentLoopData = $languageNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <?php echo e($lname->languagename); ?>

                    </td>


                    <?php $__currentLoopData = $languages->where('fklanguageHead',$lname->fklanguageHead); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <td>
                            <?php echo e($lan->languageSkillName); ?> : <?php echo e($lan->rate); ?>


                        </td>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tr>


        </table>


        <table border="0" style="width:100%; margin-top: 5px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Membership in Professional Network</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 5px; border: none;">

            <tr style=" border: none;">
                <?php if($memberShip->isEmpty()): ?><td style=" border: none; text-align: center"> <strong>None </strong> </td> <?php endif; ?>
                <?php $__currentLoopData = $memberShip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <td style="border: none;">
                        <span class="bold"> Network name :</span><?php echo e($mem->networkName); ?>  <br>
                        <span class="bold">Membership type:&nbsp; &nbsp;</span><?php echo e($mem->membershipType); ?>  &nbsp; &nbsp;&nbsp;<span class="bold">  Duration:</span> &nbsp;&nbsp;<?php echo e($mem->duration); ?> <br>

                    </td>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tr>


        </table>


        <table border="0" style="width:100%; margin-top: 5px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Relative in Caritas</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 5px; border: none;">

            <tr style=" border: none;">
                <?php if($relativeCb->isEmpty()): ?><td style=" border: none; text-align: center"> <strong>None </strong> </td> <?php endif; ?>
                <?php $__currentLoopData = $relativeCb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <td style="border: none;">
                        <p> Name : <?php echo e($ref->firstName); ?> <?php echo e($ref->lastName); ?> <br>
                            Position: <?php echo e($ref->degisnation); ?> <br>
                        </p>
                    </td>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tr>


        </table>

        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Referee</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <?php $count=1;?>
            <?php if($refree->isEmpty()): ?><tr><td style=" border: none; text-align: center"> <strong>None </strong> </td></tr> <?php endif; ?>


            <?php $__currentLoopData = $refree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="">

                    <td width="2%" style="border: none; vertical-align: top">
                        <span><?php echo e($count++); ?>.</span>
                    </td>

                    <td style="border: none;">
                        Name : <?php echo e($ref->firstName); ?> <?php echo e($ref->lastName); ?> <br>
                        Contact: <?php echo e($ref->phone); ?> <br>
                        Position: <?php echo e($ref->presentposition); ?> <br>
                        Email: <?php echo e($ref->email); ?>


                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        </table>
        <table border="0" style="width:100%; margin-top: 25px; border: none;">

            <b>Declaration:</b> I do hereby declare that the above information is true and correct to the best of my knowledge.

            <tr>
                <?php if(isset($viewMode)): ?>
                <td style="width: 13%; border: none; "><img style="height:100px; width:100px;" src="<?php echo e(url('public/candidateSigns/thumb').'/'.$personalInfo->sign); ?>" ></td>
                <?php else: ?>
                <td style="width: 13%; border: none; "><img style="height:100px; width:100px;" src="<?php echo e(public_path().'/candidateSigns/thumb/'.$personalInfo->sign); ?>" ></td>
                <?php endif; ?>
            </tr>
            <tr>
                <td style="width: 13%; border: none; ">&nbsp;&nbsp;Signature</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
