<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\news_logs;
use App\Models\news_articulo;




class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //adminLTE
    public function adminlte_image(){
        return 'https://picsum.photos/300/300';
        //return public_path('storage\img\assets\admin_temp_photo.png');
    }

    public function adminlte_desc(){
        return 'Administrador';
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

     //relacion uno a muchos [uno]
     public function logs(){
        return $this->hasMany(news_logs::class);
    }

    //relacion uno a muchos [uno]
    public function news_articulos(){
        return $this->hasMany("App/Models/news_articulo","cre_user_id" ,  "id" );
    }

    public function news_articulos_mods(){
        return $this->hasMany("App/Models/news_articulo","mod_user_id" ,  "id" );
    }
}
