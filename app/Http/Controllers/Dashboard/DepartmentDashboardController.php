<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\AdministratorController;

class DepartmentDashboardController extends AdministratorController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.department.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.department.create');
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
            'code' => 'required|size:3|unique:departments',
            'name' => 'required|unique:departments',
            'status' => 'in:0,1',
        ]);
        
        $input = $request->all();
        
        $this->department->create($input);
        
        return redirect()->back()->with('success', 'New Department has been created!');
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
     * Populate all department data to datatables
     *
     * @return Collection
     */
    public function getDepartmentData()
    {
        $department = $this->department->select(['code', 'name', 'description' ,'status', 'id']);
        
        return datatables()->of($department)
            ->editColumn('name', '<a href="#">{{$name}}</a>')
            ->editColumn('status', '
            @if($status == 1)
                <i class="text-success fa fa-check"></i> Active
            @else
                <i class="text-danger fa fa-times"></i> In Active
            @endif
            ')
            ->rawColumns(['name', 'status'])
            ->removeColumn('id')
            ->make();
    }
}
