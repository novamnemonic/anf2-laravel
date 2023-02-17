<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news_etiquetas;
use App\Http\Requests\admin\EtiquetaRequest;

class NewsEtiquetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.etiquetas.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.etiquetas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtiquetaRequest $request)
    {



        if (!$request->activo) {
            $request['activo'] = '0';
        }
        $etiqueta = news_etiquetas::create($request->all());
        return redirect()->route('admin.etiquetas.edit', $etiqueta)->with('info', 'La Etiqueta se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(news_etiquetas $etiqueta)
    {
        //
        return view('admin.etiquetas.mostrar', compact('etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(news_etiquetas $etiqueta)
    {

        return view('admin.etiquetas.editar', compact('etiqueta'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news_etiquetas $etiqueta)
    {

        if (!$request->activo) {
            $request['activo'] = '0';
        }else{
            $request['activo'] = '1';
        }
        $etiqueta->update($request->all());
        return redirect()->route('admin.etiquetas.edit', $etiqueta)->with('info', 'La etiqueta se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(news_etiquetas $etiqueta)
    {
        $etiqueta->delete();
        return redirect()->route('admin.etiquetas.index')->with('info', 'La etiqueta se eliminó con éxito');
    }
}
