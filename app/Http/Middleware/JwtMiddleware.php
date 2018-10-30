<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Traits\Helper as Helper;
use App\Models\Users;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class JwtMiddleware
{
	use Helper;

	public function handle($request, Closure $next, $guard = null)
    {
        if (!$request->hasHeader('Authorization'))
        return Helper::withMessage([], 'Authorization Header not found', 401);

        $token = $request->bearerToken();

        if ($request->header('Authorization') == null || $token == null)
        return Helper::withMessage([], 'No Token provided', 401);

        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            return Helper::withMessage([], 'Token provided is expired', 400);
        } catch(Exception $e) {
            return Helper::withMessage([], 'Error occured while decoding token', 400);
        }
        
        $user = Users::find($credentials->sub);
        $request->auth = $user;
        return $next($request);
    }
}