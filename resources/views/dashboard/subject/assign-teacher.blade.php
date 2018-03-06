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
                <h1 class="h2">Assign Teacher</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <form id="teacher" method="POST" action="{{ route('dashboard.subject.teacher.store') }}">
                @csrf
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
                        @foreach($departments as $department)
                        <optgroup label="{{ $department->name }} ({{ $department->code }})">
                            @foreach($subjects->where('department_id', $department->id) as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                    @if ($errors->has('subject_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('subject_id') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="card p-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 mt-4 border-bottom">
                <h1 class="h2">All Subject</h1>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="list-group" id="list-tab" role="tablist">
                        @foreach($departments as $key => $department)
                        <a class="list-group-item list-group-item-action {{ $key == 0 ? 'active' : '' }}" id="list-home-list" data-toggle="list" href="#list-{{ $department->code }}" role="tab" aria-controls="{{ $department->code }}">{{ $department->code }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content" id="nav-tabContent">
                        @foreach($departments as $key => $department)
                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" id="list-{{ $department->code }}" role="tabpanel" aria-labelledby="list-{{ $department->code }}-list">
                            @if($teachers->isNotEmpty())
                            <h5 class="card-title mb-0">Teacher Name<span class="float-right">(Subject Code) Subject Name</span></h5>
                            <hr class="my-2">
                            @foreach($teachers as $teacher)
                            @foreach($teacher->subject->where('department_id', $department->id) as $subject)
                            <div class="mb-2">
                                <p class="card-title mb-0">{{ $teacher->name }}<span class="float-right">({{ $subject->code }}) {{ $subject->name }}</span></p>
                            </div>
                            @endforeach
                            @endforeach
                            @else
                            <h5 class="card-title">No Subject in {{ $department->name }}</h5>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection