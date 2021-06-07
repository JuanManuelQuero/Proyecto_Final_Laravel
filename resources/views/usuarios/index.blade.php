<x-plantilla>
    <x-slot name="titulo">Gestión</x-slot>
    <x-slot name="cabecera">Gestión Usuarios</x-slot>
    <x-mensaje/>
    <div class="d-flex flex-row-reverse my-2 py-1">
        <div>
            <form action="{{route('usuarios.index')}}" name="search" class="form-inline">
                <select name="localidad" class="py-2" onchange="this.form.submit()">
                    <option value="%">Todas</option>
                    @foreach ($localidades as $item)
                        @if($request->localidad == $item->localidad)
                        <option selected>{{$item->localidad}}</option>
                        @else
                        <option>{{$item->localidad}}</option>
                        @endif
                    @endforeach
                </select>
            </form>
        </div>
        <div class="py-2">
            <i class="fas fa-search"></i>
            <b>Localidad:</b>&nbsp;&nbsp;
        </div>
    </div>
    <a href="{{route('usuarios.create')}}" class="btn btn-success mb-2"><i class="fas fa-plus-circle"></i> Nuevo Usuario</a>
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Detalles</th>
            <th scope="col">Nombre</th>
            <th scope="col">Mail</th>
            <th scope="col">Localidad</th>
            <th scope="col" colspan="2" class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($usuario as $item)
          <tr>
            <th scope="row">
                <a href="{{route('usuarios.show', $item)}}" class="btn btn-secondary"><i class="fas fa-info-circle"></i> Detalle</a>
            </th>
            <td>{{$item->nomusu}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->localidad}}</td>
            <td class="text-center">
                <a href="{{route('usuarios.edit', $item)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
                <form action="{{route('usuarios.destroy', $item)}}" method="POST" name="d">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- Para que funcione la pagina con los scopes le añadimos lo siguiente -->
      <div class="mt-2">
        {{$usuario->withQueryString()->links()}}
    </div>
</x-plantilla>
