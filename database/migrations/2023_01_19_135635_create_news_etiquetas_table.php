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
        Schema::create('news_etiquetas', function (Blueprint $table) {
            $table->id();
            $table->string('etiqueta',100)->unique()->comment('termino de la etiqueta');
            $table->boolean('activo')->default(1)->comment('habilitado');
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
        Schema::dropIfExists('news_etiquetas');
    }
};
