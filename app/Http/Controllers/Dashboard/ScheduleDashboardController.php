<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\ClassDashboardController;

class ScheduleDashboardController extends ClassDashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function sessionIndex()
    {
        $departments = $this->department->where('status', 1)->get();

        return view ('dashboard.schedule.session-index')->withDepartments($departments);
    }

    public function sessionCreate($code)
    {
        $grade = $this->grade->where('code', $code)->firstOrFail();

        $sessionBlocks = $this->sessionBlock->where('grade_id', $grade->id)->orderBy('start_time', 'asc')->get();

        return view('dashboard.schedule.session-create')
            ->withGrade($grade)
            ->withSessionBlocks($sessionBlocks);
    }

    public function sessionStore(Request $request, $id)
    {
        $request['grade_id'] = $id;

        $this->validate($request, [
            'name' => 'required|max:50',
            'grade_id' => 'required|integer',
            'start_time' => 'required|min:4',
            'end_time' => 'required|min:4',
            'isBreak' => 'in:0,1',
        ]);
        
        $input = $request->all();
        
        $this->sessionBlock->create($input);
        
        return redirect()->back()->with('success', 'New session block has been created!');
    }
}
