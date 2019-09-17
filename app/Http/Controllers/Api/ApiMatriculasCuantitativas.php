<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiMatriculasCuantitativas extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getPorNivel($ciclo,$query=[])
    {
        $params = [
            'ciclo' => $ciclo
        ];

        $params = array_merge($params,$query);

        $api = new ApiConsume();
        $api->get("api/v1/matriculas/cuantitativa/por_nivel",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}