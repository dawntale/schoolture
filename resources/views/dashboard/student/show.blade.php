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
            @if ($errors->has('class_id'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Error!</h4>
                <hr>
                {{ $errors->first('class_id') }}
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
                <tr>
                    <td>Grade :</td>
                    @if($student->grade)
                    <td>{{ $student->grade->name }}</td>
                    @else
                    <td></td>
                    @endif
                </tr>
            </table>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h4>{{ $student->name }}'s Class History</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignClass">Assign Class</button>
            </div>
            <table class="table">
                <tr>
                    <td>Department</td>
                    <td>Grade</td>
                    <td>Class</td>
                </tr>
                @foreach($student->class as $class)
                <tr>
                    <td>{{ $class->grade->department->name }}</td>
                    <td>{{ $class->grade->name }}</td>
                    <td>{{ $class->name }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </div>
</div>

<div class="modal fade" id="assignClass" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="{{ route('dashboard.student.assignclass.store', $student->id) }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" >Assign Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($student->grade)
                <div class="mb-3">
                    <select class="custom-select{{ $errors->has('class_id') ? ' is-invalid' : '' }}" id="class_id" name="class_id" required>
                        <option value="{{ old('class_id') }}" selected>Choose Class...</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->grade->department->name }} / Grade : {{ $class->grade->name }} / Class : {{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                @else
                    Please fill the student's grade first.
                @endif
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>
@endsection