<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faltas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_tipo')->unsigned()->index();
            $table->bigInteger('id_funcionario')->unsigned()->index();
            $table->bigInteger('ano');
            $table->bigInteger('mes');
            $table->text('motivo')->nullable();
            $table->string('dia_semana')->nullable();
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('faltas', function (Blueprint $table){
            $table->foreign('id_tipo')->references('id')->on('tipo_faltas')->onUpdate('cascade');
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
        Schema::dropIfExists('faltas');
    }
}
