<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCosecha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosecha', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->float('temperatura');
            $table->float('humedad');
            $table->string('descripcion');
            $table->timestamps();
      //      $table->foreign('predio_id')->references('id')->on('predio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cosecha');
    }
}
