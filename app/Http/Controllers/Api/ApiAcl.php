<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class ApiAcl extends Controller
{
    public $token;

    public function __construct()
    {
        $this->token = session('token');
    }

    public function index() {
        $roles = $this->getRoles();
        $permisos = $this->getPermisos();
        $users = $this->getUsers(request('page'));

        return view('acl.index',compact('users','roles','permisos'));
    }

    public function createRoles() {
        $response = $this->addRoles(request('name'));
        if(isset($response['error'])) {
            return redirect(route('admin'))->withErrors(['admin.api.error'=>$response['error']]);
        } else {
            return redirect()->back();
        }
    }

    private function getUsers($pagina=null) {
        $authRoute = env('SIEP_AUTH_API').'/users';
        $params = [
            'token' => $this->token
        ];

        if($pagina!=null) {
            $params['page'] = $pagina;
        }

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

    private function getPermisos() {
        $authRoute = env('SIEP_AUTH_API').'/permission';
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

    private function getRoles() {
        $authRoute = env('SIEP_AUTH_API').'/role';
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

    private function addRoles($name) {
        $authRoute = env('SIEP_AUTH_API').'/role';
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

    private function deleteRole($id) {
        $authRoute = env('SIEP_AUTH_API').'/role';
        $params = [
            'token' => $this->token,
            'id' => $id
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
}