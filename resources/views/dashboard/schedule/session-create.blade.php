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
                <h1 class="h2">Create Session for {{ $grade->code }}</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <form id="session" class="mb-3" method="POST" action="{{ route('dashboard.session.store', $grade->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="name">Session name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="Session Name">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="grade">Grade</label>
                    <input type="text" class="form-control" placeholder="{{ $grade->code }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="start_time">Start time</label>
                    <input type="text" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" id="start_time" value="{{ old('start_time') }}" placeholder="Start Time" required>
                    <span class="d-block valid-feedback">
                        <strong>* Format 13:30</strong>
                    </span>
                    @if ($errors->has('start_time'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('start_time') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="end_time">End time</label>
                    <input type="text" class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}" name="end_time" id="end_time" value="{{ old('end_time') }}" placeholder="End Time" required>
                    <span class="d-block valid-feedback">
                        <strong>* Format 13:30</strong>
                    </span>
                    @if ($errors->has('end_time'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('end_time') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" name="isBreak" id="isBreak" {{ old('isBreak') ? 'checked' : '' }} value="1">
                    <label class="custom-control-label" for="isBreak">Is Break?</label>
                </div>
                <div class="card p-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Session in {{ $grade->code }}</h1>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Session</th>
                            <th>Time</th>
                            <th>Break</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sessionBlocks as $sessionBlock)
                        <tr>
                            <td>{{ $sessionBlock->name }}</td>
                            <td>{{ $sessionBlock->start_time }} - {{ $sessionBlock->end_time }}</td>
                            <td>{{ $sessionBlock->isBreak }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection