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
                <h1 class="h2">Manage Subject</h1>
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
                <form id="teacher" class="col-md-6" method="POST" action="{{ route('dashboard.subject.teacher.store') }}">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Assign Teacher</h4>
                        </div>
                        <div class="card-body">
                        <div class="mb-3">
                            <select class="custom-select{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" id="staff_id" name="staff_id" required {{ $teachers->isEmpty() ? ' disabled' : '' }}>
                                <option value="{{ old('staff_id') }}" selected>{{ $teachers->isEmpty() ? ' Create Staff First' : 'Choose Staff...' }}</option>
                                @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            <span class="d-block valid-feedback">
                                * Only staff with teacher position will be shows here
                            </span> 
                            @if ($errors->has('staff_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('staff_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select class="custom-select{{ $errors->has('subject_id') ? ' is-invalid' : '' }}" id="subject_id" name="subject_id" required {{ $subjects->isEmpty() ? ' disabled' : '' }}>
                                <option value="{{ old('subject_id') }}" selected>{{ $subjects->isEmpty() ? ' Create Subject First' : 'Choose Subject...' }}</option>
                                @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('subject_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('subject_id') }}</strong>
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
                            <h4 class="my-0 font-weight-normal">Assigned Teacher</h4>
                        </div>
                        <div class="card-body">
                        @if($teachers->isNotEmpty())
                        @foreach($teachers as $teacher)
                            <p class="card-title">{{ $teacher->name }} 
                                @foreach($teacher->subject as $s)
                                    / {{ $s->name }} Teacher
                                @endforeach
                            </p>
                        @endforeach
                        @else
                            <h5 class="card-title">No Assigned Teacher Availlable</h5>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection