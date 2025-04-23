@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <!-- Banner Section -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Grow Your Gym Business With Us!
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    List your gym on our platform and reach a wider audience of fitness enthusiasts.
                </p>
            </div>
            <div class="mt-10 max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Register your Gym</h2>
                <form action="{{ route('gyms.store') }}" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Gym Name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Your Gym's Name" required>
                        </div>
                    </div>
                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Number</label>
                        <div class="mt-1">
                            <input type="tel" name="contact_phone" id="contact_phone" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="+1-555-123-4567" required>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <div class="mt-1">
                            <input type="text" name="address" id="address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="123 Main St, City, State, Postal Code" required>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="gym@example.com">
                        </div>
                    </div>
                   
                    <div>
                        <label for="opening_time" class="block text-sm font-medium text-gray-700">Opening Time</label>
                        <div class="mt-1">
                            <input type="time" name="opening_time" id="opening_time" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    </div>
                    <div>
                        <label for="closing_time" class="block text-sm font-medium text-gray-700">Closing Time</label>
                        <div class="mt-1">
                            <input type="time" name="closing_time" id="closing_time" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    </div>

                   
                    <div class="sm:col-span-2">
                        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Register Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Carousel -->
    <div
        x-data="{
            activeSlide: 1,
            totalSlides: 4,
            autoRotate: null,
            init() {
                this.startRotation();
                this.$watch('activeSlide', () => {
                    this.stopRotation();
                    setTimeout(() => {
                         this.startRotation();
                    }, 3000)
                });
            },
            
            updateTotalSlides() {
                const slides = document.querySelectorAll('.carousel-slide');
                this.totalSlides = slides.length;
            },
            
            startRotation() {
                this.autoRotate = setInterval(() => { this.nextSlide() }, 3000);
            },
            stopRotation() {
                clearInterval(this.autoRotate);
            },
            nextSlide() {
                this.activeSlide = this.activeSlide === this.totalSlides ? 1 : this.activeSlide + 1;
            },
            prevSlide() {
                this.activeSlide = this.activeSlide === 1 ? this.totalSlides : this.activeSlide - 1;
            }
        }"
        x-init="startRotation()"
        @keydown.right.window="nextSlide()"
        @keydown.left.window="prevSlide()"
        class="relative w-full h-72 md:h-[43rem] overflow-hidden mb-16"
    >
    <template x-for="slide in totalSlides" :key="slide">
                <div
                    :class="{ 'absolute inset-0 transition-opacity duration-700 ease-in-out carousel-slide': true, 'z-10': activeSlide === slide }"
                    x-show="activeSlide === slide"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                >
                
                    <template x-if="slide === 1">
                       <img src="{{ asset('images/carousel1.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 1">
                    </template>
                     <template x-if="slide === 2">
                       <img src="{{ asset('images/carousel2.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 1">
                    </template>
                    <template x-if="slide === 3">
                       <img src="{{ asset('images/carousel3.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 1">
                    </template>
                    <template x-if="slide === 4">
                       <img src="{{ asset('images/carousel4.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 1">
                    </template>
                </div>
    </template>
      <div class="absolute inset-0 flex justify-center items-end mb-4">
                <template x-for="slide in totalSlides" :key="slide">
                    <button @click="activeSlide = slide" class="w-2 h-2 rounded-full mx-1" :class="{ 'bg-white': activeSlide === slide, 'bg-gray-500': activeSlide !== slide }"></button>
                </template>
            </div>
    
      

    </div>
    
      <!-- Gym Sections -->
      <div class="container mx-auto px-4 py-8 space-y-24">
        <div class="space-y-24">
    <!-- Section de testemonials -->
        <div
            class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-show="activeSlide === 4"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
        >
            <img src="{{ asset('images/carousel4.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 4">
        </div>      
        <div class="space-y-24">
            @include('layouts.leftSection', [
                'imageUrl' => asset('images/testimonial1.jpg'),
                'productName' => 'Cross Fit',
                'productDescription' => 'CrossFit training focuses on high-intensity functional movements to build strength, endurance, and agility. It combines elements of weightlifting, cardio, and bodyweight exercises to enhance overall fitness and performance.'
            ])

            @include('layouts.rightSection', [
                'imageUrl' => asset('images/testimonial2.jpg'),
                'productName' => 'Weight Training',
                'productDescription' => 'Weight training helps in muscle growth, strength development, and overall fitness enhancement. It improves bone density, metabolism, and endurance by utilizing resistance exercises targeting specific muscle groups.'
            ])

            @include('layouts.leftSection', [
                'imageUrl' => asset('images/testimonial3.jpg'),
                'productName' => 'Cardio Training',
                'productDescription' => 'Cardio exercises improve heart health, stamina, and aid in weight loss by increasing endurance. Activities like running, cycling, and jumping rope boost cardiovascular efficiency and promote overall well-being.'
            ])

            @include('layouts.rightSection', [
                'imageUrl' => asset('images/testimonial4.jpg'),
                'productName' => 'Yoga',
                'productDescription' => 'Yoga enhances flexibility, reduces stress, and promotes mental and physical well-being. Through a combination of postures, breathing techniques, and meditation, it helps in relaxation, mindfulness, and overall body balance.'
            ])
        </div>
    </div>
    </div>
        </div>
<!-- card sections -->
    <div class="flex flex-wrap justify-center gap-8 py-12">       
            @include('layouts.card', [
                'imageSrc' => asset('images/card1.png'),
                'imageAlt' => 'ELITE workout',
                'cardSubtitle' => 'fitpass',
                'cardTitle' => 'ELITE',
                'headingText' => 'Unlimited access to',
                'bulletPoints' => [
                    'At-center group classes',
                    'All ELITE & PRO gyms',
                    'At-home live workouts'
                ],
                'primaryButtonText' => 'TRY FOR FREE',
                'secondaryButtonText' => 'LEARN MORE'
            ])

            @include('layouts.card', [
                'imageSrc' => asset('images/card2.png'),
                'imageAlt' => 'PRO workout',
                'cardSubtitle' => 'fitpass',
                'cardTitle' => 'PRO',
                'headingText' => 'Unlimited access to',
                'bulletPoints' => [
                    'All PRO gyms',
                    '2 Sessions/month at ELITE gyms & group classes',
                    'At-home live workouts'
                ],
                'primaryButtonText' => 'TRY FOR FREE',
                'secondaryButtonText' => 'LEARN MORE'
            ])

            @include('layouts.card', [
                'imageSrc' => asset('images/card3.png'),
                'imageAlt' => 'SELECT workout',
                'cardSubtitle' => 'fitpass',
                'cardTitle' => 'SELECT',
                'headingText' => 'Unlimited access to',
                'bulletPoints' => [
                    'One center that you choose',
                    'Limited sessions* in other centers & gyms in your city',
                    'At-home live workouts'
                ],
                'primaryButtonText' => 'LEARN MORE',
                'secondaryButtonText' => 'TRY FOR FREE'
            ])
        </div>
@endsection
