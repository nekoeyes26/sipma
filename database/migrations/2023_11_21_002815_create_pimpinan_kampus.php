<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePimpinanKampus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pimpinan_kampus', function (Blueprint $table) {
            $table->id('id_pimpinan');
            $table->string('nip_pimpinan')->unique();
            $table->string('email')->unique();
            $table->string('nama');
            $table->string('password');
            $table->string('bagian');
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
        Schema::dropIfExists('pimpinan_kampus');
    }
}
