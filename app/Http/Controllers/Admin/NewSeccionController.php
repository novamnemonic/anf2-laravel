<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news_secciones;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\SeccionRequest;

class NewSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$secciones = news_secciones::all();
        //return view('admin.secciones.index', compact('secciones'));
        return view('admin.secciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secciones_bd = news_secciones::pluck('nombre','id');
        $secciones_bd = $secciones_bd->toArray();

        $secciones = ['0' => '-- NINGUNO --'];
        $secciones += $secciones_bd;

        return view('admin.secciones.crear', compact('secciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeccionRequest $request)
    {
        if (!$request->activo) {
            $request['activo'] = '0';
        }
        //$request['nombre'] = strtoupper($request['nombre']);
        $seccion = news_secciones::create($request->all());
        return redirect()->route('admin.secciones.edit', $seccion)->with('info', 'La Sección se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(news_secciones $seccion)
    {
        //
        return view('admin.secciones.edit', compact('seccion'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(news_secciones $seccion)
    {

       $secciones_bd = news_secciones::pluck('nombre','id');
        $secciones_bd = $secciones_bd->toArray();

        $secciones = ['0' => '-- NINGUNO --'];
        $secciones += $secciones_bd;
        return view('admin.secciones.editar', compact('seccion','secciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeccionRequest $request, news_secciones $seccion)
    {

        if (!$request->activo) {
            $request['activo'] = '0';
        }else{
            $request['activo'] = '1';
        }
        $seccion->update($request->all());
        return redirect()->route('admin.secciones.edit', $seccion)->with('info', 'La Sección se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(news_secciones $seccion)
    {
        $seccion->delete();
        return redirect()->route('admin.secciones.index')->with('info', 'La Sección se eliminó con éxito');
    }
}
