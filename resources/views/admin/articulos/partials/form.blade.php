

{!! Form::hidden('cre_user_id', auth()->user()->id) !!}
{!! Form::hidden('uip', auth()->user()->ip) !!}
{!! Form::hidden('especial', 0) !!}
<div class="form-group">
    {!! Form::label('titulo', 'Título') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo del Artículo']) !!}

    @error('titulo')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del Artículo','readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}} </small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('titulo_corto', 'Título corto') !!}
    {!! Form::text('titulo_corto', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo corto del Artículo']) !!}
    @error('titulo_corto')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>

<hr class="zhua_hr">

<div class="form-group">
    {!! Form::label('news_secciones_id', 'Sección') !!}
    {!! Form::select('news_secciones_id',$secciones, Null, ['class' => 'form-control']) !!}

    @error('seccion_id')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('lista_etiquetas', 'Etiquetas') !!}
    {!! Form::text('lista_etiquetas', null, ['class' => 'form-control', 'placeholder' => 'Busque las etiquetas disponibles']) !!}

</div>

<div class="form-group zhua_etiquetas" id="etiquetas" name="etiquetas">
    @isset ($articulo->news_etiquetas)
        @foreach ($articulo->news_etiquetas as $etiqueta)
            {!! Form::checkbox('etiquetas[]', $etiqueta->id, true, ['class' => "form-check-input"]) !!}
            {!! Form::label($etiqueta->etiqueta, $etiqueta->etiqueta,['class' => 'form-check-label']) !!}
            <br>
        @endforeach
    @endisset
</div>

<div class="form-group">
    {!! Form::label('fecha_publicacion', 'Fecha para su publicación') !!}
    {!! Form::date('fecha_publicacion', \Carbon\Carbon::now(), ['class' => 'form-control', 'style' =>'color-scheme: dark']); !!}
</div>


<div>
    {!! Form::label('image', 'Añada una imagen al artículo [opcional]') !!}
    <div class="form-group zhua_etiquetas" >
        <div class="row">
            <div class="section">
                <input type="file" accept="image/*" name="image" class="image" style="color: transparent">
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Utilice el marco deslizante para mover el área de la fotografía</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749" >
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12 col-md-4">
        <div class="zhua_contenedor_imagen">
            @isset ($articulo->imagen)
                <img alt="imagen almacenada" id="picture" src="{{Storage::url('/img/news_articulo/big/' . $articulo->imagen->archivo_original_ruta)}}" style ="width: 100%; height: auto">
            @else

                <img alt="imagen aleatoria" id="picture" src="{{asset('storage/img/assets/imagen_aux_articulo.png')}}" style ="width: 100%; height: auto">
            @endisset
        </div>
    </div>
</div>

<div class="col">
    <div class="form-group">
        {!! Form::hidden('archivo_original_ruta', null ,["id" => "archivo_original_ruta"]) !!}
        <div class="archivo_subido" id="archivo_subido"></div>
    </div>
    <div class="form-group">
        {!! Form::label('pie', 'Pie de la imagen') !!}
        {!! Form::text('pie', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el texto de pie de imagen']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('resumen', 'Lead') !!}
    {!! Form::textarea('resumen', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Lead del Artículo', 'rows' =>'3', 'style' => 'background-color:black;']) !!}
    @error('resumen')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('resumen2', 'Resumen corto') !!}
    {!! Form::textarea('resumen2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un resumen corto del Artículo', 'rows' =>'3']) !!}
    @error('resumen2')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('contenido_html', 'Contenido') !!}
    {!! Form::textarea('contenido_html', null, ['class' => 'form-control', 'placeholder' => 'Incluya el contenido del articulo aquí']) !!}
    @error('contenido_html')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('activo', 'Activo ') !!}&nbsp;
    {!! Form::checkbox('activo') !!}

    @error('activo')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('peso', 'Peso ') !!}&nbsp;
    {!! Form::number('peso', '10') !!}
    @error('peso')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>


