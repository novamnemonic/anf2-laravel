@extends('adminlte::page')
@section('title', 'NOSTROMO')

@section('content_header')
    <h1>Crear nueva Etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.etiquetas.store']) !!}

                @include('admin.etiquetas.partials.form')

                <div class="form-group">
                    {!! Form::submit('Crear Etiqueta', ['class'=> 'btn btn-primary btn-sm']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>


@stop

@section('js')

@stop


