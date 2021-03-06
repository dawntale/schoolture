<?php

namespace App\Http\Controllers\Auth\Student;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class StudentLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Student Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating students for the application and
    | redirecting them to student dashboard. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    use AuthenticatesUsers;
    
    /**
     * Where to redirect student after login.
     *
     * @var string
     */
    protected $redirectTo = '/student';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        // Every Visitor can access student login controller
        $this->middleware('guest:student')->except('logout');
    }
    
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(){
        return view('auth.student-login');
    }
    
    /**
     * Get the login username from student_id to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'student_id';
    }
    
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('student');
    }
}