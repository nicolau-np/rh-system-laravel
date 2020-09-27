<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_cliente')->unsigned()->index();
            $table->bigInteger('mes');
            $table->bigInteger('ano');
            $table->bigInteger('quantidate');
            $table->decimal('pc_unitario', 10,2);
            $table->decimal('total', 10,2);
            $table->string('tipo');
            $table->date('data_faturacao');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });

        Schema::table('faturacaos', function (Blueprint $table) {
            $table->foreign('id_cliente')->references('id')->on('faturacaos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faturacaos');
    }
}
