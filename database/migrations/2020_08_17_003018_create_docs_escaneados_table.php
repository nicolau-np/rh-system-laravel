<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsEscaneadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs_escaneados', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_tipo')->unsigned()->index();
            $table->bigInteger('id_funcionario')->unsigned()->index();
            $table->text('ficheiro');
            $table->timestamps();
        });

        Schema::table('docs_escaneados', function(Blueprint $table){
            $table->foreign('id_tipo')->references('id')->on('tipo_docs')->onUpdate('cascade');
            $table->foreign('id_funcionario')->references('id')->on('funcionarios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docs_escaneados');
    }
}
