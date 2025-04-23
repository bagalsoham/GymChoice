<?php

namespace App\Http\Controllers\GymOwner;

use App\Http\Controllers\Controller;
use App\Models\GymOwner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class GymOwnerController extends Controller
{
    public function login()
    {
        return view('gymowner.login');    
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check if the authenticated user is a gym owner
            $gymOwner = GymOwner::where('user_id', $user->id)->first();
            
            if (!$gymOwner) {
                Auth::logout();
                return redirect()->back()->withErrors(['This account is not registered as a gym owner.']);
            }
            
            $request->session()->regenerate();
            return redirect()->route('gymowner.dashboard');
        } else {
            return redirect()->back()->withErrors(['Invalid email or password.']);
        }
    }

    public function dashboard()
    {
        $user = Auth::user();
        $gymOwner = GymOwner::where('user_id', $user->id)->first();
        
        return view('gymowner.dashboard', compact('gymOwner'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('gymowner.login');
    }

    public function showRegistrationForm()
    {
        return view('gymowner.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'business_name' => ['required', 'string', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:20', 'regex:/^[6-9]\d{9}$/'], // Indian mobile format
            'bank_account_number' => ['nullable', 'string', 'regex:/^[0-9]{9,18}$/'], // Indian bank account format
            'tax_id' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create the user first
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Then create the gym owner record
        GymOwner::create([
            'user_id' => $user->id,
            'business_name' => $request->business_name,
            'contact_phone' => $request->contact_phone,
            'bank_account_number' => $request->bank_account_number,
            'tax_id' => $request->tax_id,
            'is_verified' => false,
        ]);

        event(new Registered($user));
        
        Auth::login($user);

        return redirect()->route('gymowner.dashboard');
    }
} 