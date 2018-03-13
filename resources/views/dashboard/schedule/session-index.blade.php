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
                <h1 class="h2">Manage Session</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            @if($departments->count() > 0)
            @foreach($departments as $department)
            <div class="card mb-3">
                <h5 class="card-header">{{ $department->name }} ({{ $department->code }})</h5>

                @if($department->grade->count() > 0)
                <div class="card-body">
                    <div class="row">
                        @foreach($department->grade as $grade)
                        <div class="col-6 col-md-4 col-xl-3">
                            <a href="{{ route('dashboard.session.create', $grade->code) }}" class="btn btn-primary d-block mb-3">Grade : {{ $grade->name }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="card-body">
                    <div class="alert alert-danger mb-0" role="alert">
                        You don't have grades data. Please create the <a href="{{ route('dashboard.grade.create') }}" class="alert-link">grade</a> first.
                    </div>
                </div>
                @endif
            </div>
            @endforeach
            @else
            <div class="alert alert-danger" role="alert">
                Please create <a href="{{ route('dashboard.department.create') }}" class="alert-link">department</a> and <a href="{{ route('dashboard.grade.create') }}" class="alert-link">grade</a> first.
            </div>
            @endif
        </main>
    </div>
</div>
@endsection