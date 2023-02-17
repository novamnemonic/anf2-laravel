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
        Schema::create('news_articulo_news_etiquetas', function (Blueprint $table) {
            $table->unsignedBigInteger('news_articulo_id')->nullable();   // nota: para todos los demas singular --->> news_articulo es la 1ra parte del nombre de esta tabla y se le aumenta el _id
			$table->unsignedBigInteger('news_etiquetas_id')->nullable();   // nota: para todos los demas singular --->> news_etiquetas es la 2da parte del nombre de esta tabla y se le aumenta el _id

			$table->foreign('news_articulo_id')->references('id')->on('news_articulos')->onDelete('cascade');; //on (nombre de la tabla)
			$table->foreign('news_etiquetas_id')->references('id')->on('news_etiquetas')->onDelete('cascade'); //on (nombre de la tabla)
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
        Schema::dropIfExists('news_articulo_news_etiquetas');
    }
};
