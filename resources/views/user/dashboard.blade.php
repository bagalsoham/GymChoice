@extends('layouts.main')

@section('title', 'User Dashboard')
@section('page-title', 'My Dashboard')

@section('content')
<div class="py-6">
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-purple-900">
                        <i class="fas fa-calendar-check text-purple-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">3</div>
                        <div class="label">Active Bookings</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-blue-900">
                        <i class="fas fa-history text-blue-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">14</div>
                        <div class="label">Booking History</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-green-900">
                        <i class="fas fa-calendar-day text-green-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">8</div>
                        <div class="label">Flexible Days Left</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="p-5">
                <div class="stats-card">
                    <div class="icon-box bg-yellow-900">
                        <i class="fas fa-star text-yellow-400 text-xl"></i>
                    </div>
                    <div class="stats-content">
                        <div class="value text-white">4</div>
                        <div class="label">Favorite Gyms</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Bookings Section -->
    <section class="mb-8">
        <x-section-title title="Active Bookings">
            Your upcoming gym sessions
        </x-section-title>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card hover:shadow-lg transition-shadow duration-300">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-semibold text-lg text-white">Fitness Plus</h3>
                        <span class="px-2 py-1 text-xs rounded-full badge-success">Today</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-gray-400">
                            <i class="fas fa-clock w-5 text-center"></i>
                            <span>7:00 PM - 9:00 PM</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <i class="fas fa-map-marker-alt w-5 text-center"></i>
                            <span>123 Main Street, City Center</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <i class="fas fa-dumbbell w-5 text-center"></i>
                            <span>Strength Training</span>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 flex-1">
                            <i class="fas fa-check-circle mr-1"></i> Check In
                        </button>
                        <button class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card hover:shadow-lg transition-shadow duration-300">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-semibold text-lg text-white">PowerLift Gym</h3>
                        <span class="px-2 py-1 text-xs rounded-full badge-info">Tomorrow</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-gray-400">
                            <i class="fas fa-clock w-5 text-center"></i>
                            <span>6:30 AM - 8:30 AM</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <i class="fas fa-map-marker-alt w-5 text-center"></i>
                            <span>456 Elm Street, West District</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <i class="fas fa-dumbbell w-5 text-center"></i>
                            <span>CrossFit Class</span>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 flex-1">
                            <i class="fas fa-edit mr-1"></i> Reschedule
                        </button>
                        <button class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card hover:shadow-lg transition-shadow duration-300">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-semibold text-lg text-white">CardioFit Studio</h3>
                        <span class="px-2 py-1 text-xs rounded-full badge-warning">Thu, 21 Jul</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-gray-400">
                            <i class="fas fa-clock w-5 text-center"></i>
                            <span>5:30 PM - 6:30 PM</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <i class="fas fa-map-marker-alt w-5 text-center"></i>
                            <span>789 Oak Drive, East Side</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <i class="fas fa-dumbbell w-5 text-center"></i>
                            <span>Spin Class</span>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 flex-1">
                            <i class="fas fa-edit mr-1"></i> Reschedule
                        </button>
                        <button class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recommended Gyms Section -->
    <section class="mb-8">
        <x-section-title title="Recommended For You">
            Gyms that match your fitness preferences and location
        </x-section-title>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card hover:shadow-lg transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="w-full h-48 object-cover" alt="FitZone Gym">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-bold text-lg text-white">FitZone Gym</h3>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star-half-alt text-xs"></i>
                            <span class="text-gray-400 text-xs ml-1">4.8</span>
                        </div>
                    </div>
                    <div class="flex items-center mb-3 text-gray-400 text-sm">
                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                        <span>2.3 km away from you</span>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-3">
                        <span class="px-2 py-1 bg-blue-900 text-blue-300 text-xs rounded-full">Cardio</span>
                        <span class="px-2 py-1 bg-purple-900 text-purple-300 text-xs rounded-full">Weights</span>
                        <span class="px-2 py-1 bg-green-900 text-green-300 text-xs rounded-full">Pool</span>
                    </div>
                    <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">Book Now</button>
                </div>
            </div>
            
            <div class="card hover:shadow-lg transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="w-full h-48 object-cover" alt="Iron Paradise">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-bold text-lg text-white">Iron Paradise</h3>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <span class="text-gray-400 text-xs ml-1">5.0</span>
                        </div>
                    </div>
                    <div class="flex items-center mb-3 text-gray-400 text-sm">
                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                        <span>3.1 km away from you</span>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-3">
                        <span class="px-2 py-1 bg-red-900 text-red-300 text-xs rounded-full">Strength</span>
                        <span class="px-2 py-1 bg-yellow-900 text-yellow-300 text-xs rounded-full">Boxing</span>
                        <span class="px-2 py-1 bg-blue-900 text-blue-300 text-xs rounded-full">Protein Bar</span>
                    </div>
                    <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">Book Now</button>
                </div>
            </div>
            
            <div class="card hover:shadow-lg transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1518310383802-640c2de311b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="w-full h-48 object-cover" alt="Flex Fitness">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-bold text-lg text-white">Flex Fitness</h3>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="far fa-star text-xs"></i>
                            <span class="text-gray-400 text-xs ml-1">4.0</span>
                        </div>
                    </div>
                    <div class="flex items-center mb-3 text-gray-400 text-sm">
                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                        <span>1.8 km away from you</span>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-3">
                        <span class="px-2 py-1 bg-purple-900 text-purple-300 text-xs rounded-full">Yoga</span>
                        <span class="px-2 py-1 bg-green-900 text-green-300 text-xs rounded-full">Pilates</span>
                        <span class="px-2 py-1 bg-blue-900 text-blue-300 text-xs rounded-full">Sauna</span>
                    </div>
                    <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">Book Now</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Codes Section -->
    <section class="mb-8">
        <x-section-title title="Special Offers">
            Exclusive promotions and discounts for you
        </x-section-title>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="card overflow-hidden bg-gradient-to-r from-purple-900 to-blue-900">
                <div class="p-5">
                    <div class="mb-4">
                        <span class="text-xs font-semibold text-purple-300">LIMITED TIME</span>
                        <h3 class="text-xl font-bold text-white">Summer Special</h3>
                    </div>
                    <p class="text-gray-300 mb-4">Get 20% off on all premium gym bookings this week!</p>
                    <div class="bg-white bg-opacity-10 p-2 rounded-md mb-4">
                        <div class="flex justify-between items-center">
                            <code class="text-lg font-mono font-bold text-white">SUMMER20</code>
                            <button class="text-white hover:text-purple-300 transition">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">Valid until July 31, 2023</p>
                </div>
            </div>
            
            <div class="card overflow-hidden bg-gradient-to-r from-pink-900 to-purple-900">
                <div class="p-5">
                    <div class="mb-4">
                        <span class="text-xs font-semibold text-pink-300">NEW USERS</span>
                        <h3 class="text-xl font-bold text-white">First Booking</h3>
                    </div>
                    <p class="text-gray-300 mb-4">50% off on your first gym booking. Try it now!</p>
                    <div class="bg-white bg-opacity-10 p-2 rounded-md mb-4">
                        <div class="flex justify-between items-center">
                            <code class="text-lg font-mono font-bold text-white">FIRST50</code>
                            <button class="text-white hover:text-purple-300 transition">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">No expiration date</p>
                </div>
            </div>
            
            <div class="card overflow-hidden bg-gradient-to-r from-blue-900 to-indigo-900">
                <div class="p-5">
                    <div class="mb-4">
                        <span class="text-xs font-semibold text-blue-300">WEEKEND SPECIAL</span>
                        <h3 class="text-xl font-bold text-white">Weekend Warrior</h3>
                    </div>
                    <p class="text-gray-300 mb-4">Book any gym on weekends and get a free protein shake!</p>
                    <div class="bg-white bg-opacity-10 p-2 rounded-md mb-4">
                        <div class="flex justify-between items-center">
                            <code class="text-lg font-mono font-bold text-white">WKNDFIT</code>
                            <button class="text-white hover:text-purple-300 transition">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">Valid on Saturdays and Sundays</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking History Chart -->
    <section class="mb-8">
        <x-section-title title="Your Activity">
            Your workout patterns and statistics
        </x-section-title>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="card lg:col-span-2">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Monthly Activity</h3>
                    <!-- Chart Placeholder -->
                    <div class="chart-container">
                        <div class="text-center text-gray-400">
                            <i class="fas fa-chart-line text-4xl mb-2"></i>
                            <p>Your monthly gym visit statistics will appear here</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-4">Favorite Activities</h3>
                    <!-- Chart Placeholder -->
                    <div class="chart-container">
                        <div class="text-center text-gray-400">
                            <i class="fas fa-chart-pie text-4xl mb-2"></i>
                            <p>Your preferred workout types will appear here</p>
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
