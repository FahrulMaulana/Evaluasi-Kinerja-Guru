<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$level): Response
{
    $cekuser = Auth::user();

    if ($cekuser == null) {
        return redirect('/login');
    }

    if (in_array($cekuser->level, $level)) {
        return $next($request);
    }
    return redirect('/login');
}

}
