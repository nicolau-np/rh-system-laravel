<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     $this->call(TabelaIRTSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(ProvinciaSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(TipoDocsSeeder::class);
        $this->call(TipoFaltaSeeder::class);
        $this->call(TipoSubcidiosSeeder::class);
        $this->call(BancoSeeder::class);
        $this->call(PessoaSeeder::class);
        $this->call(UserSeeder::class);
       /*$this->call(FaltaSeeder::class);*/
        
    }
}
