<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Portal Online</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('perfiles.index')}}"><i class="fas fa-cog"></i> Gestionar Perfiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('usuarios.index')}}"><i class="fas fa-cog"></i> Gestionar Usuarios</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
