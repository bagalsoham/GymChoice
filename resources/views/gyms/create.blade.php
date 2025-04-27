@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-6">Register Your Gym</h2>

                <form action="{{ route('gyms.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Basic Information -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Basic Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gym Name</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>

                            <div>
                                <label for="gym_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gym Type</label>
                                <select name="gym_type" id="gym_type" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="unisex">Unisex</option>
                                    <option value="men_only">Men Only</option>
                                    <option value="women_only">Women Only</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Contact Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="contact_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact Number</label>
                                <input type="tel" name="contact_number" id="contact_number" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email (Optional)</label>
                                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Address</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="address_line1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address Line 1</label>
                                <input type="text" name="address_line1" id="address_line1" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>

                            <div>
                                <label for="address_line2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address Line 2 (Optional)</label>
                                <input type="text" name="address_line2" id="address_line2" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                                    <input type="text" name="city" id="city" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                </div>

                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300">State</label>
                                    <input type="text" name="state" id="state" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                </div>

                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Postal Code</label>
                                    <input type="text" name="postal_code" id="postal_code" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Operating Hours -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Operating Hours</h3>
                        
                        @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                                <div class="capitalize">{{ $day }}</div>
                                <div>
                                    <label for="{{ $day }}_open" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Opening Time</label>
                                    <input type="time" name="operating_hours[{{ $day }}][open]" id="{{ $day }}_open" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                </div>
                                <div>
                                    <label for="{{ $day }}_close" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Closing Time</label>
                                    <input type="time" name="operating_hours[{{ $day }}][close]" id="{{ $day }}_close" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Amenities -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Amenities</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach($amenities as $key => $label)
                                <div class="flex items-center">
                                    <input type="checkbox" name="amenities[]" id="amenity_{{ $key }}" value="{{ $key }}" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="amenity_{{ $key }}" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Images -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Gym Images</h3>
                        
                        <div x-data="imageUpload()" class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <label class="block">
                                    <span class="sr-only">Choose gym images</span>
                                    <input type="file" multiple accept="image/*" @change="handleImageSelection" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                                </label>
                            </div>

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4" id="image-preview">
                                <template x-for="(image, index) in previewImages" :key="index">
                                    <div class="relative group">
                                        <img :src="image.url" class="w-full h-40 object-cover rounded-lg">
                                        <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                            <input type="radio" :name="'primary_image'" :value="index" :checked="index === 0" class="h-5 w-5">
                                            <span class="ml-2 text-white text-sm">Set as primary</span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Membership Plans -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Membership Plans</h3>
                        
                        <div x-data="{ plans: [{}] }" class="space-y-6">
                            <template x-for="(plan, index) in plans" :key="index">
                                <div class="space-y-4 p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label :for="'plan_name_'+index" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Plan Name</label>
                                            <input type="text" :name="'membership_plans['+index+'][name]'" :id="'plan_name_'+index" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                        </div>

                                        <div>
                                            <label :for="'plan_duration_'+index" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Duration (Days)</label>
                                            <select :name="'membership_plans['+index+'][duration_days]'" :id="'plan_duration_'+index" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                                <option value="1">1 Day</option>
                                                <option value="7">7 Days</option>
                                                <option value="30">30 Days</option>
                                                <option value="90">90 Days</option>
                                                <option value="180">180 Days</option>
                                                <option value="365">365 Days</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label :for="'plan_price_'+index" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                                            <input type="number" step="0.01" :name="'membership_plans['+index+'][price]'" :id="'plan_price_'+index" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                        </div>

                                        <div>
                                            <label :for="'plan_discount_price_'+index" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Discount Price (Optional)</label>
                                            <input type="number" step="0.01" :name="'membership_plans['+index+'][discount_price]'" :id="'plan_discount_price_'+index" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        </div>
                                    </div>

                                    <div x-show="index > 0" class="flex justify-end">
                                        <button type="button" @click="plans.splice(index, 1)" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Remove Plan
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <button type="button" @click="plans.push({})" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add Another Plan
                            </button>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Additional Information</h3>
                        
                        <div>
                            <label for="google_maps_embed" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Google Maps Embed Code (Optional)</label>
                            <textarea name="google_maps_embed" id="google_maps_embed" rows="2" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            <p class="mt-1 text-sm text-gray-500">Paste your Google Maps embed code here</p>
                        </div>

                        <div>
                            <label for="cancellation_policy" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cancellation Policy (Optional)</label>
                            <textarea name="cancellation_policy" id="cancellation_policy" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Register Gym
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function imageUpload() {
        return {
            previewImages: [],
            handleImageSelection(event) {
                const files = event.target.files;
                this.previewImages = [];
                
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();
                    
                    reader.onload = (e) => {
                        this.previewImages.push({
                            url: e.target.result,
                            file: file
                        });
                    };
                    
                    reader.readAsDataURL(file);
                }
            }
        }
    }
</script>
@endpush 