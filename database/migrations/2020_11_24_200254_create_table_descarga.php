<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDescarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descarga', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->longText('descripcion');
            $table->float('distancia');
            $table->timestamps();
      //      $table->foreign('carga_id')->references('id')->on('carga');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descarga');
    }
}
