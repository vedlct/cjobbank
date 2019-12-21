<?php $__env->startSection('content'); ?>

    <style>

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            font-weight: bold;
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
        .bold{
            font-weight: bold;
        }
    </style>


    <div style="position: relative;" class="row ">


        <div class="col-12">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">
                    <?php if($allEmp != null && $allEmp->cvStatus == 1): ?>

                        <div id="regForm">
                            
                            <div class="pull-right"><a class="btn btn-sm btn-success" href="<?php echo e(route('userCv.post1',$allEmp->employeeId)); ?>" >Download</a></div>


                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                    <tr>
                                        <td style="border: none;"><h2 style="font-size: 24px; border: none; text-align: center"><span style="border-bottom: 1px solid #000">Curriculam Vitae</span> </h2></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 30px; border: none;">
                                    <tr>
                                        <td style="text-align: left; border: none;">
                                            <h3 style=""><?php echo e($personalInfo->firstName); ?> <?php echo e($personalInfo->lastName); ?></h3>
                                            <p style="max-width: 300px"><span class="bold">Cell No:</span> <?php echo e($personalInfo->personalMobile); ?> <br>
                                                <span class="bold">Email:</span> <?php echo e($personalInfo->email); ?> <br>
                                                <span class="bold">Address:</span> <?php echo e($personalInfo->presentAddress); ?>

                                            </p>

                                        </td>
                                        <?php
                                            if($personalInfo->image != ''){
                                                $personalInfoimage = $personalInfo->image;
                                            }else{
                                                $personalInfoimage = '1cvImage.jpg';
                                            }
                                        ?>
                                        <td style="width: 13%; border: none; "><img height="150px" width="150px"
                                                src="
                                                <?php if($viewMode): ?>
                                                <?php echo e(url('public/candidateImages/thumb').'/'.$personalInfoimage); ?>

                                                <?php else: ?>
                                                <?php echo e(public_path().'/candidateImages/thumb/'.$personalInfoimage); ?>

                                                <?php endif; ?>
                                                "></td>
                                    </tr>

                                </table>
                            </div>

                            

                            <p style="page-break-after: always"></p>
                            <div class="table-responsive">
                                <table border="0" style="width:100%;border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Objective</b> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                    <tr>
                                        <td style="width: 100%;border: none;"><?php echo e($personalInfo->objective); ?></td>
                                    </tr>
                                </table>
                            </div>


                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 25px; border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Education</b> </td>
                                    </tr>
                                </table>
                            </div>


                            
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; ">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center" >Degree</th>
                                        <th style="text-align: center" >Institution / Board</th>
                                        <th style="text-align: center" >Passing year</th>
                                        <th style="text-align: center" >Result</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td style="text-align: center"><?php echo e($edu->degreeName); ?> </td>
                                            <td style="text-align: center"><?php echo e($edu->institutionName); ?>

                                                <?php if($edu->boardName): ?>
                                                    /
                                                    <?php echo e($edu->boardName); ?>


                                                <?php endif; ?>

                                            </td>

                                            <td style="text-align: center"><?php echo e($edu->passingYear); ?> </td>

                                            <td style="text-align: center"> <?php echo e($edu->result); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>


                                </table >
                            </div>

                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 15px; border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Job Experience</b> </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                    <?php if($jobExperience->isEmpty()): ?><td style=" border: none; text-align: center"> <strong>None </strong> </td> <?php else: ?>
                                        <?php $count=1;?>
                                        <?php $__currentLoopData = $jobExperience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td width="2%" style="border: none; vertical-align: top">
                                                    <span class="bold"><?php echo e($count++); ?>.</span>
                                                </td>


                                                <td style="border: none;">

                                                    <span class="bold"> Company name : </span> &nbsp;&nbsp <?php echo e($exp->organization); ?>  &nbsp;&nbsp;
                                                    <div class="pull-right"><span class="bold">Position:</span>&nbsp;&nbsp;&nbsp; <?php echo e($exp->degisnation); ?> </div><br>

                                                    <span class="bold"> Major responsibilities :</span>&nbsp;&nbsp;&nbsp; <?php echo e($exp->majorResponsibilities); ?> <br>
                                                    <span class="bold"> Address:</span>&nbsp;&nbsp;&nbsp; <?php echo e($exp->address); ?> <br>
                                                    <span class="bold"> Duration:</span>&nbsp;&nbsp;&nbsp; <?php echo e($exp->startDate); ?> -  <?php if($exp->endDate): ?> <?php echo e($exp->endDate); ?> <?php else: ?>
                                                        Continuing
                                                    <?php endif; ?>
                                                    .<br>

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
                            </div>

                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 15px; border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000; background-color: #eff0f1;" ><b>Training Certificate</b> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                    <?php if($trainingCertificate->isEmpty()): ?><td style=" border: none; text-align: center"> <strong>None </strong> </td> <?php endif; ?>

                                    <?php $count=1;?>


                                    <?php $__currentLoopData = $trainingCertificate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td width="2%" style="border: none; vertical-align: top">
                                                <span class="bold"><?php echo e($count++); ?>.</span>
                                            </td>
                                            <td style="border: none;">
                                                <span class="bold"> Training name :</span> &nbsp;&nbsp;&nbsp;<?php echo e($certificate->trainingName); ?> <br>
                                                <span class="bold"> Vanue:</span> &nbsp;&nbsp;&nbsp;<?php echo e($certificate->vanue); ?> <br>
                                                <span class="bold"> Duration:</span> &nbsp;&nbsp;&nbsp;<?php echo e($certificate->startDate); ?> -  <?php if($certificate->endDate): ?> <?php echo e($certificate->endDate); ?> <?php else: ?>
                                                    Continuing
                                                <?php endif; ?>
                                                .



                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>

                            <p style="page-break-after: always"></p>
                            <div class="table-responsive">
                                <table border="0" style="width:100%;border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Professional Certificate</b> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                    <?php if($professionalCertificate->isEmpty()): ?><td style=" border: none; text-align: center"> <strong>None </strong> </td> <?php endif; ?>

                                    <?php $__currentLoopData = $professionalCertificate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td style="border: none; width: 20%"><span class="bold">Certificate name</span></td>
                                            <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                            <td style="border: none;"><b><?php echo e($certificate->certificateName); ?></b> </td>
                                        </tr>
                                        <tr>

                                            <td style="border: none; width: 20%"><span class="bold">Institution name</span></td>
                                            <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                            <td style="border: none;"><?php echo e($certificate->institutionName); ?> </td>
                                        </tr>
                                        <tr>

                                            <td style="border: none; width: 20%"><span class="bold">Session</span></td>
                                            <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                            <td style="border: none;width: 40%"><?php echo e($certificate->startDate); ?> - <?php echo e($certificate->endDate); ?></td>
                                        </tr>


                                        <tr>
                                            <td style="border: none; width: 20%"><span class="bold">Status</span></td>
                                            <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                            <td style="border: none;width: 20%">
                                                <?php if($certificate->status == 1): ?> On Going
                                                <?php else: ?>
                                                    Completed
                                                <?php endif; ?>

                                            </td>
                                            <td style="border: none; width: 10%"><span class="bold">Result</span></td>
                                            <td style="border: none; width: 5%"><span class="bold">:</span></td>
                                            <td style="border: none;"><?php echo e($certificate->result); ?></td>
                                        </tr>



                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table >
                            </div>

                            
                            
                            
                            
                            
                            
                            
                            
                            

                            
                            
                            
                            
                            
                            

                            

                            

                            
                            
                            
                            


                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 25px; border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Computer Skill</b> </td>
                                    </tr>
                                </table>
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                </table>
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                    <thead>
                                    <th style="width: 70%;text-align: center" >Skill</th>
                                    <th style="width: 30%;text-align: center">Level</th>
                                    </thead>
                                    <?php $__currentLoopData = $empComputerSkill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td style="text-align: center"><?php echo e($skills->computerSkillName); ?></td>

                                            <td style="text-align: center"><?php if($skills->SkillAchievement==1): ?>General <?php elseif($skills->SkillAchievement==2): ?>Advance <?php endif; ?></td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>

                            </div>




                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 25px; border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Personal Info</b> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                </table>
                            </div>


                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">

                                    <tr>
                                        <td  style="border: none;">
                                            <label>Father name : </label><?php echo e($personalInfo->fathersName); ?>

                                        </td>


                                        <td style="border: none;">
                                            <label> Mother name :</label> <?php echo e($personalInfo->mothersName); ?>

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
                                            <label>Date of birth :</label> <?php echo e($personalInfo->dateOfBirth); ?>

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

                                    <tr>
                                        <td  style="border: none;" >
                                            <label>Expected salary :</label> <?php echo e($salary->expectedSalary ?? 'N/A'); ?>

                                        </td>
                                    </tr>




                                </table>
                            </div>

                            <?php if($empOtherInfo): ?>
                                <div class="table-responsive">
                                    <table border="0" style="width:100%; margin-top: 25px; border: none;">
                                        <tr>
                                            <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Other Info</b> </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table border="0" style="width:100%; margin-top: 10px; border: none;">

                                        <tr>
                                            <td  style="border: none;">
                                                <label>Extracurricular activities :</label><?php echo e($empOtherInfo->extraCurricularActivities); ?>

                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="border: none;">
                                                <label> Interests :</label><?php echo e($empOtherInfo->interests); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;">
                                                <label> Awards received :</label><?php echo e($empOtherInfo->awardReceived); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;">
                                                <label> Research / Publication :</label><?php echo e($empOtherInfo->researchPublication); ?>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <?php endif; ?>



                            
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 5px; border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Languages</b> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 5px; border: none;">

                                    <tr style=" border: none;">
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
                            </div>




                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 5px; border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Membership in Professional Network</b> </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="table-responsive">

                                <table border="0" style="width:100%; margin-top: 5px; border: none;">

                                    <tr style=" border: none;">
                                        <?php if($memberShip->isEmpty()): ?><td style=" border: none; text-align: center"> <strong>None </strong> </td> <?php endif; ?>
                                        <?php $__currentLoopData = $memberShip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <td style="border: none;">
                                                <span class="bold"> Network name :</span><?php echo e($mem->networkName); ?> <br>
                                                <span class="bold">Membership type:</span><?php echo e($mem->membershipType); ?>

                                                &nbsp; <span class="bold">  Duration:</span> &nbsp;&nbsp;&nbsp;<?php echo e($mem->duration); ?> <br>

                                            </td>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tr>


                                </table>
                            </div>


                            



                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 5px; border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Relative in Caritas</b> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 5px; border: none;">

                                    <tr style=" border: none;">
                                        <?php if($relativeCb->isEmpty()): ?><td style=" border: none; text-align: center"> <strong>None </strong> </td> <?php endif; ?>
                                        <?php $__currentLoopData = $relativeCb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <td style="border: none;">
                                                <span class="bold"> Name :</span> &nbsp;&nbsp;&nbsp;<?php echo e($ref->firstName); ?> <?php echo e($ref->lastName); ?> <br>
                                                <span class="bold">  Position:</span> &nbsp;&nbsp;&nbsp;<?php echo e($ref->degisnation); ?> <br>

                                            </td>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tr>


                                </table>
                            </div>

                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 15px; border: none;">
                                    <tr>
                                        <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Referee</b> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table border="0" style="width:100%; margin-top: 10px; margin-bottom:15px;border: none;">

                                    <?php $count=1;?>


                                    <?php $__currentLoopData = $refree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr style="">

                                            <td width="2%" style="border: none; vertical-align: top">
                                                <span class="bold"><?php echo e($count++); ?>.</span>
                                            </td>

                                            <td style="border: none;">
                                                <span class="bold">Name :</span> &nbsp;&nbsp;&nbsp;<?php echo e($ref->firstName); ?> <?php echo e($ref->lastName); ?> <br>
                                                <span class="bold">Contact:</span> &nbsp;&nbsp;&nbsp;<?php echo e($ref->phone); ?> <br>
                                                <span class="bold">Position:</span> &nbsp;&nbsp;&nbsp;<?php echo e($ref->presentposition); ?> <br>
                                                <span class="bold">email:</span> &nbsp;&nbsp;&nbsp;<?php echo e($ref->email); ?>


                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                </table>
                            </div>

                            <div class="table-responsive">

                                <table border="0" style="width:100%; margin-top: 25px; border: none;">

                                    <b>Declaration:</b> I do hereby declare that the above information is true and correct to the best of my knowledge.
                                    <?php if($personalInfo->sign != ''): ?>
                                    <tr>
                                        <td style="width: 13%; border: none; "><img height="100px" width="100px"
                                                        src="
                                                        <?php if($viewMode): ?>
                                                        <?php echo e(url('public/candidateSigns/thumb').'/'.$personalInfo->sign); ?>

                                                        <?php else: ?>
                                                        <?php echo e(public_path().'/candidateSigns/thumb/'.$personalInfo->sign); ?>

                                                        <?php endif; ?>
                                                        " alt=""></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td style="width: 13%; border: none; ">&nbsp;&nbsp;Signature</td>
                                    </tr>
                                </table>

                            </div>


                        </div>
                    <?php endif; ?>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->




<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot-js'); ?>

    <script>
        <?php if(Session::has('message') && $msg != null): ?>

        $.alert({
            title: 'Error',
            type: 'red',
            content: '<?php echo $msg?>',
            buttons: {
                tryAgain: {
                    text: 'Ok',
                    btnClass: 'btn-green',
                    action: function () {

                    }
                }
            }
        });
        <?php endif; ?>
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>