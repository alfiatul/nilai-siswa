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
        ]);
    }
}
