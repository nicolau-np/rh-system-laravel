<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_municipio')->unsigned()->index();
            $table->string('nome');
            $table->date('inicio_contrato');
            $table->date('fim_contrato')->nullable();
            $table->string('tipo');
            $table->string('tipo_servico');
            $table->timestamps();
        });

        Schema::table('clientes', function (Blueprint $table){
            $table->foreign('id_municipio')->references('id')->on('municipios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
