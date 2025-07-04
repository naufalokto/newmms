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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        // Lewatkan jika sedang menuju route tertentu seperti /login atau /register
        if (in_array($request->path(), ['login', 'register'])) {
            return $next($request);
        }

        if (!$user) {
            // Jika belum login, redirect ke login
            return redirect('/login')->withErrors(['username' => 'Silakan login terlebih dahulu.']);
        }

        if (!in_array($user->peran, $roles)) {
            // Jika peran tidak sesuai, tampilkan error 403
            abort(403, 'Akses tidak diizinkan.');
        }

        return $next($request);
    }
}
