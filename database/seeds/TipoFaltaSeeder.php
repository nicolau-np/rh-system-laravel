<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoFaltaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_faltas')->insert(array(
            array(
                'tipo'=>"Normal",
                'desconto'=>1000
            )
        ));
    }
}
