<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    protected $redirectTo = '/403'; // Chuyển hướng đến URL bạn muốn

    public function handle(Request $request, Closure $next, $role, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            return redirect()->guest(route('login'));
        }

        if (!$request->user()->hasRole($role)) {
            return redirect($this->redirectTo); // Chuyển hướng đến trang bạn muốn
        }

        return $next($request);
    }
}
