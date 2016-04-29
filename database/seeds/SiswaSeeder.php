<?php

use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->truncate();
        DB::table('siswa')->insert([
            ['id' => '1', 'id_kelas' => '1', 'nis' => '1538', 'nama' => 'Putri', 'jk' => 'P', 'agama' => 'islam', 'alamat' => 'kepanjen'],
            ['id' => '2', 'id_kelas' => '2', 'nis' => '1434', 'nama' => 'Zaskia', 'jk' => 'P', 'agama' => 'islam', 'alamat' => 'malang'],
            ['id' => '3', 'id_kelas' => '5', 'nis' => '1289', 'nama' => 'Indri', 'jk' => 'P', 'agama' => 'Hindu', 'alamat' => 'singosari'],
            ['id' => '4', 'id_kelas' => '4', 'nis' => '1325', 'nama' => 'Thesa', 'jk' => 'P', 'agama' => 'Kristen', 'alamat' => 'Ketawang'],
            ['id' => '5', 'id_kelas' => '7', 'nis' => '1345', 'nama' => 'Yono', 'jk' => 'L', 'agama' => 'Budha', 'alamat' => 'Surabaya'],
        ]);
    }
}
