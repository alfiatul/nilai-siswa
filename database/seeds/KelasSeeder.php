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
            ['id' => '1', 'id_jurusan' => '1', 'kelas' => '10', 'jml' => '30'],
            ['id' => '2', 'id_jurusan' => '1', 'kelas' => '11', 'jml' => '30'],
            ['id' => '3', 'id_jurusan' => '1', 'kelas' => '12', 'jml' => '30'],
            ['id' => '4', 'id_jurusan' => '2', 'kelas' => '10', 'jml' => '30'],
            ['id' => '5', 'id_jurusan' => '2', 'kelas' => '11', 'jml' => '30'],
            ['id' => '6', 'id_jurusan' => '2', 'kelas' => '12', 'jml' => '30'],
            ['id' => '7', 'id_jurusan' => '3', 'kelas' => '10', 'jml' => '30'],
            ['id' => '8', 'id_jurusan' => '3', 'kelas' => '11', 'jml' => '30'],
            ['id' => '9', 'id_jurusan' => '3', 'kelas' => '12', 'jml' => '30'],
            ['id' => '10', 'id_jurusan' => '4', 'kelas' => '10', 'jml' => '30'],
            ['id' => '11', 'id_jurusan' => '4', 'kelas' => '11', 'jml' => '30'],
            ['id' => '12', 'id_jurusan' => '4', 'kelas' => '12', 'jml' => '30'],
            ['id' => '13', 'id_jurusan' => '5', 'kelas' => '10', 'jml' => '30'],
            ['id' => '14', 'id_jurusan' => '5', 'kelas' => '11', 'jml' => '30'],
            ['id' => '15', 'id_jurusan' => '5', 'kelas' => '12', 'jml' => '30'],
            ['id' => '16', 'id_jurusan' => '6', 'kelas' => '10', 'jml' => '30'],
            ['id' => '17', 'id_jurusan' => '6', 'kelas' => '11', 'jml' => '30'],
            ['id' => '18', 'id_jurusan' => '6', 'kelas' => '12', 'jml' => '30'],
            ['id' => '19', 'id_jurusan' => '7', 'kelas' => '10', 'jml' => '30'],
            ['id' => '20', 'id_jurusan' => '7', 'kelas' => '11', 'jml' => '30'],
            ['id' => '21', 'id_jurusan' => '7', 'kelas' => '12', 'jml' => '30'],
            ['id' => '22', 'id_jurusan' => '8', 'kelas' => '10', 'jml' => '30'],
            ['id' => '23', 'id_jurusan' => '8', 'kelas' => '11', 'jml' => '30'],
            ['id' => '24', 'id_jurusan' => '8', 'kelas' => '12', 'jml' => '30'],
            ['id' => '25', 'id_jurusan' => '9', 'kelas' => '10', 'jml' => '30'],
            ['id' => '26', 'id_jurusan' => '9', 'kelas' => '11', 'jml' => '30'],
            ['id' => '27', 'id_jurusan' => '9', 'kelas' => '12', 'jml' => '30'],
            ['id' => '28', 'id_jurusan' => '10', 'kelas' => '10', 'jml' => '30'],
            ['id' => '29', 'id_jurusan' => '10', 'kelas' => '11', 'jml' => '30'],
            ['id' => '30', 'id_jurusan' => '10', 'kelas' => '12', 'jml' => '30'],
            ['id' => '31', 'id_jurusan' => '11', 'kelas' => '10', 'jml' => '30'],
            ['id' => '32', 'id_jurusan' => '11', 'kelas' => '11', 'jml' => '30'],
            ['id' => '33', 'id_jurusan' => '11', 'kelas' => '12', 'jml' => '30'],
        ]);
    }
}
