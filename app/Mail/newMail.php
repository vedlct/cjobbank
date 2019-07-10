<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use PDF;

class newMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $employeeInfo;
    public $template;
    public $testDate;
    public $testAddress;
    public $testDetails;
    public $footerAndSign;
    public $subjectLine;
    public $refNo;
    public $jobInfo;

    public function __construct($employeeInfo,$template, $testDate,$testAddress,$testDetails,$footerAndSign,$subjectLine,$refNo,$jobInfo)
    {
        //

        $this->empInfo = $employeeInfo;
        $this->template = $template;
        $this->testDate = $testDate;
        $this->testAddress = $testAddress;
        $this->testDetails = $testDetails;
        $this->footerAndSign = $footerAndSign;
        $this->subjectLine = $subjectLine;
        $this->refNo = $refNo;
        $this->jobInfo = $jobInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->template =='1'){

//            $pdf = PDF::loadView('mail.interviewCard',['empInfo' => $this->empInfo,'testDate'=>$this->testDate,'testAddress'=>$this->testAddress,
//                'testDetails'=>$this->testDetails,'footerAndSign'=>$this->footerAndSign,'subjectLine'=>$this->subjectLine,'refNo'=>$this->refNo,'jobInfo'=>$this->jobInfo]);

            return $this->view('mail.MailBody')
//                ->attachData($pdf->output(), 'NTERVIEW-CARD.pdf', [
//                    'mime' => 'application/pdf',
//                ])
                ->subject('INTERVIEW CARD From CARITAS BD');




        }

    }
}
