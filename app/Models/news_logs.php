<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\news_articulo;

class news_logs extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion uno a muchos reversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relacion uno a mucho reversa
    public function new_articulo(){
        return $this->belongsTo(news_articulo::class);
    }
}
