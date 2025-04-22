@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<h2 class="text-center mb-4">User Login</h2>

@if (session('status'))
    <div class="alert alert-success mb-4">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label" for="remember">Remember Me</label>
    </div>
    
    <button type="submit" class="btn btn-auth">Login</button>
</form>
@endsection

@section('auth_links')
<div class="mt-3">
    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot your password?</a>
    @endif
</div>
<div class="mt-2">
    <span>Don't have an account?</span>
    <a href="{{ route('register') }}" class="text-decoration-none ms-1">Register here</a>
</div>
@endsection
