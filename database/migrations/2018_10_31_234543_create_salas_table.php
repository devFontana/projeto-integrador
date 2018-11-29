<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->integer('nroVagas');
            $table->boolean('temProjetor');
            $table->integer('idLocalizacao');
            $table->foreign('idLocalizacao')->references('id')->on('localizacoes');
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
        Schema::dropIfExists('salas');
    }
}
