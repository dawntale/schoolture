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
                <h1 class="h2">Edit Student ({{ $student->name }})</h1><a class="btn btn-primary" href="{{ route('dashboard.student.show', $student->student_id) }}">View Student</a>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif

            <form id="student" method="POST" action="{{ route('dashboard.student.update', $student->id) }}">
                {{ method_field('PATCH') }}
                @include('dashboard.student.partials.form')
            </form>
        </main>
    </div>
</div>
@endsection