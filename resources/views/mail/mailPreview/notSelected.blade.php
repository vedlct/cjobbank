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
<table width="100%">
    <tr><td align="left" width="100%">This has reference to your recent application and the subsequent formal {{$testDetails}} held on {{date('dS F Y (l)',strtotime($testDate))}} for the post of {{$jobInfo->position}}.</td></tr>
    <tr><td align="left" width="100%">Please be informed that the other candidate has been selected for appointment in the post of {{$jobInfo->position}} as determined by the Recruitment Committee upon careful assessment of candidates applications and the results of the {{$testDetails}}.</td></tr>
    <tr><td align="left" width="100%">Thank you very much for your interest in working with Caritas Bangladesh and please feel free to apply again for other position/vacancies for which you may be qualified. </td></tr>
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