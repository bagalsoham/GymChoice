@extends('layouts.auth')

@section('title', 'Gym Owner Login')

@section('content')
<h2 class="text-center mb-4">Gym Owner Login</h2>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('gymowner.login.submit') }}" method="POST">
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
<div class="mt-2">
    <span>Don't have an account?</span>
    <a href="{{ route('gymowner.register') }}" class="text-decoration-none ms-1">Register here</a>
</div>
@endsection 