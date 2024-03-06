<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): mixed
    {
        $user = $request->user();
        if (!$user || !in_array($user->role, $roles)) {
            Log::warning('Unauthorized access. User role: ' . ($user ? $user->role : 'Guest'));
            return redirect()->route('login');
        }
        return $next($request);
    }
}
