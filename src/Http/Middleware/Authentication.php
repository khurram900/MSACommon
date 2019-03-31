<?php

namespace MSACommon\MSACommon\Http\Middleware;

use App\Services\AuthService;
use Closure;
use Auth;
use MSACommon\MSACommon\Common\ApiResponseCodesBook;
use MSACommon\MSACommon\Exceptions\APIException;
use MSACommon\MSACommon\Services\AuthUserService;
use View;

class Authentication
{
    /* @var $authUserService AuthUserService*/
    private $authUserService;

    public function __construct(AuthUserService $authUserService){
        $this->authUserService = $authUserService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!request()->header('token')) {
            throw new APIException(ApiResponseCodesBook::NOT_LOGGED_IN);
        }

        $user = $this->authUserService->getUser();

        $request->request->add([
            'user' => $user
        ]);

        return $next($request);
    }
}
