<?php

namespace App\Http\Middleware;

use Closure;

class CekStatus
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
        $user = \App\User::where('email', $request->email)->first();
        if ($user->status == 'admin') {
            return redirect('/home');
        } elseif ($user->status == 'customer') {
            return redirect('/checkout');
        }
        return $next($request);
    }
}
