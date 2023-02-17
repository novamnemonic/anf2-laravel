<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewArticuloRequest extends FormRequest
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

        $articulo = $this->route()->parameter('articulo');
        $rules = [
            'titulo' => 'required',
            'titulo_corto' => 'required',
            'slug' => 'required|unique:news_articulos',
            'resumen' => 'required',
            'resumen2' => 'required',
            'contenido_html' => 'required',
            'cre_user_id' => 'required',
        ];

        if($articulo){
            $rules['slug'] = 'required|unique:news_articulos,slug,'.$articulo->id;
        }

        return $rules;
    }
}
