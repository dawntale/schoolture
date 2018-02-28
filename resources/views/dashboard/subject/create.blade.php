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
                <form id="subject" class="col-md-6" method="POST" action="{{ route('dashboard.subject.store') }}">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">New Subject</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                            <input type="text" class="form-control{{ $errors->has('subject_code') ? ' is-invalid' : '' }}" name="subject_code" id="subject_code" value="{{ old('subject_code') }}" placeholder="Subject Code">
                            @if ($errors->has('subject_code'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('subject_code') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="Subject Name" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ old('description') }}" placeholder="Subject Description"></textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
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
                            <h4 class="my-0 font-weight-normal">Availlable Subject</h4>
                        </div>
                        <div class="card-body">
                        @if($subjects->isNotEmpty())
                        @foreach($subjects as $subject)
                            <p class="card-title">{{ $subject->name }}</p>
                        @endforeach
                        @else
                            <h5 class="card-title">No Subject Availlable</h5>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection