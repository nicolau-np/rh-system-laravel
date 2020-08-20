<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert(array(
            array(
                'cargo'=>"Director Geral",
                'salario_base'=> null
            ), array(
                'cargo'=>"Contabilista",
                'salario_base'=> null
            ), array(
                'cargo'=>"Secretária",
                'salario_base'=> null
            ), array(
                'cargo'=>"Técnico de Frio de 1ª classe",
                'salario_base'=> null
            ), array(
                'cargo'=>"Técnico de Frio de 2ª classe",
                'salario_base'=> null
            ), array(
                'cargo'=>"Área Técnica",
                'salario_base'=> null
            ), array(
                'cargo'=>"Financeira",
                'salario_base'=> null
            )
        ));
    }
}
