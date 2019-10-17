<!-- PASO 3-->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">
            Solicitud de pase
        </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form>
        <div class="box-body">

            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-blue-active">
                                          <span class="pull-right">
                                              <small>
                                                Ciclo: {{ $inscripcion['inscripcion']['ciclo']['nombre'] }}
                                              </small>
                                          </span>
                    <h5 class="widget-user-desc">{{ $inscripcion['inscripcion']['alumno']['persona']['nombre_completo'] }}</h5>
                    <h4>{{ $inscripcion['inscripcion']['centro']['nombre'] }}</h4> <div>
                        {{ $inscripcion['curso']['anio'] }}
                        {{ $inscripcion['curso']['division'] }}
                        {{ $inscripcion['curso']['turno'] }}
                    </div>
                </div>
            </div>

            <h4> Completar campos de destino</h4>
            Introduzca el nombre del alumno


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">Continuar</button>
        </div>
        <!-- /.box-footer -->
    </form>
</div>
