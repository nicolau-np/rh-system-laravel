<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelaIRTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabela_i_r_t_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('escalao');
            $table->decimal('inicio', 10,2)->nullable();
            $table->decimal('ate', 10,2)->nullable();
            $table->decimal('parcela_fixa', 10,2)->nullable();
            $table->decimal('taxa_percentagem', 5,1)->nullable();
            $table->decimal('taxa_numeral', 5,2)->nullable();
            $table->decimal('excesso', 10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabela_i_r_t_s');
    }
}
