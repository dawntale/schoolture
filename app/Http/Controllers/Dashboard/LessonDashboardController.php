<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\AdministratorController;

class LessonDashboardController extends AdministratorController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = $this->lesson->all();

        return view('dashboard.lesson.index')->withLessons($lessons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = $this->department->all();

        $grades = $this->grade->all();

        // Scope staff from position name
        $teachers = $this->staff->positionName('Teacher')->get();

        $subjects = $this->subject->all();

        return view('dashboard.lesson.create')
            ->withDepartments($departments)
            ->withGrades($grades)
            ->withTeachers($teachers)
            ->withSubjects($subjects);
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
            'name' => 'required|max:190',
            'description' => 'nullable',
            'grade_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'status' => 'required|in:0,1'
        ]);

        $input = $request->all();
        
        $this->lesson->create($input);
        
        return redirect()->back()->with('success', 'New Lesson has been created!');
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
