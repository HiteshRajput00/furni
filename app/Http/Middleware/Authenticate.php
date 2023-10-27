<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
//     protected function redirectTo(Request $request): ?string
//     {
//         if (auth()->attempt([ 'role' => 'user'])) {
//             // User login successful, use the 'web' guard
//             return redirect()->intended('/');
//         } elseif (auth()->attempt([ 'role' => 'admin'])) {
//             // Admin login successful, use the 'admin' guard
//             return redirect()->intended('/home');
//         } else {
//             // Login failed
//             return back()->withErrors(['email' => 'Invalid credentials']);
//         }
//     return $request->expectsJson() ? null : route('index');
// }
// }



public function handle($request, Closure $next, ...$guard)
{
    


    // Check if the user is authenticated using the specified guard
    if (Auth::guard($guard)->check()) {
        // User is authenticated, continue with the request
        return $next($request);
    }

    // User is not authenticated for the specified guard
    if ($guard === 'admin') {
        return redirect()->route('admin.login'); // Redirect to admin login
    } elseif ($guard === 'user') {
        return redirect()->route('user.login'); // Redirect to user login
    }

    // Handle other cases as needed (e.g., redirect to a default login page)
    return redirect()->route('login');
}

}
