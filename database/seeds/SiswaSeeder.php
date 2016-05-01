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
            ['id' => '1', 'id_kelas' => '1', 'nis' => '1538', 'nama' => 'Tonno', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'kepanjen'],
            ['id' => '2', 'id_kelas' => '1', 'nis' => '1434', 'nama' => 'Tomi', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'malang'],
            ['id' => '3', 'id_kelas' => '2', 'nis' => '1289', 'nama' => 'Zaki', 'jk' => 'L', 'agama' => 'Hindu', 'alamat' => 'singosari'],
            ['id' => '4', 'id_kelas' => '2', 'nis' => '1325', 'nama' => 'Rendy', 'jk' => 'L', 'agama' => 'Kristen', 'alamat' => 'Ketawang'],
            ['id' => '5', 'id_kelas' => '3', 'nis' => '1345', 'nama' => 'Anjas', 'jk' => 'L', 'agama' => 'Budha', 'alamat' => 'Surabaya'],
            ['id' => '6', 'id_kelas' => '3', 'nis' => '1564', 'nama' => 'Fani', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'malang'],
            ['id' => '7', 'id_kelas' => '4', 'nis' => '1567', 'nama' => 'Ali', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'tulungagung'],
            ['id' => '8', 'id_kelas' => '4', 'nis' => '1245', 'nama' => 'Danur', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'blitar'],
            ['id' => '9', 'id_kelas' => '5', 'nis' => '1342', 'nama' => 'Rosi', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'semarang'],
            ['id' => '10', 'id_kelas' => '5', 'nis' => '1678', 'nama' => 'Agus', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'ketawang'],
            ['id' => '11', 'id_kelas' => '6', 'nis' => '2534', 'nama' => 'Riski', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'Pakisaji'],
            ['id' => '12', 'id_kelas' => '6', 'nis' => '1456', 'nama' => 'Daffa', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'malang'],
            ['id' => '13', 'id_kelas' => '7', 'nis' => '1789', 'nama' => 'Angga', 'jk' => 'L', 'agama' => 'Hindu', 'alamat' => 'Sawojajar'],
            ['id' => '14', 'id_kelas' => '7', 'nis' => '1446', 'nama' => 'Gilang', 'jk' => 'L', 'agama' => 'Kristen', 'alamat' => 'Kedung'],
            ['id' => '15', 'id_kelas' => '8', 'nis' => '1234', 'nama' => 'Rangga', 'jk' => 'L', 'agama' => 'Budha', 'alamat' => 'kepanjen'],
            ['id' => '16', 'id_kelas' => '8', 'nis' => '1567', 'nama' => 'Rando', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'kepanjen'],
            ['id' => '17', 'id_kelas' => '9', 'nis' => '1890', 'nama' => 'Rafly', 'jk' => 'L', 'agama' => 'islam', 'alamat' => 'malang'],
            ['id' => '18', 'id_kelas' => '9', 'nis' => '1456', 'nama' => 'Rahmad', 'jk' => 'L', 'agama' => 'Hindu', 'alamat' => 'singosari'],
            ['id' => '19', 'id_kelas' => '10', 'nis' => '1756', 'nama' => 'Rendy', 'jk' => 'L', 'agama' => 'Kristen', 'alamat' => 'Ketawang'],
            ['id' => '20', 'id_kelas' => '10', 'nis' => '1356', 'nama' => 'Anjas', 'jk' => 'L', 'agama' => 'Budha', 'alamat' => 'Surabaya'],
            ['id' => '21', 'id_kelas' => '11', 'nis' => '2778', 'nama' => 'Dimas', 'jk' => 'L', 'agama' => 'Islam', 'alamat' => 'malang'],
            ['id' => '22', 'id_kelas' => '11', 'nis' => '2357', 'nama' => 'Hamsah', 'jk' => 'L', 'agama' => 'Islam', 'alamat' => 'Surabaya'],
            ['id' => '23', 'id_kelas' => '12', 'nis' => '1890', 'nama' => 'cokky', 'jk' => 'L', 'agama' => 'Kristen', 'alamat' => 'Ketawang'],
            ['id' => '24', 'id_kelas' => '12', 'nis' => '1999', 'nama' => 'Aan', 'jk' => 'L', 'agama' => 'Budha', 'alamat' => 'Surabaya'],
            ['id' => '25', 'id_kelas' => '13', 'nis' => '1390', 'nama' => 'Wati', 'jk' => 'P', 'agama' => 'islam', 'alamat' => 'Kepanjen'],
            ['id' => '26', 'id_kelas' => '13', 'nis' => '1450', 'nama' => 'Anjani', 'jk' => 'P', 'agama' => 'islam', 'alamat' => 'Kepanjen'],
        ]);
    }
}
