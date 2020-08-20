<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaltaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faltas')->insert(array(
            array(
                'id_tipo'=>1,
                'id_funcionario'=>1,
                'ano'=>2020,
                'mes'=>2,
                'dia_semana'=>"segunda",
                'estado'=>'on'
            )
        ));
    }
}
