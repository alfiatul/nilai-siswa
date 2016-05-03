<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(GuruSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(NilaiSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(MengajarSeeder::class);
        $this->call(JurusanSeeder::class);
        Model::reguard();
    }
}