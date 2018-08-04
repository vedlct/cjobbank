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

Route::post('/Account-Active', 'Auth\RegisterController@AccountActive')->name('account.active');

Route::post('/Register', 'Auth\RegisterController@createUserShowAggrement')->name('register.createUserShowAggrement');
Route::post('/Register/userAgreement', 'Auth\RegisterController@newUserAgreement')->name('register.newUserAgreement');



Route::get('/home', 'HomeController@index')->name('home');


Route::view('apply','usercv')->name('cv.apply');
Route::view('application','application')->name('application');
Route::view('job/all','job.all')->name('job.all');
Route::view('job/manage','job.manage')->name('job.manage');

Route::view('manage/zone','manage.zone')->name('manage.zone');
Route::view('manage/education','manage.education')->name('manage.education');



