<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiPases;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Pases extends Controller
{
    public function index()
    {
        $ciclo = Carbon::now()->year;

        if(request('ciclo')) {
            $ciclo =  request('ciclo');
        }

        $params = request()->all();
        $default = [
            'ciclo' => $ciclo,
            'estado_inscripcion' => 'CONFIRMADA'
        ];
        $params = array_merge($default,$params);

        $token = ApiLogin::token();
        $api = new ApiPases($token);
        $pases = $api->getAll($ciclo);

        // Todos los ciclos
        $apiCiclos = new ApiCiclos($token);
        $ciclos = $apiCiclos->getAll();
        $ciclos =  $ciclos['ciclos'];

        $data = compact('pases','ciclo','ciclos');
        $data['estado_inscripcion'] = $params['estado_inscripcion'];

        return view('pases.index',$data);
    }

    public function create() {
        $ciclo = Carbon::now()->year;
        
        $data = compact('ciclo');
        return view('pases.create',$data);
    }
}
