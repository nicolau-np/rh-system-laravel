<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->insert(array(

            array(
                'id_pais' => 1,
                'provincia' => 'Namibe' //1
            ), array(
                'id_pais' => 1,
                'provincia' => 'Benguela' //2
            ), array(
                'id_pais' => 1,
                'provincia' => 'Huíla' //3
            ), array(
                'id_pais' => 1,
                'provincia' => 'Malanje' //4
            ), array(
                'id_pais' => 1,
                'provincia' => 'Cabinda' //5
            ), array(
                'id_pais' => 1,
                'provincia' => 'Zaire' //6
            ), array(
                'id_pais' => 1,
                'provincia' => 'Uíge' //7
            ), array(
                'id_pais' => 1,
                'provincia' => 'Bengo' //8
            ), array(
                'id_pais' => 1,
                'provincia' => 'Lunda Sul' //9
            ), array(
                'id_pais' => 1,
                'provincia' => 'Lunda Norte' //10
            ), array(
                'id_pais' => 1,
                'provincia' => 'Cuanza Sul' //11
            ), array(
                'id_pais' => 1,
                'provincia' => 'Cuanza Norte' //12
            ), array(
                'id_pais' => 1,
                'provincia' => 'Luanda' //13
            ), array(
                'id_pais' => 1,
                'provincia' => 'Cunene' //14
            ), array(
                'id_pais' => 1,
                'provincia' => 'Moxico' //15
            ), array(
                'id_pais' => 1,
                'provincia' => 'Cuando Cubango' //16
            ), array(
                'id_pais' => 1,
                'provincia' => 'Huambo' //17
            ), array(
                'id_pais' => 1,
                'provincia' => 'Bié' //18
            )

        ));
    }
}
