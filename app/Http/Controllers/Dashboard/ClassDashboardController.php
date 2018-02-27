<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\GradeDashboardController;
use Illuminate\Support\Carbon;

class ClassDashboardController extends GradeDashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Class collection
        $classrooms = $this->classroom->all();

        // Teacher collection
        $teachers = $this->staff->all();

        // Carbon year
        $year = Carbon::now()->year;

        // Grade collection from current year
        $grades = $this->grade->where('schoolyear_start', $year)->orderBy('schoolyear_start', 'desc')->get();

        // Grade collection from past year
        $oldGrades = $this->grade->where('schoolyear_start', '<', $year)->orderBy('schoolyear_start', 'desc')->get();

        return view('dashboard.gradeclass.create-class')->withClassrooms($classrooms)->withGrades($grades)->withOldGrades($oldGrades)->withTeachers($teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:classes,name,NULL,NULL,grade_id,'. $request['grade_id'],
            'grade_id' => 'required|integer',
            'homeroom_teacher' => 'required|integer|unique:classes'
        ],
        [
            'name.unique' => 'The class is already exist in this grade.',
            'grade_id.required' => 'Please select the grade.',
            'grade_id.integer' => 'Please select the grade.',
            'homeroom_teacher.required' => 'Please select homeroom teacher.',
            'homeroom_teacher.integer' => 'Please select homeroom teacher.',
            'homeroom_teacher.unique' => 'The homeroom teacher has been assigned to other classroom.'
        ]);
        
        $input = $request->all();
        
        $this->classroom->create($input);
        
        return redirect()->back()->with('success', 'New Class has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
