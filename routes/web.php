<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('auth.login');
//});
Route::get('/','Auth\LoginController@loginForm');
Auth::routes();

//Change password
Route::get('password','HomeController@password')->name('password');
Route::post('password','HomeController@changePassword')->name('password.change');


//Route::view('test','test');
Route::get('test','UserCvController@index');
//Registration
Route::view('/Register', 'register')->name('register');
Route::post('/Register', 'Auth\RegisterController@createUserShowAggrement')->name('register.createUserShowAggrement');
Route::post('/Register/userAgreement', 'Auth\RegisterController@newUserAgreement')->name('register.newUserAgreement');

//activation
Route::get('/Account-Active/{email}/{token}', 'Auth\RegisterController@AccountActive')->name('account.active');
Route::get('/Account-ReActive/{email}/{token}', 'Auth\RegisterController@AccountReActive')->name('account.Reactive');
Route::view('/Account-Activation/Resend', 'resendAccountActivation')->name('account.activationResend');
Route::post('/Account-Resend-Activation', 'Auth\RegisterController@resendActivationMail')->name('account.resendActivationMail');

//forgetPass
Route::view('/Account-ForgetPassword', 'forgetPassword')->name('account.forgetPass');
Route::post('/Account-ForgetPassword-Change', 'Auth\RegisterController@changeForgetPassword')->name('account.changeForgetPass');
Route::get('/changePass/{email}/{password}/{token}', 'Auth\RegisterController@ChangePass')->name('account.changePassForgetPassword');


Route::get('/home', 'HomeController@index')->name('home');
//Route::view('apply','usercv')->name('home');


Route::view('apply','usercv')->name('cv.apply');

Route::view('application','application')->name('application');
//Route::get('application','JobController')->name('application');

Route::view('job/manage','job.manage')->name('job.manage');




//user Cv

Route::get('Candidate-CV-CareerObjective','EmployeeController@getEmployeeCvCareerObjective')->name('candidate.cvCareerObjective');
Route::get('Candidate-CV-Show','EmployeeController@getEmployeeshowFullCv')->name('candidate.viewUserCv');

//ProfessionalCertificate
Route::get('Candidate-CV-ProfessionalCertificate','ProfessionalCertificateController@getEmployeeCvProfessionalCertificate')->name('candidate.cvProfessionalCertificate');
Route::post('Candidate-CV-ProfessionalCertificate','ProfessionalCertificateController@submitEmployeeCvProfessionalCertificate')->name('submit.cvProfessionalCertificate');
Route::post('Candidate-CV-ProfessionalCertificate/update','ProfessionalCertificateController@updateEmployeeCvProfessionalCertificate')->name('update.cvProfessionalCertificate');
Route::post('edit/professionalQualificationId','ProfessionalCertificateController@editProfessionalQualification')->name('professionalQualificationId.edit');
Route::post('delete/professionalQualificationId','ProfessionalCertificateController@deleteProfessionalQualification')->name('professionalQualificationId.delete');


//PersonalInfo
Route::get('Candidate-CV','PersonalInfoController@getEmployeeCv')->name('candidate.cvPersonalInfo');

Route::post('/Candidate-CV-savePersonalInfo', 'PersonalInfoController@insertPersonalInfo')->name('cv.insertPersonalInfo');
Route::post('/Candidate-CV-updatePersonalInfo', 'PersonalInfoController@updatePersonalInfo')->name('cv.updatePersonalInfo');


//Question And Objective Info
Route::get('Candidate-CV-Objective-And-Question','QuestionObjectiveController@getEmployeeCvQuesTionObjective')->name('candidate.cvQuesObj');
Route::post('/Candidate-CV-save-Objective-And-Question','QuestionObjectiveController@insertObjectiveAndQuestion')->name('cv.insertQuesObj');
Route::post('/Candidate-CV-Objective-And-Question-Edit', 'QuestionObjectiveController@getQuestionObjectiveEdit')->name('cv.careerEdit');
Route::post('/Candidate-CV-update-Objective-And-Question','QuestionObjectiveController@updateQuesObj')->name('cv.updateQuesObj');

//Cv Other Info
Route::get('/Candidate-Cv-others-info','EmployeeOtherInfoController@otherInfo')->name('cv.OthersInfo');
Route::post('/Candidate-Cv-others-info-insert','EmployeeOtherInfoController@insertOtherInfo')->name('insert.OthersInfo');
Route::post('/Candidate-Cv-others-info-update','EmployeeOtherInfoController@updateOtherInfo')->name('update.OthersInfo');
Route::post('/Candidate-Cv-others-info-edit','EmployeeOtherInfoController@editOtherInfo')->name('edit.OthersInfo');
Route::post('/Manage-Applicant-Question-Answer','Admin\ManageQuestionApplication@manageQuestionAnswer')->name('manage.applicantQuestionAnswer');
Route::get('/Manage-Applicant-Question-Answer','Admin\ManageQuestionApplication@getManageQuestionAnswer')->name('manage.getApplicantQuestionAnswer');




//Education
Route::get('Candidate-CV-Education','EducationController@getEmployeeCvEducation')->name('candidate.cvEducation');
Route::post('/Candidate-CV-educationDegree', 'EducationController@getDegreePerEducation')->name('cv.getDegreeForEducation');
Route::post('/Candidate-CV-education-BoardOrUniversity', 'EducationController@getBoradOrUniversity')->name('cv.getBoradOrUniversity');
Route::post('/Candidate-CV-educationMajor', 'EducationController@getMajorPerEducation')->name('cv.getMajorForEducation');
Route::post('/Candidate-CV-educationEdit', 'EducationController@getEducationEdit')->name('cv.educationEdit');
Route::post('/Candidate-CV-education-Save', 'EducationController@insertPersonalEducation')->name('cv.insertPersonalEducation');
Route::post('/Candidate-CV-education-Update', 'EducationController@updatePersonalEducation')->name('cv.updatePersonalEducation');
Route::post('/Candidate-CV-education-Delete', 'EducationController@deletePersonalEducation')->name('cv.PersonalEducationDelete');


//Training
Route::get('/Candidate-CV-TrainingCertificate','TrainingController@index')->name('candidate.cvTrainingCertificate');
Route::post('/Candidate-CV-TrainingCertificate','TrainingController@insert')->name('insert.cvTrainingCertificate');
Route::post('/editTrainingCertificate','TrainingController@editTrainingCertificate')->name('cvTrainingCertificate.edit');
Route::post('/updateCvTraning','TrainingController@updateCvTraning')->name('update.cvtraning');
Route::post('/deleteCvTraning','TrainingController@deleteCvTraning')->name('cvTrainingCertificate.delete');


//Job Experience
Route::get('/Candidate-CV-JobExperience','JobExperienceController@index')->name('JobExperience.index');
Route::post('/Candidate-CV-JobExperience','JobExperienceController@submitJobExperience')->name('submit.jobExperience');
Route::post('/editJobExperience','JobExperienceController@editJobExperience')->name('JobExperience.edit');
Route::post('/updateJobExperience','JobExperienceController@updateJobExperience')->name('update.jobExperience');
Route::post('/deleteJobExperience','JobExperienceController@deleteJobExperience')->name('JobExperience.delete');

//Refree
Route::get('/Candidate-CV-Referee','RefreeController@index')->name('refree.index');
Route::post('/Candidate-CV-Referee','RefreeController@submitRefree')->name('submit.refree');
Route::post('/editRefree','RefreeController@editRefree')->name('refree.edit');
Route::post('/updateRefree','RefreeController@updateRefree')->name('update.refree');
Route::post('/deleteRefree','RefreeController@deleteRefree')->name('refree.delete');

//Relation in Caritas
Route::get('/Candidate-CV-RelativeInCaritas','RelativeInCbController@index')->name('relativeInCaritas.index');
Route::get('/Candidate-CV-RelativeInCaritas','RelativeInCbController@getRelationInfo')->name('relativeInCaritas.getRelationInfo');
Route::post('/Candidate-CV-RelativeInCaritasSubmit','RelativeInCbController@submitRelativeInCb')->name('submit.relative');
Route::post('/Candidate-CV-RelativeInCaritasSubmitYesOrNo','RelativeInCbController@submitRelativeInCbYesOrNo')->name('submit.relativeYesOrNo');
Route::post('/editRelative','RelativeInCbController@editRelative')->name('relative.edit');
Route::post('/updateRelative','RelativeInCbController@updateRelative')->name('update.relative');
Route::post('/deleteRelative','RelativeInCbController@deleteRelative')->name('relative.delete');



/*---------------------------Job----------------------*/
Route::get('job/all','JobController@index')->name('job.all');
Route::post('job/all','JobController@getJobData')->name('job.getJobData');
Route::post('job/applyJobModal','JobController@applyJobModal')->name('job.applyJobModal');
//Route::get('Candidate-Job-Apply/{jobId}','EmployeeController@applyJob')->name('candidate.ApplyJob');
Route::post('Candidate-Job-Apply/{jobId}','EmployeeController@applyJob')->name('candidate.ApplyJob');


//candidate Application
Route::get('Candidate-Applications','EmployeeApplicationController@getAllApplication')->name('candidate.manageApplication');


/*-------------------------------Admin---------------------------------*/
Route::get('Admin-Dashboard','Admin\DashboardController@home')->name('admin.dashboard');

Route::get('Admin-Manage-CV','Admin\CvManagementController@manage')->name('cv.admin.manage');
Route::post('Admin-ManageData-CV','Admin\CvManagementController@manageCvData')->name('cv.admin.manageApplicationData');


//job

Route::get('Admin-Add-New-Job','Admin\JobController@addNewJob')->name('job.admin.create');
Route::get('Admin-Manage-Job','Admin\JobController@manageJob')->name('job.admin.manage');
Route::post('Admin-Manage-Job','Admin\JobController@getManageJobData')->name('job.admin.getManageJobData');

Route::get('Admin-Edit-Job/{jobId}','Admin\JobController@jobEdit')->name('job.admin.edit');
Route::post('Admin-Delete-Job','Admin\JobController@jobDelete')->name('job.admin.delete');

Route::post('Admin-Update-Job','Admin\JobController@jobUpdate')->name('job.admin.update');
Route::post('Admin-Insert-Job','Admin\JobController@jobInsert')->name('job.admin.insert');
Route::post('Admin-Change-Job-Status','Admin\JobController@jobStatusUpdate')->name('job.admin.changeJobStatus');

//Application
Route::get('Admin-Manage-Application','Admin\ApplicationController@manageApplication')->name('application.admin.manage');
Route::post('Admin-Show-All-Application','Admin\ApplicationController@showAllApplication')->name('application.admin.showAll');
Route::post('Admin-Show-All-Major-For Education','Admin\ApplicationController@showAllMajorForEducation')->name('application.admin.getMajorFromEducationlvl');
Route::post('Admin-Export-All-AppliedCandidate','Admin\ApplicationController@exportAppliedCandidate')->name('jobAppliedCadidate.admin.Exportxls');

Route::get('Admin-Export-All-AppliedCandidate1','Admin\ApplicationController@export')->name('jobAppliedCadidate.admin.Exportxls1');

//Employee Management
Route::get('Admin-Manage-User','Admin\UserManagementController@home')->name('admin.manageUser');
Route::post('admin/Admin-Manage-User','Admin\UserManagementController@getUserData')->name('admin.getmanageUserData');
Route::get('Admin-Manage-User/add','Admin\UserManagementController@add')->name('admin.manageUser.add');
Route::get('Admin-Manage-User/edit/{id}','Admin\UserManagementController@edit')->name('admin.editmanageUserData');
Route::post('Admin-Manage-User/add','Admin\UserManagementController@insert')->name('admin.manageUser.insert');
Route::post('Admin-Manage-User/changeUserStatus','Admin\UserManagementController@changeUserStatus')->name('admin.changeUserStatus');
Route::post('Admin-Manage-User/update/{id}','Admin\UserManagementController@update')->name('admin.manageUser.update');
/*----------------------Get CV ------------------------ */
Route::get('user/cv/{empId}','UserCvController@getFullCv')->name('userCv.get');

Route::post('user/cv/select','UserCvController@getSelectedCv')->name('userCv.select');

Route::get('user-cv','UserCvController@getUserFullCv')->name('userCv.post');
Route::get('user-cv-download/{empId}','UserCvController@getUserFullCvdownload')->name('userCv.post1');


/*---------------Settings-------------*/
//Zone
Route::get('manage/zone','Admin\SettingsController@zone')->name('manage.zone');
Route::post('manage/zone/insert','Admin\SettingsController@insertZone')->name('admin.zone.insert');
Route::post('manage/zone/updateZone/{id}','Admin\SettingsController@updateZone')->name('admin.zone.update');
Route::post('manage/zone/editZone','Admin\SettingsController@editZone')->name('admin.editZone');


//Education
Route::get('manage/education','Admin\SettingsController@education')->name('manage.education');
Route::post('manage/insertEducation','Admin\SettingsController@insertEducation')->name('manage.education.insert');
Route::post('manage/updateEducation/{id}','Admin\SettingsController@updateEducation')->name('manage.education.update');
Route::post('manage/education/editEducation','Admin\SettingsController@editEducation')->name('admin.editEducation');


//Education Degree
Route::get('manage/education-Degree','Admin\SettingsController@educationDegree')->name('manage.educationDegree');
Route::post('manage/education-Degree/insert','Admin\SettingsController@insertEducationDegree')->name('manage.educationDegree.insert');
Route::post('manage/education-Degree/editDegree','Admin\SettingsController@editEducationDegree')->name('admin.editDegree');
Route::post('manage/education-Degree/updateDegree/{id}','Admin\SettingsController@updateDegree')->name('manage.degree.update');


//Nationality
Route::get('manage/Nationality','Admin\SettingsController@nationality')->name('manage.nationality');
Route::post('manage/Nationality/insert','Admin\SettingsController@insertNationality')->name('manage.nationality.insert');
Route::post('manage/Nationality/editNationality','Admin\SettingsController@editNationality')->name('admin.editNationality');
Route::post('manage/Nationality/updateNationality/{id}','Admin\SettingsController@updateNationality')->name('manage.nationality.update');

//Religion
Route::get('manage/Religion','Admin\SettingsController@religion')->name('manage.religion');
Route::post('manage/Religion/insert','Admin\SettingsController@insertReligion')->name('manage.religion.insert');
Route::post('manage/Religion/editReligion','Admin\SettingsController@editReligion')->name('admin.editReligion');
Route::post('manage/Religion/updateReligion/{id}','Admin\SettingsController@updateReligion')->name('manage.religion.update');


//Agreement
Route::get('manage/Agreement','Admin\SettingsController@agreement')->name('manage.agreement');
Route::post('manage/Agreement/insert','Admin\SettingsController@insertAgreement')->name('manage.agreement.insert');
Route::post('manage/Agreement/editAgreement','Admin\SettingsController@editAgreement')->name('admin.editAgreement');
Route::post('manage/Agreement/updateAgreement/{id}','Admin\SettingsController@updateAgreement')->name('manage.agreement.update');


//Ethnicity

Route::get('manage/Ethnicity','Admin\SettingsController@manageEthnicity')->name('manage.ethnicity');
Route::post('manage/Ethnicity/insert','Admin\SettingsController@insertEthnicity')->name('manage.ethnicity.insert');
Route::post('manage/Ethnicity/editEthnicity','Admin\SettingsController@editEthnicity')->name('admin.editEthnicity');
Route::post('manage/Ethnicity/updateEthnicity/{id}','Admin\SettingsController@updateEthnicity')->name('manage.ethnicity.update');


// organization Type
Route::get('manage/Organization-Type','Admin\SettingsController@manageorganizationType')->name('manage.organizationType');
Route::post('manage/Organization-Type/insert','Admin\SettingsController@insertorganizationType')->name('manage.organizationType.insert');
Route::post('manage/Organization-Type/editOrganizationType','Admin\SettingsController@editOrganizationType')->name('admin.editOrganizationType');
Route::post('manage/Organization-Type/updateOrganizationType/{id}','Admin\SettingsController@updateOrganizationType')->name('manage.organizationType.update');


//Degisnation
Route::get('manage/Degisnation','Admin\SettingsController@degisnation')->name('manage.degisnation');
Route::post('manage/Degisnation/insert','Admin\SettingsController@insertDegisnation')->name('manage.degisnation.insert');
Route::post('manage/Degisnation/editDegisnation','Admin\SettingsController@editDegisnation')->name('admin.editDegisnation');
Route::post('manage/Degisnation/updateDegisnation/{id}','Admin\SettingsController@updateDesignation')->name('manage.degisnation.update');

//Major
Route::get('manage/Major','Admin\SettingsController@major')->name('manage.major');
Route::post('manage/Major/insert','Admin\SettingsController@insertMajor')->name('manage.major.insert');
Route::post('manage/Major/editMajor','Admin\SettingsController@editMajor')->name('admin.editMajor');
Route::post('manage/Major/updateMajor/{id}','Admin\SettingsController@updateMajor')->name('manage.major.update');

//Major
Route::get('manage/Board','Admin\SettingsController@board')->name('manage.board');
Route::post('manage/Board/insert','Admin\SettingsController@insertBoard')->name('manage.board.insert');
Route::post('manage/Board/editBoard','Admin\SettingsController@editBoard')->name('admin.editBoard');
Route::post('manage/Board/updateBoard/{id}','Admin\SettingsController@updateBoard')->name('manage.board.update');



Route::get('/testloop','testController@testloop')->name('test');





