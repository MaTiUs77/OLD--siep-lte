<!-- timeline time slot -->
<li class="time-label">
<span class="bg-red">
  {{ \Carbon\Carbon::parse($inscripcion['fecha_alta'])->format('d/m/y') }}
</span>
</li>
<li>
  <i class="fa fa-user bg-yellow"></i>
  <div class="timeline-item">
      <div class="timeline-body">

          <div class="row">
              <div class="col-md-6">
                  <div class="box box-widget widget-user">
                      <div class="widget-user-header bg-yellow-active">
                          <h5 class="widget-user-desc">Origen</h5>
                          <h4>{{ $inscripcion['pase']['nombre'] }}</h4>
                      </div>
                      <div class="box-footer no-padding">
                          <div class="row">
                              <div class="col-sm-6 border-right">
                                  <div class="description-block">
                                      <span class="description-text">Solicitud de pase</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                          </div>
                      </div>
                      <!-- /.row -->
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="box box-widget widget-user">
                      <div class="widget-user-header bg-blue-active">
                                               <span class="pull-right">
                        <small>
                            #{{ $inscripcion['id'] }}
                        </small>
                      </span>

                          <h5 class="widget-user-desc">Destino</h5>
                          <h4>{{ $inscripcion['centro']['nombre'] }}</h4>
                          @foreach($inscripcion['curso'] as $curso)
                              {{ $curso['anio'] }}
                              {{ $curso['division'] }}
                              {{ $curso['turno'] }}
                          @endforeach
                      </div>
                      <div class="box-footer no-padding">
                          <div class="row">
                              <div class="col-sm-6 border-right">
                                  <div class="description-block">
                                      <span class="description-text">{{ $inscripcion['legajo_nro'] }}</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-6">
                                  <div class="description-block">
                                      <span class="description-text">{{ $inscripcion['estado_inscripcion'] }}</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              @isset($inscripcion['promocion_id'])
                              <div class="col-sm-12">
                                  <div class="description-block">
                                      <span class="description-text">Promocion: #{{ $inscripcion['promocion_id'] }}</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              @endisset
                              @isset($inscripcion['repitencia_id'])
                              <div class="col-sm-12">
                                  <div class="description-block">
                                      <span class="description-text">Repitencia: #{{ $inscripcion['repitencia_id'] }}</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              @endisset

                              @isset($inscripcion['tipo_baja'])
                              <div class="col-sm-12">
                                  <div class="description-block">
                                      <span class="description-text">Tipo: {{ $inscripcion['tipo_baja'] }}</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              @endisset

                              @isset($inscripcion['fecha_baja'])
                              <div class="col-sm-12">
                                  <div class="description-block">
                                      <span class="description-text">Fecha: {{ $inscripcion['fecha_baja'] }}</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              @endisset

                              @isset($inscripcion['motivo_baja'])
                              <div class="col-sm-12">
                                  <div class="description-block">
                                      <span class="description-text">Motivo: {{ $inscripcion['motivo_baja'] }}</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              @endisset

                              @if(!empty($inscripcion['observaciones']))
                                  <div class="col-sm-12">
                                      <div class="description-block">
                                          <span class="description-text">Observaciones: {{ $inscripcion['observaciones'] }}</span>
                                      </div>
                                      <!-- /.description-block -->
                                  </div>
                              @endif
                          </div>
                      </div>
                      <!-- /.row -->
                  </div>
              </div>
          </div>
      </div>
  </div>
</li>
<!-- END timeline slot -->
