<div class="card">
    <div class="card-header">
        <a class="btn btn-primary btn-sm" href="{{route('admin.articulos.create')}}">Agregar artículo</a>
    </div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="ingrese criterio de búsqueda">
    </div>

    @if ($news_articulos->count())
        <div class="card-body">
            <table class="table table-striped" id="secciones">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITULO</th>
                        <th>CREADO POR</th>
                        <th>CREADO</th>
                        <th>FECHA ULTIMA MODIF.</th>
                        <th>MODIFICADO POR</th>
                        <th>ESPECIAL</th>
                        <th>PESO</th>
                        <th>ACTIVO</th>
                        <th>ESTADO</th>
                        <th>IMAGEN</th>
                        <th >EDITAR</th>
                        <th >ELIMINAR</th>
                    </tr>
                </thead>
                <TBody>
                    @foreach ($news_articulos as $articulo)
                        <tr>
                            <td>{{$articulo->id}}</td>
                            <td>{{$articulo->titulo}}</td>
                            <td>{{$articulo->user->name }}</td>
                            <td>{{$articulo->created_at}}</td>
                            <td>{{$articulo->updated_at}}</td>
                            <td>{{$articulo->user_mod->name }}</td>
                            <td>
                                @if ($articulo->especial)
                                    <i class="fas fa-check"></i>
                                 @else
                                    <i class="fas fa-times"></i>
                                @endif
                            </td>
                            <td>{{$articulo->peso}}</td>
                            <td>
                                @if ($articulo->activo)
                                    <i class="fas fa-check"></i>
                                @else
                                    <i class="fas fa-times"></i>
                                @endif
                            </td>
                            <td>
                                @php
                                    $cuantos = count($articulo->logs);
                                    $estado_final = $articulo->logs[$cuantos-1]['estado'];
                                    $en_uso = $articulo->logs[$cuantos-1]['en_uso'];

                                    if ($en_uso == 1){
                                        $quien_lo_custodia = $articulo->logs[$cuantos-1]->user['name'];
                                    }
                                @endphp
                                {{$estado_final}}
                            </td>

                            <td>
                                @if ($articulo->imagen)
                                    <img alt="imagen almacenada" id="picture" src="{{Storage::url('/img/news_articulo/small/' . $articulo->imagen['archivo_original_ruta'])}}" >
                                @else
                                    <img alt="imagen aleatoria" id="picture" src="{{asset('storage/img/assets/imagen_aux_articulo.png')}}" style ="width: 100px; height: auto">
                                @endif
                            </td>


                            @if ($en_uso == 0)

                                <td width="10px"> <a class="btn btn-outline-link" href="{{route('admin.articulos.edit', $articulo )}}"><i class="fas fa-pencil-alt text-dark"></i></a> </td>
                                <td width="10px">
                                    <form action="{{route('admin.articulos.destroy', $articulo )}}" class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-link"><i class="fas fa-trash-alt text-dark"></i></button>
                                    </form>
                                </td>
                            @else
                                <td width="10px" colspan="2" >El artículo esta siendo revisado o editado por {{$quien_lo_custodia}}</td>
                            @endif

                        </tr>
                    @endforeach
                </TBody>
            </table>
        </div>
        <div class="card-footer">
            {{$news_articulos->links()}}
        </div>
    @else

    <card-body class="p-3">
        <strong>No existen registros coincidentes</strong>
    </card-body>

    @endif

</div>
