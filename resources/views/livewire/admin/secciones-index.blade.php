
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary btn-sm" href="{{route('admin.secciones.create')}}">Agregar sección</a>
    </div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="ingrese criterio de búsqueda">
    </div>

    @if ($secciones->count())
        <div class="card-body">
            <table class="table table-striped" id="secciones">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>NOMBRE CORTO</th>
                        <th>PADRE</th>
                        <th>PESO</th>
                        <th>ACTIVO</th>
                        <th >EDITAR</th>
                        <th >ELIMINAR</th>
                    </tr>
                </thead>
                <TBody>
                    @foreach ($secciones as $seccion)
                        <tr>
                            <td>{{$seccion->id}}</td>
                            <td>{{$seccion->nombre}}</td>
                            <td>{{$seccion->nombre_corto}}</td>
                            <td>
                                @php
                                    $busca_padre = $seccion->padre;
                                    $padre_locate = "";
                                    foreach ($secciones as $padre) {
                                        if ($padre->id == $busca_padre) {
                                            $padre_locate = $padre->nombre;
                                            break;
                                        }
                                    }
                                @endphp
                                {{$padre_locate}}
                            </td>
                            <td>{{$seccion->peso}}</td>
                            <td>
                                @if ($seccion->activo)
                                    <i class="fas fa-check"></i>
                                @else
                                    <i class="fas fa-times"></i>
                                @endif
                            </td>
                            <td width="10px"> <a class="btn btn-outline-link" href="{{route('admin.secciones.edit', $seccion )}}"><i class="fas fa-pencil-alt text-dark"></i></a> </td>
                            <td width="10px">
                                <form action="{{route('admin.secciones.destroy', $seccion )}}" class="formulario-eliminar" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-link"><i class="fas fa-trash-alt text-dark"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </TBody>
            </table>
        </div>
        <div class="card-footer">
            {{$secciones->links()}}
        </div>
    @else

    <card-body class="p-3">
        <strong>No existen registros coincidentes</strong>
    </card-body>

    @endif

</div>
