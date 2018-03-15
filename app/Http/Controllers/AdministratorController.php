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
use App\Lesson;
use App\SessionBlock;
use App\Schedule;
use App\Guardian;

class AdministratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Department $department, Staff $staff, Student $student, Position $position, Grade $grade, Classroom $classroom, Subject $subject, Lesson $lesson, SessionBlock $sessionBlock, Schedule $schedule, Guardian $guardian)
    {
        $this->middleware('auth:admin');
        $this->department = $department;
        $this->staff = $staff;
        $this->student = $student;
        $this->position = $position;
        $this->grade = $grade;
        $this->classroom = $classroom;
        $this->subject = $subject;
        $this->lesson = $lesson;
        $this->sessionBlock = $sessionBlock;
        $this->schedule = $schedule;
        $this->guardian = $guardian;
    }

    /**
     * Show the application dashboard index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->department->where('status', 1)->get();
        $studentCount = $this->student->count();
        $staffCount = $this->staff->count();

        return view('dashboard.index')
            ->withDepartments($departments)
            ->withStudentCount($studentCount)
            ->withStaffCount($staffCount);
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
