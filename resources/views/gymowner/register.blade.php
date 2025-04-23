@extends('layouts.auth')

@section('title', 'Gym Owner Registration')

@section('content')
<h2 class="text-2xl font-bold text-center mb-4 text-[#1f2937] dark:text-white">Register Your Gym</h2>

@if ($errors->any())
    <div class="mb-4 p-4 rounded-lg bg-[#ef4444]/10 text-[#ef4444] text-sm">
        <ul class="list-disc pl-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('gymowner.register.submit') }}" method="POST">
    @csrf
    
    <!-- Gym Owner Name -->
    <div class="mb-5 relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                <i class="fa-solid fa-user"></i>
            </div>
            <input type="text" id="name" name="name" value="{{ old('name') }}" 
                class="w-full px-10 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 bg-white dark:bg-gray-700 text-[#1f2937] dark:text-white 
                {{ $errors->has('name') ? 'border-[#ef4444] focus:border-[#ef4444] focus:ring-[#ef4444]/50' : 'border-gray-300 dark:border-gray-600 focus:border-[#6366f1] focus:ring-[#6366f1]/50' }}"
                placeholder=" " required autofocus>
            <label for="name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8">
                Your Full Name
            </label>
        </div>
        @error('name')
            <p class="mt-1 text-sm text-[#ef4444]">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Gym/Business Name -->
    <div class="mb-5 relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                <i class="fa-solid fa-dumbbell"></i>
            </div>
            <input type="text" id="business_name" name="business_name" value="{{ old('business_name') }}" 
                class="w-full px-10 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 bg-white dark:bg-gray-700 text-[#1f2937] dark:text-white 
                {{ $errors->has('business_name') ? 'border-[#ef4444] focus:border-[#ef4444] focus:ring-[#ef4444]/50' : 'border-gray-300 dark:border-gray-600 focus:border-[#6366f1] focus:ring-[#6366f1]/50' }}"
                placeholder=" " required>
            <label for="business_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8">
                Gym/Business Name
            </label>
        </div>
        @error('business_name')
            <p class="mt-1 text-sm text-[#ef4444]">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Email Address -->
    <div class="mb-5 relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <input type="email" id="email" name="email" value="{{ old('email') }}" 
                class="w-full px-10 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 bg-white dark:bg-gray-700 text-[#1f2937] dark:text-white 
                {{ $errors->has('email') ? 'border-[#ef4444] focus:border-[#ef4444] focus:ring-[#ef4444]/50' : 'border-gray-300 dark:border-gray-600 focus:border-[#6366f1] focus:ring-[#6366f1]/50' }}"
                placeholder=" " required>
            <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8">
                Email Address
            </label>
        </div>
        @error('email')
            <p class="mt-1 text-sm text-[#ef4444]">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Contact Phone -->
    <div class="mb-5 relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                <i class="fa-solid fa-phone"></i>
            </div>
            <input type="text" id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}" 
                class="w-full px-10 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 bg-white dark:bg-gray-700 text-[#1f2937] dark:text-white 
                {{ $errors->has('contact_phone') ? 'border-[#ef4444] focus:border-[#ef4444] focus:ring-[#ef4444]/50' : 'border-gray-300 dark:border-gray-600 focus:border-[#6366f1] focus:ring-[#6366f1]/50' }}"
                placeholder=" " required>
            <label for="contact_phone" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8">
                Contact Phone
            </label>
        </div>
        @error('contact_phone')
            <p class="mt-1 text-sm text-[#ef4444]">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Bank Account Number -->
    <div class="mb-5 relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                <i class="fa-solid fa-university"></i>
            </div>
            <input type="text" id="bank_account_number" name="bank_account_number" value="{{ old('bank_account_number') }}" 
                class="w-full px-10 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 bg-white dark:bg-gray-700 text-[#1f2937] dark:text-white 
                {{ $errors->has('bank_account_number') ? 'border-[#ef4444] focus:border-[#ef4444] focus:ring-[#ef4444]/50' : 'border-gray-300 dark:border-gray-600 focus:border-[#6366f1] focus:ring-[#6366f1]/50' }}"
                placeholder=" " pattern="[0-9]{9,18}" title="Please enter a valid Indian bank account number (9-18 digits)">
            <label for="bank_account_number" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8">
                Bank Account Number
            </label>
        </div>
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Enter your Indian bank account number (9-18 digits)</p>
        @error('bank_account_number')
            <p class="mt-1 text-sm text-[#ef4444]">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Tax ID -->
    <div class="mb-5 relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                <i class="fa-solid fa-file-invoice"></i>
            </div>
            <input type="text" id="tax_id" name="tax_id" value="{{ old('tax_id') }}" 
                class="w-full px-10 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 bg-white dark:bg-gray-700 text-[#1f2937] dark:text-white 
                {{ $errors->has('tax_id') ? 'border-[#ef4444] focus:border-[#ef4444] focus:ring-[#ef4444]/50' : 'border-gray-300 dark:border-gray-600 focus:border-[#6366f1] focus:ring-[#6366f1]/50' }}"
                placeholder=" ">
            <label for="tax_id" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8">
                Tax ID (GST or PAN)
            </label>
        </div>
        <p class="mt-1 text-xs flex justify-between">
            <span class="text-gray-500 dark:text-gray-400">Enter GST (e.g., 22AAAAA0000A1Z5) or PAN (e.g., AAAAA0000A)</span>
            <span class="text-gray-500 dark:text-gray-400">Optional</span>
        </p>
        @error('tax_id')
            <p class="mt-1 text-sm text-[#ef4444]">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Password -->
    <div class="mb-5 relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                <i class="fa-solid fa-lock"></i>
            </div>
            <input type="password" id="password" name="password" 
                class="w-full px-10 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 bg-white dark:bg-gray-700 text-[#1f2937] dark:text-white 
                {{ $errors->has('password') ? 'border-[#ef4444] focus:border-[#ef4444] focus:ring-[#ef4444]/50' : 'border-gray-300 dark:border-gray-600 focus:border-[#6366f1] focus:ring-[#6366f1]/50' }}"
                placeholder=" " required>
            <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8">
                Password
            </label>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa-solid fa-eye text-gray-500 cursor-pointer hover:text-[#6366f1]" data-for="password" onclick="togglePassword('password')"></i>
            </div>
        </div>
        @error('password')
            <p class="mt-1 text-sm text-[#ef4444]">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Confirm Password -->
    <div class="mb-5 relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                <i class="fa-solid fa-lock"></i>
            </div>
            <input type="password" id="password_confirmation" name="password_confirmation" 
                class="w-full px-10 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 bg-white dark:bg-gray-700 text-[#1f2937] dark:text-white 
                border-gray-300 dark:border-gray-600 focus:border-[#6366f1] focus:ring-[#6366f1]/50"
                placeholder=" " required>
            <label for="password_confirmation" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8">
                Confirm Password
            </label>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa-solid fa-eye text-gray-500 cursor-pointer hover:text-[#6366f1]" data-for="password_confirmation" onclick="togglePassword('password_confirmation')"></i>
            </div>
        </div>
    </div>
    
    <!-- Terms Checkbox -->
    <div class="mb-5 flex items-start">
        <div class="flex items-center h-5">
            <input type="checkbox" id="terms" name="terms" required
                class="w-4 h-4 text-[#6366f1] rounded border-gray-300 focus:ring-[#6366f1] dark:focus:ring-[#6366f1] dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600
                {{ $errors->has('terms') ? 'border-[#ef4444]' : '' }}">
        </div>
        <label class="ml-2 text-sm text-gray-600 dark:text-gray-400" for="terms">
            I accept the <a href="#" class="text-[#6366f1] hover:underline">Terms of Use</a> & <a href="#" class="text-[#6366f1] hover:underline">Privacy Policy</a>
        </label>
        @error('terms')
            <p class="mt-1 text-sm text-[#ef4444]">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Register Button -->
    <button type="submit" class="w-full bg-[#6366f1] hover:bg-[#4f46e5] text-white font-semibold py-3 px-4 rounded-lg transition duration-200 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-[#6366f1] focus:ring-opacity-50 shadow-md">
        Register
    </button>
</form>
@endsection

@section('auth_links')
<div class="mt-4">
    <span>Already have an account?</span>
    <a href="{{ route('gymowner.login') }}" class="text-[#6366f1] hover:underline ml-1">Login here</a>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show/hide password functionality
        window.togglePassword = function(inputId) {
            const passwordInput = document.getElementById(inputId);
            const icon = document.querySelector(`[data-for="${inputId}"]`);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        };
    });
</script>
@endpush 