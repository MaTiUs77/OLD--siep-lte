<!-- timeline time slot -->
<li class="time-label">
<span class="bg-red">
  {{ \Carbon\Carbon::parse($trayectoria['fecha_alta'])->format('d/m/y') }}
</span>
</li>
<li>
  <i class="fa fa-user bg-primary"></i>
  <div class="timeline-item">
      <span class="time pull-right"><i class="fa fa-user"></i> {{ $trayectoria['user']['username'] }}</span>
      <h3 class="timeline-header no-border">Tipo de Inscripcion <b>{{ $trayectoria['tipo_inscripcion'] }}</b></h3>
      <div class="timeline-body">
          @foreach($trayectoria['curso'] as $item)
              <b>Legajo:</b> {{ $trayectoria['legajo_nro'] }}
              <br>
              <b>Centro:</b> {{ $trayectoria['centro']['nombre'] }}
              <br>
              <b>Seccion:</b> {{ $item['nombre_completo'] }}
              <br>
              <b>Estado:</b> {{ $trayectoria['estado_inscripcion'] }}
          @endforeach
      </div>
  </div>
</li>
<!-- END timeline slot -->
