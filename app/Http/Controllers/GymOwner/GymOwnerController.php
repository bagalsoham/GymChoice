<?php

namespace App\Http\Controllers\GymOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::guard('gymowner')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('gymowner.dashboard');
        } else {
            return redirect()->back()->withErrors(['Invalid email or password.']);
        }
    }

    public function dashboard()
    {
        return view('gymowner.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('gymowner')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('gymowner.login');
    }
} 