<div class="card">
    <div class="card-header">
        <a class="btn btn-primary btn-sm" href="{{route('admin.etiquetas.create')}}">Agregar etiqueta</a>
    </div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="ingrese criterio de búsqueda">
    </div>
    @if ($etiquetas->count())
        <div class="card-body">
            <div class="grid-container-etiquetas">
                @foreach ($etiquetas as $etiqueta)
                    <div class="etiqueta">
                        <div class="grid-container-etiqueta-unica">
                            <div class="zhua_tag">
                                @if ($etiqueta->activo == true)
                                    <span class="zhua_tag_activo">{{$etiqueta->etiqueta}}</span>
                                @else
                                    <span class="zhua_tag_inactivo">{{$etiqueta->etiqueta}}</span>
                                @endif
                            </div>
                            <div class="zhua_editar_tag"><a class="btn btn-outline-link" href="{{route('admin.etiquetas.edit', $etiqueta )}}"><i class="fas fa-pencil-alt text-dark fa-xs"></i></a></div>
                            <div class="zhua_eliminar_tag">
                                <form action="{{route('admin.etiquetas.destroy', $etiqueta )}}" class="formulario-eliminar" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-link"><i class="fas fa-trash-alt text-dark fa-xs"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            {{$etiquetas->links()}}
        </div>
    @else
        <card-body class="p-3">
            <strong>No existen registros coincidentes</strong>
        </card-body>
    @endif
</div>
