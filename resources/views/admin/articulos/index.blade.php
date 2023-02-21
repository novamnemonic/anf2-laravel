@extends('adminlte::page')
@section('title', 'NOSTROMO')

@section('content_header')
    <h1>Listado de articulos</h1>
@stop

@section('content')

@livewire('admin.articulos-index')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    @if (session('info') == 'El articulo se eliminó con éxito')
        <script>
            Swal.fire(
                '¡ Eliminado !',
                'El artículo se eliminó cón éxito',
                'success'
            )
        </script>
    @endif
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿ Está seguro de eliminar?',
                text: "¡ El artículo se eliminará definitavemente !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: ' Si, ¡Eliminar! ',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                   /* Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )*/
                        this.submit();
                    }
                })
        });
     </script>
@stop



