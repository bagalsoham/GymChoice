@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <!-- Carousel -->
    <div x-data="{ 
        activeSlide: 1, 
        totalSlides: 4,
        autoRotate: null, 
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
        class="relative w-full h-72 md:h-[43rem] overflow-hidden mb-16">
        <!-- Slides -->
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-show="activeSlide === 1"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">
            <img src="{{ asset('images/carousel1.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 1">
        </div>
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-show="activeSlide === 2"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">
            <img src="{{ asset('images/carousel2.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 2">
        </div>
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-show="activeSlide === 3"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">
            <img src="{{ asset('images/carousel3.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 3">
        </div>
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-show="activeSlide === 4"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">
            <img src="{{ asset('images/carousel4.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 4">
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 space-y-24">
        <!-- Sections with proper spacing -->
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
    
@endsection