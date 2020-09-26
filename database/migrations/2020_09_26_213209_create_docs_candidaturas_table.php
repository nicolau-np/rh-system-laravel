<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsCandidaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs_candidaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_candidatura')->unsigned()->index();
            $table->text('arquivo');
            $table->timestamps();
        });

        Schema::table('docs_candidaturas', function (Blueprint $table){
            $table->foreign('id_candidatura')->references('id')->on('candidaturas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docs_candidaturas');
    }
}
