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
                <h1 class="h2">Manage Grade</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <form id="grade" class="col-md-6" method="POST" action="{{ route('dashboard.grade.store') }}">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">New Grade</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->has('code'))
                                <span class="d-block invalid-feedback">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="Grade Name" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="schoolyear_start">Academic Year Start</label>
                            <input type="date" class="form-control{{ $errors->has('schoolyear_start') ? ' is-invalid' : '' }}" name="schoolyear_start" id="schoolyear_start" value="{{ old('schoolyear_start') }}" placeholder="Academic Year Start" required>
                            @if ($errors->has('schoolyear_start'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('schoolyear_start') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="schoolyear_end">Academic Year End</label>
                            <input type="date" class="form-control{{ $errors->has('schoolyear_end') ? ' is-invalid' : '' }}" name="schoolyear_end" id="schoolyear_end" value="{{ old('schoolyear_end') }}" placeholder="Academic Year End" required>
                            @if ($errors->has('schoolyear_end'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('schoolyear_end') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="department_code">Department</label>
                            <select class="custom-select{{ $errors->has('department_code') ? ' is-invalid' : '' }}" id="department_code" name="department_code" required {{ $departments->isEmpty() ? ' disabled' : '' }}>
                                <option value="{{ old('department_code') }}" selected>{{ $departments->isEmpty() ? ' Create Department First' : 'Choose Department...' }}</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->code }}">({{ $department->code }}) {{ $department->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('department_code'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('department_code') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group checkbox">
                            <label class="mt-sm-2">
                                <input type="checkbox" name="status" id="status" {{ old('status') ? 'checked' : '' }} value="1"> Is Active?
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Availlable Grade</h4>
                        </div>
                        <div class="card-body">
                        @if($grades->isNotEmpty())
                        <h5>Current Grades <span class="text-muted">({{ $year }})</span></h5>
                        <p class="card-title font-weight-bold">Grade (Code)<span class="float-right">Department Code</span></p>
                        <hr class="my-2">
                        @foreach($grades->where('schoolyear_start', '=', $year) as $grade)
                            <p class="card-title">{{ $grade->name }} ({{ $grade->code }})<span class="float-right">{{ $grade->department->code }}</span></p>
                        @endforeach
                        <hr>
                        <h5>Last Years Grades</h5>
                        @foreach($grades->where('schoolyear_start', '<', $year) as $grade)
                            <p class="card-title">{{ $grade->name }} ({{ $grade->code }})<span class="float-right">{{ $grade->department->code }}</span></p>
                        @endforeach
                        @else
                            <h5 class="card-title">No Grade Availlable</h5>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection