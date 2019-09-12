@php
    $route = strtolower($titulo);
@endphp

<div class="box">
  <div class="box-header">
      <h3 class="box-title">{{ $titulo }} en total: {{ $items['total'] }}</h3>
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
          <thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Rol</th>
              <th>Puesto</th>
              <th>Email</th>
              <th>Centro</th>
          </tr>
          </thead>
          <tbody>
              @foreach($items['data'] as $item)
                <tr>
                    <td style="width: 50px">{{ $item['id'] }}</td>
                    <td>{{ $item['username'] }}</td>
                    <td>{{ $item['role'] }}</td>
                    <td>{{ $item['puesto'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['centro']['nombre'] }}</td>
                    <td style="width: 50px">
                        <a href="{{ url("acl/{$route}/edit",$item['id']) }}" class="btn btn-sm btn-default btn-block"><i class="fa fa-edit"></i></a>
                    </td>
                    <td style="width: 50px">
                        <a href="{{ url("acl/{$route}/delete",$item['id']) }}" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  <!-- /.box-body -->
</div>
