@extends('layouts.main')

@section('title', 'Register Your Gym')

@section('content')
<div class="py-12  min-h-screen">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pb-24">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-purple-300">Register Your Gym</h1>
            <p class="text-gray-400 mt-2">Complete the form below to list your gym on our platform</p>
        </div>

        <!-- Alerts -->
        @if ($errors->any())
        <div class="mb-6 bg-red-900/40 border-l-4 border-red-500 text-red-100 p-4 rounded-lg shadow-lg">
            <div class="font-bold text-red-300">Please fix the following errors:</div>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="mb-6 bg-green-900/40 border-l-4 border-green-500 text-green-100 p-4 rounded-lg shadow-lg">
            <div class="font-bold text-green-300">Success!</div>
            <p>{{ session('success') }}</p>
        </div>
        @endif
        
        @if (session('error'))
        <div class="mb-6 bg-red-900/40 border-l-4 border-red-500 text-red-100 p-4 rounded-lg shadow-lg">
            <div class="font-bold text-red-300">Error!</div>
            <p>{{ session('error') }}</p>
        </div>
        @endif

        <!-- Main Form Container -->
        <div class=" overflow-hidden shadow-xl sm:rounded-2x  border-purple-500/30">
            <form action="{{ route('gyms.store') }}" method="POST" enctype="multipart/form-data" class="relative">
                @csrf

                <!-- Form Sections Container -->
                <div class="p-6 lg:p-8 space-y-10 text-gray-100">
                    <!-- Basic Information -->
                    <fieldset class="space-y-6">
                        <legend class="text-xl font-semibold text-purple-300 border-b border-purple-500/30 pb-2 w-full">
                            Basic Information
                        </legend>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-medium text-gray-300">
                                    Gym Name <span class="text-purple-400">*</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                    focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                    @error('name') border-red-500 ring ring-red-500 ring-opacity-50 @enderror" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="gym_type" class="block text-sm font-medium text-gray-300">
                                    Gym Type <span class="text-purple-400">*</span>
                                </label>
                                <select name="gym_type" id="gym_type" 
                                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                    focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                    @error('gym_type') border-red-500 ring ring-red-500 ring-opacity-50 @enderror">
                                    <option value="unisex" {{ old('gym_type') == 'unisex' ? 'selected' : '' }}>Unisex</option>
                                    <option value="men_only" {{ old('gym_type') == 'men_only' ? 'selected' : '' }}>Men Only</option>
                                    <option value="women_only" {{ old('gym_type') == 'women_only' ? 'selected' : '' }}>Women Only</option>
                                </select>
                                @error('gym_type')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="description" class="block text-sm font-medium text-gray-300">
                                Description <span class="text-purple-400">*</span>
                            </label>
                            <textarea name="description" id="description" rows="3" 
                                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                @error('description') border-red-500 ring ring-red-500 ring-opacity-50 @enderror">{{ old('description') }}</textarea>
                            <p class="text-sm text-gray-400">Describe your gym's unique features and what makes it special</p>
                            @error('description')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>

                    <!-- Contact Information -->
                    <fieldset class="space-y-6">
                        <legend class="text-xl font-semibold text-purple-300 border-b border-purple-500/30 pb-2 w-full">
                            Contact Information
                        </legend>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="contact_number" class="block text-sm font-medium text-gray-300">
                                    Contact Number <span class="text-purple-400">*</span>
                                </label>
                                <input type="tel" name="contact_number" id="contact_number" value="{{ old('contact_number') }}" 
                                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                    focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                    @error('contact_number') border-red-500 ring ring-red-500 ring-opacity-50 @enderror" required>
                                @error('contact_number')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-gray-300">
                                    Email Address <span class="text-gray-400">(Optional)</span>
                                </label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" 
                                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                    focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                    @error('email') border-red-500 ring ring-red-500 ring-opacity-50 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <!-- Address -->
                    <fieldset class="space-y-6">
                        <legend class="text-xl font-semibold text-purple-300 border-b border-purple-500/30 pb-2 w-full">
                            Location
                        </legend>
                        
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <label for="address_line1" class="block text-sm font-medium text-gray-300">
                                    Address Line 1 <span class="text-purple-400">*</span>
                                </label>
                                <input type="text" name="address_line1" id="address_line1" value="{{ old('address_line1') }}" 
                                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                    focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                    @error('address_line1') border-red-500 ring ring-red-500 ring-opacity-50 @enderror" required>
                                @error('address_line1')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="address_line2" class="block text-sm font-medium text-gray-300">
                                    Address Line 2 <span class="text-gray-400">(Optional)</span>
                                </label>
                                <input type="text" name="address_line2" id="address_line2" value="{{ old('address_line2') }}" 
                                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                    focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                    @error('address_line2') border-red-500 ring ring-red-500 ring-opacity-50 @enderror">
                                @error('address_line2')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                <div class="space-y-2">
                                    <label for="city" class="block text-sm font-medium text-gray-300">
                                        City <span class="text-purple-400">*</span>
                                    </label>
                                    <input type="text" name="city" id="city" value="{{ old('city') }}" 
                                        class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                        focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                        @error('city') border-red-500 ring ring-red-500 ring-opacity-50 @enderror" required>
                                    @error('city')
                                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="state" class="block text-sm font-medium text-gray-300">
                                        State <span class="text-purple-400">*</span>
                                    </label>
                                    <input type="text" name="state" id="state" value="{{ old('state') }}" 
                                        class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                        focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                        @error('state') border-red-500 ring ring-red-500 ring-opacity-50 @enderror" required>
                                    @error('state')
                                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="postal_code" class="block text-sm font-medium text-gray-300">
                                        Postal Code <span class="text-purple-400">*</span>
                                    </label>
                                    <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" 
                                        class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                        focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                        @error('postal_code') border-red-500 ring ring-red-500 ring-opacity-50 @enderror" required>
                                    @error('postal_code')
                                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Operating Hours -->
                    <fieldset class="space-y-6">
                        <legend class="text-xl font-semibold text-purple-300 border-b border-purple-500/30 pb-2 w-full">
                            Operating Hours
                        </legend>
                        
                        @error('operating_hours')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        
                        <div class="space-y-4">
                            @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                <div class="grid grid-cols-7 md:grid-cols-7 gap-4 items-center py-2 border-b border-gray-700 last:border-b-0">
                                    <div class="col-span-3 md:col-span-1">
                                        <span class="capitalize text-gray-300 font-medium">{{ $day }}</span>
                                    </div>
                                    <div class="col-span-2 md:col-span-3 space-y-1">
                                        <label for="{{ $day }}_open" class="block text-xs font-medium text-gray-400">Opening Time</label>
                                        <input type="time" name="operating_hours[{{ $day }}][open]" id="{{ $day }}_open" 
                                            value="{{ old('operating_hours.'.$day.'.open') }}" 
                                            class="block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                            focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                            @error('operating_hours.'.$day.'.open') border-red-500 ring ring-red-500 ring-opacity-50 @enderror" required>
                                        @error('operating_hours.'.$day.'.open')
                                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-2 md:col-span-3 space-y-1">
                                        <label for="{{ $day }}_close" class="block text-xs font-medium text-gray-400">Closing Time</label>
                                        <input type="time" name="operating_hours[{{ $day }}][close]" id="{{ $day }}_close" 
                                            value="{{ old('operating_hours.'.$day.'.close') }}" 
                                            class="block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                            focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                            @error('operating_hours.'.$day.'.close') border-red-500 ring ring-red-500 ring-opacity-50 @enderror" required>
                                        @error('operating_hours.'.$day.'.close')
                                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>

                    <!-- Amenities -->
                    <fieldset class="space-y-6">
                        <legend class="text-xl font-semibold text-purple-300 border-b border-purple-500/30 pb-2 w-full">
                            Amenities
                        </legend>
                        
                        @error('amenities')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-4 gap-x-6">
                            @foreach([
                                'cardio' => 'Cardio Equipment', 
                                'weights' => 'Free Weights', 
                                'pool' => 'Swimming Pool',
                                'sauna' => 'Sauna',
                                'classes' => 'Group Classes',
                                'personal_trainer' => 'Personal Trainer',
                                'locker' => 'Locker Rooms',
                                'shower' => 'Showers',
                                'wifi' => 'Wi-Fi',
                                'parking' => 'Parking',
                                'cafe' => 'Cafe/Juice Bar',
                                'towels' => 'Towel Service'
                            ] as $key => $label)
                                <div class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-700/50 transition-colors">
                                    <input type="checkbox" name="amenities[]" id="amenity_{{ $key }}" value="{{ $key }}" 
                                        {{ is_array(old('amenities')) && in_array($key, old('amenities')) ? 'checked' : '' }}
                                        class="h-5 w-5 text-purple-600 focus:ring-purple-500 border-gray-600 rounded-md transition-all">
                                    <label for="amenity_{{ $key }}" class="block text-sm text-gray-300">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>

                    <!-- Images -->
                    <fieldset class="space-y-6">
                        <legend class="text-xl font-semibold text-purple-300 border-b border-purple-500/30 pb-2 w-full">
                            Gym Images
                        </legend>
                        
                        @error('images')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        
                        @error('images.*')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        
                        <div x-data="imageUpload()" class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <label class="block w-full">
                                    <div class="flex flex-col items-center p-4 bg-gray-700/50 border-2 border-dashed border-gray-600 rounded-lg hover:border-purple-500 transition-all cursor-pointer">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-300">Click to select gym images</p>
                                        <p class="text-xs text-gray-400 mt-1">Upload high-quality photos of your facility</p>
                                        <input type="file" name="images[]" multiple accept="image/*" @change="handleImageSelection" class="hidden" required>
                                    </div>
                                </label>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4" id="image-preview">
                                <template x-for="(image, index) in previewImages" :key="index">
                                    <div class="relative group">
                                        <img :src="image.url" class="w-full h-40 object-cover rounded-lg border border-gray-700">
                                        <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                            <div class="flex items-center">
                                                <input type="radio" name="primary_image" :value="index" :checked="index === 0" class="h-5 w-5 text-purple-600">
                                                <span class="ml-2 text-white text-sm">Set as primary</span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Membership Plans -->
                    <fieldset class="space-y-6">
                        <legend class="text-xl font-semibold text-purple-300 border-b border-purple-500/30 pb-2 w-full">
                            Membership Plans
                        </legend>
                        
                        @error('membership_plans')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        
                        <div x-data="{ plans: {{ old('membership_plans') ? json_encode(old('membership_plans')) : '[{}]' }} }" class="space-y-6">
                            <template x-for="(plan, index) in plans" :key="index">
                                <div class="space-y-4 p-6 border border-gray-700 rounded-lg bg-gray-800/50 hover:bg-gray-800/80 transition-colors">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-md font-medium text-purple-300" x-text="plan.name ? plan.name : 'New Plan'"></h4>
                                        <div x-show="index > 0" class="flex justify-end">
                                            <button type="button" @click="plans.splice(index, 1)" class="inline-flex items-center px-2 py-1 text-sm rounded-md text-red-300 hover:bg-red-900/30 focus:outline-none transition-colors">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label :for="'plan_name_'+index" class="block text-sm font-medium text-gray-300">
                                                Plan Name <span class="text-purple-400">*</span>
                                            </label>
                                            <input type="text" :name="'membership_plans['+index+'][name]'" :id="'plan_name_'+index" :value="plan.name" 
                                                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                                focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all" required>
                                            <template x-if="Object.keys(errors).filter(key => key.startsWith('membership_plans.'+index+'.name')).length > 0">
                                                <p class="mt-1 text-sm text-red-400">Please enter a plan name</p>
                                            </template>
                                        </div>

                                        <div class="space-y-2">
                                            <label :for="'plan_duration_'+index" class="block text-sm font-medium text-gray-300">
                                                Duration <span class="text-purple-400">*</span>
                                            </label>
                                            <select :name="'membership_plans['+index+'][duration_days]'" :id="'plan_duration_'+index" 
                                                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                                focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all" required>
                                                <option value="1" :selected="plan.duration_days == 1">1 Day (Drop-in)</option>
                                                <option value="7" :selected="plan.duration_days == 7">7 Days (Weekly)</option>
                                                <option value="30" :selected="plan.duration_days == 30">30 Days (Monthly)</option>
                                                <option value="90" :selected="plan.duration_days == 90">90 Days (Quarterly)</option>
                                                <option value="180" :selected="plan.duration_days == 180">180 Days (Half Year)</option>
                                                <option value="365" :selected="plan.duration_days == 365">365 Days (Annual)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label :for="'plan_price_'+index" class="block text-sm font-medium text-gray-300">
                                                Regular Price <span class="text-purple-400">*</span>
                                            </label>
                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-400 sm:text-sm">$</span>
                                                </div>
                                                <input type="number" step="0.01" :name="'membership_plans['+index+'][price]'" :id="'plan_price_'+index" :value="plan.price" 
                                                    class="pl-7 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                                    focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all" required>
                                            </div>
                                            <template x-if="Object.keys(errors).filter(key => key.startsWith('membership_plans.'+index+'.price')).length > 0">
                                                <p class="mt-1 text-sm text-red-400">Please enter a valid price</p>
                                            </template>
                                        </div>

                                        <div class="space-y-2">
                                            <label :for="'plan_discount_price_'+index" class="block text-sm font-medium text-gray-300">
                                                Discount Price <span class="text-gray-400">(Optional)</span>
                                            </label>
                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-400 sm:text-sm">$</span>
                                                </div>
                                                <input type="number" step="0.01" :name="'membership_plans['+index+'][discount_price]'" :id="'plan_discount_price_'+index" :value="plan.discount_price" 
                                                    class="pl-7 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                                    focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            <button type="button" @click="plans.push({})" 
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md 
                                text-purple-100 bg-purple-800 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 
                                transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Another Plan
                            </button>
                        </div>
                    </fieldset>

                    <!-- Additional Information -->
                    <fieldset class="space-y-6">
                        <legend class="text-xl font-semibold text-purple-300 border-b border-purple-500/30 pb-2 w-full">
                            Additional Information
                        </legend>
                        
                        <div class="space-y-2">
                            <label for="google_maps_embed" class="block text-sm font-medium text-gray-300">
                                Google Maps Embed Code <span class="text-gray-400">(Optional)</span>
                            </label>
                            <textarea name="google_maps_embed" id="google_maps_embed" rows="2" 
                                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                @error('google_maps_embed') border-red-500 ring ring-red-500 ring-opacity-50 @enderror">{{ old('google_maps_embed') }}</textarea>
                            <p class="mt-1 text-xs text-gray-400">Paste your Google Maps embed code to help customers find your location</p>
                            @error('google_maps_embed')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="cancellation_policy" class="block text-sm font-medium text-gray-300">
                                Cancellation Policy <span class="text-gray-400">(Optional)</span>
                            </label>
                            <textarea name="cancellation_policy" id="cancellation_policy" rows="3" 
                                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm 
                                focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 transition-all
                                @error('cancellation_policy') border-red-500 ring ring-red-500 ring-opacity-50 @enderror">{{ old('cancellation_policy') }}</textarea>
                            <p class="mt-1 text-xs text-gray-400">Outline your gym's membership cancellation terms and conditions</p>
                            @error('cancellation_policy')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>
                </div>

                <!-- Sticky Submit Button -->
                <div class="sticky bottom-0 bg-gray-900/95 backdrop-blur p-4 border-t border-purple-500/20 shadow-lg rounded-b-lg flex justify-between items-center">
                    <div class="text-sm text-gray-400">
                        <span class="text-purple-400">*</span> Required fields
                    </div>
                    <button type="submit" 
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm 
                        text-white bg-purple-700 hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 
                        transition-all duration-150 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Register Gym
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add this script to the layout or at the end of the page -->
<script>
    function imageUpload() {
        return {
            previewImages: [],
            handleImageSelection(event) {
                const files = event.target.files;
                
                // Reset preview images
                this.previewImages = [];
                
                // Process each file
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();
                    
                    reader.onload = (e) => {
                        this.previewImages.push({
                            url: e.target.result,
                            name: file.name
                        });
                    };
                    
                    reader.readAsDataURL(file);
                }
            }
        }
    }
</script>

@endsection