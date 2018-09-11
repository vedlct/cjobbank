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

Route::view('manage/zone','manage.zone')->name('manage.zone');
Route::view('manage/education','manage.education')->name('manage.education');
Route::view('manage/education-Degree','manage.educationDegree')->name('manage.educationDegree');

//user Cv

Route::get('Candidate-CV-CareerObjective','EmployeeController@getEmployeeCvCareerObjective')->name('candidate.cvCareerObjective');

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

//Education
Route::get('Candidate-CV-Education','EducationController@getEmployeeCvEducation')->name('candidate.cvEducation');
Route::post('/Candidate-CV-educationDegree', 'EducationController@getDegreePerEducation')->name('cv.getDegreeForEducation');
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

Route::get('/Candidate-CV-RelativeInCaritas','RelativeInCbController@getRelationInfo')->name('relativeInCaritas.getRelationInfo');



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

Route::get('Admin-Edit-Job/{jobId}','Admin\JobController@jobEdit')->name('job.admin.edit');
Route::post('Admin-Delete-Job','Admin\JobController@jobDelete')->name('job.admin.delete');

Route::post('Admin-Update-Job','Admin\JobController@jobUpdate')->name('job.admin.update');
Route::post('Admin-Insert-Job','Admin\JobController@jobInsert')->name('job.admin.insert');
Route::post('Admin-Change-Job-Status','Admin\JobController@jobStatusUpdate')->name('job.admin.changeJobStatus');

//Application
Route::get('Admin-Manage-Application','Admin\ApplicationController@manageApplication')->name('application.admin.manage');
Route::post('Admin-Show-All-Application','Admin\ApplicationController@showAllApplication')->name('application.admin.showAll');
Route::post('Admin-Export-All-AppliedCandidate','Admin\ApplicationController@exportAppliedCandidate')->name('jobAppliedCadidate.admin.Exportxls');
//Employee Management
Route::get('Admin-Manage-User','Admin\UserManagementController@home')->name('admin.manageUser');
Route::get('Admin-Manage-User/add','Admin\UserManagementController@add')->name('admin.manageUser.add');