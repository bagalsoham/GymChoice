<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FIT CHOICE') }} - @yield('title', 'Welcome')</title>

    <!-- Modern Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    <style>
        :root {
            --bg-primary: #121212;
            --bg-secondary: #1F1F1F;
            --bg-tertiary: #2D2D2D;
            --text-primary: #E0E0E0;
            --text-secondary: #A0A0A0;
            --accent-color: #8B5CF6; /* Purple-500 */
            --accent-hover: #7C3AED; /* Purple-600 */
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        .btn-primary {
            background-color: var(--accent-color);
            color: white;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--accent-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(139, 92, 246, 0.2), 0 2px 4px -1px rgba(139, 92, 246, 0.1);
        }
        
        /* Fix header and carousel alignment */
        .header-wrapper {
            position: relative;
            z-index: 50;
        }
        
        main {
            overflow-x: hidden;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-[#121212] text-[#E0E0E0]">
        <!-- Custom Header Component with fixed wrapper -->
        <div class="header-wrapper">
            @include('components.header')
        </div>

        <!-- Original Navigation (keep if needed for admin/dashboard pages) -->
        @if(request()->is('dashboard*'))
            @include('layouts.navigation')
        @endif

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-[#1F1F1F] shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content - Support both component style and yield style -->
        <main>
            @hasSection('content')
                @yield('content')
            @else
                {{ $slot ?? '' }}
            @endif
        </main>

        <!-- Footer -->
        <footer class="py-8 bg-[#1F1F1F] text-[#E0E0E0] border-t border-gray-800">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="mb-4 md:mb-0">&copy; {{ date('Y') }} FIT CHOICE. All rights reserved.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-[#A0A0A0] hover:text-white transition-all duration-300">Privacy Policy</a>
                        <a href="#" class="text-[#A0A0A0] hover:text-white transition-all duration-300">Terms of Service</a>
                        <a href="#" class="text-[#A0A0A0] hover:text-white transition-all duration-300">Contact Us</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>