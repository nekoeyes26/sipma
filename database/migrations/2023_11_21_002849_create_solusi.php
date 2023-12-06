<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolusi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solusi', function (Blueprint $table) {
            $table->id('id_solusi');
            $table->bigInteger('id_pimpinan')->unsigned()->index();
            $table->string('solusi');
            $table->dateTime('tanggal_solusi', $precision = 0);
            $table->timestamps();

            $table->foreign('id_pimpinan')
            ->references('id_pimpinan')->on('pimpinan_kampus')
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
        Schema::dropIfExists('solusi');
    }
}
