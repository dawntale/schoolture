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

// Dashboard Route
Route::prefix('dashboard')->group(function(){
    
    // Staff Section
    Route::prefix('staff')->namespace('Dashboard')->group(function(){
        Route::get('/create', 'StaffDashboardController@create')->name('dashboard.staff.create');
        Route::post('/create', 'StaffDashboardController@store')->name('dashboard.staff.store');
        Route::get('/staff-data', 'StaffDashboardController@getStaffData')->name('dashboard.staff.data');
        
        // Staff Position Section
        Route::get('/position', 'PositionDashboardController@index')->name('dashboard.position.index');
        Route::post('/position', 'PositionDashboardController@store')->name('dashboard.position.store');
        
        Route::get('/', 'StaffDashboardController@index')->name('dashboard.staff');
    });
    
    // Student Section
    Route::prefix('student')->namespace('Dashboard')->group(function(){
        Route::get('/create', 'StudentDashboardController@create')->name('dashboard.student.create');
        Route::post('/create', 'StudentDashboardController@store')->name('dashboard.student.store');
        Route::get('/student-data', 'StudentDashboardController@getStudentData')->name('dashboard.student.data');
        Route::get('/', 'StudentDashboardController@index')->name('dashboard.student');
    });
    
    // Subject Section
    Route::get('/subject', 'AdministratorController@subject')->name('admin.subject');
    
    // Dashboard Home
    Route::get('/', 'AdministratorController@index')->name('admin.dashboard');
});

// Staff Route
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