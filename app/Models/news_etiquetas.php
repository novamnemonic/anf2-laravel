<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\news_articulo;

class news_etiquetas extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion muchos a muchos inversa

    public function news_articulos(){  //nombre de la tabla deralcionada a muchos en plural
        return $this->belongsToMany(news_articulo::class); //nombre del modelo de la tabla muchos
    }
}
