<?php

namespace App\Http\Middleware;

use Closure;
use Crypt;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    static $app_key = "Travelial";

    public function handle($request, Closure $next)
    {

        if(Crypt::encrypt(self::$app_key) != $request->input("login_key")){
            //
            return Response::json(array('status' => 'Failed'));
        }


        return $next($request);
    }
}
