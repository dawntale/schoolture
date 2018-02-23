@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="d-none d-sm-block sidebar border-right col-sm-3 col-md-2 px-0 py-4">
            @include('layouts.app-sidebar')
        </div>
        <div class="col-sm-9 ml-sm-auto col-md-10 p-4" role="main">
            <div class="card">
                <div class="card-header">Student Data</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as Student!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection