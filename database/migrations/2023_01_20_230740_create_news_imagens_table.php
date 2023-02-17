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
        Schema::create('news_imagens', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('news_articulo_id')->nullable()->unique()->comment('foreign id del articulo con que se vincula la imagen');   // nota: para las relaciones UNO a UNO
            $table->foreign('news_articulo_id')->references('id')->on('news_articulos')
                        ->onDelete('set null')	//'cascade': eliminar los registros de ambas tablas
						->onUpdate('cascade');	//en el caso de cambio de ID incluso	;

            $table->string('nombre')->comment('nombre de la imagen');
            $table->text('pie')->nullable()->comment('texto de pie de foto');
            $table->text('archivo_original_ruta')->nullable()->comment('path del archivo original subido');
            $table->text('formato1_ruta')->nullable()->comment('path del archivo generado, con formato 1');
            $table->text('formato2_ruta')->nullable()->comment('path del archivo generado, con formato 2');
            $table->text('formato3_ruta')->nullable()->comment('path del archivo generado, con formato 3');
            $table->integer('peso')->defaul(10)->comment('orden de despliegue');
            $table->boolean('activo')->comment('visibilidad de la imagen');
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
        Schema::dropIfExists('news_imagens');
    }
};
