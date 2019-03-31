<?php

namespace MSACommon\MSACommon\Common;

class ApiResponseCodesBook
{

    const SUCCESS = [
        'outcomeCode' => '0',
        'outCome' => 'SUCCESS'
    ];

    const FORM_VALIDATION_ERROR = [
        'outcomeCode' => '1',
        'outCome' => 'FORM_VALIDATION_ERROR'
    ];

    const RECORD_NOT_FOUND = [
        'outcomeCode' => '2',
        'outCome' => 'RECORD_NOT_FOUND'
    ];

    const NOT_LOGGED_IN = [
        'outcomeCode' => '3',
        'outCome' => 'NOT_LOGGED_IN'
    ];

    const ADMIN_ACCESS_ONLY = [
        'outcomeCode' => '4',
        'outCome' => 'ADMIN_ACCESS_ONLY'
    ];



}