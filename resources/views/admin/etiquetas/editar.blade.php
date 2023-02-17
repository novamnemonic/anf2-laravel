@extends('adminlte::page')
@section('title', 'NOSTROMO')

@section('content_header')
    <h1>Editar Etiqueta </h1>
@stop


@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif


    <div class="mensaje">
        prueba
    </div>
    <div class="card">
        <div class="card-body">
            {!! Form::model($etiqueta,['route' => ['admin.etiquetas.update', $etiqueta ], 'autocomplete' => 'off', 'method' => 'put']) !!}


                @include('admin.etiquetas.partials.form')

                <div class="form-group">
                    {!! Form::submit('Actualizar Etiqueta', ['class'=> 'btn btn-primary btn-sm']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

