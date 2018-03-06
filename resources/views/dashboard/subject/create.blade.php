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
                <h1 class="h2">Create Subject</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            @if($subject)
            <form id="subject" method="POST" action="{{ route('dashboard.subject.store') }}">
                @csrf
            @else
            <form id="subject" method="POST" action="{{ route('dashboard.subject.update', $subject->id) }}">
                @csrf
                {{ method_field('PATCH') }}
            @endif
                <div class="mb-3">
                    <select class="custom-select{{ $errors->has('department_id') ? ' is-invalid' : '' }}" id="department_id" name="department_id" required {{ $departments->isEmpty() ? ' disabled' : '' }}>
                        <option value="" selected>{{ $departments->isEmpty() ? ' Create Department First' : 'Choose Department...' }}</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ (old('department_id', 
                            $department->department_id ? $department->department_id : null) == $department->id) ? 'selected' : '' }}>{{ $department->name }} ({{ $department->code }})</option>
                        @endforeach
                    </select>
                    @if ($errors->has('department_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('department_id') }}</strong>
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
                    <input type="text" class="form-control{{ $errors->has('abbreviation') ? ' is-invalid' : '' }}" name="abbreviation" id="abbreviation" value="{{ old('abbreviation') }}" placeholder="Subject Abbreviation">
                    @if ($errors->has('abbreviation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('abbreviation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Subject Description">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="card p-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 mt-4 border-bottom">
                <h1 class="h2">All Subject</h1>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="list-group" id="list-tab" role="tablist">
                        @foreach($departments as $key => $department)
                        <a class="list-group-item list-group-item-action {{ $key == 0 ? 'active' : '' }}" id="list-home-list" data-toggle="list" href="#list-{{ $department->code }}" role="tab" aria-controls="{{ $department->code }}">{{ $department->code }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content" id="nav-tabContent">
                        @foreach($departments as $key => $department)
                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" id="list-{{ $department->code }}" role="tabpanel" aria-labelledby="list-{{ $department->code }}-list">
                            @if($subColls->where('department_id', $department->id)->isNotEmpty())
                            <h5 class="card-title mb-0">Subject Name<span class="float-right">Subject Code</span></h5>
                            <hr class="my-2">
                            @foreach($subColls->where('department_id', $department->id) as $subColl)
                            <div class="mb-2">
                                <p class="card-title mb-0">{{ $subColl->name }}<span class="float-right">{{ $subColl->code }}</span></p>
                                {!! Builder::action('subject', $subColl->id) !!}
                            </div>
                            @endforeach
                            @else
                            <h5 class="card-title">No Subject in Department {{ $department->code }}</h5>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection