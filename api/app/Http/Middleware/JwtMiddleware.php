<?php

namespace App\Http\Middleware;

use App\Helper\Tools;
use App\Helper\Utils;
use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
        if($guard != null)
            auth()->shouldUse($guard);

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                $responseData  = Utils::setResponse(true,'invalid_token','');
                return response()->json($responseData);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                $responseData  = Utils::setResponse(true,'token_expired','');
                return response()->json($responseData);
            }else{
                $responseData  = Utils::setResponse(true,'authorization_token_not_found','');
                return response()->json($responseData);
            }
        }
        return $next($request);
    }
}
