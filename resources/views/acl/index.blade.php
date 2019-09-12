@extends('core.layout')

@section('contenido')
     <!-- Breadcrumb -->
      <section class="content-header">
        <h1>
          Administracion
          <small>Usuarios, Roles, Permisos y Configuracion en general</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
          @error('admin.api.error')
          <p class="text-center">
              <code>{{ $message }}</code>
          </p>
          @enderror

          <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#usuarios" data-toggle="tab" aria-expanded="true">Usuarios</a></li>
                  <li class=""><a href="#roles" data-toggle="tab" aria-expanded="false">Roles</a></li>
                  <li class=""><a href="#permisos" data-toggle="tab" aria-expanded="false">Permisos</a></li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane active" id="usuarios">
                      @include('acl.tabla_user_crud',[
                      'titulo' => 'Usuarios',
                      'items' => $users,
                      ])
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="roles">
                      @include('acl.tabla_simple_acl',[
                      'titulo' => 'Roles',
                      'items' => $roles,
                      ])
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="permisos">
                      @include('acl.tabla_simple_acl',[
                      'titulo' => 'Permisos',
                      'items' => $permisos,
                      ])
                  </div>
                  <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
      </section>
      <!-- /.content -->
@endsection
