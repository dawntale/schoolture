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
            <div class="row">
                @foreach($departments as $department)
                <div class="col-md-4 mb-3">
                    <h2 class="h4">{{ $department->name }} ({{ $department->code }})</h2>
                    @foreach($department->grade as $grade)
                    <a href="{{ route('dashboard.session.create', $grade->code) }}" class="btn btn-primary d-block mb-3">{{ $grade->code }}</a>
                    @endforeach
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection