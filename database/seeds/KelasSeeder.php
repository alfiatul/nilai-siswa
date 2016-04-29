<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('kelas')->truncate();
        DB::table('kelas')->insert([
            ['id' => '1', 'id_jurusan' => '1', 'kelas' => 'X', 'jml' => '30'],
            ['id' => '2', 'id_jurusan' => '1', 'kelas' => 'XI', 'jml' => '30'],
            ['id' => '3', 'id_jurusan' => '1', 'kelas' => 'XII', 'jml' => '30'],
            ['id' => '4', 'id_jurusan' => '2', 'kelas' => 'X', 'jml' => '30'],
            ['id' => '5', 'id_jurusan' => '2', 'kelas' => 'XI', 'jml' => '30'],
            ['id' => '6', 'id_jurusan' => '2', 'kelas' => 'XII', 'jml' => '30'],
            ['id' => '7', 'id_jurusan' => '3', 'kelas' => 'X', 'jml' => '30'],
            ['id' => '8', 'id_jurusan' => '3', 'kelas' => 'XI', 'jml' => '30'],
            ['id' => '9', 'id_jurusan' => '3', 'kelas' => 'XII', 'jml' => '30'],
        ]);
    }
}
