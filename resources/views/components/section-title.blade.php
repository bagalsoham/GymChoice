@props(['title'])

<div id="{{ \Illuminate\Support\Str::slug($title) }}" class="border-b border-gray-700 pb-3 mb-6 scroll-mt-24">
    <h2 class="text-2xl font-bold text-white">{{ $title }}</h2>
    <p class="text-gray-400">{{ $slot }}</p>
</div> 