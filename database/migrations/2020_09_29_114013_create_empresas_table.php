<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->unique();
            $table->string('nif');
            $table->string('telefone');
            $table->string('endereco');
            $table->bigInteger('telefone_fixo')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->text('descricao_servico')->nullable();
            $table->date('data_aniversario');
            $table->text('logotipo');
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
        Schema::dropIfExists('empresas');
    }
}
