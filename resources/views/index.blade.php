@extends('core.layout')

@section('contenido')
    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            Resumen general del ciclo {{ $ciclo }}
            <small>Inscripciones del tipo <b>{{ strtolower($estado_inscripcion) }}</b> </small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-9">
            @if(count($matPorNivel)<=0)
                <div class="callout callout-info">
                    <h4>Sin resultados</h4>

                    <p>No se encontraron resultados con el filtro aplicado.</p>
                </div>
            @endif
            @foreach($matPorNivel->sortBy('nivel_servicio')->groupBy('ciudad') as $ciudad => $items)
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ $ciudad }}</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                        @foreach($items as $item)
                            <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{ $item['matriculas'] }}</h3>
                                    <p>{{ $item['nivel_servicio'] }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="{{ route('inscripciones.index',[
                                    'ciclo'=>$ciclo,
                                    'ciudad'=>$ciudad,
                                    'nivel_servicio'=>$item['nivel_servicio'],
                                    'estado_inscripcion'=>$estado_inscripcion
                                    ]) }}" class="small-box-footer">
                                    Ampliar información <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                            </div>
                        @endforeach
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box  -->
            @endforeach
            </div>
            <!-- /.col  -->
            <div class="col-md-3">
                @include('sidebar_filtros',[
                    'action' => route('home')
                ])
            </div>
            <!-- /.col  -->
        </div>
        <!-- /.row  -->
    </section>
@endsection