<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class AppliedCandidateReportExport implements FromView
{
    use Exportable;

    protected $agreement;
    protected $relative;
    protected $previousWorkExperienceInCB;
    protected $empQuestionAns;
    protected $employee;
    protected $excelName;
    protected $social;
    protected $education;
    protected $pQualification;
    protected $training;
    protected $jobExperience;
    protected $reference;
    protected $empQuestion;
    protected $extraCurriculumn;
    protected $computerSkill;
    protected $languageHead;
    protected $language;
    protected $jobTitle;

    public function __construct($agreement,$relative,$previousWorkExperienceInCB,$empQuestionAns,$employee,$excelName,$social,$education,$pQualification,$training,$jobExperience,$reference,$empQuestion,$extraCurriculumn,$computerSkill,$languageHead,$language,$jobTitle)
    {
        $this->agreement = $agreement;
        $this->relative = $relative;
        $this->previousWorkExperienceInCB = $previousWorkExperienceInCB;
        $this->empQuestionAns = $empQuestionAns;
        $this->employee = $employee;
        $this->excelName = $excelName;
        $this->social = $social;
        $this->education = $education;
        $this->pQualification = $pQualification;
        $this->training = $training;
        $this->jobExperience = $jobExperience;
        $this->reference = $reference;
        $this->empQuestion = $empQuestion;
        $this->extraCurriculumn = $extraCurriculumn;
        $this->computerSkill = $computerSkill;
        $this->languageHead = $languageHead;
        $this->language = $language;
        $this->jobTitle = $jobTitle;
    }

    /**
    * @return View
     */
    public function view(): View
    {
        return view('Admin.application.fullInfo')
            ->with('agreement', $this->agreement)
            ->with('relative', $this->relative)
            ->with('previousWorkExperienceInCB', $this->previousWorkExperienceInCB)
            ->with('empQuestionAns', $this->empQuestionAns)
            ->with('employee', $this->employee)
            ->with('excelName', $this->excelName)
            ->with('social', $this->social)
            ->with('education', $this->education)
            ->with('pQualification', $this->pQualification)
            ->with('training', $this->training)
            ->with('jobExperience', $this->jobExperience)
            ->with('reference', $this->reference)
            ->with('empQuestion', $this->empQuestion)
            ->with('extraCurriculumn', $this->extraCurriculumn)
            ->with('computerSkill', $this->computerSkill)
            ->with('languageHead', $this->languageHead)
            ->with('language', $this->language)
            ->with('jobTitle', $this->jobTitle);
    }
}
