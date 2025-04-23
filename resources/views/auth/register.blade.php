@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<h2 class="text-center mb-4">Create Account</h2>

<p class="text-center mb-4">Create your account. It's free and only take a minute</p>

<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
    </div>
    
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" required>
        <label class="form-check-label" for="terms">I accept the <a href="#" class="text-decoration-none">Terms of Use</a> & <a href="#" class="text-decoration-none">Privacy Policy</a></label>
        @error('terms')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-auth">Register Now</button>
</form>
@endsection

@section('auth_links')
<div class="mt-3">
    <span>Already have an account?</span>
    <a href="{{ route('login') }}" class="text-decoration-none ms-1">Login here</a>
</div>
@endsection
