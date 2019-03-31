<?php
namespace MSACommon\MSACommon\Clients;

use GuzzleHttp\Client as Client;
use Illuminate\Support\Facades\Request;
use MSACommon\MSACommon\Common\ApiResponseCodesBook;
use MSACommon\MSACommon\Exceptions\APIException;

class MicroServiceClient
{
    /* @var $client Client*/
    private $client;

    public function __construct(string $baseUri) {
        $this->client = new Client(
            [
                'base_uri' => $baseUri
            ]
        );
    }

    public function request($verb,$uri,$headers = []){

        $token = '';
        if(Request::header('token')) $token = Request::header('token');
        if(session()->has('token')) $token = session()->get('token');

        if(!empty($token))$headers['headers']['token'] = $token;

        $sentRequest = $this->client->request(
            $verb,
            $uri,
            $headers
        );

        $response = json_decode($sentRequest->getBody()->getContents(),true);

        if($response['outComeCode'] === 3){
            if(session()->isStarted()){
                session()->remove('token');
                return redirect()->route('home');
            }

            throw new APIException(ApiResponseCodesBook::NOT_LOGGED_IN);

        }elseif($response['outComeCode'] !== 0){
            $error = \Illuminate\Validation\ValidationException::withMessages($response['errors']?:[]);
            throw $error;
        }




        return $response;
    }

}