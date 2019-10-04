<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiMatriculasCuantitativas;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        $ciclo = request('ciclo');
        $estado_inscripcion = request('estado_inscripcion');
        if($ciclo==null) {
            $ciclo = 2019;
        }
        if($estado_inscripcion == null) {
            $estado_inscripcion = 'CONFIRMADA';
        }

        $token = ApiLogin::token();
        $user = ApiLogin::user();

        $queryPorNivel = compact('ciclo','estado_inscripcion');


        $apiCiclos = new ApiCiclos($token);
        $ciclos = $apiCiclos->getAll();
        $ciclos =  $ciclos['ciclos'];

        $apiMatCuantitativa = new ApiMatriculasCuantitativas($token);
        $matPorNivel = collect($apiMatCuantitativa->getPorNivel($queryPorNivel));

        return view('index',compact('ciclo','estado_inscripcion','ciclos','user','matPorNivel'));
    }
}
