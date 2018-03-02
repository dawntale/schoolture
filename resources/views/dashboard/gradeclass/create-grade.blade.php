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
                        <div class="mb-3">
                            <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" id="code" value="{{ old('code') }}" placeholder="Grade Code" required>
                            @if ($errors->has('code'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="Grade Name" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control{{ $errors->has('schoolyear_start') ? ' is-invalid' : '' }}" name="schoolyear_start" id="schoolyear_start" value="{{ old('schoolyear_start') }}" placeholder="School Year Start" required>
                            @if ($errors->has('schoolyear_start'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('schoolyear_start') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select class="custom-select{{ $errors->has('department_id') ? ' is-invalid' : '' }}" id="department_id" name="department_id" required {{ $departments->isEmpty() ? ' disabled' : '' }}>
                                <option value="{{ old('department_id') }}" selected>{{ $departments->isEmpty() ? ' Create Department First' : 'Choose Department...' }}</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('department_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('department_id') }}</strong>
                            </span>
                            @endif
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
                        <h5>Current Grades <span class="text-muted">({{ Carbon\Carbon::now()->year }})</span></h5>
                        @foreach($grades as $grade)
                            <p class="card-title">{{ $grade->name }} ({{ $grade->schoolyear }})<span class="float-right">{{ $grade->department->name }}</span></p>
                        @endforeach
                        <hr>
                        <h5>Last Years Grades</h5>
                        @foreach($oldGrades as $oGrade)
                            <p class="card-title">{{ $oGrade->name }} ({{ $oGrade->schoolyear }})<span class="float-right">{{ $grade->department->name }}</span></p>
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