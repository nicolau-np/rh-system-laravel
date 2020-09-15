<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferias', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_funcionario')->unsigned()->index();
            $table->date('data_entrada');
            $table->date('data_saida');
            $table->string('estado');
            $table->bigInteger('ano');
            $table->timestamps();
        });

        Schema::table('ferias', function(Blueprint $table){
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
        Schema::dropIfExists('ferias');
    }
}
