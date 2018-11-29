<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacaoSoftwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacao_softwares', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dataSolicitacao');
            $table->date('dataInstalaçao')->nullable();
            $table->string('status', 20);
            $table->integer('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->integer('idLaboratorio');
            $table->foreign('idLaboratorio')->references('id')->on('laboratorios');
            $table->integer('idSoftware');
            $table->foreign('idSoftware')->references('id')->on('software');
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
        Schema::dropIfExists('solicitacao_softwares');
    }
}
