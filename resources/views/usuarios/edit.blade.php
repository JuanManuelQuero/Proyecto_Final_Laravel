<x-plantilla>
    <x-slot name="titulo">Editar</x-slot>
    <x-slot name="cabecera">Editar Usuario</x-slot>
    <x-errores></x-errores>
    <form action="{{route('usuarios.update', $usuario)}}" method="POST" name="a" class="p-4 bg-dark text-light">
        @csrf
        @method('PUT')
        @bind($usuario)
        <x-form-input name="nomusu" label="Nombre Usuario" class="mb-2" />
        <x-form-input name="mail" label="Mail" class="mb-2" />
        <x-form-input name="localidad" label="Localidad" class="mb-2" />
        <x-form-select name="perfil_id" :options="$misPerfiles" label="Perfiles"/>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
            <a href="{{route('usuarios.index')}}" class="btn btn-secondary"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
