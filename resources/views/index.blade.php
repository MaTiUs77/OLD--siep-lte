@extends('core.layout')

@section('contenido')
    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            Resumen general
            <small>Inscripciones confirmadas del ciclo {{ $ciclo }}</small>
        </h1>
    </section>


    <section class="content">
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
                                    <a href="{{ route('inscripciones.index',['ciclo'=>$ciclo,'ciudad'=>$ciudad,'nivel_servicio'=>$item['nivel_servicio']]) }}" class="small-box-footer">
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
    </section>
@endsection