<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class checkUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
         
        if ($request->user()->permission[$role])
        {
            return $next($request);
        }

        return response('not authorize', 401);
    }
}
