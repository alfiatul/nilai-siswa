<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->string('id', 50);
            $table->string('id_siswa');
            $table->string('id_mapel');
            $table->double('n_tugas');
            $table->double('n_uts');
            $table->double('n_uas');
            $table->double('n_akhir');
            $table->primary('id_siswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nilai');
    }
}
