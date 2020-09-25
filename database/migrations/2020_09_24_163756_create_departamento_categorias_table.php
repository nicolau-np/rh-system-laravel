<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento_categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_departamento')->unsigned()->index();
            $table->bigInteger('id_categoria')->unsigned()->index();
            $table->text('descricao')->nullable();
            $table->timestamps();
        });

        Schema::table('departamento_categorias', function (Blueprint $table){
            $table->foreign('id_departamento')->references('id')->on('departamentos')->onUpdate('cascade');
            $table->foreign('id_categoria')->references('id')->on('cargos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamento_categorias');
    }
}
