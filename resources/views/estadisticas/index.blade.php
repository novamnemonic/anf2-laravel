@extends('adminlte::page')
@section('title', 'NOSTROMO')

@section('content_header')
    <h1>ESTADISTICAS : ARTICULOS</h1>
@stop

@section('content')
    <p>Panel administrativo del portal WEB de La Agencia de Noticias Fides ANF.</p>

<div class="grid-container-charts">


    <div class="zhua_grafica">
        <p class="text-center zhua-texto-negro" >Artículos publicados por mes</p>
        <canvas id="grafica"></canvas>
    </div>

    <div class="zhua_grafica">
        <p class="text-center zhua-texto-negro" >TOP 4 de secciones más visitadas</p>
        <canvas id="grafica2"></canvas>
    </div>

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica");
        // Las etiquetas son las que van en el eje X.
        const etiquetas = ["Enero", "Febrero", "Marzo", "Abril"]
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datosVentas2020 = {
            label: "Ventas por mes",
            data: [35, 20, 30, 45], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1,// Ancho del borde
        };
        new Chart($grafica, {
            type: 'line',// Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datosVentas2020,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
        </script>
        <script>
            // Obtener una referencia al elemento canvas del DOM
const $grafica2 = document.querySelector("#grafica2");
// Las etiquetas2 son las porciones de la gráfica
const etiquetas2 = ["Salud", "Democracia", "Economía", "Justicia"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosIngresos = {
    data: [1500, 400, 2000, 7000], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas2
    // Ahora debería haber tantos background colors como datos, es decir, para este ejemplo, 4
    backgroundColor: [
        'rgba(163,221,203,0.2)',
        'rgba(232,233,161,0.2)',
        'rgba(230,181,102,0.2)',
        'rgba(229,112,126,0.2)',
    ],// Color de fondo
    borderColor: [
        'rgba(163,221,203,1)',
        'rgba(232,233,161,1)',
        'rgba(230,181,102,1)',
        'rgba(229,112,126,1)',
    ],// Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($grafica2, {
    type: 'pie',// Tipo de gráfica. Puede ser dougnhut o pie
    data: {
        labels: etiquetas2,
        datasets: [
            datosIngresos,
            // Aquí más datos...
        ]
    },
});

        </script>
@stop

