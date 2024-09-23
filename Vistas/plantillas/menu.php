<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
<!-- Vinculos al Home -->
    <a class="navbar-brand" href="./">AppLibreria</a>
<!-- Boton menu mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<!-- Contenido del menu -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
<!-- Opciones principales -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?controlador=inicio&accion=acercaDe">Acerca de</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Libros
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./?controlador=libros&accion=listado">Listado de libros</a></li>
            <li><a class="dropdown-item" href="./?controlador=libros&accion=crear">Crear Libro</a></li>
            <li><a class="dropdown-item" href="./?controlador=libros&accion=cambiar">Cambiar libros</a></li>
            <li><a class="dropdown-item" href="./?controlador=libros&accion=eliminar">Eliminar libros</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./?controlador=usuarios&accion=listado">Listado de Usuarios</a></li>
            <li><a class="dropdown-item" href="./?controlador=usuarios&accion=crear">Crear Usuario</a></li>
            <li><a class="dropdown-item" href="./?ontrolador=usuarios&accion=cambiar">Cambiar Usuario</a></li>
            <li><a class="dropdown-item" href="./?controlador=usuarios&accion=eliminar">Eliminar Usuario</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
      </ul>
    
    </div>
  </div>
</nav>