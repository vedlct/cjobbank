
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
        @page  { margin-bottom: 0; }
    </style>

</head>
<body>
<div class="">
    <div style="background: #fff; " class="">

        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <tr>
                <td style="border: none;"><h2 style="font-size: 24px; border: none; text-align: center"><span style="border-bottom: 1px solid #000">Curriculam Vitae</span> </h2></td>
            </tr>

        </table>
        <table border="0" style="width:100%; margin-top: 30px; border: none;">
            <tr>
                <td style="text-align: left; border: none;">
                    <h3 style=""><?php echo e($personalInfo->firstName); ?> <?php echo e($personalInfo->lastName); ?></h3>
                    <p style="max-width: 300px">Cell No: <?php echo e($personalInfo->personalMobile); ?> <br>
                        email: <?php echo e($personalInfo->email); ?> <br>
                        address: <?php echo e($personalInfo->presentAddress); ?>

                    </p>

                </td>
                <td style="width: 13%; border: none; "><img height="150px" width="150px" src="<?php echo e(url('public/candidateImages/thumb').'/'.$personalInfo->image); ?>" alt=""></td>
            </tr>

        </table>



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Education</b> </td>
            </tr>
        </table>


        

        <table border="0" style="width:100%; margin-top: 10px; ">
            <thead>
            <tr>
                <th style="text-align: center" >Degree</th>
                <th style="text-align: center" >Institution</th>
                <th style="text-align: center" >Passing Year</th>
                <th style="text-align: center" >Result</th>
            </tr>
            </thead>
            <tbody >
            <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align: center"><b><?php echo e($edu->educationLevelName); ?> in <?php echo e($edu->degreeName); ?></b> </td>
                    <td style="text-align: center"><?php echo e($edu->institutionName); ?></td>

                    <td style="text-align: center"><?php echo e($edu->passingYear); ?> </td>

                    <td style="text-align: center"> <?php echo e($edu->result); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>


        </table >


        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Job Experience</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <?php $count=1;?>
            <?php $__currentLoopData = $jobExperience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td width="2%" style="border: none; vertical-align: top">
                        <span><?php echo e($count++); ?>.</span>
                    </td>


                    <td style="border: none;">

                        Company Name : <?php echo e($exp->organization); ?> <br>
                        Position: <?php echo e($exp->degisnation); ?> <br>
                        Address: <?php echo e($exp->address); ?> <br>
                        Duration: <?php echo e($exp->startDate); ?> -  <?php if($exp->endDate): ?> <?php echo e($exp->endDate); ?> <?php else: ?>
                            Continuing
                        <?php endif; ?>
                        .



                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>


        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000; background-color: #eff0f1;" ><b>Training Certificate</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <?php $count=1;?>


            <?php $__currentLoopData = $trainingCertificate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td width="2%" style="border: none; vertical-align: top">
                        <span><?php echo e($count++); ?>.</span>
                    </td>
                    <td style="border: none;">
                        Training Name : <?php echo e($certificate->trainingName); ?> <br>
                        Vanue: <?php echo e($certificate->vanue); ?> <br>
                        Duration: <?php echo e($certificate->startDate); ?> -  <?php if($certificate->endDate): ?> <?php echo e($certificate->endDate); ?> <?php else: ?>
                            Continuing
                        <?php endif; ?>
                        .



                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>

        <p style="page-break-after: always"></p>

        <table border="0" style="width:100%;border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Professional Certificate</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 10px; border: none;">
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
                    <td style="border: none;"><?php echo e($certificate->startDate); ?> - <?php echo e($certificate->endDate); ?></td>
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
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Personal Info</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <tr>
                <td  style="border: none;">
                    Father Name : <?php echo e($personalInfo->fathersName); ?>

                </td>


                <td style="border: none;">
                    Mother Name : <?php echo e($personalInfo->mothersName); ?>

                </td>
            </tr>
            <tr>
                <td  style="border: none;">
                    Gender :
                    <?php if($personalInfo->gender == "M"): ?>
                        <?php echo e("Male"); ?>

                    <?php else: ?>
                        <?php echo e("Female"); ?>

                    <?php endif; ?>
                </td>


                <td style="border: none;">
                    Date Of Birth : <?php echo e($personalInfo->dateOfBirth); ?>

                </td>
            </tr>
            <tr>
                <td  style="border: none;">
                    Religion : <?php echo e($personalInfo->religionName); ?>

                </td>


                <td style="border: none;">
                    Nationality : <?php echo e($personalInfo->nationalityName); ?>

                </td>
            </tr>
            <tr>
                <td  style="border: none;">
                    Permanent Address : <?php echo e($personalInfo->parmanentAddress); ?>

                </td>


                <td style="border: none;">
                    National Id : <?php echo e($personalInfo->nationalId); ?>

                </td>
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


            <?php $__currentLoopData = $refree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="">

                    <td width="2%" style="border: none; vertical-align: top">
                        <span><?php echo e($count++); ?>.</span>
                    </td>

                    <td style="border: none;">
                        Name : <?php echo e($ref->firstName); ?> <?php echo e($ref->lastName); ?> <br>
                        Contact: <?php echo e($ref->phone); ?> <br>
                        Position: <?php echo e($ref->presentposition); ?> <br>
                        email: <?php echo e($ref->email); ?>


                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        </table>


    </div>
</div>
</body>
</html>