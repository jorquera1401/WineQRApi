<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->float('peso');
            $table->longText('descripcion');
            $table->string('hash_entrada');
            $table->string('hash_salida')->unique();
            $table->timestamps();
        //    $table->foreign('cosecha_id')->references('id')->on('cosecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carga');
    }
}
