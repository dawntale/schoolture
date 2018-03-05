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
        $department = new $this->department;

        return view('dashboard.department.create')
            ->withDepartment($department);
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
        $department = $this->department->findOrFail($id);

        return view('dashboard.department.edit')
            ->withDepartment($department);
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
            'code' => 'required|size:3|unique:departments,code,'.$id,
            'name' => 'required|unique:departments,name,'.$id,
            'status' => 'in:0,1',
        ]);

        if(!$request['status']){
            $request['status'] = 0;
        }
        
        $input = $request->all();
        
        $this->department->findOrFail($id)->update($input);
        
        return redirect()->back()->with('success', 'New Department has been created!');
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
            ->editColumn('name', '<a href="#">{{$name}}</a>
                 {!! Builder::action("department", $id) !!} ')
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