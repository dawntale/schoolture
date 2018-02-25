<?php

namespace App\Http\Controllers;

// Model
use App\Staff;
use App\Position;
use App\Student;

class AdministratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Staff $staff, Position $position, Student $student)
    {
        $this->middleware('auth:admin');
        $this->staff = $staff;
        $this->position = $position;
        $this->student = $student;
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
