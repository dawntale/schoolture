<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdministratorController;
use Illuminate\Support\Carbon;

class GradeDashboardController extends AdministratorController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = Carbon::now()->year;

        $departments = $this->department->all();

        // Grade collection from current year
        $grades = $this->grade->where('schoolyear_start', $year)->orderBy('schoolyear_start', 'desc')->get();

        // Grade collection from past year
        $oldGrades = $this->grade->where('schoolyear_start', '<', $year)->orderBy('schoolyear_start', 'desc')->get();
        
        return view('dashboard.gradeclass.create-grade')->withDepartments($departments)->withGrades($grades)->withOldGrades($oldGrades);
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
            'code' => 'required|unique:grades',
            'name' => 'required|unique:grades,name,NULL,NULL,schoolyear_start,'. $request['schoolyear_start'],
            'schoolyear_start' => 'required|integer|digits:4'
        ],
        [
            'name.unique' => 'The grade with this school year is already exist.'
        ]);

        $request['schoolyear_end'] = $request['schoolyear_start'] + 1;
        
        $input = $request->all();
        
        $this->grade->create($input);
        
        return redirect()->back()->with('success', 'New Grade has been created!');
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
