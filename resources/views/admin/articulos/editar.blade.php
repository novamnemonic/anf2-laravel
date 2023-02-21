@extends('adminlte::page')
@section('title', 'NOSTROMO')

@section('content_header')
    <h1>Editar articulo</h1>
    <link rel="stylesheet" href="{{asset('vendor/croptool/ijaboCropTool.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($articulo,['route' => ['admin.articulos.update',$articulo], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}
                @include('admin.articulos.partials.form')
                <div class="form-group">
                    {!! Form::submit('Actualizar Artículo', ['class'=> 'btn btn-primary btn-sm']) !!}
                </div>


            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jqueryui-1-13-2/jquery-ui.min.css')}}">
@stop

@section('js')
    @include('admin.articulos.partials.script')
    @include('admin.articulos.partials.ckeditors')
@stop
