<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>


        @font-face {
            font-family: 'SolaimanLipi';
            src: url('public/fonts/SolaimanLipi.ttf')format('truetype');
        }
        #footer {

            position:absolute;
            bottom:0;
            font-size: 10px;


        }
        body{
            font-size: 14px;
            font-family: "SolaimanLipi", "DejaVu Sans", sans-serif;
        }

        @page{

            margin: 25px 20px;
        }


    </style>


</head>
<body style="margin: 0 auto">
<div id="header" style="margin: 0px 0px 5px 0px;">

    <table width="100%">
        <tr>
            <td  width="35%">
                <table align="left" >
                    <tr >
                        <td style="font-size: 20px;">
                            <p style="font-family:'SolaimanLipi',sans-serif;"><b>কারিতাস বাংলাদেশ</b><br>
                            <span style="font-size: 12px;">সমাজ কল্যাণ ও মানব উন্নয়নের জন্য বাংলাদেশের কাথলিক বিশপ সম্মেলনীর একটি জাতীয় প্রতিষ্ঠান</span>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" width="30%">
            <img  src="{{url('public/logo/TCL_logo.png')}}" alt="logo">
            </td>

            <td align="right"width="35%">
                <table >
                    <tr>
                        <td style="font-size: 20px;"> <b>Caritas Bangladesh</b><br>
                            <span style="font-size: 12px;">Central Office: 2, Outer Circular Road, Shantibagh, Dhaka-1217, Bangladesh, GPO Box-994, Dhaka - 1000</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>
<div style="margin: 0px 0px 5px 0px;">

    <table width="100%">
        <tr>
            <td width="100%" >

                Central Office: 2, Outer Circular Road, Shantibagh, Dhaka-1217, Bangladesh, GPO Box-994, Dhaka - 1000

            </td>
        </tr>
    </table>

</div>
<hr>
<div style="margin: 0px 0px 5px 0px;">

    <table width="100%">
        <td align="left" width="35%">
            <table >
                <tr  >
                    <td> <b>Ref No: </b>
                        AED/HR/(dummy text)
                </tr>
            </table>
        </td>
        <td align="center" width="30%">

        </td>

        <td width="35%">
            <table align="center" >
                <tr>
                    <td> <b>Date: </b>{{date('d-m-Y')}}</td>
                </tr>
            </table>
        </td>
    </table>

</div>
<hr>

<div style="margin: 0px 30px 30px 30px;">

    <table width="100%">
        <td align="left">
            <table width="50%" >
                <tr >
                    <td> {{$empInfo->firstName.' '.$empInfo->lastName}}<br>
                        {{$empInfo->presentAddress}}<br>
                        Email: {{$empInfo->email}}<br>
                        Cell: {{$empInfo->personalMobile}}
                    </td>
                </tr>
            </table>
        </td>

    </table>

</div>

<div style="margin: 0px 30px 30px 30px;">

    <table width="100%">
        <tr>
        <td width="100%" align="left">
            <b>Subject:{{$subjectLine.' for the post of '}}{{$jobInfo->position}}</b>
        </td>
        </tr>

    </table>

</div>

<div style="margin: 0px 30px 0px 30px;">

    <table width="100%">
        <tr>
        <td width="100%" align="left">
            <b>Dear</b>{{$empInfo->firstName.' '.$empInfo->lastName}},
        </td>
        </tr>
        <tr>

            <td align="left" width="100%">

                        <span>

With reference to your application for the post of {{$jobInfo->position}}, we would like to invite you for {{$testDetails}} to be held on the {{date('dS F Y (l)',strtotime($testDate))}} at {{$testAddress}}.
<br>
Please take note of the following information for attending the interview:<br>
1. That you are requested to be present for the interview on time.<br>
2. That no TA/DA will be provided for attending the above interview.<br>
3. That you are requested to bring original copies of all certificates during interview.<br>

                        </span>
            </td>

        </tr>

    </table>

</div>
<div style="margin: 30px 30px 0px 30px;">

    <table width="100%">
        <tr>
            <td>
                With best regards,
            </td>
        </tr>
        <tr>
        <td width="100%" align="left">
            {{$footerAndSign}}
        </td>
        </tr>


    </table>

</div>

<div id="footer">
    <hr>
    <table width="100%">
        <tr>
            <td align="left" width="60%">
                <table>
                    <tr  >
                        <td>Regd under the Societies Registration Act XXI of 1860 No. 3760-B of 1972-73, Dated 13-7-1972
                        </td>
                    </tr>
                    <tr  >
                        <td> Regd.with NGO Affairs Bureau under the Foreign Donations (Voluntary Activities) Regulation Ordinance, 1978, No.009, Dated 22-4-1981 Regd. under the Micro Credit Regulatory Authority Act 2006
                            0.00032-00286-00184, Dated 16-03-2008

                        </td>
                    </tr>
                </table>
            </td>
            <td width="5%"></td>


            <td align="right"width="35%">
                <table >
                    <tr>
                        <td> Fax <br>
                            Tel : +880-2-8315405-9,8315641<br>
                            : +880-2-8314993 <br>
                            E-mail : ed@caritasbd.org<br>
                            info@caritasbd.org, cbgeneral@caritasbd.org<br>
                            Website : www.caritasbd.org

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>

</div>

</body>
</html>