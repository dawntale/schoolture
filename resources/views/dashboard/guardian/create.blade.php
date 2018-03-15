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
                <h1 class="h2">Assign Existing Guardian</h1><a class="btn btn-primary" href="{{ route('dashboard.student.show', $student->student_id) }}" placeholder="Guardian name">{{ $student->name }}'s Details</a>
            </div>
            <form id="assign-guardian" method="POST" action="#">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search guardian">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">Assign</button>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Create {{ $student->name }}'s Guardian</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif

            <form id="guardian" method="POST" action="{{ route('dashboard.guardian.store', $student->student_id) }}">
                @include('dashboard.guardian.partials.form')
            </form>
        </main>
    </div>
</div>
@endsection