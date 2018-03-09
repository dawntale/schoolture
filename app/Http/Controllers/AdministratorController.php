<?php

namespace App\Http\Controllers;

// Model
use App\Department;
use App\Staff;
use App\Student;
use App\Position;
use App\Grade;
use App\Classroom;
use App\Subject;
use App\SessionBlock;

class AdministratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Department $department, Staff $staff, Student $student, Position $position, Grade $grade, Classroom $classroom, Subject $subject, SessionBlock $sessionBlock)
    {
        $this->middleware('auth:admin');
        $this->department = $department;
        $this->staff = $staff;
        $this->student = $student;
        $this->position = $position;
        $this->grade = $grade;
        $this->classroom = $classroom;
        $this->subject = $subject;
        $this->sessionBlock = $sessionBlock;
    }

    /**
     * Show the application dashboard index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }
    
    /**
     * Show the application subject datatable.
     *
     * @return \Illuminate\Http\Response
     */
    public function subject()
    {
        return view('dashboard.subject');
    }
    
}
