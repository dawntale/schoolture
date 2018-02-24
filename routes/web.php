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

Auth::routes();

// Administrator Route
Route::prefix('dashboard')->group(function(){
    // Staff Section
    Route::get('/staff', 'AdministratorController@staff')->name('admin.staff');
    Route::get('/new-staff', 'AdministratorController@newStaff')->name('admin.newStaff');
    Route::post('/new-staff', 'AdministratorController@store_newStaff')->name('admin.newStaff.submit');
    
    // Student Section
    Route::get('/student', 'AdministratorController@student')->name('admin.student');
    Route::get('/subject', 'AdministratorController@subject')->name('admin.subject');
    
    // Dashboard Home
    Route::get('/', 'AdministratorController@index')->name('admin.dashboard');
});

// Employee Route
Route::prefix('staff')->group(function(){
    Route::get('/login', 'Auth\StaffLoginController@showLoginForm')->name('staff.login');
    Route::post('/login', 'Auth\StaffLoginController@login')->name('staff.login.submit');
    Route::get('/', 'StaffController@index')->name('staff.dashboard');
});

// Student Route
Route::prefix('student')->group(function(){
    Route::get('/login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'Auth\StudentLoginController@login')->name('student.login.submit');
    Route::get('/', 'StudentController@index')->name('student.dashboard');
});