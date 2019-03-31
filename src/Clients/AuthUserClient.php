<?php
/**
 * Created by PhpStorm.
 * User: DOT
 * Date: 4/1/2019
 * Time: 2:12 AM
 */

namespace MSACommon\MSACommon\Clients;


class AuthUserClient extends MicroServiceClient
{

    public function __construct()
    {
        parent::__construct(Config::get('microservices-end-points.auth'));
    }

    public function getUser()
    {
        return $this->request('GET', 'user');
    }
    
}