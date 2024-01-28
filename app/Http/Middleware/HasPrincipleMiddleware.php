<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Principle;
use Illuminate\Http\Request;

class HasPrincipleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Principle::count()>0)
        {
            return redirect()->route('admin.principles');
        }
        return $next($request);
    }
}
