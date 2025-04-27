@extends('layouts.main')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')

@section('content')
<div class="py-6">
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-purple-900">
                        <i class="fas fa-users text-purple-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">1,248</div>
                        <div class="label">Total Users</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-blue-900">
                        <i class="fas fa-user-tie text-blue-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">95</div>
                        <div class="label">Gym Owners</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-green-900">
                        <i class="fas fa-dumbbell text-green-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">42</div>
                        <div class="label">Active Gyms</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-red-900">
                        <i class="fas fa-clock text-red-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">7</div>
                        <div class="label">Pending Approvals</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue Report Section -->
    <section class="mb-8">
        <x-section-title title="Revenue Report">
            Monthly revenue breakdown and trends
        </x-section-title>
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <div class="lg:col-span-3 card">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Monthly Revenue Overview</h3>
                    <!-- Chart Placeholder -->
                    <div class="chart-container">
                        <div class="text-center text-gray-400">
                            <i class="fas fa-chart-line text-4xl mb-2"></i>
                            <p>Monthly revenue trends will appear here</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Revenue Sources</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-purple-500 rounded-full mr-2"></div>
                                <span class="text-gray-300">Memberships</span>
                            </div>
                            <span class="text-white font-medium">62%</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                <span class="text-gray-300">Gym Registrations</span>
                            </div>
                            <span class="text-white font-medium">25%</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                <span class="text-gray-300">Service Fees</span>
                            </div>
                            <span class="text-white font-medium">10%</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                <span class="text-gray-300">Other</span>
                            </div>
                            <span class="text-white font-medium">3%</span>
                        </div>
                    </div>
                    
                    <!-- Chart Placeholder -->
                    <div class="chart-container mt-4">
                        <div class="text-center text-gray-400">
                            <i class="fas fa-chart-pie text-2xl mb-2"></i>
                            <p>Revenue distribution chart will appear here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Stats Section -->
    <section class="mb-8">
        <x-section-title title="Booking Statistics">
            Insights into booking patterns and trends
        </x-section-title>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="card">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Bookings by Day</h3>
                    <!-- Chart Placeholder -->
                    <div class="chart-container">
                        <div class="text-center text-gray-400">
                            <i class="fas fa-calendar-day text-4xl mb-2"></i>
                            <p>Daily booking distribution will appear here</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Peak Booking Hours</h3>
                    <!-- Chart Placeholder -->
                    <div class="chart-container">
                        <div class="text-center text-gray-400">
                            <i class="fas fa-clock text-4xl mb-2"></i>
                            <p>Hourly booking trends will appear here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pending Gym Requests Section -->
    <section class="mb-8">
        <x-section-title title="Pending Gym Requests">
            New gym registration requests awaiting approval
        </x-section-title>
        
        <div class="card">
            <div class="p-5">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-white">Recent Requests</h3>
                    <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300">
                        View All Requests
                    </button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Gym Name</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Owner</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Location</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Submitted On</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-white">Elite Training Center</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Jason Taylor</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">New York, NY</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Jul 18, 2023</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded-md transition duration-300">Approve</button>
                                        <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded-md transition duration-300">Reject</button>
                                        <button class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs rounded-md transition duration-300">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-white">CrossTraining Hub</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Mark Anderson</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Chicago, IL</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Jul 16, 2023</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded-md transition duration-300">Approve</button>
                                        <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded-md transition duration-300">Reject</button>
                                        <button class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs rounded-md transition duration-300">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-white">Yoga & Wellness Studio</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Emma Roberts</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Los Angeles, CA</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">Jul 14, 2023</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded-md transition duration-300">Approve</button>
                                        <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded-md transition duration-300">Reject</button>
                                        <button class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs rounded-md transition duration-300">View</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Gym Popularity Section -->
    <section class="mb-8">
        <x-section-title title="Gym Popularity">
            Most popular gyms and trending facilities
        </x-section-title>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="card">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Top Performing Gyms</h3>
                    
                    <div class="space-y-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4">
                                <div class="h-16 w-16 rounded-lg overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Fitness Plus" class="h-full w-full object-cover">
                                </div>
                            </div>
                            <div class="flex-grow">
                                <div class="flex justify-between items-center mb-1">
                                    <h4 class="text-white font-medium">Fitness Plus</h4>
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="text-gray-400 ml-1">4.8</span>
                                    </div>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">892 bookings this month</span>
                                    <span class="text-green-400">+12%</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-1.5 mt-2">
                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 92%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4">
                                <div class="h-16 w-16 rounded-lg overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="PowerLift Gym" class="h-full w-full object-cover">
                                </div>
                            </div>
                            <div class="flex-grow">
                                <div class="flex justify-between items-center mb-1">
                                    <h4 class="text-white font-medium">PowerLift Gym</h4>
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="text-gray-400 ml-1">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">768 bookings this month</span>
                                    <span class="text-green-400">+8%</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-1.5 mt-2">
                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4">
                                <div class="h-16 w-16 rounded-lg overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1518310383802-640c2de311b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Yoga Wellness" class="h-full w-full object-cover">
                                </div>
                            </div>
                            <div class="flex-grow">
                                <div class="flex justify-between items-center mb-1">
                                    <h4 class="text-white font-medium">Yoga Wellness</h4>
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="text-gray-400 ml-1">4.2</span>
                                    </div>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">654 bookings this month</span>
                                    <span class="text-green-400">+15%</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-1.5 mt-2">
                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 78%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Popular Amenities</h3>
                    <!-- Chart Placeholder -->
                    <div class="chart-container mb-4">
                        <div class="text-center text-gray-400">
                            <i class="fas fa-chart-bar text-4xl mb-2"></i>
                            <p>Popular amenities chart will appear here</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center p-3 bg-gray-800 rounded-lg">
                            <i class="fas fa-swimming-pool text-blue-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">Swimming Pool</div>
                                <div class="text-xs text-gray-400">62% of gyms</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-800 rounded-lg">
                            <i class="fas fa-hot-tub text-red-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">Sauna</div>
                                <div class="text-xs text-gray-400">45% of gyms</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-800 rounded-lg">
                            <i class="fas fa-utensils text-green-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">Nutrition Bar</div>
                                <div class="text-xs text-gray-400">58% of gyms</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-800 rounded-lg">
                            <i class="fas fa-user-friends text-yellow-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">Personal Training</div>
                                <div class="text-xs text-gray-400">82% of gyms</div>
                            </div>
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