<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class ApiPermisos extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    // Comuncacion con resource Auth API
    public function getAll() {
        $authRoute = env('SIEP_AUTH_API').'/acl/permission';
        $params = [
            'token' => $this->token
        ];

        try {
            $guzzle = new Client();
            $consumeApi = $guzzle->request('get',$authRoute,['query' => $params]);

            // Obtiene el contenido de la respuesta, la transforma a json
            $content = $consumeApi->getBody()->getContents();
            $req = json_decode($content,true);
        } catch (BadResponseException $ex) {
            $content = $ex->getResponse();
            $error = json_decode($content->getBody(), true);
            return $error;
        }

        return $req;
    }
}