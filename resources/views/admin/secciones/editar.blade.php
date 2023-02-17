@extends('adminlte::page')
@section('title', 'NOSTROMO')

@section('content_header')
    <h1>Editar Sección </h1>
@stop


@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($seccion,['route' => ['admin.secciones.update', $seccion ], 'autocomplete' => 'off', 'method' => 'put']) !!}

                @include('admin.secciones.partials.form')

                <div class="form-group">
                    {!! Form::submit('Actualizar Sección', ['class'=> 'btn btn-primary btn-sm']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('js')
    @include('admin.secciones.partials.script')
@stop
