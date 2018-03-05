<?php

namespace App\Http\Controllers\Dashboard;

// Dependencies
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Controller
use App\Http\Controllers\AdministratorController;

class StaffDashboardController extends AdministratorController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('dashboard.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $staff = new $this->staff;

        $positions = $this->position->all();
        
        return view('dashboard.staff.create')->withStaff($staff)->withPositions($positions);
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
            'staff_id' => 'required|unique:staffs',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:staffs',
            'birthdate' => 'required',
            'position_id' => 'required|in:1,2,3'
        ]);
        
        $request['password'] = Hash::make(str_replace('-', '', $request->birthdate));
        
        $input = $request->all();
        
        $this->staff->create($input);
        
        return redirect()->back()->with('success', 'New Staff has been created!');
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
        $positions = $this->position->all();

        $staff = $this->staff->whereStaffId($id)->firstOrFail();

        return view('dashboard.staff.edit')->withStaff($staff)->withPositions($positions);
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
            'staff_id' => 'required|unique:staffs,staff_id,'.$id,
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:staffs,email,'.$id,
            'birthdate' => 'required',
            'position_id' => 'required|in:1,2,3'
        ]);
        
        $input = $request->all();
        
        $this->staff->findOrFail($id)->update($input);
        
        return redirect()->back()->with('success', 'Staff has been updated!');
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
     * Populate all staff data
     *
     * @return Collection
     */
    public function getStaffData()
    {
        $staff = $this->staff
            ->leftJoin('staff_positions', 'staffs.position_id', '=', 'staff_positions.id')
            ->select(['staff_id', 'email', 'staff_positions.name as position', 'first_name', 'last_name']);
        
        return datatables()->of($staff)
            ->addColumn('name', '{{$first_name}} {{$last_name}}
               {!! Builder::action("staff", $staff_id) !!}')
            ->addColumn('position', '{{$position}}')
            ->rawColumns(['name'])
            ->removeColumn('first_name', 'last_name')
            ->make();
    }
}
