<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        #footer {
            position:absolute;
            bottom:0;
            font-size: 10px;
        }

        body{
            font-family: 'bangla', sans-serif;
            /*font-size: 14px;*/
            padding: 0px;
            margin: 0px;
            /*font-weight: 300;*/
        }
        @page{

            margin: 25px 20px;
        }
        b{
            10;
        }
    </style>


</head>
<body style="margin: 0 auto">
<div id="header" style="margin: 0px 0px 5px 0px;">

    <table >
        <tr>
            <td style="width: 40%;"  >
                <table >
                    <tr >
                        <td  style="font-size: 25px;text-align: justify" >
                            <b>কারিতাস বাংলাদেশ</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px;text-align: justify">
                            সমাজ কল্যাণ ও মানব উন্নয়নের জন্য বাংলাদেশের কাথলিক বিশপ সম্মেলনীর একটি জাতীয় প্রতিষ্ঠান
                        </td>

                    </tr>
                </table>
            </td >
            <td style="width: 15%;" align="center" >
            <?php if(isset($viewMode)): ?>
                <img src="<?php echo e(url('public//logo/TCL_logo.png')); ?>" alt="logo">
            <?php else: ?>
                <img src="<?php echo e(public_path().'/logo/TCL_logo.png'); ?>" alt="logo">
            <?php endif; ?>
            </td>

            <td style="width: 45%;">
                <table width="100%" >
                    <tr>
                        <td style="font-size: 25px;text-align: justify">
                            <b>Caritas Bangladesh</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px;text-align: justify">
                            A National Organisation of the Catholic Bishops' Conference of Bangladesh for Social Welfare and Human Development
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>
<div style="margin: 10px 0px 5px 0px;">

    <table width="100%" >
        <tr>
            <td><?php echo e($address->officeAddress); ?></td>
        </tr>
    </table>
</div>

<div style="margin: 0px">

    <table style="width: 100%;border-top: 1px solid black;border-bottom: 1px solid black" >
        <tr>
            <td align="left" style="width: 50%;">
                <b>Ref No: </b><?php echo e($refNo); ?>


            </td>
            <td style="width: 50%;" align="center">
                <b>Date: </b><?php echo e(date('d-m-Y')); ?>

            </td>
        </tr>
    </table>

</div>

<div style="margin: 30px 30px 30px 30px;">



            <table style="width: 50%" >
                <tr >
                    <td align="left">
                        To <br>
                        <?php if($empInfo->gender == 'F'): ?>
                            Ms.
                        <?php elseif($empInfo->gender == 'M'): ?>
                            Mr.
                        <?php endif; ?>
                        <?php echo e($empInfo->firstName.' '.$empInfo->lastName); ?><br>
                        <?php echo e($empInfo->presentAddress); ?><br>
                        Email: <?php echo e($empInfo->email); ?><br>
                        Cell: <?php echo e($empInfo->personalMobile); ?>

                    </td>
                </tr>
            </table>




</div>

<div style="margin: 0px 30px 30px 30px;">

    <table style="width: 100%">
        <tr>
        <td style="width: 100%" align="left">
            <b>Subject: <?php echo e($subjectLine.' for the post of '); ?><?php echo e($jobInfo->position); ?></b>
        </td>
        </tr>

    </table>

</div>

<div style="margin: 0px 30px 0px 30px;">

    <table style="width: 100%">
        <tr>
        <td style="width: 100%" align="left">
            <b>Dear <?php if($empInfo->gender == "M"): ?><?php echo e("Mr "); ?><?php elseif($empInfo->gender == "F"): ?><?php echo e("Ms "); ?><?php endif; ?><?php echo e($empInfo->firstName.' '.$empInfo->lastName); ?></b>,
        </td>
        </tr>
        <tr>
            <td align="left" width="100%"><br>
                <span><?php echo $emailtamplateBody; ?></span>
                <span>This is a computer-generated document. No signature is required</span>
            </td>
        </tr>
    </table>

</div>
<div style="margin: 30px 30px 0px 30px;">

        <br>
        <br>
        <br>
        <br>
        <br>

</div>

<div id="footer">
    <hr>
    <table style="font-size: 10px;width: 100%;margin-left: 20px">
        <tr>
            <td align="left" style="width: 60%">
                <table>
                    <tr  >
                        <td><?php echo $templateFooter; ?></td>
                    </tr>
                </table>
            </td>

            <td align="left" style="width: 40%;margin-left: 20px">
                <table >
                    <tr>
                        <td>
                            Tel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo e($address->zonePhone); ?><br>
                            E-mail&nbsp;&nbsp;&nbsp;: <?php echo e($address->zoneEmail); ?><br>
                            Website: <?php echo e($address->zoneWeb); ?>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
