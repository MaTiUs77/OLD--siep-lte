<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiPermisos extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    // Comuncacion con resource Auth API
    public function getAll() {
        $api = new ApiConsume(env('SIEP_AUTH_API'));
        $api->tokenHeader(ApiLogin::token());
        $params = [];
        $api->get("acl/permission",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}