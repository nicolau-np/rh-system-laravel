<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('bancos')->insert(array(
            array(
                'banco'=>"Banco de Poupança e Crédito",
                'sigla'=>"B.P.C"
            ),array(
                'banco'=>"Banco de Fomento Angolana",
                'sigla'=>"B.F.A"
            ),array(
                'banco'=>"Banco Angolano de Investimento",
                'sigla'=>"B.A.I"
            ),array(
                'banco'=>"Banco de Comércio Indústria",
                'sigla'=>"B.C.I"
            ),array(
                'banco'=>"Banco Internacional de Crédito",
                'sigla'=>"B.I.C"
            )

        ));
    }
}
