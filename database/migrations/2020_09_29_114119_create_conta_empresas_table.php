<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_banco')->unsigned()->index();
            $table->bigInteger('id_empresa')->unsigned()->index();
            $table->string('conta');
            $table->string('iban')->unique();
            $table->timestamps();
        });

        Schema::table('conta_empresas', function (Blueprint $table) {
            $table->foreign('id_banco')->references('id')->on('bancos')->onUpdate('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conta_empresas');
    }
}
