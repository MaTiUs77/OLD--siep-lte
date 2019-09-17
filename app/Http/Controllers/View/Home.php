<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiMatriculasCuantitativas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class Home extends Controller
{
    public function index()
    {
        $ciclo = 2019;

        $token = ApiLogin::token();
        $user = ApiLogin::user();

        $api = new ApiMatriculasCuantitativas($token);

        $matPorNivel = collect($api->getPorNivel($ciclo));

        return view('index',compact('ciclo','user','matPorNivel'));
    }
}
