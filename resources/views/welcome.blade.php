@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <!-- Carousel - Removed top margin/padding to ensure it's flush with header -->
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
        class="relative w-full h-80 md:h-[40rem] overflow-hidden bg-[#121212]"
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
                       <img src="{{ asset('images/carousel1.jpg') }}" class="w-full h-full object-cover opacity-70" alt="Carousel Image 1">
                    </template>
                     <template x-if="slide === 2">
                       <img src="{{ asset('images/carousel2.jpg') }}" class="w-full h-full object-cover opacity-70" alt="Carousel Image 2">
                    </template>
                    <template x-if="slide === 3">
                       <img src="{{ asset('images/carousel3.jpg') }}" class="w-full h-full object-cover opacity-70" alt="Carousel Image 3">
                    </template>
                    <template x-if="slide === 4">
                       <img src="{{ asset('images/carousel4.jpg') }}" class="w-full h-full object-cover opacity-70" alt="Carousel Image 4">
                    </template>
                    
                    <!-- Dark overlay with gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/30"></div>
                </div>
    </template>
      <div class="absolute inset-x-0 bottom-6 flex justify-center items-end z-20">
                <template x-for="slide in totalSlides" :key="slide">
                    <button @click="activeSlide = slide" class="w-3 h-3 rounded-full mx-2 transition-all duration-300" 
                    :class="{ 'bg-[#8B5CF6] transform scale-125': activeSlide === slide, 'bg-gray-400': activeSlide !== slide }"></button>
                </template>
        </div>

      <!-- Carousel arrows - modernized -->
      <button @click="prevSlide()" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-3 rounded-full transition-all duration-300 z-20 hover:scale-110">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
      </button>
      <button @click="nextSlide()" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-3 rounded-full transition-all duration-300 z-20 hover:scale-110">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
      </button>
      
      <!-- Hero Text Overlay -->
      <div class="absolute inset-0 flex flex-col justify-center items-center text-center z-20 px-4">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 tracking-tight">Transform Your <span class="text-[#8B5CF6]">Fitness Journey</span></h1>
        <p class="text-lg md:text-xl text-gray-200 max-w-2xl mb-8">Access premium gyms and fitness classes across the city with a single membership</p>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="#memberships" class="bg-[#8B5CF6] hover:bg-[#7C3AED] text-white font-medium py-3 px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                Get Started
            </a>
            <a href="#how-it-works" class="bg-transparent border-2 border-white text-white font-medium py-3 px-8 rounded-lg hover:bg-white/10 transition-all duration-300">
                Learn More
            </a>
        </div>
        </div>
    </div>

    <!-- Gym Sections -->
    <div class="bg-[#121212] text-[#E0E0E0]">
        <div class="space-y-28 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <!-- Left Section 1 -->
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-16">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/testimonial1.jpg') }}" alt="Cross Fit" class="w-full h-auto object-cover rounded-xl shadow-2xl shadow-purple-900/20 transform hover:scale-[1.02] transition-all duration-500">
                </div>
                <div class="w-full md:w-1/2 mt-6 md:mt-0">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">Cross <span class="text-[#8B5CF6]">Fit</span></h2>
                    <p class="text-lg text-gray-300 mb-6">CrossFit training focuses on high-intensity functional movements to build strength, endurance, and agility. It combines elements of weightlifting, cardio, and bodyweight exercises to enhance overall fitness and performance.</p>
                    <a href="#" class="inline-flex items-center text-[#8B5CF6] font-medium hover:text-[#A78BFA] transition-all duration-300">
                        Learn more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Section 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-8 md:gap-16">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/testimonial2.jpg') }}" alt="Weight Training" class="w-full h-auto object-cover rounded-xl shadow-2xl shadow-purple-900/20 transform hover:scale-[1.02] transition-all duration-500">
                </div>
                <div class="w-full md:w-1/2 mt-6 md:mt-0">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">Weight <span class="text-[#8B5CF6]">Training</span></h2>
                    <p class="text-lg text-gray-300 mb-6">Weight training helps in muscle growth, strength development, and overall fitness enhancement. It improves bone density, metabolism, and endurance by utilizing resistance exercises targeting specific muscle groups.</p>
                    <a href="#" class="inline-flex items-center text-[#8B5CF6] font-medium hover:text-[#A78BFA] transition-all duration-300">
                        Learn more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Left Section 3 -->
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-16">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/testimonial3.jpg') }}" alt="Cardio Training" class="w-full h-auto object-cover rounded-xl shadow-2xl shadow-purple-900/20 transform hover:scale-[1.02] transition-all duration-500">
                </div>
                <div class="w-full md:w-1/2 mt-6 md:mt-0">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">Cardio <span class="text-[#8B5CF6]">Training</span></h2>
                    <p class="text-lg text-gray-300 mb-6">Cardio exercises improve heart health, stamina, and aid in weight loss by increasing endurance. Activities like running, cycling, and jumping rope boost cardiovascular efficiency and promote overall well-being.</p>
                    <a href="#" class="inline-flex items-center text-[#8B5CF6] font-medium hover:text-[#A78BFA] transition-all duration-300">
                        Learn more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Section 4 -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-8 md:gap-16">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/testimonial4.jpg') }}" alt="Yoga" class="w-full h-auto object-cover rounded-xl shadow-2xl shadow-purple-900/20 transform hover:scale-[1.02] transition-all duration-500">
                </div>
                <div class="w-full md:w-1/2 mt-6 md:mt-0">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">Yoga <span class="text-[#8B5CF6]">Sessions</span></h2>
                    <p class="text-lg text-gray-300 mb-6">Yoga enhances flexibility, reduces stress, and promotes mental and physical well-being. Through a combination of postures, breathing techniques, and meditation, it helps in relaxation, mindfulness, and overall body balance.</p>
                    <a href="#" class="inline-flex items-center text-[#8B5CF6] font-medium hover:text-[#A78BFA] transition-all duration-300">
                        Learn more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card sections -->
    <div id="memberships" class="bg-[#1F1F1F] py-24 relative">
        <!-- Design element -->
        <div class="absolute left-0 top-0 w-64 h-64 bg-purple-600 rounded-full filter blur-3xl opacity-5"></div>
        <div class="absolute right-0 bottom-0 w-80 h-80 bg-purple-800 rounded-full filter blur-3xl opacity-5"></div>
        
        <h2 class="text-3xl md:text-5xl font-bold text-center text-white mb-16">Choose Your <span class="text-[#8B5CF6]">Membership</span></h2>
        <div class="flex flex-wrap justify-center gap-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Card 1 -->
            <div class="w-full md:w-80 bg-[#121212] rounded-2xl overflow-hidden border border-gray-800 shadow-xl transform transition-all duration-300 hover:-translate-y-2 hover:shadow-purple-900/20">
                <div class="p-1 bg-gradient-to-r from-purple-600 to-indigo-600">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/card1.png') }}')"></div>
                </div>
                <div class="p-6">
                    <div class="uppercase text-xs font-semibold text-[#8B5CF6] tracking-wide mb-1">fitpass</div>
                    <h3 class="text-2xl font-bold text-white mb-4">ELITE</h3>
                    <p class="text-gray-400 mb-2">Unlimited access to</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5CF6] mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-300">At-center group classes</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5CF6] mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-300">All ELITE & PRO gyms</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5CF6] mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-300">At-home live workouts</span>
                        </li>
                    </ul>
                    <div class="space-y-3">
                        <a href="#" class="block w-full py-3 px-4 text-center font-medium text-white bg-[#8B5CF6] rounded-lg hover:bg-[#7C3AED] transition-all duration-300 shadow-lg shadow-purple-900/30">TRY FOR FREE</a>
                        <a href="#" class="block w-full py-3 px-4 text-center font-medium text-gray-300 bg-transparent border border-gray-700 rounded-lg hover:bg-gray-800 transition-all duration-300">LEARN MORE</a>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="w-full md:w-80 bg-[#121212] rounded-2xl overflow-hidden border border-gray-800 shadow-xl transform transition-all duration-300 hover:-translate-y-2 hover:shadow-purple-900/20">
                <div class="p-1 bg-gradient-to-r from-purple-600 to-indigo-600">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/card2.png') }}')"></div>
                </div>
                <div class="p-6">
                    <div class="uppercase text-xs font-semibold text-[#8B5CF6] tracking-wide mb-1">fitpass</div>
                    <h3 class="text-2xl font-bold text-white mb-4">PRO</h3>
                    <p class="text-gray-400 mb-2">Unlimited access to</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5CF6] mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-300">All PRO gyms</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5CF6] mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-300">2 Sessions/month at ELITE gyms & group classes</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5CF6] mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-300">At-home live workouts</span>
                        </li>
                    </ul>
                    <div class="space-y-3">
                        <a href="#" class="block w-full py-3 px-4 text-center font-medium text-white bg-[#8B5CF6] rounded-lg hover:bg-[#7C3AED] transition-all duration-300 shadow-lg shadow-purple-900/30">TRY FOR FREE</a>
                        <a href="#" class="block w-full py-3 px-4 text-center font-medium text-gray-300 bg-transparent border border-gray-700 rounded-lg hover:bg-gray-800 transition-all duration-300">LEARN MORE</a>
                    </div>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="w-full md:w-80 bg-[#121212] rounded-2xl overflow-hidden border border-gray-800 shadow-xl transform transition-all duration-300 hover:-translate-y-2 hover:shadow-purple-900/20">
                <div class="p-1 bg-gradient-to-r from-purple-600 to-indigo-600">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/card3.png') }}')"></div>
                </div>
                <div class="p-6">
                    <div class="uppercase text-xs font-semibold text-[#8B5CF6] tracking-wide mb-1">fitpass</div>
                    <h3 class="text-2xl font-bold text-white mb-4">SELECT</h3>
                    <p class="text-gray-400 mb-2">Unlimited access to</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5CF6] mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-300">One center that you choose</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5CF6] mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-300">Limited sessions* in other centers & gyms in your city</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5CF6] mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-300">At-home live workouts</span>
                        </li>
                    </ul>
                    <div class="space-y-3">
                        <a href="#" class="block w-full py-3 px-4 text-center font-medium text-white bg-[#8B5CF6] rounded-lg hover:bg-[#7C3AED] transition-all duration-300 shadow-lg shadow-purple-900/30">LEARN MORE</a>
                        <a href="#" class="block w-full py-3 px-4 text-center font-medium text-gray-300 bg-transparent border border-gray-700 rounded-lg hover:bg-gray-800 transition-all duration-300">TRY FOR FREE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection