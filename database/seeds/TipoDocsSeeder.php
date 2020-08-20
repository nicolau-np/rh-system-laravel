<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $tipo_docs = [
        'Bilhete de Identidade',
        'Currículo Vitae',
        'Atestado de Residência'
    ];

    public function run()
    {
        foreach (Self::$tipo_docs as $tipo_doc) {
            DB::table('tipo_docs')->insert([
                'tipo' => $tipo_doc
            ]);
        }
    }
}
