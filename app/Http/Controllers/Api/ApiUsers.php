<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class ApiUsers extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getAll()
    {
        $authRoute = env('SIEP_AUTH_API') . '/acl/users';
        $params = [
            'token' => $this->token
        ];

        $pagina = request('pagina');
        if (is_numeric($pagina)) {
            $params['page'] = $pagina;
        }

        try {
            $guzzle = new Client();
            $consumeApi = $guzzle->request('get', $authRoute, ['query' => $params]);

            // Obtiene el contenido de la respuesta, la transforma a json
            $content = $consumeApi->getBody()->getContents();
            $req = json_decode($content, true);
        } catch (BadResponseException $ex) {
            $content = $ex->getResponse();
            $error = json_decode($content->getBody(), true);
            return $error;
        }

        return $req;
    }
}