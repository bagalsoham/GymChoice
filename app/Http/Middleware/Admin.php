<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')
                ->with('error', 'You need to login first.');
        }

        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        return redirect()->route('admin.login')
            ->with('error', 'You dont have permission to access this page!');
    }
}
