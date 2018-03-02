@extends('layouts.app')

@section('navbar')
    @include('layouts.app-dashboard-navbar')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.app-dashboard-sidebar')
        
        <main role="main" class="col-md-9 ml-sm-auto pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Student Details</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h4>{{ $student->name }}'s Details</h4>
            </div>
            <table class="table">
                <tr>
                    <td>Name :</td>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <td>Student ID :</td>
                    <td>{{ $student->student_id }}</td>
                </tr>
                <tr>
                    <td>First Name :</td>
                    <td>{{ $student->first_name }}</td>
                </tr>
                <tr>
                    <td>Last Name :</td>
                    <td>{{ $student->last_name }}</td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <td>Birthdate :</td>
                    <td>{{ $student->birthdate }}</td>
                </tr>
                <tr>
                    <td>Sex :</td>
                    <td>{{ $student->sex }}</td>
                </tr>
            </table>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h4>{{ $student->name }}'s Classes</h4>
                <a class="btn btn-primary" href="">Assign Class</a>
            </div>
        </main>
    </div>
</div>
@endsection