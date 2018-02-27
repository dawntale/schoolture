@extends('layouts.app')

@section('content')
<style type="text/css">
    body, html, #sign {
        height: 100%;
    }
</style>

<div id="sign" class="container text-center d-flex align-items-center">
    <form class="col-sm-9 col-md-7 col-lg-5 form-signin mx-auto" method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Register</h1>
        <div class="form-group">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback text-left">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback text-left">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <p class="mt-5 mb-5 text-muted">&copy; Schoolture, 2017-2018</p>
    </form>
</div>
@endsection
