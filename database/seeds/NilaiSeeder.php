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
            ['id' => '1', 'id_siswa' => '1', 'id_mapel' => '1', 'n_tugas' => 81, 'n_uts' => 87, 'n_uas' => 80, 'n_akhir' => 85.6],
            ['id' => '2', 'id_siswa' => '3', 'id_mapel' => '3', 'n_tugas' => 82, 'n_uts' => 88, 'n_uas' => 88, 'n_akhir' => 85.3],
            ['id' => '3', 'id_siswa' => '2', 'id_mapel' => '5', 'n_tugas' => 83, 'n_uts' => 89, 'n_uas' => 89, 'n_akhir' => 84.8],
            ['id' => '4', 'id_siswa' => '4', 'id_mapel' => '2', 'n_tugas' => 84, 'n_uts' => 86, 'n_uas' => 87, 'n_akhir' => 81.9],
            ['id' => '5', 'id_siswa' => '5', 'id_mapel' => '4', 'n_tugas' => 85, 'n_uts' => 85, 'n_uas' => 87, 'n_akhir' => 85],
        ]);
    }
}
