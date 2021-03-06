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
                <h1 class="h2">Create Class</h1><a class="btn btn-primary" href="{{ route('dashboard.class.index') }}">All Class</a>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <form id="grade" method="POST" action="{{ route('dashboard.class.store') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="Class Name" required>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="mb-3">
                    <select class="custom-select{{ $errors->has('grade_id') ? ' is-invalid' : '' }}" id="grade_id" name="grade_id" required {{ $grades->isEmpty() ? ' disabled' : '' }}>
                        <option value="{{ old('grade_id') }}" selected>{{ $grades->isEmpty() ? ' Create Grade First' : 'Choose Grade...' }}</option>
                        @foreach($grades as $grade)
                        <option value="{{ $grade->id }}">Grade {{ $grade->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('grade_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('grade_id') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="mb-3">
                    <select class="custom-select{{ $errors->has('homeroom_teacher') ? ' is-invalid' : '' }}" id="homeroom_teacher" name="homeroom_teacher">
                        <option value="" selected>Choose Homeroom Teacher...</option>
                        @if( $teachers->isEmpty() )
                        <option value="">No Teacher found</option>
                        @else
                        @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }} ({{ $teacher->position->name }})</option>
                        @endforeach
                        @endif
                    </select>
                    @if ($errors->has('homeroom_teacher'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('homeroom_teacher') }}</strong>
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