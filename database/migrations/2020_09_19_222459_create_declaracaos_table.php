<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclaracaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaracaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_funcionario')->unsigned()->index();
            $table->bigInteger('ano');
            $table->bigInteger('numero')->nullable();
            $table->text('efeito');
            $table->timestamps();
        });

        Schema::table('declaracaos', function (Blueprint $table) {
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
        Schema::dropIfExists('declaracaos');
    }
}
