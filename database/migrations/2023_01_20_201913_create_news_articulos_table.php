<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\news_secciones;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_articulos', function (Blueprint $table) {

            $table->id()->comment('id unico');

            $table->boolean('especial')->default(0)->nullable()->comment('especifica si el articulo es especial');

            $table->unsignedBigInteger('news_secciones_id')->comment('foreign id de seccion');
            $table->foreign('news_secciones_id')->references('id')->on('news_secciones');

            $table->text('titulo',1000)->comment('titulo principal');
            $table->string('titulo_corto')->comment('titulo corto');
            $table->dateTime('fecha_publicacion')->nullable()->comment('fecha visible');
            $table->text('resumen',1000)->comment('resumen - lead');
            $table->string('resumen2',1000)->comment('resumen corto');
            $table->longText('contenido')->nullable()->comment('contenido texto');
            $table->longText('contenido_html')->comment('contenido HTML');
            $table->string('meta_titulo')->nullable()->comment('titulo para el meta html title');
            $table->string('meta_descripcion')->nullable()->comment('descripcion para el meta html description');

            $table->string('meta_keywords')->nullable()->comment('palabras clave para el meta html keywords');

            $table->integer('peso')->default(0)->comment('orden de despliegue en caso de tener padre');
            $table->boolean('activo')->default(1)->nullable()->comment('activo - visible');
            $table->integer('conteo_1')->nullable()->default(0)->comment('contador tipo 1');
            $table->integer('conteo_2')->nullable()->default(0)->comment('contador tipo 2');
            $table->integer('conteo_3')->nullable()->default(0)->comment('contador tipo 3');
            $table->string('hashtag')->nullable()->comment('hashtag para el articulo en la RRSS');
            $table->string('slug')->comment('slug del articulo');

            $table->unsignedBigInteger('cre_user_id')->comment('foreign id de usuario creador');
            $table->foreign('cre_user_id')->references('id')->on('users');

            $table->string('cre_ip',39)->nullable()->comment('direccion ip del usuario creador');
            $table->dateTime('cre_fecha')->nullable()->comment('fecha de creacion');


            $table->unsignedBigInteger('mod_user_id')->nullable()->comment('foreign id de usuario ultima modificacion');
            $table->foreign('mod_user_id')->references('id')->on('users');

            $table->string('mod_ip',39)->nullable()->comment('direccion ip del usuario ultima modificacion');
            $table->dateTime('mod_fecha')->nullable()->comment('fecha de la ultima modificacion');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_articulos');
    }
};
