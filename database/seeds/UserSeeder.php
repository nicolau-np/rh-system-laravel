<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('usuarios')->insert(array(
            array(
                'id_pessoa' => 1,
                'email' => 'nic340k@gmail.com',
                'password' => Hash::make("babaca2015"),
                'estado' => 'on',
                'acesso' => 'admin'
            ),
            array(
                'id_pessoa' => 2,
                'email' => 'evaldo_chindele@gmail.com',
                'password' => Hash::make('olamundo2015'),
                'estado' => 'on',
                'acesso' => 'user'
            )
        ));
    }
}
