<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert(array(

            //Namibe
            array(
                'id_provincia' => 1,
                'municipio' => 'Moçamedes'
            ), array(
                'id_provincia' => 1,
                'municipio' => 'Tômbwa'
            ), array(
                'id_provincia' => 1,
                'municipio' => 'Virei'
            ), array(
                'id_provincia' => 1,
                'municipio' => 'Bibala'
            ), array(
                'id_provincia' => 1,
                'municipio' => 'Camucuio'
            ), array(
                'id_provincia' => 1,
                'municipio' => 'Lucira'
            ),
            //fim


            //Benguela
            array(
                'id_provincia' => 2,
                'municipio' => 'Benguela'
            ), array(
                'id_provincia' => 2,
                'municipio' => 'Baía Farta'
            ), array(
                'id_provincia' => 2,
                'municipio' => 'Balombo'
            ), array(
                'id_provincia' => 2,
                'municipio' => 'Bocoio'
            ), array(
                'id_provincia' => 2,
                'municipio' => 'Caimbambo'
            ), array(
                'id_provincia' => 2,
                'municipio' => 'Chongoroi'
            ), array(
                'id_provincia' => 2,
                'municipio' => 'Cubal'
            ), array(
                'id_provincia' => 2,
                'municipio' => 'Ganda'
            ), array(
                'id_provincia' => 2,
                'municipio' => 'Lubito'
            ),
            //fim

            //Huíla
            array(
                'id_provincia' => 3,
                'municipio' => 'Lubango'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Matala'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Humpata'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Quipungo'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Chibia'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Chicomba'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Cuvango'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Caconda'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Chipindo'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Quilengues'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Cacula'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Jamba'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Caluquembe'
            ), array(
                'id_provincia' => 3,
                'municipio' => 'Chiange'
            ),
            //fim


            //Malanje
            array(
                'id_provincia' => 4,
                'municipio' => 'Malanje'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Cacuso'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Calandula'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Cambundi-Catembo'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Cangandala'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Caombo'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Cuaba Nzongo'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Cuanda-Dia-Baze'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Luquembo'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Marimba'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Massango'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Mucari'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Quela'
            ), array(
                'id_provincia' => 4,
                'municipio' => 'Quirima'
            ),
            //fim


            //Cabinda
            array(
                'id_provincia' => 5,
                'municipio' => 'Cabinda'
            ), array(
                'id_provincia' => 5,
                'municipio' => 'Belize'
            ), array(
                'id_provincia' => 5,
                'municipio' => 'Buco-Zau'
            ), array(
                'id_provincia' => 5,
                'municipio' => 'Cacongo'
            ),
            //fim


            //Zaire
            array(
                'id_provincia' => 6,
                'municipio' => 'MBanza Kongo'
            ), array(
                'id_provincia' => 6,
                'municipio' => 'Cuimba'
            ), array(
                'id_provincia' => 6,
                'municipio' => 'Noqui'
            ), array(
                'id_provincia' => 6,
                'municipio' => 'NZeto'
            ), array(
                'id_provincia' => 6,
                'municipio' => 'Soyo'
            ), array(
                'id_provincia' => 6,
                'municipio' => 'Tomboco'
            ),
            //fim

            //Uíge
            array(
                'id_provincia' => 7,
                'municipio' => 'Uíge'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Alto Cauale'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Ambuíla'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Bembe'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Buengas'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Damba'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Macocola'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Mucaba'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Negage'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Puri'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Quimbele'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Quitexe'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Sanza Pombo'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Songo'
            ), array(
                'id_provincia' => 7,
                'municipio' => 'Zombo'
            ),
            //fim


            //Bengo
            array(
                'id_provincia' => 8,
                'municipio' => 'Caxito'
            ), array(
                'id_provincia' => 8,
                'municipio' => 'Ambriz'
            ), array(
                'id_provincia' => 8,
                'municipio' => 'Ícolo e Bengo'
            ), array(
                'id_provincia' => 8,
                'municipio' => 'Bula Atumba'
            ), array(
                'id_provincia' => 8,
                'municipio' => 'Dande'
            ), array(
                'id_provincia' => 8,
                'municipio' => 'Dembos'
            ), array(
                'id_provincia' => 8,
                'municipio' => 'Nambuangongo'
            ), array(
                'id_provincia' => 8,
                'municipio' => 'Pango Aluquém'
            ), array(
                'id_provincia' => 8,
                'municipio' => 'Quiçama'
            ),
            //fim


            //Lunda Sul
            array(
                'id_provincia' => 9,
                'municipio' => 'Saurimo'
            ), array(
                'id_provincia' => 9,
                'municipio' => 'Cacolo'
            ), array(
                'id_provincia' => 9,
                'municipio' => 'Dala'
            ), array(
                'id_provincia' => 9,
                'municipio' => 'Muconda'
            ),
            //fim

            //Lunda Norte
            array(
                'id_provincia' => 10,
                'municipio' => 'Dundo'
            ), array(
                'id_provincia' => 10,
                'municipio' => 'Cambulo'
            ), array(
                'id_provincia' => 10,
                'municipio' => 'Capenda-Camulemba'
            ), array(
                'id_provincia' => 10,
                'municipio' => 'Caungula'
            ), array(
                'id_provincia' => 10,
                'municipio' => 'Chitato'
            ), array(
                'id_provincia' => 10,
                'municipio' => 'Cuango'
            ), array(
                'id_provincia' => 10,
                'municipio' => 'Cuílo'
            ), array(
                'id_provincia' => 10,
                'municipio' => 'Lubalo'
            ), array(
                'id_provincia' => 10,
                'municipio' => 'Xá-Muteba'
            ),
            //fim

            //Cuanza Sul
            array(
                'id_provincia' => 11,
                'municipio' => 'Sumbe'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Amboim'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Cassongue'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Cela'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Conda'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Ebo'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Mussende'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Porto Amboim'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Quibala'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Quilenda'
            ), array(
                'id_provincia' => 11,
                'municipio' => 'Seles'
            ),
            //fim

            //Cuando Norte
            array(
                'id_provincia' => 12,
                'municipio' => 'Ndalatando'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Ambaca'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Banga'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Bolongongo'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Cambambe'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Cazengo'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Golungo Alto'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Gonguembo'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Lucala'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Quiculungo'
            ), array(
                'id_provincia' => 12,
                'municipio' => 'Samba Caju'
            ),
            //fim


            //Luanda
            array(
                'id_provincia' => 13,
                'municipio' => 'Luanda'
            ), array(
                'id_provincia' => 13,
                'municipio' => 'Cacuaco'
            ), array(
                'id_provincia' => 13,
                'municipio' => 'Cazenga'
            ), array(
                'id_provincia' => 13,
                'municipio' => 'Ingombota'
            ), array(
                'id_provincia' => 13,
                'municipio' => 'Kilamba Kiaxi'
            ), array(
                'id_provincia' => 13,
                'municipio' => 'Maianga'
            ), array(
                'id_provincia' => 13,
                'municipio' => 'Rangel'
            ), array(
                'id_provincia' => 13,
                'municipio' => 'Samba'
            ), array(
                'id_provincia' => 13,
                'municipio' => 'Sambizanga'
            ), array(
                'id_provincia' => 13,
                'municipio' => 'Viana'
            ),
            //fim


            //Cunene
            array(
                'id_provincia' => 14,
                'municipio' => 'Ondjiva'
            ), array(
                'id_provincia' => 14,
                'municipio' => 'Cahama'
            ), array(
                'id_provincia' => 14,
                'municipio' => 'Cuanhama'
            ), array(
                'id_provincia' => 14,
                'municipio' => 'Curoca'
            ), array(
                'id_provincia' => 14,
                'municipio' => 'Cuvale'
            ), array(
                'id_provincia' => 14,
                'municipio' => 'Namacunde'
            ), array(
                'id_provincia' => 14,
                'municipio' => 'Ombanja'
            ),
            //fim


            //Moxico
            array(
                'id_provincia' => 15,
                'municipio' => 'Luena'
            ), array(
                'id_provincia' => 15,
                'municipio' => 'Alto Zambeze'
            ), array(
                'id_provincia' => 15,
                'municipio' => 'Bundas'
            ), array(
                'id_provincia' => 15,
                'municipio' => 'Camanongue'
            ), array(
                'id_provincia' => 15,
                'municipio' => 'Léua'
            ), array(
                'id_provincia' => 15,
                'municipio' => 'Luau'
            ), array(
                'id_provincia' => 15,
                'municipio' => 'Luacano'
            ), array(
                'id_provincia' => 15,
                'municipio' => 'Luchazes'
            ), array(
                'id_provincia' => 15,
                'municipio' => 'Moxico'
            ),
            //fim

            //Cuando Cubango
            array(
                'id_provincia' => 16,
                'municipio' => 'Menongue'
            ), array(
                'id_provincia' => 16,
                'municipio' => 'Calai'
            ), array(
                'id_provincia' => 16,
                'municipio' => 'Cuangar'
            ), array(
                'id_provincia' => 16,
                'municipio' => 'Cuchi'
            ), array(
                'id_provincia' => 16,
                'municipio' => 'Cuito Cuanavale'
            ), array(
                'id_provincia' => 16,
                'municipio' => 'Dirico'
            ), array(
                'id_provincia' => 16,
                'municipio' => 'Mavinga'
            ), array(
                'id_provincia' => 16,
                'municipio' => 'Nancova'
            ), array(
                'id_provincia' => 16,
                'municipio' => 'Rivungo'
            ),
            //fim

            //Huambo
            array(
                'id_provincia' => 17,
                'municipio' => 'Huambo'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Bailundo'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Catchiungo'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Caála'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Ekunha'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Londuimbale'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Longonjo'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Mungo Amboim'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Tchicala-Tcholoanga'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Tchindjenje'
            ), array(
                'id_provincia' => 17,
                'municipio' => 'Ucuma'
            ),
            //fim


            //Bié
            array(
                'id_provincia' => 18,
                'municipio' => 'Kuito'
            ), array(
                'id_provincia' => 18,
                'municipio' => 'Andulo'
            ), array(
                'id_provincia' => 18,
                'municipio' => 'Camacupa'
            ), array(
                'id_provincia' => 18,
                'municipio' => 'Catabola'
            ), array(
                'id_provincia' => 18,
                'municipio' => 'Chingular'
            ), array(
                'id_provincia' => 18,
                'municipio' => 'Chitembo'
            ), array(
                'id_provincia' => 18,
                'municipio' => 'Cuemba'
            ), array(
                'id_provincia' => 18,
                'municipio' => 'Cunhinga'
            ), array(
                'id_provincia' => 18,
                'municipio' => 'Nharea'
            )
            //fim

        ));
    }
}
