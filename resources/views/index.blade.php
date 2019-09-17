@extends('core.layout')

@section('contenido')
    <section class="content">
        <!-- solid sales graph -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ciclo 2020 <small>No confirmadas</small></h3>
            </div>
            <div class="box-body border-radius-none">
                <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="20" data-width="150" data-height="150"
                               data-fgColor="#39CCCC">

                        <div class="knob-label">Cumun - Inicial</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="50" data-width="150" data-height="150"
                               data-fgColor="#39CCCC">

                        <div class="knob-label">Comun - Secundario</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-xs-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="30" data-width="150" data-height="150"
                               data-fgColor="#39CCCC">

                        <div class="knob-label">In-Store</div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
@endsection

@section('footer_js')
    <script>
        $(function(){
            $('.knob').knob();
        });
    </script>
@endsection
