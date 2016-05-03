<?php

use Illuminate\Database\Seeder;

class MengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('mengajar')->truncate();
        DB::table('mengajar')->insert([
            ['id' => '1', 'id_guru' => '1', 'id_mapel' => '10', 'id_kelas' => '25'],
           ]);
    }
}
