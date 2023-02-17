<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    //relacion uno a muchos
    public function sections(){
        return $this->hasMany(Post::class);
    }

}
