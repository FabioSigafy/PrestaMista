<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
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
        $user = User::all();

        if(Auth::check()){
            if(Auth::user()->user_master){
                return $next($request);
            }else{
                return redirect(route('forms.index'));
            }
        }else if(!$user->count()){
            return $next($request);
        }else{
            return redirect(route('login'));
        }
    }
}
