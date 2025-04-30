<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FitChoice') }} - @yield('title', 'Dashboard')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --dark-bg: #111827;
            --darker-bg: #0f172a;
            --lighter-dark: #1f2937;
            --primary-purple: #6B21A8;
            --secondary-purple: #9333EA;
            --light-purple: #A855F7;
            --text-light: #f0f0f0;
            --text-secondary: #b3b3b3;
            --card-bg: #1e293b;
            --border-radius: 10px;
            --sidebar-width: 250px;
            --transition-speed: 0.3s;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: var(--dark-bg);
            color: var(--text-light);
            font-family: 'Figtree', sans-serif;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--dark-bg);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-purple);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-purple);
        }
        
        /* Sidebar styles */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: var(--primary-purple);
            color: var(--text-light);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            transition: all var(--transition-speed);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
        }
        
        .sidebar-brand {
            padding: 1.2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.15);
        }
        
        .sidebar-nav {
            padding: 0;
            list-style: none;
            margin-top: 1rem;
        }
        
        .sidebar-nav li a {
            padding: 0.8rem 1.2rem;
            margin: 0.3rem 0.6rem;
            display: block;
            color: var(--text-light);
            text-decoration: none;
            transition: var(--transition-speed);
            border-radius: var(--border-radius);
        }
        
        .sidebar-nav li a:hover, .sidebar-nav li a.active {
            background: var(--secondary-purple);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar-nav li a.active {
            background: var(--secondary-purple);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        
        .sidebar-nav li a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Main content styles */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            flex: 1;
            background-color: var(--dark-bg);
            transition: margin-left var(--transition-speed);
        }
        
        .dashboard-header {
            padding: 1.2rem;
            background-color: var(--darker-bg);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .content-wrapper {
            padding: 2rem;
            flex-grow: 1;
        }
        
        /* Button styles */
        .btn-purple {
            background: var(--primary-purple);
            border: none;
            color: white;
            border-radius: var(--border-radius);
            transition: all 0.3s;
        }
        
        .btn-purple:hover {
            background: var(--secondary-purple);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(138, 43, 226, 0.4);
        }
        
        /* Card styles */
        .card {
            background-color: var(--card-bg);
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: rgba(107, 33, 168, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: var(--text-light);
            font-weight: 500;
            border-top-left-radius: var(--border-radius);
            border-top-right-radius: var(--border-radius);
        }
        
        /* Footer styles */
        footer {
            background-color: var(--darker-bg) !important;
            color: var(--text-secondary);
            border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
        }
        
        /* Form control styles */
        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            border-radius: var(--border-radius);
        }
        
        .form-control:focus, .form-select:focus {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: var(--primary-purple);
            box-shadow: 0 0 0 0.25rem rgba(107, 33, 168, 0.25);
            color: var(--text-light);
        }
        
        /* Table styles */
        .table {
            color: var(--text-secondary);
        }
        
        .table thead th {
            background-color: rgba(107, 33, 168, 0.1);
            color: var(--text-light);
            border-bottom: none;
        }
        
        .table tbody tr {
            border-bottom-color: rgba(255, 255, 255, 0.05);
        }
        
        .table tbody tr:hover {
            background-color: rgba(107, 33, 168, 0.05);
            color: var(--text-light);
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transform: translateX(-250px);
            }
            
            .sidebar.active {
                width: var(--sidebar-width);
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .main-content.sidebar-active {
                margin-left: var(--sidebar-width);
            }
            
            .toggle-sidebar {
                display: block !important;
            }
        }
        
        .toggle-sidebar {
            display: none;
            background-color: var(--primary-purple);
            border: none;
            color: white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }
        
        .toggle-sidebar:hover {
            background-color: var(--secondary-purple);
            transform: scale(1.1);
        }
        
        /* Custom logout button */
        .btn-logout {
            color: var(--text-light);
            transition: all 0.3s;
            padding: 0.8rem 1.2rem;
            margin: 0.3rem 0.6rem;
            border-radius: var(--border-radius);
            text-align: left;
            width: calc(100% - 1.2rem);
        }
        
        .btn-logout:hover {
            background: rgba(255, 59, 48, 0.2);
            color: #ff3b30;
            transform: translateX(5px);
        }
        
        .btn-logout i {
            margin-right: 10px;
        }
        
        /* Glassmorphism components */
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Brand styling */
        .brand-icon img {
            filter: drop-shadow(0 0 5px rgba(147, 51, 234, 0.5));
        }
        
        .brand-text h5 {
            background: linear-gradient(90deg, #f0f0f0, #d8b4fe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 600;
        }

        /* Chart placeholders */
        .chart-container {
            min-height: 300px;
            width: 100%;
            background: rgba(255, 255, 255, 0.02);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px dashed rgba(255, 255, 255, 0.1);
        }

        /* Stats Card */
        .stats-card {
            display: flex;
            align-items: center;
        }
        
        .stats-card .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }
        
        .stats-card .stats-content .value {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .stats-card .stats-content .label {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        /* Status badges */
        .badge-success {
            background-color: rgba(16, 185, 129, 0.2);
            color: rgb(16, 185, 129);
        }
        
        .badge-warning {
            background-color: rgba(245, 158, 11, 0.2);
            color: rgb(245, 158, 11);
        }
        
        .badge-danger {
            background-color: rgba(239, 68, 68, 0.2);
            color: rgb(239, 68, 68);
        }
        
        .badge-info {
            background-color: rgba(59, 130, 246, 0.2);
            color: rgb(59, 130, 246);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional Styles -->
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand d-flex align-items-center">
            <div class="brand-icon me-2">
            <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="FIT CHOICE">
            </div>
            <div class="brand-text">
                <h5 class="mb-0">FitChoice</h5>
            </div>
        </div>
        
        <ul class="sidebar-nav">
        @auth('web')
    <!-- Regular User Navigation -->
    <li>
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> My Dashboard
        </a>
    </li>

    <li>
        <a href="{{ route('user.browse-gyms') }}" class="{{ request()->routeIs('user.browse-gyms') ? 'active' : '' }}">
            <i class="fas fa-search"></i> Browse Gyms
        </a>
    </li>

    <li>
        <a href="{{ route('user.my-bookings') }}" class="{{ request()->routeIs('user.my-bookings') ? 'active' : '' }}">
            <i class="fas fa-calendar-check"></i> My Bookings
        </a>
    </li>

    <li>
        <a href="{{ route('user.favorite-gyms') }}" class="{{ request()->routeIs('user.favorite-gyms') ? 'active' : '' }}">
            <i class="fas fa-heart"></i> Favorite Gyms
        </a>
    </li>

    <li>
        <a href="{{ route('user.profile-settings') }}" class="{{ request()->routeIs('user.profile-settings') ? 'active' : '' }}">
            <i class="fas fa-user-cog"></i> Profile Settings
        </a>
    </li>

    <li>
        <a href="{{ route('user.support') }}" class="{{ request()->routeIs('user.support') ? 'active' : '' }}">
            <i class="fas fa-headset"></i> Support
        </a>
    </li>
@endauth

            
            @auth('admin')
                <!-- Admin Navigation -->
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a></li>
                <li><a href="#manage-users">
                    <i class="fas fa-users"></i> Manage Users
                </a></li>
                <li><a href="#manage-gym-owners">
                    <i class="fas fa-user-tie"></i> Manage Gym Owners
                </a></li>
                <li><a href="#pending-gyms">
                    <i class="fas fa-clock"></i> Pending Gym Requests
                </a></li>
                <li><a href="#manage-gyms">
                    <i class="fas fa-dumbbell"></i> Manage Gyms
                </a></li>
                <li><a href="#view-bookings">
                    <i class="fas fa-calendar-day"></i> View Bookings
                </a></li>
                <li><a href="#amenity-master">
                    <i class="fas fa-list-check"></i> Amenity Master
                </a></li>
                <li><a href="#reports">
                    <i class="fas fa-chart-bar"></i> Reports
                </a></li>
                <li><a href="#settings">
                    <i class="fas fa-cog"></i> Settings
                </a></li>
            @endauth
            
            @auth('gymowner')
                <!-- Gym Owner Navigation -->
                <li><a href="{{ route('gymowner.dashboard') }}" class="{{ request()->routeIs('gymowner.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> My Dashboard
                </a></li>
                <li><a href="#my-gyms">
                    <i class="fas fa-building"></i> My Gyms
                </a></li>
                <li><a href="{{ route('gyms.create') }}" class="{{ request()->routeIs('gyms.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle"></i> Add New Gym
                </a></li>
                <li><a href="#membership-plans">
                    <i class="fas fa-tags"></i> My Membership Plans
                </a></li>
                <li><a href="#my-bookings">
                    <i class="fas fa-calendar-check"></i> My Bookings
                </a></li>
                <li><a href="#profile-settings">
                    <i class="fas fa-user-cog"></i> Profile Settings
                </a></li>
            @endauth
            
            <!-- Logout button for all users -->
            <li class="mt-auto">
                @auth('web')
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="hidden" name="redirect" value="{{ route('welcome') }}">
                        <button type="submit" class="btn btn-link btn-logout no-underline">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @endauth
                
                @auth('admin')
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <input type="hidden" name="redirect" value="{{ route('welcome') }}">
                        <button type="submit" class="btn btn-link btn-logout no-underline">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @endauth
                
                @auth('gymowner')
                    <form method="POST" action="{{ route('gymowner.logout') }}">
                        @csrf
                        <input type="hidden" name="redirect" value="{{ route('welcome') }}">
                        <button type="submit" class="btn btn-link btn-logout no-underline">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @endauth
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Toggle Sidebar Button (Mobile) -->
        <button class="toggle-sidebar btn btn-sm position-fixed m-2" style="z-index: 1000; top: 0; left: 0;">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <div class="container-fluid">
                <h1 class="h3">
                    @yield('page-title', 'Dashboard')
                </h1>
            </div>
        </div>
        
        <!-- Main Content Area -->
        <div class="content-wrapper container-fluid">
            @yield('content')
        </div>
        
        <!-- Footer -->
        <footer class="py-3 border-top">
            <div class="container-fluid">
                <p class="text-center mb-0">&copy; {{ date('Y') }} FitChoice. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.querySelector('.toggle-sidebar');
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                mainContent.classList.toggle('sidebar-active');
            });
            
            // Add class to card elements for theme consistency
            document.querySelectorAll('.card').forEach(card => {
                card.classList.add('glass-card');
            });
        });
    </script>
    
    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>