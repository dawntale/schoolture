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
                <h1 class="h2">Manage Class</h1>
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
                <form id="grade" class="col-md-6" method="POST" action="{{ route('dashboard.class.store') }}">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">New Class</h4>
                        </div>
                        <div class="card-body">
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
                                <option value="{{ $grade->id }}">Grade {{ $grade->name }} ({{ $grade->schoolyear }})</option>
                                @endforeach
                            </select>
                            @if ($errors->has('grade_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('grade_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select class="custom-select{{ $errors->has('homeroom_teacher') ? ' is-invalid' : '' }}" id="homeroom_teacher" name="homeroom_teacher" required {{ $teachers->isEmpty() ? ' disabled' : '' }}>
                                <option value="{{ old('homeroom_teacher') }}" selected>{{ $teachers->isEmpty() ? ' Create Teacher First' : 'Choose Homeroom Teacher...' }}</option>
                                @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }} ({{ $teacher->position->name }})</option>
                                @endforeach
                            </select>
                            @if ($errors->has('homeroom_teacher'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('homeroom_teacher') }}</strong>
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
                            <h4 class="my-0 font-weight-normal">Availlable Class</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Class</th>
                                        <th>Homeroom Teacher</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($classrooms->isNotEmpty())
                                    @foreach($classrooms as $classroom)
                                    <tr>
                                        <td>{{ $classroom->grade->name }}/{{ $classroom->name }} ({{ $classroom->grade->schoolyear }})</td>
                                        <td>{{ $classroom->homeroomTeacher->name }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <h5 class="card-title">No Class Availlable</h5>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection