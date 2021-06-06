<x-plantilla>
    <x-slot name="titulo">Detalle</x-slot>
    <x-slot name="cabecera">Detalle Usuario</x-slot>
    <x-errores></x-errores>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><b>Nombre: </b>{{$usuario->nombre}}</h5>
          <h6 class="card-subtitle mb-2"><b>Mail: </b>{{$usuario->mail}}</h6>
          <p class="card-text text-muted"><b>Localidad: </b>{{$usuario->localidad}}</p>
          <p class="card-text"><b>Perfil</b>
            <a href="{{route('perfiles.show', $usuario->perfil->id)}}"> #{{$usuario->perfil->nombre}}</a>
          </p>
        </div>
    </div>
    <a href="{{route('usuarios.index')}}" class="btn btn-secondary mt-2"><i class="fas fa-backward"></i> Volver</a>
</x-plantilla>
