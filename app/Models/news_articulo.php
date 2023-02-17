<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\news_imagen;
use App\Models\news_etiquetas;
use App\Models\news_secciones;
use App\Models\news_logs;
use App\Models\User;

class news_articulo extends Model
{
    use HasFactory;

    protected $table = 'news_articulos';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // relacion uno a uno
    public function imagen(){
        return $this->hasOne(news_imagen::class);
    }

    public function seccion(){
        return $this->hasOne(news_secciones::class);
    }

    // relacion muchos a muchos
    public function news_etiquetas(){
        return $this->belongsToMany(news_etiquetas::class);
    }

    //relacion uno a muchos reversa
    public function user(){
        return $this->belongsTo("App\Models\User" , "cre_user_id" , "id");

    }

//relacion uno a muchos reversa
    public function user_mod(){
        return $this->belongsTo("App\Models\User" , "mod_user_id" , "id");
    }


    //relacion uno a muchos [uno]
    public function logs(){
        return $this->hasMany(news_logs::class);
    }



}
