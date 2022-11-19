@extends('layouts.auth')

@section('content')
<!-- Header -->
<div class="mb-2 text-center">
    <a class="link-fx fw-bold fs-1" href="{{ url('/') }}">
        <span class="text-dark">PMS <span class="text-primary">RDA</span></span>
    </a>
    <p class="text-uppercase fw-bold fs-sm text-muted">Login</p>
</div>
<!-- END Header -->

<!-- Sign In Form -->
<!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
<!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-4">
        <div class="input-group input-group-lg">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="E-mail" autocomplete="email" required autofocus>
            <span class="input-group-text">
                <i class="fa fa-envelope"></i>
            </span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group input-group-lg">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                placeholder="Password" autocomplete="current-password">
            <span class="input-group-text">
                <i class="fa fa-asterisk"></i>
            </span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div
        class="d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-start mb-4">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember"
                name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        @if (Route::has('password.request'))
            <a class="fw-semibold fs-sm py-1" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
    <div class="text-center mb-5">
        <button type="submit" class="btn btn-hero btn-primary">
            <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> {{ __('Login') }}
        </button>
    </div>
    <div class="text-center mb-0">
        Don't have account yet?<a href="{{ route('register') }}" class="text-primary"> Register Here.</a>
    </div>
</form>
<!-- END Sign In Form -->
@endsection
