@extends('layouts.auth')

@section('title', 'Gym Owner Registration')

@section('content')
<h2 class="text-center mb-4">Register Your Gym</h2>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('gymowner.register.submit') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label for="name" class="form-label">Gym Owner Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="gym_name" class="form-label">Gym Name</label>
        <input type="text" class="form-control @error('gym_name') is-invalid @enderror" id="gym_name" name="gym_name" value="{{ old('gym_name') }}" required>
        @error('gym_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
        @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="address" class="form-label">Gym Address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
        @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
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
    
    <button type="submit" class="btn btn-auth">Register</button>
</form>
@endsection

@section('auth_links')
<div class="mt-3">
    <span>Already have an account?</span>
    <a href="{{ route('gymowner.login') }}" class="text-decoration-none ms-1">Login here</a>
</div>
@endsection 