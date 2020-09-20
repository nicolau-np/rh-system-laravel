<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiaMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia_medicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_funcionario')->unsigned()->index();
            $table->text('local_apresentar');
            $table->date('data_repouso')->nullable();
            $table->date('data_retoma')->nullable();
            $table->text('prescricao_medica')->nullable();
            $table->bigInteger('ano');
            $table->bigInteger('numero')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
        });

        Schema::table('guia_medicas', function (Blueprint $table) {
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
        Schema::dropIfExists('guia_medicas');
    }
}
