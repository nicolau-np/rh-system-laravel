<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSubcidiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $tipo_subcidios = [
        'Férias',
        'Atavio',
        'Alimentação',
        'Conectividade'
    ];
    public function run()
    {
        foreach (Self::$tipo_subcidios as $tipo_subcidio) {
            DB::table('tipo_subcidios')->insert([
                'tipo' => $tipo_subcidio
            ]);
        }
    }
}
