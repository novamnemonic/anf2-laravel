<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news_etiquetas;

class ListasController extends Controller
{
    //
    public function etiquetas(Request $request){
        $term = $request->get('term');

        $querys = news_etiquetas::where('etiqueta', 'LIKE', '%' . $term . '%')->get();

        $data = [];
        foreach ($querys as $query) {
            $data[]=[
              'label'   => $query->etiqueta,
              'id'   => $query->id
            ];
        }

        return $data;

    }
}
