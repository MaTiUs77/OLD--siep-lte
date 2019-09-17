<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Inscripciones extends Controller
{
    public function __construct()
    {
        //$this->middleware('jwt');
    }

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

        $api = new ApiConsume();
        $api->get("api/v1/inscripcion/lista",$params);
        if($api->hasError()) { return $api->getError(); }
        $inscripciones = $api->response();

        // Todos los ciclos
        $token = ApiLogin::token();
        $apiCiclos = new ApiCiclos($token);
        $ciclos = $apiCiclos->getAll();
        $ciclos =  $ciclos['ciclos'];

        $data = compact('inscripciones','ciclo','ciclos');
        $data['estado_inscripcion'] = $params['estado_inscripcion'];

        return view('inscripciones.index',$data);
    }

    public function show($id)
    {
        $relaciones = [
            'inscripcion.alumno.inscripciones.centro',
            'inscripcion.alumno.inscripciones.curso',
            'inscripcion.alumno.inscripciones.user',
            'inscripcion.alumno.familiares.familiar.persona.ciudad'
        ];

        $params = request()->all();
        $default['with'] = join(',',$relaciones);
        $params = array_merge($params,$default);

        $api = new ApiConsume();
        $api->get("api/v1/inscripcion/id/{$id}",$params);
        if($api->hasError()) { return $api->getError(); }

        $data = $api->response();

        $curso = $data['inscripcion'];
        $inscripcion = $data['inscripcion'];
        $centro = $inscripcion['centro'];
        $alumno= $inscripcion['alumno'];
        $persona= $alumno['persona'];

        $trayectoria_alumno = $alumno['inscripciones'];
        $familiares = $alumno['familiares'];

        $data = compact('curso','inscripcion','centro','alumno','persona','trayectoria_alumno','familiares');

        return view('inscripciones.view',$data);
    }
}
