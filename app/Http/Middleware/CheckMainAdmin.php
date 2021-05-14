<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMainAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   if (!$request->user()->isConfirmed()){
        return redirect()->route('request-confirm-email', $request->user());
    }
        return $next($request);
    }
}
