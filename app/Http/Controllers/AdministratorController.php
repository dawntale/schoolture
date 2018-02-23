<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
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
        return view('dashboard.staff');
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
}
