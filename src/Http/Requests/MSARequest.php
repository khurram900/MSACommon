<?php

namespace MSACommon\MSACommon\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use MSACommon\MSACommon\Common\ApiResponseCodesBook;
use MSACommon\MSACommon\Exceptions\APIException;

class MSARequest extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {
        $preparedErrors = [];
        msacommon_convertErrorBagToCompaitableArray($preparedErrors,$this->getValidatorInstance()->errors()->toArray());
        throw (new APIException(ApiResponseCodesBook::FORM_VALIDATION_ERROR))->setErrors($preparedErrors);

    }
}
