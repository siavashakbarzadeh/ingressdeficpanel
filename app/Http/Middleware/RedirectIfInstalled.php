<?php

namespace FleetCart\Http\Middleware;

use Closure;

class RedirectIfInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return redirect()->route('home');
        /*if (config('app.installed')) {
            return redirect()->route('home');
        }

        return $next($request);*/
    }
}
