<?php

namespace Backpack\Base\app\Http\Middleware;

use Closure;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (backpack_auth()->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response(trans('backpack::base.unauthorized'), 401);
            } else {
                return redirect()->guest(backpack_url('login'));
            }
        }else{
            if(\Auth::user()->rolesBDSRoleName() == ROLE_NAME_ADMIN || \Auth::user()->rolesBDSRoleName() == ROLE_NAME_MANAGER) {
                return $next($request);
            }
        }
        return response(view('errors.403'));
    }
}
