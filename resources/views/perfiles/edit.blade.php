<x-plantilla>
    <x-slot name="titulo">Editar</x-slot>
    <x-slot name="cabecera">Editar Perfil</x-slot>
    <x-errores></x-errores>
    <form action="{{route('perfiles.update', $perfile)}}" method="POST" name="a" class="p-4 bg-dark text-light">
        @csrf
        @method('PUT')
        @bind($perfile)
        <x-form-input name="nombre" label="Nombre Perfil" class="mb-2" />
        <x-form-input name="descripcion" label="Descripción" class="mb-2" />
        <div class="mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
            <a href="{{route('perfiles.index')}}" class="btn btn-secondary"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
