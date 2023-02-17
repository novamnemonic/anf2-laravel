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
        Schema::create('news_logs', function (Blueprint $table) {
            $table->id()->comment('ID unico');
            $table->unsignedBigInteger('news_articulo_id')->comment('foreign id del articulo');
			$table->foreign('news_articulo_id')->references('id')->on('news_articulos');

            $table->dateTime('fecha')->nullable()->comment('fecha del evento');
            $table->string('evento')->nullable()->comment('evento ejecutado');
            $table->string('estado')->nullable()->comment('estado resultante');

            $table->unsignedBigInteger('user_id')->comment('id de usuario gestor');
			$table->foreign('user_id')->references('id')->on('users');

            $table->string('uip', 39)->nullable()->comment('ip del equipo loggueado');
            $table->boolean('en_uso')->nullable()->comment('bandera de restriccion de uso');
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
        Schema::dropIfExists('news_logs');
    }
};
