@extends('adminlte::page')
@section('title', 'NOSTROMO')

@section('content_header')
    <h1>Crear articulo</h1>
    <link rel="stylesheet" href="{{asset('vendor/croptool/ijaboCropTool.min.css')}}">

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.articulos.store', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('admin.articulos.partials.form')
                <div class="form-group">
                    {!! Form::submit('Crear Artículo', ['class'=> 'btn btn-primary btn-sm']) !!}
                </div>


            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jqueryui-1-13-2/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>




@stop

@section('js')
    @include('admin.articulos.partials.script')


@stop
