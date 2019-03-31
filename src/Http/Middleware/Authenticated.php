<?php

namespace MSACommon\MSACommon\Http\Middleware;


use Closure;
use MSACommon\MSACommon\Common\ApiResponseCodesBook;
use MSACommon\MSACommon\Exceptions\APIException;
use MSACommon\MSACommon\Services\AuthService;

class Authenticated
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
        $authService = resolve(AuthService::class);

        if(!$request->header('token')){
            throw new APIException(ApiResponseCodesBook::NOT_LOGGED_IN);
        }

        $token = $request->header('token');
        $user = $authService->getUser($token);

        $request->request->add([
            'user' => $user
        ]);

        return $next($request);
    }

}
