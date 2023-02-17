<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_articulo_news_articulo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_articulo_padre_id')->comment('foreign id del articulo padre');
			$table->foreign('new_articulo_padre_id')->references('id')->on('news_articulos');

            $table->unsignedBigInteger('new_articulo_vinculado_id')->comment('foreign id del articulo viculado');
			$table->foreign('new_articulo_vinculado_id')->references('id')->on('news_articulos');

            $table->integer('peso')->defaul(10)->comment('orden de despliegue');
            $table->boolean('activo')->comment('visibilidad del articulo vinculado');
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
        Schema::dropIfExists('news_articulo_news_articulo');
    }
};
