<?php

use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\CvManagementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MailTamplateController;
use App\Http\Controllers\Admin\ManageQuestionApplication;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ComputerSkillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmployeeApplicationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeOtherInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobExperienceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MembershipInSocialNetworkController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\PreviousWorkInCBController;
use App\Http\Controllers\ProfessionalCertificateController;
use App\Http\Controllers\QuestionObjectiveController;
use App\Http\Controllers\RefreeController;
use App\Http\Controllers\RelativeInCbController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TermsAndController;
use App\Http\Controllers\testController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserCvController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'loginForm'])->name('/');
Auth::routes();

//Change password
Route::get('password', [HomeController::class, 'password'])->name('password');
Route::post('password', [HomeController::class, 'changePassword'])->name('password.change');


//Route::view('test','test');
Route::get('test', [UserCvController::class, 'index']);
//Registration
Route::view('/Register', 'register')->name('register');
Route::post('/Register', [RegisterController::class, 'createUserShowAggrement'])->name('register.createUserShowAggrement');
Route::post('/Register/userAgreement', [RegisterController::class, 'newUserAgreement'])->name('register.newUserAgreement');

//activation
Route::get('/Account-Active/{email}/{token}', [RegisterController::class, 'AccountActive'])->name('account.active');
Route::get('/Account-ReActive/{email}/{token}', [RegisterController::class, 'AccountReActive'])->name('account.Reactive');
Route::view('/Account-Activation/Resend', 'resendAccountActivation')->name('account.activationResend');
Route::post('/Account-Resend-Activation', [RegisterController::class, 'resendActivationMail'])->name('account.resendActivationMail');

//forgetPass
Route::view('/Account-ForgetPassword', 'forgetPassword')->name('account.forgetPass');
Route::post('/Account-ForgetPassword-Change', [RegisterController::class, 'changeForgetPassword'])->name('account.changeForgetPass');
Route::get('/changePass/{email}/{password}/{token}', [RegisterController::class, 'ChangePass'])->name('account.changePassForgetPassword');


Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::view('apply','usercv')->name('home');


Route::view('apply','usercv')->name('cv.apply');

Route::view('application','application')->name('application');
//Route::get('application','JobController')->name('application');
Route::view('job/manage','job.manage')->name('job.manage');


//user Cv
Route::get('Candidate-CV-CareerObjective', [EmployeeController::class, 'getEmployeeCvCareerObjective'])->name('candidate.cvCareerObjective');
Route::get('Candidate-CV-Show', [EmployeeController::class, 'getEmployeeshowFullCv'])->name('candidate.viewUserCv');

//ProfessionalCertificate
Route::get('Candidate-CV-ProfessionalCertificate', [ProfessionalCertificateController::class, 'getEmployeeCvProfessionalCertificate'])->name('candidate.cvProfessionalCertificate');
Route::post('Candidate-CV-ProfessionalCertificate', [ProfessionalCertificateController::class, 'submitEmployeeCvProfessionalCertificate'])->name('submit.cvProfessionalCertificate');
Route::post('Candidate-CV-ProfessionalCertificate/update', [ProfessionalCertificateController::class, 'updateEmployeeCvProfessionalCertificate'])->name('update.cvProfessionalCertificate');
Route::post('edit/professionalQualificationId', [ProfessionalCertificateController::class, 'editProfessionalQualification'])->name('professionalQualificationId.edit');
Route::post('delete/professionalQualificationId', [ProfessionalCertificateController::class, 'deleteProfessionalQualification'])->name('professionalQualificationId.delete');

//PersonalInfo
Route::get('Candidate-CV', [PersonalInfoController::class, 'getEmployeeCv'])->name('candidate.cvPersonalInfo');
Route::post('/Candidate-CV-savePersonalInfo', [PersonalInfoController::class, 'insertPersonalInfo'])->name('cv.insertPersonalInfo');
Route::get('/Candidate-CV-Edit-PersonalInfo', [PersonalInfoController::class, 'editPersonalInfo'])->name('personalInfo.edit');
Route::post('/Candidate-CV-updatePersonalInfo', [PersonalInfoController::class, 'updatePersonalInfo'])->name('cv.updatePersonalInfo');

//Question And Objective Info
Route::get('Candidate-CV-Objective-And-Question', [QuestionObjectiveController::class, 'getEmployeeCvQuesTionObjective'])->name('candidate.cvQuesObj');
Route::post('/Candidate-CV-save-Objective-And-Question',[QuestionObjectiveController::class, 'insertObjectiveAndQuestion'])->name('cv.insertQuesObj');
Route::post('/Candidate-CV-Objective-And-Question-Edit', [QuestionObjectiveController::class, 'getQuestionObjectiveEdit'])->name('cv.careerEdit');
Route::post('/Candidate-CV-update-Objective-And-Question', [QuestionObjectiveController::class, 'updateQuesObj'])->name('cv.updateQuesObj');

//Cv Other Info
Route::get('/Candidate-Cv-others-info', [EmployeeOtherInfoController::class, 'otherInfo'])->name('cv.OthersInfo');
Route::post('/Candidate-Cv-others-info-insert', [EmployeeOtherInfoController::class, 'insertOtherInfo'])->name('insert.OthersInfo');
Route::post('/Candidate-Cv-others-info-update', [EmployeeOtherInfoController::class, 'updateOtherInfo'])->name('update.OthersInfo');
Route::post('/Candidate-Cv-others-info-edit', [EmployeeOtherInfoController::class, 'editOtherInfo'])->name('edit.OthersInfo');

//Education
Route::get('Candidate-CV-Education', [EducationController::class, 'getEmployeeCvEducation'])->name('candidate.cvEducation');
Route::post('/Candidate-CV-educationDegree', [EducationController::class, 'getDegreePerEducation'])->name('cv.getDegreeForEducation');
Route::post('/Candidate-CV-education-BoardOrUniversity', [EducationController::class, 'getBoradOrUniversity'])->name('cv.getBoradOrUniversity');
Route::post('/Candidate-CV-educationMajor', [EducationController::class, 'getMajorPerEducation'])->name('cv.getMajorForEducation');
Route::post('/Candidate-CV-educationEdit', [EducationController::class, 'getEducationEdit'])->name('cv.educationEdit');
Route::post('/Candidate-CV-education-Save', [EducationController::class, 'insertPersonalEducation'])->name('cv.insertPersonalEducation');
Route::post('/Candidate-CV-education-Update', [EducationController::class, 'updatePersonalEducation'])->name('cv.updatePersonalEducation');
Route::post('/Candidate-CV-education-Delete', [EducationController::class, 'deletePersonalEducation'])->name('cv.PersonalEducationDelete');

//Training
Route::get('/Candidate-CV-TrainingCertificate', [TrainingController::class, 'index'])->name('candidate.cvTrainingCertificate');
Route::post('/Candidate-CV-TrainingCertificate', [TrainingController::class, 'insert'])->name('insert.cvTrainingCertificate');
Route::post('/editTrainingCertificate', [TrainingController::class, 'editTrainingCertificate'])->name('cvTrainingCertificate.edit');
Route::post('/updateCvTraning', [TrainingController::class, 'updateCvTraning'])->name('update.cvtraning');
Route::post('/deleteCvTraning', [TrainingController::class, 'deleteCvTraning'])->name('cvTrainingCertificate.delete');

//Job ExperienceCandidate-CV
Route::get('/Candidate-CV-JobExperience', [JobExperienceController::class, 'index'])->name('JobExperience.index');
Route::post('/Candidate-CV-JobExperience', [JobExperienceController::class, 'submitJobExperience'])->name('submit.jobExperience');
Route::post('/submit-JobExperience', [JobExperienceController::class, 'JobExperiencesubmit'])->name('jobExperience.submit');
Route::post('/editJobExperience', [JobExperienceController::class, 'editJobExperience'])->name('JobExperience.edit');
Route::post('/addJobExperienceadd', [JobExperienceController::class, 'JobExperienceadd'])->name('JobExperience.add');
Route::post('/updateJobExperience', [JobExperienceController::class, 'updateJobExperience'])->name('update.jobExperience');
Route::post('/deleteJobExperience', [JobExperienceController::class, 'deleteJobExperience'])->name('JobExperience.delete');

//Skill
Route::get('/Candidate-CV-Skill', [SkillController::class, 'index'])->name('candidate.skill.index');
Route::post('/Candidate-CV-Skill/insert', [SkillController::class, 'insert'])->name('candidate.skill.insert');
Route::post('/Candidate-CV-Skill/Edit', [SkillController::class, 'edit'])->name('candidate.skill.edit');
Route::post('/Candidate-CV-Skill/Update', [SkillController::class, 'update'])->name('candidate.skill.update');
Route::post('/Candidate-CV-Skill/Delete', [SkillController::class, 'delete'])->name('candidate.skill.delete');

//language
Route::get('/Candidate-CV-Language', [LanguageController::class, 'index'])->name('candidate.language.index');
Route::post('/Candidate-CV-Language/insert', [LanguageController::class, 'insert'])->name('candidate.language.insert');
Route::post('/Candidate-CV-Language/Edit', [LanguageController::class, 'edit'])->name('candidate.language.edit');
Route::post('/Candidate-CV-Language/Update', [LanguageController::class, 'update'])->name('candidate.language.update');
Route::post('/Candidate-CV-Language/Delete', [LanguageController::class, 'delete'])->name('candidate.language.delete');

//Computer-Skill
Route::get('/Candidate-CV-Computer-Skill', [ComputerSkillController::class, 'index'])->name('candidate.computerSkill.index');
Route::post('/Candidate-CV-Computer-Skill', [ComputerSkillController::class, 'insert'])->name('candidate.computerSkill.submit');
Route::post('/Candidate-CV-Computer-Skill/delete', [ComputerSkillController::class, 'deleteSkill'])->name('candidate.computerSkill.delete');
Route::post('/Candidate-CV-Computer-Skill/Edit', [ComputerSkillController::class, 'edit'])->name('candidate.computerSkill.edit');
Route::post('/Candidate-CV-Computer-Skill/Update', [ComputerSkillController::class, 'update'])->name('candidate.computerSkill.update');

//Refree
Route::get('/Candidate-CV-Referee', [RefreeController::class, 'index'])->name('refree.index');
Route::post('/Candidate-CV-Referee', [RefreeController::class, 'submitRefree'])->name('submit.refree');
Route::post('/editRefree', [RefreeController::class, 'editRefree'])->name('refree.edit');
Route::post('/updateRefree', [RefreeController::class, 'updateRefree'])->name('update.refree');
Route::post('/deleteRefree', [RefreeController::class, 'deleteRefree'])->name('refree.delete');

//Previous Wourk CB
Route::get('/Candidate-CV-Previous-Work-In-CB', [PreviousWorkInCBController::class, 'index'])->name('candidate.previousWorkInCB.index');
Route::post('/Candidate-CV-Previous-Work-In-CB/Add', [PreviousWorkInCBController::class, 'insert'])->name('candidate.previousWorkInCB.insert');
Route::post('/Candidate-CV-Previous-Work-In-CB/Edit', [PreviousWorkInCBController::class, 'edit'])->name('candidate.previousWorkInCB.edit');
Route::post('/Candidate-CV-Previous-Work-In-CB/Update', [PreviousWorkInCBController::class, 'update'])->name('candidate.previousWorkInCB.update');
Route::post('/Candidate-CV-Previous-Work-In-CB/Delete', [PreviousWorkInCBController::class, 'delete'])->name('candidate.previousWorkInCB.delete');

//Relation in Caritas
Route::get('/Candidate-CV-RelativeInCaritas', [RelativeInCbController::class, 'index'])->name('relativeInCaritas.index');
Route::get('/Candidate-CV-RelativeInCaritas', [RelativeInCbController::class, 'getRelationInfo'])->name('relativeInCaritas.getRelationInfo');
Route::post('/Candidate-CV-RelativeInCaritasSubmit', [RelativeInCbController::class, 'submitRelativeInCb'])->name('submit.relative');
Route::post('/Candidate-CV-RelativeInCaritasSubmitYesOrNo', [RelativeInCbController::class, 'submitRelativeInCbYesOrNo'])->name('submit.relativeYesOrNo');
Route::post('/editRelative', [RelativeInCbController::class, 'editRelative'])->name('relative.edit');
Route::post('/updateRelative', [RelativeInCbController::class, 'updateRelative'])->name('update.relative');
Route::post('/deleteRelative', [RelativeInCbController::class, 'deleteRelative'])->name('relative.delete');

//Membership in Social Network
Route::get('/Candidate-CV-Membership-In-Social-Network', [MembershipInSocialNetworkController::class, 'index'])->name('candidate.membershipInSocialNetwork.index');
Route::post('/Candidate-CV-Membership-In-Social-Network/Add', [MembershipInSocialNetworkController::class, 'insert'])->name('candidate.membershipInSocialNetwork.insert');
Route::post('/Candidate-CV-Membership-In-Social-Network/Edit', [MembershipInSocialNetworkController::class, 'edit'])->name('candidate.membershipInSocialNetwork.edit');
Route::post('/Candidate-CV-Membership-In-Social-Network/Update', [MembershipInSocialNetworkController::class, 'update'])->name('candidate.membershipInSocialNetwork.update');
Route::post('/Candidate-CV-Membership-In-Social-Network/Delete', [MembershipInSocialNetworkController::class, 'delete'])->name('candidate.membershipInSocialNetwork.delete');

/*---------------------------Job----------------------*/
Route::get('job/all', [JobController::class, 'index'])->name('job.all');
Route::post('job/all', [JobController::class, 'getJobData'])->name('job.getJobData');
Route::post('job/applyJobModal', [JobController::class, 'applyJobModal'])->name('job.applyJobModal');
//Route::get('Candidate-Job-Apply/{jobId}','EmployeeController@applyJob')->name('candidate.ApplyJob');
Route::post('Candidate-Job-Apply/{jobId}', [EmployeeController::class, 'applyJob'])->name('candidate.ApplyJob');

//candidate Application
Route::get('Candidate-Applications', [EmployeeApplicationController::class, 'getAllApplication'])->name('candidate.manageApplication');

/*-------------------------------Admin---------------------------------*/
Route::get('Admin-DB-Backup', [BackupController::class, 'wholeDbBackup'])->name('backup.wholeDbBackup');

Route::get('Admin-Dashboard', [DashboardController::class, 'home'])->name('admin.dashboard');

Route::get('Admin-Manage-CV', [CvManagementController::class, 'manage'])->name('cv.admin.manage');
Route::post('Admin-ManageData-CV', [CvManagementController::class, 'manageCvData'])->name('cv.admin.manageApplicationData');

//job
Route::get('Admin-Add-New-Job', [\App\Http\Controllers\Admin\JobController::class, 'addNewJob'])->name('job.admin.create');
Route::get('Admin-Manage-Job', [\App\Http\Controllers\Admin\JobController::class, 'manageJob'])->name('job.admin.manage');
Route::post('Admin-Manage-Job', [\App\Http\Controllers\Admin\JobController::class, 'getManageJobData'])->name('job.admin.getManageJobData');
Route::get('Admin-Edit-Job/{jobId}', [\App\Http\Controllers\Admin\JobController::class, 'jobEdit'])->name('job.admin.edit');
Route::post('Admin-Delete-Job', [\App\Http\Controllers\Admin\JobController::class, 'jobDelete'])->name('job.admin.delete');
Route::post('Admin-Update-Job', [\App\Http\Controllers\Admin\JobController::class, 'jobUpdate'])->name('job.admin.update');
Route::post('Admin-Insert-Job', [\App\Http\Controllers\Admin\JobController::class, 'jobInsert'])->name('job.admin.insert');
Route::post('Admin-Change-Job-Status', [\App\Http\Controllers\Admin\JobController::class, 'jobStatusUpdate'])->name('job.admin.changeJobStatus');

//Application
Route::get('Admin-Manage-Application', [ApplicationController::class, 'manageApplication'])->name('application.admin.manage');
Route::post('Admin-Show-All-Application', [ApplicationController::class, 'showAllApplication'])->name('application.admin.showAll');
Route::post('Admin-Show-All-Major-For Education', [ApplicationController::class, 'showAllMajorForEducation'])->name('application.admin.getMajorFromEducationlvl');
Route::post('Admin-Show-All-Major-For-Degree', [ApplicationController::class, 'showAllDegreeForEducation'])->name('application.admin.getDegreeFromEducationlvl');
Route::get('/application-status-change/{employeeId}/{jobId}', [ApplicationController::class, 'applicationStatusChange']);

Route::post('Admin-Export-All-AppliedCandidate-Hr-report01', [ApplicationController::class, 'exportAppliedCandidate'])->name('jobAppliedCadidate.admin.Exportxls');
Route::post('Admin-Export-All-AppliedCandidate-Hr-report03', [ApplicationController::class, 'exportAppliedCandidateHrReport03'])->name('jobAppliedCadidate.admin.Exporthrreport03xls');
Route::post('Admin-Export-All-AppliedCandidate-Hr-report02', [ApplicationController::class, 'exportAppliedCandidateHrReport02'])->name('jobAppliedCadidate.admin.Exporthrreport02xls');
Route::post('Admin-Export-All-AppliedCandidate-Hr-report04', [ApplicationController::class, 'exportAppliedCandidateHrReport04'])->name('jobAppliedCadidate.admin.Exporthrreport04xls');
Route::post('Admin-Send-Mail-AppliedCandidate', [ApplicationController::class, 'sendMailtoAppliedCandidate'])->name('jobAppliedCadidate.admin.sendMail');
Route::post('Admin-download-Mail-AppliedCandidate', [ApplicationController::class, 'downloadMailtoAppliedCandidate'])->name('jobAppliedCadidate.admin.downloadLetter');
Route::post('Admin-Preview-Mail-AppliedCandidate', [ApplicationController::class, 'downloadMailDoc'])->name('jobAppliedCadidate.admin.downloadMailDoc');
Route::post('/downloadMailData', [ApplicationController::class, 'downloadMailData'])->name('jobAppliedCadidate.admin.downloadMailData');
Route::get('/downloadZip/{folder}', [ApplicationController::class, 'downloadZip'])->name('jobAppliedCadidate.admin.downloadZip');

Route::get('Admin-Export-All-AppliedCandidate1', [ApplicationController::class, 'export'])->name('jobAppliedCadidate.admin.Exportxls1');

//Employee Management
Route::get('Admin-Manage-Employee', [UserManagementController::class, 'home'])->name('admin.manageUser');
//Route::get('Admin-Manage-User','Admin\UserManagementController@manageUser')->name('admin.manageUser.user');
Route::post('Admin-Manage-UserData', [UserManagementController::class, 'manageUserGet'])->name('admin.getmanageUserData.User');
Route::post('Admin-Change-User-Password', [UserManagementController::class, 'changeUserPassword'])->name('admin.changeUserPassword');
Route::post('admin/Admin-Manage-User', [UserManagementController::class, 'getUserData'])->name('admin.getmanageUserData');
Route::get('Admin-Manage-User/add', [UserManagementController::class, 'add'])->name('admin.manageUser.add');
Route::get('Admin-Manage-User/edit/{id}', [UserManagementController::class, 'edit'])->name('admin.editmanageUserData');
Route::post('Admin-Manage-User/add', [UserManagementController::class, 'insert'])->name('admin.manageUser.insert');
Route::post('Admin-Manage-User/changeUserStatus', [UserManagementController::class, 'changeUserStatus'])->name('admin.changeUserStatus');
Route::post('Admin-Manage-User/update/{id}', [UserManagementController::class, 'update'])->name('admin.manageUser.update');

/*----------------------Get CV ------------------------ */
Route::get('user/cv/{empId}', [UserCvController::class, 'getFullCv'])->name('userCv.get');
Route::get('user/cv-view/{empId}', [UserCvController::class, 'getFullCvView'])->name('userCv.view');
Route::post('user/cv-delete', [UserCvController::class, 'FullCvDelete'])->name('userCv.delete');
Route::post('user/cv-confirm-delete', [UserCvController::class, 'FullCvCompleteDelete'])->name('userCv.confirm.delete');
Route::post('user/cv/select', [UserCvController::class, 'getSelectedCv'])->name('userCv.select');
Route::get('user-cv', [UserCvController::class, 'getUserFullCv'])->name('userCv.post');
Route::get('user-cv-download/{empId}', [UserCvController::class, 'getUserFullCvdownload'])->name('userCv.post1');

/*---------------Settings-------------*/
//Zone
Route::get('manage/zone', [SettingsController::class, 'zone'])->name('manage.zone');
Route::post('manage/zone/insert', [SettingsController::class, 'insertZone'])->name('admin.zone.insert');
Route::post('manage/zone/updateZone/{id}', [SettingsController::class, 'updateZone'])->name('admin.zone.update');
Route::post('manage/zone/editZone', [SettingsController::class, 'editZone'])->name('admin.editZone');

//Education
Route::get('manage/education', [SettingsController::class, 'education'])->name('manage.education');
Route::post('manage/insertEducation', [SettingsController::class, 'insertEducation'])->name('manage.education.insert');
Route::post('manage/updateEducation/{id}', [SettingsController::class, 'updateEducation'])->name('manage.education.update');
Route::post('manage/education/editEducation', [SettingsController::class, 'editEducation'])->name('admin.editEducation');

//Education Degree
Route::get('manage/education-Degree', [SettingsController::class, 'educationDegree'])->name('manage.educationDegree');
Route::post('manage/education-Degree/insert', [SettingsController::class, 'insertEducationDegree'])->name('manage.educationDegree.insert');
Route::post('manage/education-Degree/editDegree', [SettingsController::class, 'editEducationDegree'])->name('admin.editDegree');
Route::post('manage/education-Degree/updateDegree/{id}', [SettingsController::class, 'updateDegree'])->name('manage.degree.update');

//Nationality
Route::get('manage/Nationality', [SettingsController::class, 'nationality'])->name('manage.nationality');
Route::post('manage/Nationality/insert', [SettingsController::class, 'insertNationality'])->name('manage.nationality.insert');
Route::post('manage/Nationality/editNationality', [SettingsController::class, 'editNationality'])->name('admin.editNationality');
Route::post('manage/Nationality/updateNationality/{id}', [SettingsController::class, 'updateNationality'])->name('manage.nationality.update');

//Religion
Route::get('manage/Religion', [SettingsController::class, 'religion'])->name('manage.religion');
Route::post('manage/Religion/insert', [SettingsController::class, 'insertReligion'])->name('manage.religion.insert');
Route::post('manage/Religion/editReligion', [SettingsController::class, 'editReligion'])->name('admin.editReligion');
Route::post('manage/Religion/updateReligion/{id}', [SettingsController::class, 'updateReligion'])->name('manage.religion.update');

//Agreement
Route::get('manage/Agreement', [SettingsController::class, 'agreement'])->name('manage.agreement');
Route::post('manage/Agreement/insert', [SettingsController::class, 'insertAgreement'])->name('manage.agreement.insert');
Route::post('manage/Agreement/editAgreement', [SettingsController::class, 'editAgreement'])->name('admin.editAgreement');
Route::post('manage/Agreement/updateAgreement/{id}', [SettingsController::class, 'updateAgreement'])->name('manage.agreement.update');

//Ethnicity
Route::get('manage/Ethnicity', [SettingsController::class, 'manageEthnicity'])->name('manage.ethnicity');
Route::post('manage/Ethnicity/insert', [SettingsController::class, 'insertEthnicity'])->name('manage.ethnicity.insert');
Route::post('manage/Ethnicity/editEthnicity', [SettingsController::class, 'editEthnicity'])->name('admin.editEthnicity');
Route::post('manage/Ethnicity/updateEthnicity/{id}', [SettingsController::class, 'updateEthnicity'])->name('manage.ethnicity.update');

// organization Type
Route::get('manage/Organization-Type', [SettingsController::class, 'manageorganizationType'])->name('manage.organizationType');
Route::post('manage/Organization-Type/insert', [SettingsController::class, 'insertorganizationType'])->name('manage.organizationType.insert');
Route::post('manage/Organization-Type/editOrganizationType', [SettingsController::class, 'editOrganizationType'])->name('admin.editOrganizationType');
Route::post('manage/Organization-Type/updateOrganizationType/{id}', [SettingsController::class, 'updateOrganizationType'])->name('manage.organizationType.update');

//Degisnation
Route::get('manage/Degisnation', [SettingsController::class, 'degisnation'])->name('manage.degisnation');
Route::post('manage/Degisnation/insert', [SettingsController::class, 'insertDegisnation'])->name('manage.degisnation.insert');
Route::post('manage/Degisnation/editDegisnation', [SettingsController::class, 'editDegisnation'])->name('admin.editDegisnation');
Route::post('manage/Degisnation/updateDegisnation/{id}', [SettingsController::class, 'updateDesignation'])->name('manage.degisnation.update');

//Major
Route::get('manage/Major', [SettingsController::class, 'major'])->name('manage.major');
Route::post('manage/Major/insert', [SettingsController::class, 'insertMajor'])->name('manage.major.insert');
Route::post('manage/Major/editMajor', [SettingsController::class, 'editMajor'])->name('admin.editMajor');
Route::post('manage/Major/updateMajor/{id}', [SettingsController::class, 'updateMajor'])->name('manage.major.update');

//Board
Route::get('manage/Board', [SettingsController::class, 'board'])->name('manage.board');
Route::post('manage/Board/insert', [SettingsController::class, 'insertBoard'])->name('manage.board.insert');
Route::post('manage/Board/editBoard', [SettingsController::class, 'editBoard'])->name('admin.editBoard');
Route::post('manage/Board/updateBoard/{id}', [SettingsController::class, 'updateBoard'])->name('manage.board.update');

//Language
Route::get('manage/Language', [SettingsController::class, 'language'])->name('manage.language');
Route::post('manage/Language/insert', [SettingsController::class, 'insertLanguage'])->name('manage.language.insert');
Route::post('manage/Language/editBoard', [SettingsController::class, 'editLanguage'])->name('admin.editlanguage');
Route::post('manage/Language/updateBoard/{id}', [SettingsController::class, 'updateLanguage'])->name('manage.language.update');

//Other Skill
Route::get('manage/other-skill', [SettingsController::class, 'otherSkill'])->name('manage.otherSkill');
Route::post('manage/other-skill/insert', [SettingsController::class, 'insertOtherSkill'])->name('manage.otherSkill.insert');
Route::post('manage/other-skill/editOtherSkill', [SettingsController::class, 'editOtherSkill'])->name('admin.editOtherSkill');
Route::post('manage/other-skill/Update/{id}', [SettingsController::class, 'updateOtherSkill'])->name('manage.otherSkill.update');

//Question Answer
Route::post('/Manage-Applicant-Question-Answer', [ManageQuestionApplication::class, 'manageQuestionAnswer'])->name('manage.applicantQuestionAnswer');
Route::get('/Manage-Applicant-Question-Answer', [ManageQuestionApplication::class, 'getManageQuestionAnswer'])->name('manage.getApplicantQuestionAnswer');

Route::get('/testloop', [testController::class, 'testloop'])->name('test');
Route::get('test', [ManageQuestionApplication::class, 'test']);

Route::get('test/excel','testController@testExcel');

Route::get('rumiTest', [MailTamplateController::class, 'test']);
Route::get('rumiTest/mail', [MailTamplateController::class, 'testPdf']);

/*---------------Computer SKill-------------*/
//Zone
Route::get('manage/skill', [\App\Http\Controllers\Admin\ComputerSkillController::class, 'skill'])->name('manage.skill');
Route::post('manage/skill/insert', [\App\Http\Controllers\Admin\ComputerSkillController::class, 'insertSkill'])->name('admin.skill.insert');
Route::post('manage/skill/updateZone/{id}', [\App\Http\Controllers\Admin\ComputerSkillController::class, 'updateSkill'])->name('admin.skill.update');
Route::post('manage/skill/editZone', [\App\Http\Controllers\Admin\ComputerSkillController::class, 'editSkill'])->name('admin.edit.skill');

//mail Tamplate
Route::get('manage/Mail-Tamplate', [MailTamplateController::class, 'show'])->name('manage.mailTamplate');
Route::post('edit/Mail-Tamplate', [MailTamplateController::class, 'editMailTemplete'])->name('edit.mailTamplate');
Route::post('Send/Mail-Tamplate', [MailTamplateController::class, 'editMailTemplete1'])->name('edit.mailTamplate1');
Route::post('mailTemplete/create', [MailTamplateController::class, 'storeMailTemplete'])->name('mailTamplate.store');
Route::post('mailTemplete/update', [MailTamplateController::class, 'updateMailTemplete'])->name('mailTamplate.update');

/* career Objective And Application Information */
Route::get('manage/career-Objective-And-Application-Information', [SettingsController::class, 'careerObjectiveAndApplicationInformation'])
    ->name('manage.careerObjectiveAndApplicationInformation');
Route::post('manage/objective-Page-Question/insert', [SettingsController::class, 'insertobjectivePageQuestion'])
    ->name('manage.objectivePageQuestion.insert');
Route::post('manage/objective-Page-Question/edit', [SettingsController::class, 'editobjectivePageQuestion'])
    ->name('manage.objectivePageQuestion.edit');
Route::post('manage/objective-Page-Question/update/{id}', [SettingsController::class, 'updateobjectivePageQuestion'])
    ->name('manage.objectivePageQuestion.update');

/* terms and condition */
Route::get('manage/Tems-condition', [SettingsController::class, 'termsConditionShow'])->name('manage.terms_and_condition');
Route::POST('manage/Tems-condition', [SettingsController::class, 'termsConditionUpdate'])->name('admin.termsAndCondition.update');

Route::get('/Tems-condition', [TermsAndController::class, 'termsConditionShowToUser'])->name('terms_and_condition.show');

/*type of employment*/
Route::get('manage/Type-of-employment', [SettingsController::class, 'typeOfEmploymentShow'])->name('manage.typeOfEmployment');
Route::post('manage/Type-of-employment/insert', [SettingsController::class, 'inserttypeOfEmployment'])->name('manage.typeOfEmployment.insert');
Route::post('manage/Type-of-employment/edit', [SettingsController::class, 'edittypeOfEmployment'])->name('manage.typeOfEmployment.edit');
Route::post('manage/Type-of-employment/update/{id}', [SettingsController::class, 'updatetypeOfEmployment'])->name('manage.typeOfEmployment.update');

/*change email template*/
Route::get('change-template/interview-card', [SettingsController::class, 'changeinterviewcard'])->name('changeemailtemplate.interviewcard');
Route::get('change-template/panel-listed', [SettingsController::class, 'changepanellisted'])->name('changeemailtemplate.panellisted');
Route::get('change-template/not-selected', [SettingsController::class, 'notselected'])->name('changeemailtemplate.notselected');
Route::get('change-template/acknowledgement', [SettingsController::class, 'acknowledgement'])->name('changeemailtemplate.acknowledgement');

Route::get('/email-template-settings', [SettingsController::class, 'emailTemplateSettings']);
Route::post('change-template/update-template', [SettingsController::class, 'updateemailtemplate'])->name('changeemailtemplate.updateemailtemplate');

/* Guest */
Route::get('/remove-account', [EmployeeController::class, 'removeAccount']);
//Route::post('/available-job/all','GuestController@guestGetJobData');

