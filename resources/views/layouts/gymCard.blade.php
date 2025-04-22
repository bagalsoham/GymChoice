<a href="{{ $gymLink ?? '#' }}" class="flex flex-col items-center bg-white border border-gray-900 rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-300 w-full mb-6">
    <!-- Gym Image (square aspect ratio for consistency) -->
    <img class="object-cover w-full rounded-t-lg h-72 md:h-48 md:w-48 md:rounded-none md:rounded-s-lg" src="{{ $gymImage }}" alt="{{ $gymName }} Photo">
    
    <!-- Gym Information -->
    <div class="flex flex-col justify-between p-5 leading-normal w-full">
        <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $gymName }}</h3>
        
        <div class="mb-3 space-y-2">
            <!-- Address -->
            <div class="flex items-start">
                <svg class="w-5 h-5 text-gray-700 dark:text-gray-300 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <p class="text-sm md:text-base font-medium text-gray-700 dark:text-gray-300">{{ $gymAddress }}</p>
            </div>
            
            <!-- Opening Hours -->
            <div class="flex items-start">
                <svg class="w-5 h-5 text-gray-700 dark:text-gray-300 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-sm md:text-base font-medium text-gray-700 dark:text-gray-300">{{ $gymTimings }}</p>
            </div>
            
            <!-- Location/Neighborhood -->
            <div class="flex items-start">
                <svg class="w-5 h-5 text-gray-700 dark:text-gray-300 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-sm md:text-base font-medium text-gray-700 dark:text-gray-300">{{ $gymLocation }}</p>
            </div>
        </div>
        
        <!-- Rating (Optional) -->
        @if(isset($gymRating))
        <div class="flex items-center mt-2">
            <div class="flex items-center">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $gymRating)
                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @else
                        <svg class="w-4 h-4 text-gray-300 dark:text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endif
                @endfor
            </div>
            <span class="text-xs font-medium text-gray-600 dark:text-gray-400 ml-2">{{ $gymRating }}/5</span>
        </div>
        @endif
    </div>
</a> 