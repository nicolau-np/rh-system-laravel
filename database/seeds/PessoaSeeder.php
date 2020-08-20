<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('pessoas')->insert(array(
           array(
               'id_municipio'=>1,
               'nome'=>"Nicolau Pungue",
               'genero'=>'M',
               'data_nascimento'=>"19960829",
               'estado_civil'=>"solteiro(a)",
               'bi'=>"00558143NE046"
           ),
           array(
            'id_municipio'=>1,
            'nome'=>"Evaldo Chindele",
            'genero'=>'M',
            'data_nascimento'=>"19850719",
            'estado_civil'=>"casado(a)",
            'bi'=>"00541142NE041"
        )
       ));
    }
}
