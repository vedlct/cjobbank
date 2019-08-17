
<p style="margin-top: 500pt;"></p>
<table style="width: 100%;" >
    <tr>
        <td align="left" style="width: 50%;text-align: left">
            <b>Ref No:</b> {{$refNo}}
        </td>
        <td style="width: 50%;text-align: center">
            <b>Date:</b> {{date('d-m-Y')}}
        </td>
    </tr>
</table>
<p style="margin-top: 100pt;"></p>
<table style="width: 50%;">
    <tr><td align="left">{{$empInfo->firstName.' '.$empInfo->lastName}}</td></tr>
    <tr><td align="left">{{$empInfo->presentAddress}}</td></tr>
    <tr><td align="left">Email: {{$empInfo->email}}</td></tr>
    <tr><td align="left">Cell: {{$empInfo->personalMobile}}</td></tr>
</table>
<p style="margin-top: 50pt;"></p>
<table style="width: 100%">
    <tr>
        <td style="width: 10%">
            <b>Subject:</b>
        </td>
        <td style="width: 90%" align="left"> <b>{{$subjectLine.' for the post of '}}{{$jobInfo->position}}</b></td>
    </tr>
</table>
<p style="margin-top: 100pt;"></p>
<table style="width: 100%">
    <tr>
        <td style="width: 100%" align="left">
            <b>Dear </b>{{$empInfo->firstName.' '.$empInfo->lastName}},
        </td>
    </tr>
    <tr>
        <td align="left" width="100%">With reference to your application for the post of {{$jobInfo->position}}, we would like to invite you for {{$testDetails}} to be held on the {{date('dS F Y (l)',strtotime($testDate))}} at {{$testAddress}}.
        </td>
    </tr>
</table>
<p style="margin-top: 50pt;"></p>
<table>
    <tr><td>Please take note of the following information for attending the interview:</td></tr>
    <tr><td>1. That you are requested to be present for the interview on time.</td></tr>
    <tr><td>2. That no TA/DA will be provided for attending the above interview.</td></tr>
    <tr><td>3. That you are requested to bring original copies of all certificates during interview.</td></tr>
</table>
<p style="margin-top: 100pt;"></p>
<table style="width: 100%">
    <tr>
        <td>With best regards,</td>
    </tr>
</table>
<p style="margin-top: 150pt;"></p>
<table>
    <tr>
        <td style="width: 100%" align="left">
            {!! $footerAndSign !!}
        </td>
    </tr>
</table>
<p>This is a computer-generated document. No signature is required</p>