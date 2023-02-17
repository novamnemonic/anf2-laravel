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
        Schema::create('news_secciones', function (Blueprint $table) {
            $table->id()->comment('ID unico');
            $table->string('nombre',200)->unique()->comment('nombre de la seccion');
            $table->string('nombre_corto',100)->nullable()->comment('nombre corto de la seccion');
            $table->unsignedBigInteger('padre')->default(0)->comment('seccion padre');
            $table->string('slug')->comment('slug de la seccion');
            $table->integer('peso')->default(0)->comment('orden de despliegue en caso de tener padre');
            $table->boolean('activo')->default(0)->comment('visibilidad en la web');
            $table->string('color1',7)->default('#000000')->comment('color de la fuente');
            $table->string('color2',7)->default('#ffffff')->comment('color del fondo');
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
        Schema::dropIfExists('news_secciones');
    }
};
