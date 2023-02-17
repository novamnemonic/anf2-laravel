@extends('adminlte::page')
@section('title', 'NOSTROMO')

@section('content_header')
    <h1>Listado de Etiquetas</h1>
@stop

@section('content')

    @livewire('admin.etiquetas-index')


@stop
@section('js')

    @if (session('info') == 'La etiqueta se eliminó con éxito')
        <script>
            Swal.fire(
                '¡ Eliminado !',
                'La Sección se eliminó cón éxito',
                'success'
            )
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿ Está seguro de eliminar?',
                text: "¡ La sección se eliminará definitavemente !",
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


