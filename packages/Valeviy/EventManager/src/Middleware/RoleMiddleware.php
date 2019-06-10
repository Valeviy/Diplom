<?php

namespace Valeviy\EventManager\Middleware;
use Closure;

class RoleMiddleware
{

    public function handle($request, Closure $next, $role, $permission = null)
    {
        if(is_null($request->user())){
            abort(404);
        }

        if(!$request->user()->hasRole($role)) {
            abort(404);
        }
        if($permission !== null && !$request->user()->can($permission)) {
            abort(404);
        }
        return $next($request);
    }
}