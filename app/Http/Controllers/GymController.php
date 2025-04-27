<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\OperatingHour;
use App\Models\Amenity;
use App\Models\GymImage;
use App\Models\MembershipPlan;
use App\Models\GymAmenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class GymController extends Controller
{
    /**
     * Show the form for creating a new gym.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch amenities options to show in the form
        $amenities = Amenity::all();

        // Return the view with necessary data
        return view('gymowner.gym-registration', compact('amenities'));
    }

    /**
     * Store a newly created gym in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gym_type' => 'required|in:unisex,men_only,women_only',
            'description' => 'nullable|string',
            'contact_number' => 'required|string|max:15',
            'email' => 'nullable|email',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'operating_hours.*.open' => 'required|date_format:H:i',
            'operating_hours.*.close' => 'required|date_format:H:i',
            'amenities' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'primary_image' => 'nullable|in:1',  // Radio button for primary image
            'membership_plans.*.name' => 'required|string|max:255',
            'membership_plans.*.duration_days' => 'required|in:1,7,30,90,180,365',
            'membership_plans.*.price' => 'required|numeric|min:0',
            'membership_plans.*.discount_price' => 'nullable|numeric|min:0',
            'google_maps_embed' => 'nullable|string',
            'cancellation_policy' => 'nullable|string',
        ]);

        // Start a transaction to ensure all data is saved properly
        DB::beginTransaction();
        Log::info("Started transaction");
        try {
            // Create the gym record
            $gym = Gym::create([
                'name' => $validated['name'],
                'gym_type' => $validated['gym_type'],
                'description' => $validated['description'],
                'contact_number' => $validated['contact_number'],
                'email' => $validated['email'],
                'address_line1' => $validated['address_line1'],
                'address_line2' => $validated['address_line2'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'postal_code' => $validated['postal_code'],
                'google_maps_embed' => $validated['google_maps_embed'],
                'cancellation_policy' => $validated['cancellation_policy'],
            ]);

            // Store operating hours
            foreach ($validated['operating_hours'] as $day => $hours) {
                OperatingHour::create([
                    'gym_id' => $gym->id,
                    'day_of_week' => ucfirst($day),
                    'open_time' => $hours['open'],
                    'close_time' => $hours['close'],
                ]);
            }

            // Store amenities (if selected)
            if ($request->has('amenities')) {
                $selectedAmenities = $request->input('amenities');
                $amenityIds = [];
                
                // Find or create amenities based on the names/keys from the form
                foreach ($selectedAmenities as $amenityName) {
                    $amenity = Amenity::firstOrCreate(['name' => $amenityName]);
                    $amenityIds[] = $amenity->id;
                }
                
                // Attach the amenities to the gym
                $gym->amenities()->attach($amenityIds);
            }

            // Handle image uploads and store gym images
            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePaths[] = $image->store('gym_images');
                }
                // Store images in the GymImage model
                foreach ($imagePaths as $imagePath) {
                    GymImage::create([
                        'gym_id' => $gym->id,
                        'image_url' => $imagePath,
                        'is_primary' => false,  // Set primary image flag later if needed
                    ]);
                }

                // Set primary image
                if ($request->has('primary_image')) {
                    GymImage::where('gym_id', $gym->id)->first()->update(['is_primary' => true]);
                }
            }

            // Store membership plans
            foreach ($validated['membership_plans'] as $plan) {
                MembershipPlan::create([
                    'gym_id' => $gym->id,
                    'plan_name' => $plan['name'],
                    'duration_days' => $plan['duration_days'],
                    'price' => $plan['price'],
                    'discount_price' => $plan['discount_price'] ?? null,
                ]);
            }

            // Commit the transaction
            DB::commit();
            Log::info("Transaction committed");

            return redirect()->route('gymowner.dashboard')->with('success', 'Gym registered successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();
            Log::error("Transaction rolled back: " . $e->getMessage());
            return back()->with('error', 'Failed to register gym. Please try again.');
        }
    }

    /**
     * Display a list of all gyms.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gyms = Gym::all();
        return view('gyms.index', compact('gyms'));
    }

    /**
     * Display the specified gym details.
     *
     * @param  \App\Models\Gym  $gym
     * @return \Illuminate\Http\Response
     */
    public function show(Gym $gym)
    {
        return view('gyms.show', compact('gym'));
    }

    /**
     * Show the form for editing the specified gym.
     *
     * @param  \App\Models\Gym  $gym
     * @return \Illuminate\Http\Response
     */
    public function edit(Gym $gym)
    {
        $amenities = Amenity::all();
        return view('gyms.edit', compact('gym', 'amenities'));
    }

    /**
     * Update the specified gym in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gym  $gym
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gym $gym)
    {
        // Validation rules (same as store method)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gym_type' => 'required|in:unisex,men_only,women_only',
            'description' => 'nullable|string',
            'contact_number' => 'required|string|max:15',
            'email' => 'nullable|email',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'operating_hours.*.open' => 'required|date_format:H:i',
            'operating_hours.*.close' => 'required|date_format:H:i',
            'amenities' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'primary_image' => 'nullable|in:1',  // Radio button for primary image
            'membership_plans.*.name' => 'required|string|max:255',
            'membership_plans.*.duration_days' => 'required|in:1,7,30,90,180,365',
            'membership_plans.*.price' => 'required|numeric|min:0',
            'membership_plans.*.discount_price' => 'nullable|numeric|min:0',
            'google_maps_embed' => 'nullable|string',
            'cancellation_policy' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Update gym information
            $gym->update([
                'name' => $validated['name'],
                'gym_type' => $validated['gym_type'],
                'description' => $validated['description'],
                'contact_number' => $validated['contact_number'],
                'email' => $validated['email'],
                'address_line1' => $validated['address_line1'],
                'address_line2' => $validated['address_line2'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'postal_code' => $validated['postal_code'],
                'google_maps_embed' => $validated['google_maps_embed'],
                'cancellation_policy' => $validated['cancellation_policy'],
            ]);

            // Update amenities
            if ($request->has('amenities')) {
                $selectedAmenities = $request->input('amenities');
                $amenityIds = [];
                
                // Find or create amenities based on the names/keys from the form
                foreach ($selectedAmenities as $amenityName) {
                    $amenity = Amenity::firstOrCreate(['name' => $amenityName]);
                    $amenityIds[] = $amenity->id;
                }
                
                // Sync the amenities (detach old ones, attach new ones)
                $gym->amenities()->sync($amenityIds);
            } else {
                // If no amenities selected, detach all
                $gym->amenities()->detach();
            }

            // Update operating hours, images, and membership plans (similar to store method)
            // Code omitted for brevity, follow similar approach as in `store`

            DB::commit();

            return redirect()->route('gym.index')->with('success', 'Gym information updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to update gym. Please try again.');
        }
    }

    /**
     * Remove the specified gym from storage.
     *
     * @param  \App\Models\Gym  $gym
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gym $gym)
    {
        $gym->delete();
        return redirect()->route('gym.index')->with('success', 'Gym deleted successfully!');
    }
}
