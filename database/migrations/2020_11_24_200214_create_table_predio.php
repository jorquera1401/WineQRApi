<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePredio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('locacion');
            $table->string('tipo');
            $table->string('descripcion');
            $table->integer('hash')->unique();
           /* $table->unsignedInteger('id_vina')->null();
            $table->foreign('id_vina')->references('id')->on('vina')->onDelete('cascade');
            */
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
        Schema::dropIfExists('predio');
    }
}
