<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dataInicio');
            $table->time('horaInicio');
            $table->date('dataFim');
            $table->time('horaFim');
            $table->mediumText('descricao');
            $table->integer('idUser');
            $table->integer('idSala')->nullable();
            $table->integer('idLaboratorio')->nullable();
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
        Schema::dropIfExists('locacaos');
    }
}
