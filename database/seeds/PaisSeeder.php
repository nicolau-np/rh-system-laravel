<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('pais')->insert(array(
            array(
                'pais' => 'Angola',
                'indicativo' => '+244'
            ), array(
                'pais' => 'Portugal',
                'indicativo' => '+351'
            )

        ));
    }
}
