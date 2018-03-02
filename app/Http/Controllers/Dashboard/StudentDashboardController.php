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
        return view('dashboard.student.create');
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
            'sex' => 'required|in:Male,Female'
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
        $student = $this->student->find($id)->first();

        return view('dashboard.student.show')->withStudent($student);
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
        $staff = $this->student->select(['student_id', 'email', 'first_name', 'last_name']);
        
        return datatables()->of($staff)
            ->addColumn('name', '{{$first_name}} {{$last_name}}')
            ->removeColumn('first_name', 'last_name')
            ->make();
    }
}
