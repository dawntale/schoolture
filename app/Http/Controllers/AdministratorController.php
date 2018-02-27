<?php

namespace App\Http\Controllers;

// Model
use App\Staff;
use App\Student;
use App\Position;
use App\Grade;

class AdministratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Staff $staff, Student $student, Position $position, Grade $grade)
    {
        $this->middleware('auth:admin');
        $this->staff = $staff;
        $this->student = $student;
        $this->position = $position;
        $this->grade = $grade;
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
