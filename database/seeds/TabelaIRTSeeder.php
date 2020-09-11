<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TabelaIRTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabela_i_r_t_s')->insert(array(
            array(
                'escalao'=>"1º Escalão",
                'inicio'=> 0,
                'ate'=>70000,
                'parcela_fixa'=>null,
                'taxa_percentagem'=> null,
                'taxa_numeral'=>null,
                'excesso'=>null
            ),array(
                'escalao'=>"2º Escalão",
                'inicio'=> 70001,
                'ate'=>100000,
                'parcela_fixa'=>3000,
                'taxa_percentagem'=> 10,
                'taxa_numeral'=>null,
                'excesso'=>70000
            ),array(
                'escalao'=>"3º Escalão",
                'inicio'=> 100001,
                'ate'=>150000,
                'parcela_fixa'=>6000,
                'taxa_percentagem'=> 13,
                'taxa_numeral'=>null,
                'excesso'=>100000
            ),array(
                'escalao'=>"4º Escalão",
                'inicio'=> 1500001,
                'ate'=>200000,
                'parcela_fixa'=>12250,
                'taxa_percentagem'=> 16,
                'taxa_numeral'=>null,
                'excesso'=>150000
            ),array(
                'escalao'=>"5º Escalão",
                'inicio'=> 200001,
                'ate'=>300000,
                'parcela_fixa'=>31250,
                'taxa_percentagem'=> 18,
                'taxa_numeral'=>null,
                'excesso'=>200000
            ),array(
                'escalao'=>"6º Escalão",
                'inicio'=> 300001,
                'ate'=>500000,
                'parcela_fixa'=>49250,
                'taxa_percentagem'=> 19,
                'taxa_numeral'=>null,
                'excesso'=>300000
            ),array(
                'escalao'=>"7º Escalão",
                'inicio'=> 500001,
                'ate'=>1000000,
                'parcela_fixa'=>87250,
                'taxa_percentagem'=> 20,
                'taxa_numeral'=>null,
                'excesso'=>500000
            ),array(
                'escalao'=>"8º Escalão",
                'inicio'=> 1000001,
                'ate'=>1500000,
                'parcela_fixa'=>187250,
                'taxa_percentagem'=> 21,
                'taxa_numeral'=>null,
                'excesso'=>1000000
            ),array(
                'escalao'=>"9º Escalão",
                'inicio'=> 1500001,
                'ate'=>2000000,
                'parcela_fixa'=>292250,
                'taxa_percentagem'=> 22,
                'taxa_numeral'=>null,
                'excesso'=>1500000
            ),array(
                'escalao'=>"10º Escalão",
                'inicio'=> 2000001,
                'ate'=>2500000,
                'parcela_fixa'=>402250,
                'taxa_percentagem'=> 23,
                'taxa_numeral'=>null,
                'excesso'=>2000000
            ),array(
                'escalao'=>"11º Escalão",
                'inicio'=> 2500001,
                'ate'=>5000000,
                'parcela_fixa'=>517250,
                'taxa_percentagem'=> 24,
                'taxa_numeral'=>null,
                'excesso'=>2500000
            ),array(
                'escalao'=>"12º Escalão",
                'inicio'=> 5000001,
                'ate'=>10000000,
                'parcela_fixa'=>1117250,
                'taxa_percentagem'=> 24.5,
                'taxa_numeral'=>null,
                'excesso'=>5000000
            ),array(
                'escalao'=>"13º Escalão",
                'inicio'=> 10000001,
                'ate'=>50000000,
                'parcela_fixa'=>2342250,
                'taxa_percentagem'=> 25,
                'taxa_numeral'=>null,
                'excesso'=>10000000
            )
        ));
    }
}
