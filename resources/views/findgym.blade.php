@extends('layouts.app')

@section('title', 'Find Gyms')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Search Results Header -->
    <div class="mb-8">
        
        @if(isset($search) && $search)
            <div class="p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">
                <p class="text-gray-700 dark:text-gray-300">
                    Showing results for: <span class="font-semibold">{{ $search }}</span>
                </p>
            </div>
        @endif
    </div>
    
    <!-- No Results Message -->
    @if(isset($gyms) && count($gyms) == 0)
        <div class="p-8 text-center bg-gray-100 dark:bg-gray-800 rounded-lg mb-8">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">No gyms found</h3>
            <p class="text-gray-600 dark:text-gray-400">Try a different search term or browse all gyms</p>
            <a href="{{ route('findgym') }}" class="mt-4 inline-block px-6 py-2 bg-[#E63946] text-white rounded-lg hover:bg-[#d32836] transition-colors">View All Gyms</a>
        </div>
    @endif
    
    <!-- Gym Results Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @if(isset($gyms))
            @foreach($gyms as $gym)
                @include('layouts.gymCard', [
                    'gymLink' => '#', 
                    'gymImage' => asset($gym['image']),
                    'gymName' => $gym['name'],
                    'gymAddress' => $gym['address'],
                    'gymTimings' => $gym['timings'],
                    'gymLocation' => $gym['location'],
                    'gymRating' => $gym['rating']
                ])
            @endforeach
        @endif
    </div>
</div>
@endsection 