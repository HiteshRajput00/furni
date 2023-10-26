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



    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

}
