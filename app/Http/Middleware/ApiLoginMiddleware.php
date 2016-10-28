<?php

namespace App\Http\Middleware;

use Closure;
use Response;
use App\User;

class ApiLoginMiddleware
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

        $key = $request->input("login_key");

        $user = User::where('login_key',$key)->first();

        if(!isset($user)){
            return Response::json(
                array(
                    'status' => 'Failed',
                    'reason' => 'this login_key is incorrect',
                )
            );
        }

        return $next($request);
    }
}
