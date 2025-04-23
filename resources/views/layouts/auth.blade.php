<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FitChoice') }} - @yield('title', 'Authentication')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Additional Styles -->
    @stack('styles')

    <script>
        // On page load, set theme based on system preference
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="h-full bg-white dark:bg-gray-900">
    <div class="flex min-h-screen flex-col md:flex-row">

        <!-- Left Section with Image and Welcome Text -->
        <div class="relative flex-1 flex items-center justify-center bg-cover bg-center text-white" 
             style="background-image: url('{{ asset('images/gym4.jpeg') }}')">
            
            <!-- Dark overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            
            <!-- Content -->
            <div class="relative z-10 max-w-md p-8 text-center">
                <!-- Logo and Company Name -->
                <div class="flex items-center justify-center mb-8">
                    <a href="{{ url('/') }}" class="flex items-center hover:opacity-90 transition-opacity">
                        <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="FIT CHOICE">
                        <span class="text-xl font-bold ml-3 text-white">FIT CHOICE</span>
                    </a>
                </div>

                <h1 class="text-4xl font-bold mb-4">Welcome</h1>
                <p class="text-lg mb-4">
                    FitChoice is where fitness meets flexibility! Users can find and join the best gyms with a single, flexible membership — anytime, anywhere. Gym owners can showcase their gyms, connect with fitness enthusiasts, and manage everything in one place.
                </p>
            </div>
        </div>

        <!-- Right Section with Login/Register Form -->
        <div class="flex-1 flex items-center justify-center p-4 md:p-8 bg-white dark:bg-gray-900 text-white">
            <div class="w-full max-w-md">
                <!-- Logo Again (optional) -->
                <div class="text-center mb-6">
                    <img src="{{ asset('images/logo.png') }}" alt="FitChoice Logo" class="h-12 mx-auto">
                </div>

                <!-- Blade Section for Form Content -->
                @yield('content')

                <!-- Blade Section for Auth Links (e.g. "Don't have an account?") -->
                <div class="mt-6 text-center">
                    @yield('auth_links')
                </div>
            </div>
        </div>

    </div>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
