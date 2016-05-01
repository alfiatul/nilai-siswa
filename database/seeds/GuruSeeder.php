<?php

use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guru')->truncate();
        DB::table('guru')->insert([
            ['id' => '1', 'kode_guru' => '12', 'nama' => 'Pudya Rully', 'alamat' => 'Kepanjen', 'id_mapel' => '1', 'no_hp' => '085678123456'],
            ['id' => '2', 'kode_guru' => '2', 'nama' => 'Ridwan', 'alamat' => 'Malang', 'id_mapel' => '1', 'no_hp' => '085980678212'],
            ['id' => '3', 'kode_guru' => '3', 'nama' => 'Siti Rochimah', 'alamat' => 'Arjosari', 'id_mapel' => '3', 'no_hp' => '087456786345'],
            ['id' => '4', 'kode_guru' => '8', 'nama' => 'Nico Pradana', 'alamat' => 'Surabaya', 'id_mapel' => '2', 'no_hp' => '089345238978'],
            ['id' => '5', 'kode_guru' => '9', 'nama' => 'Yulianto', 'alamat' => 'Jogja', 'id_mapel' => '5', 'no_hp' => '083456083169'],
        ]);
    }
}
