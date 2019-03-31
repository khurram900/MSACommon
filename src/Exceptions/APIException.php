<?php
namespace MSACommon\MSACommon\Exceptions;

use Exception;
use Throwable;

class APIException extends Exception
{
    public $outComeCode = '';
    public $outCome = '';
    public $errors = [];

    public function __construct(array $outcomeArray,$message = '')
    {
        $this->outComeCode = $outcomeArray['outcomeCode'];
        $this->outCome = $outcomeArray['outCome'];

        parent::__construct($message, $outcomeArray['outcomeCode'], null);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
        return $this;
    }





}