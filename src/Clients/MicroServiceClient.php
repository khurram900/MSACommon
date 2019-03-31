<?php
namespace MSACommon\MSACommon\Clients;

use GuzzleHttp\Client as Client;

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

        if(session()->has('token')) {
            $headers['headers']['token'] = session()->get('token');
        }

        $sentRequest = $this->client->request(
            $verb,
            $uri,
            $headers
        );

        $response = json_decode($sentRequest->getBody()->getContents(),true);

        if($response['outComeCode'] === 3){
            session()->remove('token');
            return redirect()->route('home');
        }elseif($response['outComeCode'] !== 0){
            $error = \Illuminate\Validation\ValidationException::withMessages($response['errors']?:[]);
            throw $error;
        }




        return $response;
    }

}