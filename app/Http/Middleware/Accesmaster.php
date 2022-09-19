<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\RegisterController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Accesmaster
{
    /**
     * Handle an incoming request.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     *
     */

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->master == 1)

            return $next($request);

        else {
            if (!Auth::user())

                return redirect('register');
        }
    }
}
