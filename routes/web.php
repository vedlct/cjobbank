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


Route::view('apply','usercv')->name('cv.apply');

Route::view('application','application')->name('application');
Route::view('job/all','job.all')->name('job.all');
Route::view('job/manage','job.manage')->name('job.manage');

Route::view('manage/zone','manage.zone')->name('manage.zone');
Route::view('manage/education','manage.education')->name('manage.education');

//user Cv
Route::get('Candidate-CV','EmployeeController@getEmployeeCv')->name('candidate.cvPersonalInfo');
Route::get('Candidate-CV-CareerObjective','EmployeeController@getEmployeeCvCareerObjective')->name('candidate.cvCareerObjective');
Route::get('Candidate-CV-ProfessionalCertificate','EmployeeController@getEmployeeCvProfessionalCertificate')->name('candidate.cvProfessionalCertificate');

Route::get('Candidate-CV-Education','EmployeeController@getEmployeeCvEducation')->name('candidate.cvEducation');

//
Route::post('/Candidate-CV-savePersonalInfo', 'EmployeeController@insertPersonalInfo')->name('cv.insertPersonalInfo');
Route::post('/Candidate-CV-updatePersonalInfo', 'EmployeeController@updatePersonalInfo')->name('cv.updatePersonalInfo');


