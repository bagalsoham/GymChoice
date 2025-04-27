@extends('layouts.main')

@section('title', 'Gym Owner Dashboard')
@section('page-title', 'My Dashboard')

@section('content')
<div class="py-6">
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-purple-900">
                        <i class="fas fa-building text-purple-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">3</div>
                        <div class="label">My Gyms</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-blue-900">
                        <i class="fas fa-calendar-check text-blue-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">187</div>
                        <div class="label">Total Bookings</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-green-900">
                        <i class="fas fa-dollar-sign text-green-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">$9,345</div>
                        <div class="label">Earnings This Month</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-yellow-900">
                        <i class="fas fa-clock text-yellow-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">15</div>
                        <div class="label">Pending Bookings</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- My Gyms Section -->
    <section class="mb-8">
        <x-section-title title="My Gyms">
            Overview of your registered gyms
        </x-section-title>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card relative overflow-hidden">
                <div class="absolute top-0 right-0 m-3">
                    <span class="px-2 py-1 text-xs rounded-full badge-success">Active</span>
                </div>
                <img src="https://images.unsplash.com/photo-1558611848-73f7eb4001a1?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Fitness Plus" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h3 class="text-lg font-bold text-white mb-2">Fitness Plus</h3>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-map-marker-alt text-red-500 w-5"></i>
                        <span class="text-gray-300">123 Main Street, City Center</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <div class="text-sm">
                            <span class="text-gray-400">Today's Bookings:</span>
                            <span class="text-white font-medium ml-1">24</span>
                        </div>
                        <div class="text-sm">
                            <span class="text-gray-400">Rating:</span>
                            <span class="text-white font-medium ml-1">4.8</span>
                            <i class="fas fa-star text-yellow-400 ml-1"></i>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300 flex-1">
                            <i class="fas fa-edit mr-1"></i> Manage
                        </button>
                        <button class="bg-gray-700 hover:bg-gray-600 text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            <i class="fas fa-chart-line"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card relative overflow-hidden">
                <div class="absolute top-0 right-0 m-3">
                    <span class="px-2 py-1 text-xs rounded-full badge-success">Active</span>
                </div>
                <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="PowerLift Gym" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h3 class="text-lg font-bold text-white mb-2">PowerLift Gym</h3>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-map-marker-alt text-red-500 w-5"></i>
                        <span class="text-gray-300">456 Elm Street, West District</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <div class="text-sm">
                            <span class="text-gray-400">Today's Bookings:</span>
                            <span class="text-white font-medium ml-1">18</span>
                        </div>
                        <div class="text-sm">
                            <span class="text-gray-400">Rating:</span>
                            <span class="text-white font-medium ml-1">4.6</span>
                            <i class="fas fa-star text-yellow-400 ml-1"></i>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300 flex-1">
                            <i class="fas fa-edit mr-1"></i> Manage
                        </button>
                        <button class="bg-gray-700 hover:bg-gray-600 text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            <i class="fas fa-chart-line"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card relative overflow-hidden">
                <div class="absolute top-0 right-0 m-3">
                    <span class="px-2 py-1 text-xs rounded-full badge-warning">Pending Approval</span>
                </div>
                <img src="https://images.unsplash.com/photo-1576678927484-cc907957088c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Yoga Wellness" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h3 class="text-lg font-bold text-white mb-2">Yoga Wellness</h3>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-map-marker-alt text-red-500 w-5"></i>
                        <span class="text-gray-300">789 Oak Drive, East Side</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <div class="text-sm">
                            <span class="text-gray-400">Status:</span>
                            <span class="text-yellow-400 font-medium ml-1">Under Review</span>
                        </div>
                        <div class="text-sm">
                            <span class="text-gray-400">Submitted:</span>
                            <span class="text-white font-medium ml-1">2 days ago</span>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300 flex-1">
                            <i class="fas fa-edit mr-1"></i> Edit Details
                        </button>
                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6 text-center">
            <a href="{{ route('gyms.create') }}" class="inline-block bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-md text-sm font-medium transition duration-300">
                <i class="fas fa-plus-circle mr-2"></i> Register a New Gym
            </a>
        </div>
    </section>

    <!-- Pending Bookings Section -->
    <section class="mb-8">
        <x-section-title title="Pending Bookings">
            Bookings that require your confirmation
        </x-section-title>
        
        <div class="card">
            <div class="p-5">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">User</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Gym</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date & Time</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Plan</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full overflow-hidden bg-gray-800">
                                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-white">John Doe</div>
                                            <div class="text-xs text-gray-400">Member since 2023</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Fitness Plus</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Jul 21, 2023 • 7:00 PM</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 py-1 text-xs rounded-full badge-info">Premium</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded-md transition duration-300">Confirm</button>
                                        <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded-md transition duration-300">Decline</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full overflow-hidden bg-gray-800">
                                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-white">Jane Smith</div>
                                            <div class="text-xs text-gray-400">Member since 2022</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">PowerLift Gym</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Jul 21, 2023 • 5:30 PM</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 py-1 text-xs rounded-full badge-info">Standard</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded-md transition duration-300">Confirm</button>
                                        <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded-md transition duration-300">Decline</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full overflow-hidden bg-gray-800">
                                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="User">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-white">Robert Johnson</div>
                                            <div class="text-xs text-gray-400">Member since 2023</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Fitness Plus</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Jul 22, 2023 • 9:00 AM</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 py-1 text-xs rounded-full badge-info">Basic</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded-md transition duration-300">Confirm</button>
                                        <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded-md transition duration-300">Decline</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Plan Stats Section -->
    <section class="mb-8">
        <x-section-title title="Membership Plan Statistics">
            Performance of your membership plans
        </x-section-title>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 card">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Plan Subscriptions</h3>
                    <!-- Chart Placeholder -->
                    <div class="chart-container">
                        <div class="text-center text-gray-400">
                            <i class="fas fa-chart-bar text-4xl mb-2"></i>
                            <p>Membership plan performance chart will appear here</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Plan Distribution</h3>
                    
                    <div class="space-y-4 mb-6">
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm text-white">Premium Plan</span>
                                <span class="text-sm text-white">42%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-purple-600 h-2 rounded-full" style="width: 42%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm text-white">Standard Plan</span>
                                <span class="text-sm text-white">35%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 35%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm text-white">Basic Plan</span>
                                <span class="text-sm text-white">23%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 23%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-700 pt-4">
                        <h4 class="text-md font-medium text-white mb-3">Top Performing Plan</h4>
                        <div class="bg-gradient-to-r from-purple-900 to-indigo-900 p-3 rounded-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h5 class="text-white font-medium">Premium Plan</h5>
                                    <p class="text-xs text-purple-300">$49.99/month</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-white font-medium">$4,749</p>
                                    <p class="text-xs text-purple-300">Monthly revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Activity Section -->
    <section class="mb-8">
        <x-section-title title="Recent Activity">
            Latest actions and updates
        </x-section-title>
        
        <div class="card">
            <div class="p-5">
                <div class="space-y-6">
                    <div class="flex">
                        <div class="flex-shrink-0 mr-4">
                            <div class="h-10 w-10 rounded-full bg-green-900 flex items-center justify-center">
                                <i class="fas fa-check text-green-400"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between">
                                <p class="text-white">New booking confirmed at <span class="font-medium">Fitness Plus</span></p>
                                <span class="text-xs text-gray-400">2 hours ago</span>
                            </div>
                            <p class="text-sm text-gray-400">John Doe booked a session for July 21, 2023 at 7:00 PM</p>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <div class="flex-shrink-0 mr-4">
                            <div class="h-10 w-10 rounded-full bg-blue-900 flex items-center justify-center">
                                <i class="fas fa-user-plus text-blue-400"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between">
                                <p class="text-white">New member joined <span class="font-medium">PowerLift Gym</span></p>
                                <span class="text-xs text-gray-400">5 hours ago</span>
                            </div>
                            <p class="text-sm text-gray-400">Jane Smith subscribed to the Standard Plan</p>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <div class="flex-shrink-0 mr-4">
                            <div class="h-10 w-10 rounded-full bg-yellow-900 flex items-center justify-center">
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between">
                                <p class="text-white">New review for <span class="font-medium">Fitness Plus</span></p>
                                <span class="text-xs text-gray-400">Yesterday</span>
                            </div>
                            <p class="text-sm text-gray-400">Robert Johnson gave a 5-star rating with comment</p>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <div class="flex-shrink-0 mr-4">
                            <div class="h-10 w-10 rounded-full bg-purple-900 flex items-center justify-center">
                                <i class="fas fa-edit text-purple-400"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between">
                                <p class="text-white">Gym details updated</p>
                                <span class="text-xs text-gray-400">2 days ago</span>
                            </div>
                            <p class="text-sm text-gray-400">You updated the operational hours for PowerLift Gym</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>
@endpush
@endsection 