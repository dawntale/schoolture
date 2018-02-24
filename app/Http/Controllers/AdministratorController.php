<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Staff $staff)
    {
        $this->middleware('auth:admin');
        $this->staff = $staff;
    }

    /**
     * Show the application dashboard index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }
    
    /**
     * Show the application staff datatable.
     *
     * @return \Illuminate\Http\Response
     */
    public function staff()
    {
        return view('dashboard.staff.index');
    }
    
    /**
     * Show the application student datatable.
     *
     * @return \Illuminate\Http\Response
     */
    public function student()
    {
        return view('dashboard.student');
    }
    
    /**
     * Show the application subject datatable.
     *
     * @return \Illuminate\Http\Response
     */
    public function subject()
    {
        return view('dashboard.subject');
    }
    
    /**
     * Show the application create staff.
     *
     * @return \Illuminate\Http\Response
     */
    public function newStaff()
    {
        return view('dashboard.staff.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_newStaff(Request $request)
    {
        $this->validate($request, [
            'staff_id' => 'required|unique:staffs',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:staffs',
            'birthdate' => 'required',
            'job_id' => 'required|in:1,2,3'
        ]);
        
        $request['password'] = Hash::make(str_replace('-', '', $request->birthdate));
        
        $input = $request->all();
        
        $this->staff->create($input);
        
        return redirect()->back()->with('success', 'New Staff has been created!');
    }
}
