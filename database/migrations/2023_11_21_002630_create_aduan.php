<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aduan', function (Blueprint $table) {
            $table->id('id_aduan');
            $table->bigInteger('id_mahasiswa')->unsigned()->index();
            $table->string('judul_aduan');
            $table->string('detail_aduan');
            $table->string('jenis_aduan');
            $table->integer('level_aduan')->nullable();
            $table->string('berkas')->nullable();
            $table->dateTime('tanggal_kirim', $precision = 0);
            $table->timestamps();
            
            $table->foreign('id_mahasiswa')
            ->references('id_mahasiswa')->on('mahasiswa')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aduan');
    }
}
