<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, ...$roles)
    // {
    //     $user = Auth::user();

    //     if (!$user) {
    //         return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
    //     }

    //     if (!in_array($user->role, $roles)) {
    //         abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    //     }

    //     return $next($request);
    // }
}