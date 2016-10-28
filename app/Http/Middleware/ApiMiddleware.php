<?php

namespace App\Http\Middleware;

use Closure;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Mockery\Exception;
use Response;

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

        try{
            $key = Crypt::decrypt($request->input("app_key"));

            if(self::$app_key != $key){
                return Response::json(
                    array(
                        'status' => 'Failed',
                        'reason' => 'this app_key is incorrect',
                    )
                );
            }

        }catch (DecryptException $e){
            return Response::json(
                array(
                    'status' => 'Failed',
                    'reason' => 'this app_key is incorrect',
                )
            );
        }

        return $next($request);
    }
}
