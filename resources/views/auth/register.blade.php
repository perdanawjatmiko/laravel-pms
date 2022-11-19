@extends('layouts.auth')

@section('content')
<!-- Header -->
<div class="mb-2 text-center">
    <a class="link-fx fw-bold fs-1" href="{{ url('/') }}">
        <span class="text-dark">PMS <span class="text-primary">RDA</span></span>
    </a>
    <p class="text-uppercase fw-bold fs-sm text-muted">Register</p>
</div>
<!-- END Header -->
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-4">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname') }}" placeholder="First Name .." autocomplete="fname" required autofocus>
            
            @error('fname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname') }}" placeholder="Last Name (Optional)" autocomplete="lname">
            
            @error('lname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Username" autocomplete="username" required>
            <span class="input-group-text">
                <i class="fa fa-user"></i>
            </span>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group input-group-lg">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="E-mail" autocomplete="email" required>
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
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="Password" autocomplete="password" required>
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
    <div class="mb-4">
        <div class="input-group input-group-lg">
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password" required>
            <span class="input-group-text">
                <i class="fa fa-asterisk"></i>
            </span>
        </div>
    </div>
    <div class="mb-4">
        <div class="text-center">
            <button type="submit" class="btn btn-block btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
    <div class="mb-4">
        <div class="text-center">
            Already have an account? <a href="{{ route('login') }}" class="text-primary">
                Login here!
            </a>
        </div>
    </div>
</form>
@endsection