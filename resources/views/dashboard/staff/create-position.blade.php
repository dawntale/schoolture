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
                <h1 class="h2">Create Position</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <form id="position" method="POST" action="{{ route('dashboard.position.store') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="Position Name" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="card p-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 mt-4 border-bottom">
                <h1 class="h2">All Position</h1>
            </div>
            @if($positions->isNotEmpty())
            @foreach($positions as $position)
                <button class="btn btn-primary card-title font-weight-bold"><span data-feather="check-circle"></span>{{ $position->name }}</button>
            @endforeach
            @else
                <h5 class="card-title">No Position Availlable</h5>
            @endif
        </main>
    </div>
</div>
@endsection