<?php

namespace MSACommon\MSACommon\Facades;

use Illuminate\Support\Facades\Facade;

class MSACommon extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'msacommon';
    }
}
