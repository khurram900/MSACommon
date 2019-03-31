<?php

namespace MSACommon\MSACommon\Common;

class ApiResponse
{
    private $outComeCode = ApiResponseCodesBook::SUCCESS['outcomeCode'];
    private $outCome = ApiResponseCodesBook::SUCCESS['outCome'];
    private $results = [];
    private $errors = [];
    private $message = '';

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }


    /**
     * @return int
     */
    public function getOutComeCode(): int
    {
        return $this->outComeCode;
    }

    /**
     * @param int $outComeCode
     */
    public function setOutComeCode(int $outComeCode)
    {
        $this->outComeCode = $outComeCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getOutCome(): string
    {
        return $this->outCome;
    }

    /**
     * @param int $outCome
     */
    public function setOutCome(string $outCome)
    {
        $this->outCome = $outCome;
        return $this;
    }

    public function setOutComeArray(array $outComeArray){
        $this->setOutCome($outComeArray['outCome']);
        $this->setOutComeCode($outComeArray['outcomeCode']);
    }

    /**
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param array $results
     */
    public function setResults(array $results)
    {
        $this->results = $results;
        return $this;
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

    public function toArray()
    {

        return [
            'outComeCode' => $this->getOutComeCode(),
            'outCome' => $this->getOutCome(),
            'results' => $this->getResults()?:new \stdClass(),
            'errors' => $this->getErrors()?:new \stdClass(),
            'message' => $this->getMessage(),
        ];
    }

    public function __toString()
    {
        return json_encode($this->toArray());
    }


}