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
                <h1 class="h2">Dashboard</h1>
            </div>
            <h2 class="h3">Departments</h1>
            <div class="row">
                @foreach($departments as $department)
                <div class="col-12 col-xl-6">
                    <div class="stats-box bg-success">
                        <div class="stats-text">
                            <h3><strong>{{ $department->name }}</strong></h3>
                            <div class="row">
                                @foreach($department->grade as $grade)
                                <div class="col-4 my-2">
                                    <strong class="h5 d-block">Grade {{ $grade->name }}</strong>
                                    <span class="mb-0">Total student: {{ $grade->student->count() }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="stats-icon">
                            <span data-feather="home"></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <h2 class="h3 mt-3">Statistics</h1>
            <div class="row">
                <div class="col-6 col-lg-4 col-xl-3">
                    <div class="stats-box bg-primary">
                        <div class="stats-text">
                            <h3><strong>{{ $studentCount }}</strong></h3>
                            <p class="mb-0">Students</p>
                        </div>
                        <div class="stats-icon">
                            <span data-feather="users"></span>
                        </div>
                        <a class="stats-link" href="#">See all</a>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-xl-3">
                    <div class="stats-box bg-primary">
                        <div class="stats-text">
                            <h3><strong>{{ $staffCount }}</strong></h3>
                            <p class="mb-0">Staff</p>
                        </div>
                        <div class="stats-icon">
                            <span data-feather="users"></span>
                        </div>
                        <a class="stats-link" href="#">See all</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection