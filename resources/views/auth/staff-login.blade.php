@extends('layouts.app')

@section('content')
<style type="text/css">
    body, html, #sign {
        height: 100%;
    }
</style>

<div id="sign" class="container text-center d-flex align-items-center">
    <form class="col-sm-9 col-md-7 col-lg-5 form-signin mx-auto" method="POST" action="{{ route('staff.login.submit') }}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Staff login</h1>
        <div class="form-group">
            <input id="staff_id" type="text" class="form-control{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" name="staff_id" value="{{ old('staff_id') }}" placeholder="Staff ID" required autofocus>

            @if ($errors->has('staff_id'))
                <span class="invalid-feedback text-left">
                    <strong>{{ $errors->first('staff_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback text-left">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <div class="col-sm-6 checkbox text-sm-left">
                <label class="mt-sm-2">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
            <div class="col-sm-6 text-sm-right">
                <a class="btn btn-link" href="{{ route('staff.password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-5 text-muted">&copy; Schoolture, 2017-2018</p>
    </form>
</div>
@endsection
