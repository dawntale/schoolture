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
                <h1 class="h2">View Schedule</h1>
                <button class="btn btn-primary" data-toggle="modal" data-target="#add-schedule" data-class="{{ $class->code }}">Add Schedule</button>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Success!</h4>
                <hr>
                {{ session('success') }}
            </div>
            @endif
            <section class="table-responsive">
                <table id="schedule" class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Sunday</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sessionBlocks as $rowKey => $block)
                        <tr>
                            <td>{{ $block->name }}. {{ $block->times }}</td>
                            @foreach($days as $colKey => $day)
                            <td data-row="{{ $rowKey+1 }}" data-col="{{ $colKey+1 }}">
                                Block: {{ $rowKey+1 }}<br>
                                Day: {{ $colKey }}
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</div>
<div class="modal fade" id="add-schedule" tabindex="-1" role="dialog" aria-labelledby="add-schedule-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('dashboard.schedule.store', $class->id) }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New schedule for {{ $class->code }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="class">Class</label>
                    <input type="text" class="form-control" id="class" placeholder="{{ $class->code }}" readonly>
                </div>
                <div class="form-group">
                    <label for="day">Day</label>
                    <select class="custom-select{{ $errors->has('day') ? ' is-invalid' : '' }}" id="day" name="day" required>
                        <option value="{{ old('day') }}" selected>Choose Day...</option>
                        @foreach($days as $key => $day)
                        <option value="{{ $key }}">{{ $day }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('day'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('day') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="day">Session</label>
                    <select class="custom-select{{ $errors->has('session_block_id') ? ' is-invalid' : '' }}" id="session_block_id" name="session_block_id" required {{ $sessionBlocks->isEmpty() ? ' disabled' : '' }}>
                        <option value="{{ old('session_block_id') }}" selected>{{ $sessionBlocks->isEmpty() ? ' Create Session Block First' : 'Choose Session...' }}</option>
                        @foreach($sessionBlocks as $session)
                        <option value="{{ $session->id }}">Session {{ $session->name }} / {{ $session->times }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('session_block_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('session_block_id') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject_id">Subject</label>
                    <select class="custom-select{{ $errors->has('subject_id') ? ' is-invalid' : '' }}" id="subject_id" name="subject_id" required {{ $subjects->isEmpty() ? ' disabled' : '' }}>
                        <option value="{{ old('subject_id') }}" selected>{{ $subjects->isEmpty() ? ' Create Subject First' : 'Choose Subject...' }}</option>
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('subject_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('subject_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Schedule</button>
            </div>
        </form>
    </div>
</div>
@endsection