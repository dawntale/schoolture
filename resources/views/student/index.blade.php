@extends('layouts.app')

@section('content')
<div class="container">
    <main role="main" class="pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Student Dashboard</h1>
        </div>
        <div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            You are logged in as Student!
        </div>
    </main>
</div>
@endsection