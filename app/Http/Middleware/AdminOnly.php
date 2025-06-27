<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jeśli nie jest zalogowany lub nie jest administratorem ZROBIĆ TO
        if (! Auth::check() || ! Auth::user()->is_admin) {
            return redirect('/')
                ->with('error', 'Ups, to tylko dla wtajemniczonych 👑 — nie jesteś administratorem!');
        }

        // inaczej – kontynuuj
        return $next($request);
    }
}
