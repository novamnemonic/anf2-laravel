<div class="form-group">
    {!! Form::label('etiqueta', 'Etiqueta:') !!}
    {!! Form::text('etiqueta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la etiqueta']) !!}
    @error('etiqueta')
        <small class="text-danger">{{$message}} </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('activo', 'Activo ') !!}&nbsp;
    {!! Form::checkbox('activo', 1) !!}
</div>
