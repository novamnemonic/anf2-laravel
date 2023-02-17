@extends('adminlte::page')
@section('title', 'NOSTROMO')

@section('content_header')
    <h1>Crear nueva Sección</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.secciones.store', 'autocomplete' => 'off']) !!}

                @include('admin.secciones.partials.form')

                <div class="form-group">
                    {!! Form::submit('Crear Sección', ['class'=> 'btn btn-primary btn-sm']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('js')
    @include('admin.secciones.partials.script')
@stop


