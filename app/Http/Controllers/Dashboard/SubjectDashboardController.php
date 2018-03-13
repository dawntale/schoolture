<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\StudentDashboardController;

class SubjectDashboardController extends StudentDashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Subject Model
        $subject = new $this->subject;

        // Department Collection
        $departments = $this->department->where('status', 1)->get();

        // Subject Collection
        $subColls = $this->subject->orderBy('created_at', 'desc')->get();

        return view('dashboard.subject.create')
            ->withSubject($subject)
            ->withDepartments($departments)
            ->withSubColls($subColls);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = $this->department->findOrFail($request['department_id']);

        $request['code'] = $department->code . '-' . $request['abbreviation'];

        $this->validate($request, [
        	'code' => 'required|unique:subjects',
            'abbreviation' => 'required|size:3',
            'name' => 'required',
        ],[
            'code.unique' => 'The subject has already added in this department.'
        ]);
        
        $input = $request->all();
        
        $this->subject->create($input);
        
        return redirect()->back()->with('success', 'New Subject has been created!');
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
        // Subject Model
        $subject = $this->subject->findOrFail($id);

        // Department Collection
        $departments = $this->department->where('status', 1)->get();

        // Subject Collection
        $subColls = $this->subject->orderBy('created_at', 'desc')->get();
        
        return view('dashboard.subject.edit')
            ->withSubject($subject)
            ->withDepartments($departments)
            ->withSubColls($subColls);
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
        $this->validate($request, [
            'name' => 'required',
        ]);
        
        $input = $request->except('department_id', 'code', 'abbreviation');
        
        $this->subject->findOrFail($id)->update($input);
        
        return redirect()->back()->with('success', 'Subject has been updated!');
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
