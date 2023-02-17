<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewSeccionController;
use App\Http\Controllers\Admin\NewsEtiquetasController;
use App\Http\Controllers\Admin\NewsArticulosController;
use App\Http\Controllers\Admin\ListasController;


Route::get('', [HomeController::class, 'index'] );

//rutas para secciones
Route::resource('secciones', NewSeccionController::class)
    ->parameters(['secciones' => 'seccion'])
    ->names('admin.secciones');

    //rutas para etiquetas (tags)
Route::resource('etiquetas', NewsEtiquetasController::class)
->names('admin.etiquetas');

 //rutas para etiquetas (tags)
 Route::resource('articulos', NewsArticulosController::class)
 ->names('admin.articulos');





  //ruta para busquedas
  Route::get('listas/etiquetas', [ListasController::class, 'etiquetas'])->name('listas.etiquetas');




  Route::get('/estadisticas/articulos', function () {    return view('estadisticas.index');})->name('estadisticas.articulos');
