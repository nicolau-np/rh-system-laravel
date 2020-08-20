<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcidiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcidios', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_tipo')->unsigned()->index();
            $table->bigInteger('id_cargo')->unsigned()->index();
            $table->decimal('salario', 10,2);
            $table->timestamps();
        });

        Schema::table('subcidios', function(Blueprint $table){
            $table->foreign('id_tipo')->references('id')->on('tipo_subcidios')->onUpdate('cascade');
            $table->foreign('id_cargo')->references('id')->on('cargos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcidios');
    }
}
