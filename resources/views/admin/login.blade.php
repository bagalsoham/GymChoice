@extends('layouts.auth')

@section('title', 'Admin Login')

@section('content')
<h2 class="text-center mb-4">Admin Login</h2>

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.login.submit') }}" method="POST">
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
    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot your password?</a>
</div>
@endsection
