<x-plantilla>
    <x-slot name="titulo">Detalle</x-slot>
    <x-slot name="cabecera">Detalle Perfil</x-slot>
    <x-errores></x-errores>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><b>Nombre: </b>{{$perfile->nombre}}</h5>
          <h6 class="card-subtitle mb-2"><b>Descripción: </b>{{$perfile->descripcion}}</h6>
        </div>
    </div>
    <a href="{{route('perfiles.index')}}" class="btn btn-secondary mt-2"><i class="fas fa-backward"></i> Volver</a>
</x-plantilla>
