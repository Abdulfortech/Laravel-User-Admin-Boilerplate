<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check user status and verification status
            $user = auth()->user();

            if ($user->status == 'Active') {                
                return $next($request);
            } else {
                // Redirect to verify page with a message if the conditions are not met
                return redirect('/auth/signin')->with('message', 'You are not active. Contact admin.');
            }
        }

        // Redirect to verify page if the user is not authenticated
        return redirect('auth/signin')->with('message', 'You are not authenticated.');
    }
}
