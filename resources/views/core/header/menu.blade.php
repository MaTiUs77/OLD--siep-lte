@rol('superadmin')
<li><a href="{{ route('admin') }}">Administracion</a></li>
@enduser

<!-- Ofertas -->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ofertas <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">Ciclos</a></li>
        <li><a href="#">Titulaciones</a></li>
        <li><a href="{{ route('secciones.index') }}">Secciones</a></li>
    </ul>
</li>

<!-- Alumnado -->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnado <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li class="active"><a href="{{ url('inscripciones') }}">Inscripciones</a></li>
        <li><a href="#">Alumnos</a></li>
    </ul>
</li>

<!-- Ver -->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ver... <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">Instituciones</a></li>
        <li><a href="#">Mapa educativo</a></li>
        <li><a href="#">Alumnos por seccion</a></li>
        <li><a href="#">Ingresantes 2019</a></li>
        <li><a href="#">Inscripciones 2019</a></li>
        <li><a href="{{ route('promocionados.index') }}">Promocionados</a></li>
        <li><a href="{{ route('repitentes.index') }}">Repitentes</a></li>
        <li><a href="#">Ingresantes 2020</a></li>
    </ul>
</li>

<!-- Ayuda -->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ayuda <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">Procesos paso a paso</a></li>
        <li><a href="#">Tutoriales en linea</a></li>
    </ul>
</li>
