<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolhaSalarialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folha_salarials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_salario')->unsigned()->index();
            $table->bigInteger('id_funcionario')->unsigned()->index();

            $table->decimal('salario_base', 10,2);
            $table->bigInteger('total_faltas');
            $table->decimal('salario_iliquido', 10,2)->nullable();

            $table->decimal('sub_alimentacao', 10,2)->nullable();
            $table->decimal('sub_transporte', 10,2)->nullable();
            $table->decimal('sub_comunicacao', 10,2)->nullable();

            $table->decimal('des_irt', 10,2)->nullable();
            $table->decimal('des_ss', 10,2)->nullable();
            $table->decimal('des_falta', 10,2)->nullable();
            $table->decimal('des_total', 10,2)->nullable();
            $table->decimal('salario_liquido', 10,2)->nullable();

            $table->timestamps();
        });

        Schema::table('folha_salarials', function (Blueprint $table){
            $table->foreign('id_salario')->references('id')->on('salarios')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('folha_salarials');
    }
}