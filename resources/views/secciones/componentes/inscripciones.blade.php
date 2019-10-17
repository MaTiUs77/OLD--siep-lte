<div class="box">
  <div class="box-header">
      <h3 class="box-title">Registros en total: {{ $inscripciones['total'] }}</h3>
      <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">

              <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
          </div>
      </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
      <table class="table table-hover table-striped table-bordered">
          <tbody><tr>
              <th>DNI</th>
              <th>Alumno</th>
              <th>Fecha de nac.</th>
              <th>Telefono</th>
              <th>Direccion</th>
              <th>Estado</th>
          </tr>
          @foreach($inscripciones['data'] as $data)
          <tr>
              <td>{{ $data['inscripcion']['alumno']['persona']['documento_nro'] }}</td>
              <td>{{ $data['inscripcion']['alumno']['persona']['nombre_completo'] }}</td>
              <td>{{ \Carbon\Carbon::parse($data['inscripcion']['alumno']['persona']['fecha_nac'])->format('d/m/y') }}</td>
              <td>{{ $data['inscripcion']['alumno']['persona']['telefono_nro'] }}</td>
              <td>
                  {{ $data['inscripcion']['alumno']['persona']['calle_nombre'] }}
                  {{ $data['inscripcion']['alumno']['persona']['calle_nro'] }}
              </td>
              <td>
                  <span class="label label-{{ ($data['inscripcion']['estado_inscripcion'] == 'CONFIRMADA')? 'success' : 'warning' }}">
                      {{ $data['inscripcion']['estado_inscripcion'] }}
                  </span>
              </td>
              <td>
                  <a href="{{ url('inscripciones',$data['inscripcion']['id']) }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-eye"></i></a>
              </td>

              @permiso('inscripcion.delete')
              <td>
                  <a href="{{ url('inscripciones',$data['inscripcion']['id']) }}" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i></a>
              </td>
              @endpermiso
          </tr>
          @endforeach
          </tbody>
      </table>

      @include('core.pagination',[
        'data' => $inscripciones,
        'page_link' => (isset($page_link) ? $page_link : ''),
        'page_append' => (isset($page_append) ? $page_append : '')
      ])
  </div>
  <!-- /.box-body -->
</div>
