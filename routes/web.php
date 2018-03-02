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

// Dashboard Route
Route::prefix('dashboard')->group(function(){
    
    // Admin Authentication
    Auth::routes();

    // Department Section
    Route::prefix('department')->namespace('Dashboard')->group(function(){
        Route::get('/', 'DepartmentDashboardController@create')->name('dashboard.department.create');
        Route::post('/', 'DepartmentDashboardController@store')->name('dashboard.department.store');
    });

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


        // Student Grade Section
        Route::get('/grade', 'GradeDashboardController@index')->name('dashboard.grade.index');
        Route::post('/grade', 'GradeDashboardController@store')->name('dashboard.grade.store');

        // Student Class Section
        Route::get('/class', 'ClassDashboardController@index')->name('dashboard.class.index');
        Route::post('/class', 'ClassDashboardController@store')->name('dashboard.class.store');

        Route::get('/{student}', 'StudentDashboardController@show')->name('dashboard.student.show');
        Route::post('/{student}', 'StudentDashboardController@assignClassStore')->name('dashboard.student.assignclass.store');
        Route::get('/', 'StudentDashboardController@index')->name('dashboard.student');
    });

    // Subject Section
    Route::prefix('subject')->namespace('Dashboard')->group(function(){
        Route::get('/create', 'SubjectDashboardController@create')->name('dashboard.subject.create');
        Route::post('/create', 'SubjectDashboardController@store')->name('dashboard.subject.store');
        Route::get('/assign-teacher', 'SubjectDashboardController@teacher')->name('dashboard.subject.teacher');
        Route::post('/assign-teacher', 'SubjectDashboardController@teacherStore')->name('dashboard.subject.teacher.store');
    });
    
    // Dashboard Home
    Route::get('/', 'AdministratorController@index')->name('admin.dashboard');
});

// Staff Route
Route::prefix('staff')->group(function(){
        // Staff Login / Logout Section
    Route::namespace('Auth\Staff')->group(function(){
        Route::get('/login', 'StaffLoginController@showLoginForm')->name('staff.login');
        Route::post('/login', 'StaffLoginController@login')->name('staff.login.submit');
        Route::post('/logout', 'StaffLoginController@logout')->name('staff.logout');
    });

    // Staff Reset Password Section
    Route::prefix('password')->group(function(){
        Route::post('/email', 'Auth\Staff\StaffForgotPasswordController@sendResetLinkEmail')->name('staff.password.email');
        Route::get('/reset', 'Auth\Staff\StaffForgotPasswordController@showLinkRequestForm')->name('staff.password.request');
        Route::post('/reset', 'Auth\Staff\StaffResetPasswordController@reset');
        Route::get('/reset/{token}', 'Auth\Staff\StaffResetPasswordController@showResetForm')->name('staff.password.reset');
    });

    Route::get('/', 'StaffController@index')->name('staff.dashboard');
});

// Student Route
Route::prefix('student')->group(function(){
    // Student Login / Logout Section
    Route::namespace('Auth\Student')->group(function(){
        Route::get('/login', 'StudentLoginController@showLoginForm')->name('student.login');
        Route::post('/login', 'StudentLoginController@login')->name('student.login.submit');
        Route::post('/logout', 'StudentLoginController@logout')->name('student.logout');
    });

    // Student Reset Password Section
    Route::prefix('password')->namespace('Auth\Student')->group(function(){
        Route::post('/email', 'StudentForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
        Route::get('/reset', 'StudentForgotPasswordController@showLinkRequestForm')->name('student.password.request');
        Route::post('/reset', 'StudentResetPasswordController@reset');
        Route::get('/reset/{token}', 'StudentResetPasswordController@showResetForm')->name('student.password.reset');
    });

    Route::get('/', 'StudentController@index')->name('student.dashboard');
});