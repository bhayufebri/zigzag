<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CekAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return json_encode($request);
        $user = Auth::user();
    if($user->permissions === 'admin') {
        return $next($request);
    }

    return redirect('/customer/index');
    }
}
