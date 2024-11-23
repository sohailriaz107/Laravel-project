<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           // Check if the logged-in user is an admin
           if(auth()->user() && auth()->user()->role==='Admin')
           if (auth()->user() && auth()->user()->role === 'Admin') {
            return $next($request); // Allow access to the admin
        }

        // If not admin, deny access or redirect
        return redirect('/')->with('error', 'Unauthorized access.');
       
    }
}
