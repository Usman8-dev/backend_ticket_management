<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // echo "<h1>you enter middle ware </h1>";
        // dd(Auth::user()->role);

        
      // Check if user is authenticated
      if (!Auth::check()) {
        return redirect()->route('loginForm')->with('error', 'Please login to access this page.');
    }

    $user = Auth::user();

    // Check if user's role matches the required role
    if ($user->role === $role) {
        return $next($request);
    }

    // Redirect based on user role
    if ($user->role === 'customer') {
        return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
    }

    if ($user->role === 'admin') {
        return redirect()->route('admindashboard')->with('error', 'You do not have permission to access this page.');
    }

    // Fallback for unexpected roles
    return redirect()->route('welcome')->with('error', 'Invalid role. Please contact support.');
        

    }
}
