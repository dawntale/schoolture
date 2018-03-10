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
                <h1 class="h2">Schedules</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <section class="row">
                <div class="col-6 col-md-4 mb-3">
                    <h4>Choose Department</h4>
                    <div class="list-group" id="list-tab" role="tablist">
                        @foreach($departments as $key => $department)
                        <a class="list-group-item list-group-item-action" id="list-{{ $department->code }}-list" data-toggle="list" href="#list-{{ $department->code }}" role="tab" aria-controls="{{ $department->code }}">{{ $department->code }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <h4>Choose Grade</h4>
                    <div class="tab-content" id="nav-tabContent">
                        @foreach($departments as $key => $department)
                        <div class="tab-pane fade show" id="list-{{ $department->code }}" role="tabpanel" aria-labelledby="list-{{ $department->code }}-list">
                            <div class="list-group" id="list-tab-grade" role="tablist">
                                @if( $department->grade->where('department_id', $department->id)->count() > 0 )
                                @foreach($department->grade->where('department_id', $department->id) as $gKey => $grade)
                                <a class="list-group-item list-group-item-action" id="list-grade" data-toggle="list" href="#list-grade-{{ $grade->code }}" role="tab" aria-controls="{{ $grade->code }}">{{ $grade->code }}</a>
                                @endforeach
                                @else
                                <div class="alert alert-danger mb-0" role="alert">
                                    Please create the <a href="{{ route('dashboard.grade.create') }}" class="alert-link">grade</a> in this department.
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <h4>Choose Class</h4>
                    <div class="tab-content" id="nav-tabContent-grade">
                        @foreach($grades as $grade)
                        <div class="tab-pane fade show" id="list-grade-{{ $grade->code }}" role="tabpanel" aria-labelledby="list-grade-{{ $grade->code }}-list">

                            <div class="list-group" id="list-tab-grade" role="tablist">
                                @if( $grade->classroom->where('grade_id', $grade->id)->count() > 0 )
                                @foreach($grade->classroom->where('grade_id', $grade->id) as $class)
                                    <a class="list-group-item list-group-item-action" href="{{ route('dashboard.schedule.create', $class->code) }}">{{ $class->code }}</a>
                                @endforeach
                                @else
                                <div class="alert alert-danger mb-0" role="alert">
                                    Please create <a href="{{ route('dashboard.class.create') }}" class="alert-link">class</a> in this grade.
                                </div>
                                @endif
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
@endsection