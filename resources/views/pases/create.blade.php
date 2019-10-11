@extends('core.layout')

@section('endcss')
    <style>
        .select2-result-repository{padding-top:4px;padding-bottom:3px}
        .select2-result-repository__avatar{float:left;width:60px;margin-right:10px}
        .select2-result-repository__avatar img{width:100%;height:auto;border-radius:2px}
        .select2-result-repository__meta{margin-left:70px}
        .select2-result-repository__title{color:black;font-weight:700;word-wrap:break-word;line-height:1.1;margin-bottom:4px}
        .select2-result-repository__forks, .select2-result-repository__stargazers{margin-right:1em}
        .select2-result-repository__forks, .select2-result-repository__stargazers, .select2-result-repository__watchers{display:inline-block;color:#aaa;font-size:11px}
        .select2-result-repository__description{font-size:13px;color:#777;margin-top:4px}
        .select2-results__option--highlighted .select2-result-repository__title{color:white}
        .select2-results__option--highlighted .select2-result-repository__forks,.select2-results__option--highlighted .select2-result-repository__stargazers,.select2-results__option--highlighted .select2-result-repository__description,.select2-results__option--highlighted .select2-result-repository__watchers{color:#c6dcef}
    </style>
@endsection
@section('contenido')
     <!-- Breadcrumb -->
      <section class="content-header">
        <h1>
          Crear pase
          <small>ciclo {{ $ciclo }}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Alumnado</a></li>
          <li>Pases</li>
          <li class="active">Crear pase</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

          <div class="col-sm-6">
              <!-- Buscar persona -->
              <div class="form-group">
                  <label>Buscar persona</label>
                  <select class="form-control autocomplete-personas" multiple></select>
              </div>
          </div>

      </section>
      <!-- /.content -->
@endsection

@section('endjs')
    <script>
        $(function () {
            $('.autocomplete-personas').select2({
                ajax: {
                    url: "http://localhost:7777/api/v1/personas",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            nombres: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (response, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: response.data,
                            pagination: {
                                more: (params.page * response.per_page) < response.total
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Ingresar nombre de persona',
                minimumInputLength: 4,
                maximumSelectionLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });
        });
        function formatRepo (repo) {
            if (repo.loading) {
                return repo.nombre_completo;
            }

            var $container = $(
                    "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__title'></div>" +
                    "<div class='select2-result-repository__description'></div>" +
                    "<div class='select2-result-repository__statistics'>" +
                    "<div class='select2-result-repository__forks'><i class='fa fa-user'></i> </div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            );

            $container.find(".select2-result-repository__title").text(repo.nombre_completo);
            $container.find(".select2-result-repository__description").text(repo.documento_nro);
            $container.find(".select2-result-repository__forks").append(repo.nacionalidad);

            return $container;
        }

        var model_persona_seleccionada = null;

        function formatRepoSelection (persona) {
            model_persona_seleccionada  = persona;
            return persona.nombre_completo;
        }
    </script>
@endsection