@props(['title' => '', 'icon' => '', 'class' => ''])

<div {{ $attributes->merge(['class' => 'bg-card glass-card shadow-md rounded-lg overflow-hidden ' . $class]) }}>
    <div class="p-5">
        @if($icon)
        <div class="flex items-center mb-4">
            <i class="{{ $icon }} text-purple-400 mr-3 text-xl"></i>
            <h3 class="text-lg font-semibold text-white">{{ $title }}</h3>
        </div>
        @elseif($title)
        <h3 class="text-lg font-semibold text-white mb-4">{{ $title }}</h3>
        @endif

        <div class="text-gray-300">
            {{ $slot }}
        </div>
    </div>
</div> 