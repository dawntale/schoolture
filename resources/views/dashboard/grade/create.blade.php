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
                <h1 class="h2">Create Grade</h1><a class="btn btn-primary" href="{{ route('dashboard.grade.index') }}">All Grade</a>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <form id="grade" method="POST" action="{{ route('dashboard.grade.store') }}">
                @csrf
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
                    <label for="department_id">Department</label>
                    <select class="custom-select{{ $errors->has('department_id') ? ' is-invalid' : '' }}" id="department_id" name="department_id" required {{ $departments->isEmpty() ? ' disabled' : '' }}>
                        <option value="{{ old('department_id') }}" selected>{{ $departments->isEmpty() ? ' Create Department First' : 'Choose Department...' }}</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}">({{ $department->code }}) {{ $department->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('department_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('department_id') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" name="status" id="status" {{ old('status') ? 'checked' : '' }} value="1">
                    <label class="custom-control-label" for="status">Is Active?</label>
                </div>
                <div class="card p-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection