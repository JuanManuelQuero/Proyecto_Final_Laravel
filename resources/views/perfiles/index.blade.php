<x-plantilla>
    <x-slot name="titulo">Gestión</x-slot>
    <x-slot name="cabecera">Gestión Perfiles</x-slot>
    <x-mensaje/>
    <div class="d-flex flex-row-reverse my-2 py-1">
        <div>
            <form action="{{route('perfiles.index')}}" name="search" class="form-inline">
                <select name="nombre" class="py-2" onchange="this.form.submit()">
                    @foreach ($nombres as $k=>$v)
                    @if ($request->nombre == $k)
                        <option value="{{$k}}" selected>{{$v}}</option>
                    @else
                    <option value="{{$k}}">{{$v}}</option>
                    @endif
                    @endforeach
                </select>&nbsp;&nbsp;
        </div>
        <div class="py-2">
            <i class="fas fa-search"></i>
            <b>Nombre:</b>&nbsp;&nbsp;
        </div>
    </form>
    </div>
    <a href="{{route('perfiles.create')}}" class="btn btn-success mb-2"><i class="fas fa-plus-circle"></i> Nuevo</a>
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Detalles</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col" colspan="2" class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($perfil as $item)
          <tr>
            <th scope="row">
                <a href="{{route('perfiles.show', $item)}}" class="btn btn-secondary"><i class="fas fa-info-circle"></i> Detalle</a>
            </th>
            <td>{{$item->nombre}}</td>
            <td>{{$item->descripcion}}</td>
            <td class="text-center">
                <a href="{{route('perfiles.edit', $item)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
                <form action="{{route('perfiles.destroy', $item)}}" method="POST" name="d">
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
          {{$perfil->withQueryString()->links()}}
      </div>

</x-plantilla>
