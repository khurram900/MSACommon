<?php

namespace MSACommon\MSACommon\Services;

use Illuminate\Foundation\Auth\User;
use MSACommon\MSACommon\Common\ApiResponseCodesBook;
use MSACommon\MSACommon\Exceptions\APIException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    public function getUser($token){
        try{
            JWTAuth::setToken($token);
            $payload = JWTAuth::getPayload()->toArray();
            $user = User::find($payload['user_id']);
            if(!$user)throw new APIException(ApiResponseCodesBook::NOT_LOGGED_IN);

        }catch (\Exception $exception){
            throw new APIException(ApiResponseCodesBook::NOT_LOGGED_IN);
        }

        return $user;
        
    }

}