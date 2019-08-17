
<p style="margin-top: 500pt;"></p>
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

<p style="margin-top: 100pt;"></p>
<table style="width: 70%;">
    <tr><td align="left">To</td></tr>
    <tr><td align="left">{{$empInfo->firstName.' '.$empInfo->lastName}}</td></tr>
    <tr><td align="left">{{$empInfo->presentAddress}}</td></tr>
    <tr><td align="left">Email: {{$empInfo->email}}</td></tr>
    <tr><td align="left">Cell: {{$empInfo->personalMobile}}</td></tr>
</table>

<p style="margin-top: 100pt;"></p>
<table >
    <tr>
        <td width="100%" align="left">
            <b>Dear </b>{{$empInfo->firstName.' '.$empInfo->lastName}},
        </td>
    </tr>

</table>
<p style="margin-top: 100pt;"></p>
<table >
    <tr>
        <td width="100%" align="left">Cordial Greetings from Caritas Bangladesh!
        </td>
    </tr>

</table>
<p style="margin-top: 100pt;"></p>
<table >
    <tr><td align="left" width="100%">This has reference to your recent application for the post of {{$jobInfo->position}} and the subsequent formal {{$testDetails}} held on {{date('dS F Y (l)',strtotime($testDate))}}.</td></tr>
    <tr><td>Please be informed that you have been enlisted in the panel of future recruitment as determined by the Recruitment Committee upon careful assessment of candidate's applications and the results of the {{$testDetails}}. Kindly note that you will be communicated if any scope arises in future.</td></tr>
    <tr><td>Thank you very much for your interest in working with Caritas Bangladesh.</td></tr>
</table>
<p style="margin-top: 100pt;"></p>
<table width="100%">
    <tr>
        <td>With best regards,</td>
    </tr>
    <tr>
        <td width="100%" align="left">{!!$footerAndSign!!}
        </td>
    </tr>


</table>
<p>This is a computer-generated document. No signature is required</p>