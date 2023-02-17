<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SeccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $seccion = $this->route()->parameter('seccion');
        $reglas = [
            'nombre' => 'required',
            'nombre_corto' => 'required',
            'slug' => 'required|unique:news_secciones',
            'peso' => 'required',

        ];
        if($seccion){
            $reglas['slug'] =  'required|unique:news_secciones,slug,' . $seccion->id;
        }
        return $reglas;
    }
}
