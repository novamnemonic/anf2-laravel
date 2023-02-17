<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\news_articulo;

class news_imagen extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion uno a uno inversa
    public function new_articulo(){ //nombre de la talba relacionada
        return $this->belongsTo('news_articulo::class');   //nombre del modelo de la tabla uno
    }
}
