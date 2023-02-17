<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la sección']) !!}
    @error('nombre')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('nombre_corto', 'Nombre corto') !!}
    {!! Form::text('nombre_corto', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre corto de la seccion']) !!}
    @error('nombre_corto')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la seccion','readonly']) !!}

    @error('slug')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('activox', 'Activo ') !!}&nbsp;
    {!! Form::checkbox('activo') !!}
</div>
<div class="form-group">
    {!! Form::label('peso', 'Peso ') !!}&nbsp;
    {!! Form::number('peso', '10') !!}
    @error('peso')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('padre', 'Padre') !!}
    {!! Form::select('padre', $secciones, Null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('personalizacion', 'Personalización de la  Sección') !!}
    <div class="grid-container-colors">
        <div class="color1a">
            <input type="color" id="colora">
            {!! Form::label('color1lab', 'Color de texto') !!}
            {!! Form::hidden('color1') !!}
        </div>
        <div class="ejemplo_seccion">
            <span id="ejemplo" class="ejemplo-texto">Texto de ejemplo</span>
        </div>
        <div class="color2a">
            <input type="color" id="colorb">
            {!! Form::label('color2lab', 'Color de fondo') !!}
            {!! Form::hidden('color2') !!}
        </div>
    </div>
</div>
<br>
