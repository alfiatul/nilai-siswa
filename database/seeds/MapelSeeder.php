<?php

use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapel')->truncate();
        DB::table('mapel')->insert([
            ['id' => '1', 'mapel' => 'Bahasa Indonesia', 'kkm' => '80'],
            ['id' => '2', 'mapel' => 'Matematika', 'kkm' => '76'],
            ['id' => '3', 'mapel' => 'Bahasa Inggris', 'kkm' => '78'],
            ['id' => '4', 'mapel' => 'Fisika', 'kkm' => '78'],
            ['id' => '5', 'mapel' => 'Kimia', 'kkm' => '75'],
            ['id' => '6', 'mapel' => 'IPA', 'kkm' => '75'],
            ['id' => '7', 'mapel' => 'IPS', 'kkm' => '75'],
            ['id' => '8', 'mapel' => 'Agama', 'kkm' => '75'],
            ['id' => '9', 'mapel' => 'Bidang Konseling', 'kkm' => '75'],
            ['id' => '10', 'mapel' => 'KKPI', 'kkm' => '75'],
            ['id' => '11', 'mapel' => 'Bahasa Jawa', 'kkm' => '75'],
            ['id' => '12', 'mapel' => 'Seni Budaya', 'kkm' => '75'],
            ['id' => '13', 'mapel' => 'Kewirausahaan', 'kkm' => '75'],
            ['id' => '14', 'mapel' => 'PPKN', 'kkm' => '75'],
            ['id' => '15', 'mapel' => 'WEB', 'kkm' => '75'],
            ['id' => '16', 'mapel' => 'Pascal', 'kkm' => '75'],
            ['id' => '17', 'mapel' => 'T.E.A.D', 'kkm' => '75'],
            ['id' => '18', 'mapel' => 'Simulasi Digital', 'kkm' => '75'],
            ['id' => '19', 'mapel' => 'Sistem Operasi', 'kkm' => '75'],
        ]);
    }
}
