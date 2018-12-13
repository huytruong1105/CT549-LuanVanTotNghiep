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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dangky', 'RegistrationController@index')->name('register');
Route::post('/dangky', 'RegistrationController@store');

Route::get('/dangnhap', 'SessionController@index')->name('login');
Route::post('/dangnhap', 'SessionController@authenticate');
Route::get('/district/{id}', 'CityController@showDistrict')->name('district');
Route::get('/dangxuat', 'SessionController@destroy')->middleware('auth');

Route::get('/trangchu', 'DashboardController@index')->middleware('auth');
Route::get('/thongtincanhan', 'ProfileController@index')->middleware('auth');
Route::patch('/updateUserContact/{id}', 'UserController@updateUserContact')->middleware('auth');


Route::post('/workinginformation', 'ProfileController@workinginformation')->middleware('auth');
Route::post('/capnhatthongtinvieclam/{id}','ProfileController@update_workinginformation')->middleware('auth');
Route::post('/xoathongtinvieclam/{id}','ProfileController@delete_workinginformation')->middleware('auth');
Route::get('/company/{id}', 'DistrictController@showCompanies')->name('company')->middleware('auth');

Route::get('/khaosat', 'SurveyController@index')->middleware('auth');
Route::post('/khaosat', 'SurveyController@saveSurvey')->middleware('auth');
Route::patch('/capnhatkhaosat/{student_id}','SurveyController@updateSurvey')->middleware('auth');

Route::get('/survey', 'SurveyController@index2');
Route::get('/export', 'AnotherController@export');

/* ------------------- Admin ------------------- */
