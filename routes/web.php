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

    // School Setting Section
    Route::group(['as' => 'dashboard.', 'namespace' => 'Dashboard'], function(){

        // School Department Section
        Route::resource('department', 'DepartmentDashboardController', 
            ['only' => ['index', 'create', 'store', 'edit', 'update']]);
        Route::get('department/department-data', 'DepartmentDashboardController@getDepartmentData')->name('department.data');

        // School Grade Section
        Route::resource('grade', 'GradeDashboardController', 
            ['only' => ['index', 'create', 'store']]);
        Route::get('grade/grade-data', 'GradeDashboardController@getGradeData')->name('grade.data');

        // School Class Section
        Route::resource('class', 'ClassDashboardController', 
            ['only' => ['index', 'create', 'store']]);
        Route::get('class/class-data', 'ClassDashboardController@getClassData')->name('class.data');
    });

    // Staff Section
    Route::group(['as' => 'dashboard.', 'namespace' => 'Dashboard'], function(){
        Route::resource('staff', 'StaffDashboardController', 
            ['only' => ['index', 'create', 'store', 'edit', 'update']]);
        Route::get('staff/staff-data', 'StaffDashboardController@getStaffData')->name('staff.data');
        
        // Staff Position Section
        Route::resource('position', 'PositionDashboardController', 
            ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    });
    
    // Student Section
    Route::group(['as' => 'dashboard.', 'namespace' => 'Dashboard'], function(){
        Route::get('/student/student-data', 'StudentDashboardController@getStudentData')->name('student.data');
        Route::post('/student/{student}/class', 'StudentDashboardController@assignClassStore')->name('student.assignclass.store');
        Route::resource('student', 'StudentDashboardController', 
            ['only' => ['index', 'create', 'store', 'show', 'edit', 'update']]);
    });

    // Subject Section
    Route::group(['as' => 'dashboard.', 'namespace' => 'Dashboard'], function(){
        Route::resource('subject', 'SubjectDashboardController', 
            ['only' => ['create', 'store', 'edit', 'update']]);

        Route::get('subject/assign-teacher', 'SubjectDashboardController@teacher')->name('subject.teacher');
        Route::post('subject/assign-teacher', 'SubjectDashboardController@teacherStore')->name('subject.teacher.store');
    });

    // Schedule Section
    Route::group(['as' => 'dashboard.', 'namespace' => 'Dashboard'], function(){
        // Class Schedule Section
        Route::get('/schedule', 'ScheduleDashboardController@scheduleIndex')->name('schedule.index');
        Route::get('/schedule/{class}', 'ScheduleDashboardController@scheduleCreate')->name('schedule.create');
        Route::post('/schedule/{class}', 'ScheduleDashboardController@scheduleStore')->name('schedule.store');
        Route::get('/session', 'ScheduleDashboardController@sessionIndex')->name('session.index');
        Route::get('/session/{grade}', 'ScheduleDashboardController@sessionCreate')->name('session.create');
        Route::post('/session/{grade}', 'ScheduleDashboardController@sessionStore')->name('session.store');
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