<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\GymOwner;

class GymOwnerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('gymowner.login')
                ->with('error', 'You need to login first.');
        }

        $user = Auth::user();
        $gymOwner = GymOwner::where('user_id', $user->id)->first();
        
        if ($gymOwner) {
            return $next($request);
        }

        return redirect()->route('gymowner.login')
            ->with('error', 'You don\'t have permission to access this page!');
    }
} 