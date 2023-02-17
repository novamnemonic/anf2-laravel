<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news_secciones;
//use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\NewArticuloRequest;
use App\Models\news_articulo;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//use Intervention\Image\Image;

//use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\TempPicture;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NewsArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.articulos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secciones = news_secciones::where('padre','!=','0')
                    ->orderBy('nombre', 'asc')
                    ->pluck('nombre', 'id');
       return view('admin.articulos.crear', compact('secciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewArticuloRequest $request)
    {



        if (!$request->activo) {
            $request['activo'] = '0';
        }else{
            $request['activo'] = '1';
        }

        if (!$request->especial) {
            $request['especial'] = '0';
        }else{
            $request['especial'] = '1';
        }

        $texto_plano = strip_tags($request->contenido_html);
        $request['contenido'] = $texto_plano;

        $request['mod_user_id'] = $request->cre_user_id;


        $articulo = news_articulo::create($request->all());


        if ($request->archivo_original_ruta) {
            $imagen = explode("," , $request->archivo_original_ruta);
            $imagenBinaria = base64_decode($imagen[1]);
            $nameImage = $request->slug . ".jpg";
            $url_big = 'img/news_articulo/big/' . $nameImage;
            $url_medium = 'img/news_articulo/medium/' . $nameImage;
            $url_small = 'img/news_articulo/small/' . $nameImage;
            $image_url = Storage::put($url_big ,$imagenBinaria); //imagen grande

            //********************************* se almacena pa  un tamaño inferior al original
            $img = Image::make('storage/'. $url_big);
            $img->resize(300, null ,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save('storage/' . $url_medium);

            //********************************** se almacena pa  un tamaño miniatura
            $img2 = Image::make('storage/'. $url_big);
            $img2->resize(100, null ,function($constraint){
               $constraint->aspectRatio();
            });
            $img2->save('storage/' . $url_small);

            $articulo->imagen()->create([
                'archivo_original_ruta' => $nameImage,
                'nombre' => 'prueba1',
                'peso' => 10,
                'activo' => true
            ]);
        }

        if ($request->etiquetas) {
            $articulo->news_etiquetas()->attach($request->etiquetas);
        }

        $articulo->logs()->create([
            'fecha' => date("Y-m-d H:i:s"),
            'evento' => 'articulo creado',
            'estado' => 'Borrador',
            'user_id' => $request->cre_user_id,
            'en_uso' => false,
            'uip' => $request->ip()
        ]);

        //return $news_articulo;
        return redirect()->route('admin.articulos.edit', $articulo);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.articulos.mostrar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(news_articulo $articulo)
    {

        $secciones = news_secciones::where('padre','!=','0')
                    ->orderBy('nombre', 'asc')
                    ->pluck('nombre', 'id');



        return view('admin.articulos.editar', compact('articulo','secciones'));
    }


    public function update(NewArticuloRequest $request, news_articulo $articulo)
    {

        if (!$request->activo) {
            $request['activo'] = '0';
        }else{
            $request['activo'] = '1';
        }

        if (!$request->especial) {
            $request['especial'] = '0';
        }else{
            $request['especial'] = '1';
        }

        $articulo->update($request->all());

        if ($request->file('archivo_original_ruta')) {
            $url = Storage::put('news_articulo', $request->file('archivo_original_ruta'));

            if($articulo->imagen){
                Storage::delete($articulo->imagen->archivo_original_ruta);
                $articulo->imagen()->update([
                    'archivo_original_ruta' => $url,
                    'nombre' => 'prueba1',
                    'peso' => 10,
                    'activo' => true
                ]);

            }else{
                $articulo->imagen()->create([
                    'archivo_original_ruta' => $url,
                    'nombre' => 'prueba1',
                    'peso' => 10,
                    'activo' => true
                ]);
            }
        }
        if ($request->etiquetas) {
            $articulo->news_etiquetas()->sync($request->etiquetas);
        }
        return redirect()->route('admin.articulos.edit', $articulo);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(news_articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('admin.articulos.index')->with('info', 'El articulo se eliminó con éxito');
    }

    function crop(Request $request){

        $folderPath = public_path('upload/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;

        file_put_contents($imageFullPath, $image_base64);

         $saveFile = new TempPicture;
         $saveFile->name = $imageName;
         $saveFile->save();

        return response()->json(['success'=>'Crop Image Uploaded Successfully']);

    }
}
