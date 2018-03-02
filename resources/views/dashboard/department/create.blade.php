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
                <h1 class="h2">Manage Department</h1>
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
                <form id="department" class="col-md-6" method="POST" action="{{ route('dashboard.department.store') }}">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">New Department</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" id="code" value="{{ old('code') }}" placeholder="Department Code">
                                @if ($errors->has('code'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="Department Name" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" value="{{ old('description') }}" placeholder="Department Description"></textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox mb-3">
                                <label class="mt-sm-2">
                                    <input type="checkbox" name="status" id="status" {{ old('status') ? 'checked' : '' }} value="1"> Is Active?
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Existing Department</h4>
                        </div>
                        <div class="card-body">
                        @if($departments->isNotEmpty())
                        @foreach($departments as $department)
                            <p class="card-title">{{ $department->name }}<span class="float-right">
                            @if($department->status == 1)
                                Active
                            @else
                                In Active
                            @endif
                            </span></p>
                        @endforeach
                        @else
                            <h5 class="card-title">No Department Availlable</h5>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection