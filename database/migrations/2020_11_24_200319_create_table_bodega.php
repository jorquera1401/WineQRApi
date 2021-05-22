<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBodega extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodega', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->float('temperatura');
            $table->float('humedad');
            //$table->string('descripcion');
            $table->longText('descripcion');
            $table->timestamps();
  //          $table->foreign('almacen_id')->references('id')->on('almacen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bodega');
    }
}
