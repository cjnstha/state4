<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

/**
 * Class RouteNeedsRole.
 */
class RouteNeedsPermission
{
    /**
     * @param $request
     * @param Closure $next
     * @param $permission
     * @param bool $needsAll
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $permission, $needsAll = false)
    {
        /*
         * Permission array
         */
        if (strpos($permission, ';') !== false) {
            $permissions = explode(';', $permission);
            $access = Auth::user()->allowMultiple($permissions, ($needsAll === 'true' ? true : false));
        } else {
            /**
             * Single permission.
             */
            $access = Auth::user()->can($permission);
        }

        if (! $access) {
            abort(404);
        }

        return $next($request);
    }
}
