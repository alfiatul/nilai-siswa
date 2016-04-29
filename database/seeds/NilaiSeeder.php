<?php

use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilai')->truncate();
        DB::table('nilai')->insert([
            ['id' => '1', 'id_siswa' => '1', 'id_mapel' => '1', 'n_tugas' => 8, 'n_uts' => 8, 'n_uas' => 8, 'n_akhir' => 8.5],
            ['id' => '2', 'id_siswa' => '3', 'id_mapel' => '3', 'n_tugas' => 8, 'n_uts' => 8, 'n_uas' => 8, 'n_akhir' => 8.5],
            ['id' => '3', 'id_siswa' => '2', 'id_mapel' => '5', 'n_tugas' => 8, 'n_uts' => 8, 'n_uas' => 8, 'n_akhir' => 8.5],
            ['id' => '4', 'id_siswa' => '4', 'id_mapel' => '2', 'n_tugas' => 8, 'n_uts' => 8, 'n_uas' => 8, 'n_akhir' => 8.5],
            ['id' => '5', 'id_siswa' => '5', 'id_mapel' => '4', 'n_tugas' => 8, 'n_uts' => 8, 'n_uas' => 8, 'n_akhir' => 8.5],
        ]);
    }
}
