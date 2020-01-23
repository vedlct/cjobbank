<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                @if(isset($viewMode))
                    <img src="{{url('public//logo/TCL_logo.png')}}" alt="logo">
                @else
                    <img src="{{public_path().'/logo/TCL_logo.png'}}" alt="logo">
                @endif
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
            <td>{{$address->officeAddress}}</td>
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

<div style="margin: 30px 30px 10px 30px;">

    <table style="width: 100%">
        <tr>
        <td style="width: 50%" align="left">
            To <br>
            @if($empInfo->gender == 'F')
                Mrs.
            @elseif($empInfo->gender == 'M')
                Mr.
            @endif
            {{$empInfo->firstName.' '.$empInfo->lastName}}<br>
            {{$empInfo->presentAddress}}<br>
            Email: {{$empInfo->email}}<br>
            Cell: {{$empInfo->personalMobile}}
        </td>
        </tr>

    </table>

</div>

<div style="margin: 0px 30px 0px 30px;">
    <table >
        <tr>
            <td width="100%" align="left">
                <b>Dear </b>@if($empInfo->gender == "M"){{"Mr "}}@elseif($empInfo->gender == "F"){{"Ms "}}@endif{{$empInfo->firstName.' '.$empInfo->lastName}},
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

    <table>
        <tr>
            <td align="left" width="100%">
                <span>{!! $emailtamplateBody !!}</span>
                <span>This is a computer-generated document. No signature is required</span>
            </td>
        </tr>
    </table>

</div>
<div style="margin: 30px 30px 0px 30px;">

{{--    <table >--}}
{{--        <tr>--}}
{{--            <td>--}}
{{--                With best regards,--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td width="100%" align="left">--}}
{{--                {!!$footerAndSign!!}--}}
{{--            </td>--}}
{{--        </tr>--}}
        <br>
        <br>
        <br>
        <br>
        <br>
{{--        <tr>--}}
{{--            <td><h2>This is a computer-generated document. No signature is required</h2></td>--}}
{{--        </tr>--}}
{{--    </table>--}}

</div>

<div id="footer">
    <hr>
    <table style="font-size: 10px;width: 100%;margin-left: 20px">
        <tr>
            <td align="left" style="width: 60%">
                <table>
                    <tr  >
                        <td>{!! $templateFooter !!}</td>
                    </tr>
                </table>
            </td>

            <td align="left" style="width: 40%;margin-left: 20px">
                <table >
                    <tr>
                        <td>
                            Tel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$address->zonePhone}}<br>
                            E-mail&nbsp;&nbsp;&nbsp;: {{$address->zoneEmail}}<br>
                            Website: {{$address->zoneWeb}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>

</div>
</body>
</html>
