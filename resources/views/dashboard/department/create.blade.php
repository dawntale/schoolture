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
                <h1 class="h2">Create Department</h1><a class="btn btn-primary" href="{{ route('dashboard.department.index') }}">All Department</a>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <form id="department" method="POST" action="{{ route('dashboard.department.store') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" id="code" value="{{ old('code') }}" placeholder="Short Name">
                    @if ($errors->has('code'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('code') }}</strong>
                        </span>
                    @else
                        <span class="text-dark d-block valid-feedback">
                            <strong>* Ex: SHS, for Senior High School department</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="Full Name" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" value="{{ old('description') }}" placeholder="Description"></textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="checkbox mb-3">
                    <label class="mt-sm-2">
                        <input type="checkbox" name="status" id="status" {{ old('status') ? 'checked' : '' }} value="1"><span> Is Active?</span>
                    </label>
                </div>
                <div class="card p-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection