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
Route::view('job/all','job.all')->name('job.all');
Route::view('job/manage','job.manage')->name('job.manage');

Route::view('manage/zone','manage.zone')->name('manage.zone');
Route::view('manage/education','manage.education')->name('manage.education');

//user Cv
Route::get('Candidate-CV','EmployeeController@getEmployeeCv')->name('candidate.cvPersonalInfo');
Route::get('Candidate-CV-CareerObjective','EmployeeController@getEmployeeCvCareerObjective')->name('candidate.cvCareerObjective');

//ProfessionalCertificate
Route::get('Candidate-CV-ProfessionalCertificate','ProfessionalCertificateController@getEmployeeCvProfessionalCertificate')->name('candidate.cvProfessionalCertificate');
Route::post('Candidate-CV-ProfessionalCertificate','ProfessionalCertificateController@submitEmployeeCvProfessionalCertificate')->name('submit.cvProfessionalCertificate');
Route::post('Candidate-CV-ProfessionalCertificate/update','ProfessionalCertificateController@updateEmployeeCvProfessionalCertificate')->name('update.cvProfessionalCertificate');
Route::post('edit/professionalQualificationId','ProfessionalCertificateController@editProfessionalQualification')->name('professionalQualificationId.edit');
Route::post('delete/professionalQualificationId','ProfessionalCertificateController@deleteProfessionalQualification')->name('professionalQualificationId.delete');



Route::get('Candidate-CV-Education','EmployeeController@getEmployeeCvEducation')->name('candidate.cvEducation');


//
Route::post('/Candidate-CV-savePersonalInfo', 'EmployeeController@insertPersonalInfo')->name('cv.insertPersonalInfo');
Route::post('/Candidate-CV-updatePersonalInfo', 'EmployeeController@updatePersonalInfo')->name('cv.updatePersonalInfo');

//
Route::post('/Candidate-CV-educationDegree', 'EmployeeController@getDegreePerEducation')->name('cv.getDegreeForEducation');
Route::post('/Candidate-CV-educationMajor', 'EmployeeController@getMajorPerEducation')->name('cv.getMajorForEducation');

Route::post('/Candidate-CV-educationEdit', 'EmployeeController@getEducationEdit')->name('cv.educationEdit');

Route::post('/Candidate-CV-education-Save', 'EmployeeController@insertPersonalEducation')->name('cv.insertPersonalEducation');
Route::post('/Candidate-CV-education-Update', 'EmployeeController@updatePersonalEducation')->name('cv.updatePersonalEducation');
Route::post('/Candidate-CV-education-Delete', 'EmployeeController@deletePersonalEducation')->name('cv.PersonalEducationDelete');


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
