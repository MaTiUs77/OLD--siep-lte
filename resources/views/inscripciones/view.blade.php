@extends('core.layout')

@section('contenido')
     <!-- Breadcrumb -->
      <section class="content-header">
        <h1>
          Informacion de alumno
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Alumnado</a></li>
          <li><a href="{{ url('inscripciones') }}">Inscripciones</a></li>
          <li class="active">Informacion de alumno</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-3">
                  @include('inscripciones.componentes.card_persona')

                  <a href="?" class="btn btn-primary btn-block">Constancia de Inscripción</a>
                  <a href="?" class="btn btn-primary btn-block">Constancia de Alumno Regular</a>

              </div>
              <div class="col-md-9">
                  <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                          <li class="active"><a href="#trayectoria" data-toggle="tab" aria-expanded="true">Trayectoria en el centro</a></li>
                          <li class=""><a href="#familiares" data-toggle="tab" aria-expanded="false">Familiares</a></li>
                      </ul>
                      <div class="tab-content">
                          <div class="tab-pane" id="familiares">

                              <div class="row">
                                  <div class="col-sm-12">
                                  @if(count($familiares)<=0)
                                      <div class="callout callout-info">
                                          <p>
                                              No existen familiares asignados.
                                          </p>
                                      </div>
                                      @permiso('familiar.create')
                                      <div align="center">
                                          <a href="?" class="btn btn-success"><span class="fa fa-plus"></span> Asignar familiar</a>
                                      </div>
                                      @endpermiso
                                  @endif
                                  </div>

                                  @foreach($familiares as $familiar)
                                  <div class="col-sm-6">
                                    @include('inscripciones.componentes.card_familiar_persona',[
                                        'status' => $familiar['status'],
                                        'familiar' => $familiar['familiar'],
                                    ])
                                  </div>
                                  @endforeach
                              </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane active" id="trayectoria">
                              <!-- The timeline -->
                              <ul class="timeline timeline-inverse">
                                  @foreach($trayectoria_alumno as $trayectoria)
                                      @include('inscripciones.componentes.timeline_slot')
                                  @endforeach
                              </ul>
                          </div>
                          <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                  </div>
                  <!-- /.nav-tabs-custom -->
              </div>
          </div>
      </section>
      <!-- /.content -->
@endsection
