<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::check()) {
        //     $me= Auth::user();
        //     if ($me->role != 1) {
        //         return redirect()->back();
        //     }
        // }
        if(Auth::user()->role !=2){
            abort(404);
        }
        return $next($request);
    }
}
