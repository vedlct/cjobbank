<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class AppliedCandidateHrReport03Export implements FromView
{
    use Exportable;

    protected $newlist;
    protected $ethnicity;
    protected $education;
    protected $pQualification;
    protected $training;
    protected $jobExperience;
    protected $salaryInfo;
    protected $refree;
    protected $relativeList;
    protected $jobTitle;
    protected $withoutSalaryInfo;
    protected $excelName;

    public function __construct($newlist, $ethnicity, $education, $pQualification, $training, $jobExperience, $salaryInfo, $refree, $relativeList, $jobTitle, $withoutSalaryInfo, $excelName)
    {
        $this->newlist = $newlist;
        $this->ethnicity = $ethnicity;
        $this->education = $education;
        $this->pQualification = $pQualification;
        $this->training = $training;
        $this->jobExperience = $jobExperience;
        $this->salaryInfo = $salaryInfo;
        $this->refree = $refree;
        $this->relativeList = $relativeList;
        $this->jobTitle = $jobTitle;
        $this->withoutSalaryInfo = $withoutSalaryInfo;
        $this->excelName = $excelName;
    }

    /**
    * @return View
     */
    public function view(): View
    {
        return view('Admin.application.AppliedCandidateList')
            ->with('AppliedCandidateList', $this->newlist)
            ->with('ethnicity', $this->ethnicity)
            ->with('educationList', $this->education)
            ->with('qualificationList', $this->pQualification)
            ->with('trainingList', $this->training)
            ->with('jobExperienceList', $this->jobExperience)
            ->with('salaryList', $this->salaryInfo)
            ->with('refreeList', $this->refree)
            ->with('jobTitle', $this->jobTitle)
            ->with('withoutsalary', $this->withoutSalaryInfo)
            ->with('excelName', $this->excelName)
            ->with('relativeList', $this->relativeList);
    }
}
