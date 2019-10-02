<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiRoles extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getAll() {
        $api = new ApiConsume(env('SIEP_AUTH_API'));
        $api->tokenHeader(ApiLogin::token());
        $params['page'] = request('users_page');
        $api->get("acl/role",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
    
    public function addRole($name) {
        $api = new ApiConsume(env('SIEP_AUTH_API'));
        $api->tokenHeader(ApiLogin::token());
        $params['name'] = $name;
        $api->post("acl/role",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function delRole($name) {
        $api = new ApiConsume(env('SIEP_AUTH_API'));
        $api->tokenHeader(ApiLogin::token());
        $params['name'] = $name;
        $api->delete("acl/role",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
   }
}