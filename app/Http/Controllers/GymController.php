<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'contact_phone' => 'required|string',
            'email' => 'nullable|email',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i',
            'day_pass_price' => 'required|numeric',
        ]);

        Gym::create([
            ...$validatedData,
            'owner_id' => 1 // Assuming a default owner for now
        ]);

        return redirect()->route('home')->with('success', 'Gym registered successfully!');
    }
}
