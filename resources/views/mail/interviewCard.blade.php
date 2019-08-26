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
                <img src="{{url('public/logo/TCL_logo.png')}}" alt="logo">
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
            <td>

                Central Office: 2, Outer Circular Road, Shantibagh, Dhaka-1217, Bangladesh, GPO Box-994, Dhaka - 1000

            </td>
        </tr>
    </table>
</div>

<div style="margin: 0px">

    <table style="width: 100%;border-top: 1px solid black;border-bottom: 1px solid black" >
        <tr>
            <td align="left" style="width: 50%;">
                <b>Ref No: </b>{{$refNo}}

            </td>
            <td style="width: 50%;" align="center">
                <b>Date: </b>{{date('d-m-Y')}}
            </td>
        </tr>
    </table>

</div>

<div style="margin: 30px 30px 30px 30px;">



            <table style="width: 50%" >
                <tr >
                    <td align="left"> {{$empInfo->firstName.' '.$empInfo->lastName}}<br>
                        {{$empInfo->presentAddress}}<br>
                        Email: {{$empInfo->email}}<br>
                        Cell: {{$empInfo->personalMobile}}
                    </td>
                </tr>
            </table>




</div>

<div style="margin: 0px 30px 30px 30px;">

    <table style="width: 100%">
        <tr>
        <td style="width: 100%" align="left">
            <b>Subject: {{$subjectLine.' for the post of '}}{{$jobInfo->position}}</b>
        </td>
        </tr>

    </table>

</div>

<div style="margin: 0px 30px 0px 30px;">

    <table style="width: 100%">
        <tr>
        <td style="width: 100%" align="left">
            <b>Dear </b>{{$empInfo->firstName.' '.$empInfo->lastName}},
        </td>
        </tr>
        <tr>
            <td align="left" width="100%">



With reference to your application for the post of {{$jobInfo->position}}, we would like to invite you for {{$testDetails}} to be held on the {{date('dS F Y (l)',strtotime($testDate))}} at {{$intviewTime}} in {{$testAddress}}.
<br>
<br>
                <span>
{{--                        Please take note of the following information for attending the interview:<br>--}}
{{--                        1. That you are requested to be present for the interview on time.<br>--}}
{{--                        2. That no TA/DA will be provided for attending the above interview.<br>--}}
{{--                        3. That you are requested to bring original copies of all certificates during interview.<br>--}}
                    {!! $customBody !!}

               </span>
            </td>

        </tr>

    </table>

</div>
<div style="margin: 30px 30px 0px 30px;">

    <table style="width: 100%">
        <tr>
            <td>
                With best regards,
            </td>
        </tr>
        <tr>
            <td style="width: 100%" align="left">
                {!! $footerAndSign !!}
            </td>
        </tr>
        <tr>
            <td>This is a computer-generated document. No signature is required</td>
        </tr>
    </table>

</div>

<div id="footer">
    <hr>
    <table style="font-size: 10px;width: 100%;margin-left: 20px">
        <tr>
            <td align="left" style="width: 60%">
                <table>
                    <tr  >
                        <td> Regd under the Societies Registration Act XXI of 1860 <br>
                            No. 3760-B of 1972-73, Dated 13-7-1972
                        </td>
                    </tr>
                    <tr >
                        <td> Regd.with NGO Affairs Bureau under the Foreign Donations (Voluntary Activities) Regulation Ordinance, 1978, No.009, Dated 22-4-1981 Regd. under the Micro Credit Regulatory Authority Act 2006
                            0.00032-00286-00184, Dated 16-03-2008

                        </td>
                    </tr>
                </table>
            </td>

            <td align="left" style="width: 40%;margin-left: 20px">
                <table >
                    <tr>
                        <td>

                            Tel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: +880-2-8315405-9,8315641<br>
                            Fax&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: +880-2-8314993 <br>
                            E-mail&nbsp;&nbsp;&nbsp;: ed@caritasbd.org<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;info@caritasbd.org, cbgeneral@caritasbd.org<br>
                            Website: www.caritasbd.org


                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>

</div>
</body>
</html>