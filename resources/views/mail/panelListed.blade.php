<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            font-family: 'bangla', sans-serif;
            font-size: 14px;
            padding: 0px;
            margin: 0px;
        }
        @page{

            margin: 25px 20px;
        }


    </style>


</head>
<body style="margin: 0 auto">
<div id="header" style="margin: 0px 0px 5px 0px;">

    <table >
        <tr>
            <td  >
                <table align="left" >
                    <tr  >
                        <td style="font-size: 20px;"> <b>কারিতাস বাংলাদেশ </b><br>
                            <span style="font-size: 12px;">সমাজ কল্যাণ ও মানব উন্নয়নের জন্য বাংলাদেশের কাথলিক বিশপ সম্মেলনীর একটি জাতীয় প্রতিষ্ঠান</span>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" >
                <img  src="{{url('public/logo/TCL_logo.png')}}" alt="logo">
            </td>

            <td align="right" width="35%">
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

    <table >
        <tr>
            <td width="100%" >

                asdhgjashdgjahsda asdhkjahsdkjashd shdkahsdkjashdkl shashdkajsd hkajsdhaksjdh

            </td>
        </tr>
    </table>

</div>
<hr>
<div style="margin: 0px 0px 5px 0px;">

    <table >
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
                    <td><b>Date: </b>{{date('d-m-Y')}}</td>
                </tr>
            </table>
        </td>
    </table>

</div>
<hr>

<div style="margin: 0px 30px 10px 30px;">

    <table >
        <td align="left">
            <table width="50%" >
                <tr >
                    <td>TO <br>
                        {{$empInfo->firstName.' '.$empInfo->lastName}}<br>
                        {{$empInfo->presentAddress}}<br>
                        Email: {{$empInfo->email}}<br>
                        Cell: {{$empInfo->personalMobile}}
                    </td>
                </tr>
            </table>
        </td>

    </table>

</div>

<div style="margin: 0px 30px 0px 30px;">

    <table >
        <tr>
            <td width="100%" align="left">
                <b>Dear</b>{{$empInfo->firstName.' '.$empInfo->lastName}},
            </td>
        </tr>

    </table>

</div>
<div style="margin: 20px 30px 20px 30px;">

    <table >
        <tr>
            <td width="100%" align="left">
                Cordial Greetings from Caritas Bangladesh!
            </td>
        </tr>

    </table>

</div>

<div style="margin: 0px 30px 0px 30px;">

    <table >

        <tr>

            <td align="left" width="100%">



This has reference to your recent application for the post of {{$jobInfo->position}} and the subsequent formal {{$testDetails}}
held on {{date('dS F Y (l)',strtotime($testDate))}}.<br><br>
Please be informed that you have been enlisted in the panel of future recruitment as
determined by the Recruitment Committee upon careful assessment of candidates’
applications and the results of the {{$testDetails}}. Kindly
note that you will be communicated if any scope arises in future.<br><br>
Thank you very much for your interest in working with Caritas Bangladesh.


            </td>

        </tr>

    </table>

</div>
<div style="margin: 30px 30px 0px 30px;">

    <table >
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
    <table >
        <tr>
            <td align="left" width="60%">
                <table>
                    <tr  >
                        <td> Regd under the Societies Registration Act XXI of 1860 No. 3760-B of 1972-73, Dated 13-7-1972
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


            <td align="right" width="35%">
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