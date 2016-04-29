<?php

use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->truncate();
        DB::table('jurusan')->insert([
            ['id' => '1', 'jurusan' => 'TKR 1'],
            ['id' => '2', 'jurusan' => 'TKR 2'],
            ['id' => '3', 'jurusan' => 'TKR 3'],
            ['id' => '4', 'jurusan' => 'TSM'],
            ['id' => '5', 'jurusan' => 'TEI 1'],
            ['id' => '6', 'jurusan' => 'TEI 2'],
            ['id' => '7', 'jurusan' => 'TEI 3'],
            ['id' => '8', 'jurusan' => 'RPL 1'],
            ['id' => '9', 'jurusan' => 'RPL 2'],
            ['id' => '10', 'jurusan' => 'RPL 3'],
            ['id' => '11', 'jurusan' => 'TKJ'],
        ]);
    }
}
