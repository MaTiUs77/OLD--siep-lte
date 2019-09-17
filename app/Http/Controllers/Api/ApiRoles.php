<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class ApiRoles extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getAll() {
        $authRoute = env('SIEP_AUTH_API').'/acl/role';
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
    
    public function addRole($name) {
        $authRoute = env('SIEP_AUTH_API').'/acl/role';
        $params = [
            'token' => $this->token,
            'name' => $name
        ];
        try {
            $guzzle = new Client();
            $consumeApi = $guzzle->request('post',$authRoute,['query' => $params]);

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
    public function delRole($id) {
        $authRoute = env('SIEP_AUTH_API').'/acl/role';
        $params = [
            'token' => $this->token,
            'id' => $id
        ];
        try {
            $guzzle = new Client();
            $consumeApi = $guzzle->request('destroy',$authRoute,['query' => $params]);

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