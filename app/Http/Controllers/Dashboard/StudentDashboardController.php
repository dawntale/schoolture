<?php

namespace App\Http\Controllers\Dashboard;

// Dependencies
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Controller
use App\Http\Controllers\AdministratorController;

class StudentDashboardController extends AdministratorController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = $this->grade->orderBy('schoolyear_start', 'desc')->get();

        return view('dashboard.student.create')->withGrades($grades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required|unique:students',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:students',
            'birthdate' => 'required',
            'sex' => 'required|in:Male,Female',
            'grade_id' => 'required|integer',
        ]);
        
        $request['password'] = Hash::make(str_replace('-', '', $request->birthdate));
        
        $input = $request->all();
        
        $this->student->create($input);
        
        return redirect()->back()->with('success', 'New Student has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->student->findOrFail($id);

        // Only get classes with the same grade as the student
        $classes = $this->classroom->where('grade_id', $student->grade_id)->get();

        return view('dashboard.student.show')->withStudent($student)->withClasses($classes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Populate all student data to datatables
     *
     * @return Collection
     */
    public function getStudentData()
    {
        $staff = $this->student->select(['student_id', 'email', 'first_name', 'last_name', 'id']);
        
        return datatables()->of($staff)
            ->addColumn('name', '<a href="{{ route(\'dashboard.student.show\', $id) }}">{{$first_name}} {{$last_name}}</a>')
            ->rawColumns(['name'])
            ->removeColumn('first_name', 'last_name')
            ->make();
    }

    public function assignClassStore(Request $request, $id)
    {
        $this->validate($request, [
            'class_id' => 'required|unique:students_classes,class_id,NULL,NULL,student_id,'. $id,
        ],[
            'class_id.unique' => 'The student has already belongs to the selected class.'
        ]);

        $classId = $request['class_id'];
        
        $student = $this->student->findOrFail($id);
        
        $student->class()->attach($classId);
        
        return redirect()->back()->with('success', 'Teacher has been assigned with subject successfuly!');
    }
}
