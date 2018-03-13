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
        return view('dashboard.class.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Teacher collection
        $teachers = $this->staff->positionName('Teacher')->get();

        // Grade collection from current year
        $grades = $this->grade->where('status', 1)->get();

        return view('dashboard.class.create')->withGrades($grades)->withTeachers($teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get the academic year only to construct class unique code
        $academicDate = Carbon::parse($request['schoolyear_start']);
        $academicYear = $academicDate->year;

        $grade = $this->grade->findOrFail($request['grade_id']);

        $request['code'] = $academicYear . '-' .$grade->code . '-' . $request['name'];

        $this->validate($request, [
            'name' => 'required|unique:classes,name,NULL,NULL,grade_id,'. $request['grade_id'],
            'grade_id' => 'required',
            'homeroom_teacher' => 'unique:classes|nullable',
            'schoolyear_start' => 'required',
            'schoolyear_end' => 'required',
            'status' => 'required|in:0,1'
        ],
        [
            'name.unique' => 'The class is already exist in this grade.',
            'grade_id.required' => 'Please select the grade.',
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

    /**
     * Populate all class data to datatables
     *
     * @return Collection
     */
    public function getClassData()
    {
        $classes = $this->classroom
            ->leftJoin('grades', 'classes.grade_id', '=', 'grades.id')
            ->leftJoin('staffs', 'classes.homeroom_teacher', '=', 'staffs.id')
            ->leftJoin('departments', 'grades.department_id', '=', 'departments.id')
            ->select(['classes.code as code', 'classes.name as name' ,'classes.status as status', 'classes.homeroom_teacher as homeroom_teacher', 'classes.schoolyear_start as schoolyear_start', 'classes.schoolyear_end as schoolyear_end', 'grades.name as gname', 'grades.code as gcode', 'departments.code as dcode', 'staffs.first_name as sfname', 'staffs.last_name as slname', 'classes.id as id']);
        
        return datatables()->of($classes)
            ->editColumn('name', '<a href="#">{{$name}}</a>')
            ->editColumn('status', '
            @if($status == 1)
                <i class="text-success fa fa-check"></i> Active
            @else
                <i class="text-danger fa fa-times"></i> In Active
            @endif
            ')
            ->editColumn('gname', '{{ $gname }} ({{ $gcode }})')
            ->addColumn('sname', function($data){
                if($data->sfname !== null && $data->slname !== null){
                    return $data->sfname . ' ' . $data->slname;
                } else {
                    return '<i class="text-danger fa fa-times"></i> N/A';
                }
            })
            ->addColumn('academic_year', '<span title="{{ $schoolyear_start }}/{{ $schoolyear_end }}">{{ Carbon\Carbon::parse($schoolyear_start)->year }}/{{ Carbon\Carbon::parse($schoolyear_end)->year }}</span>')
            ->rawColumns(['name', 'status', 'sname', 'academic_year'])
            ->removeColumn('id', 'gcode', 'sfname', 'slname')
            ->make();
    }
}
