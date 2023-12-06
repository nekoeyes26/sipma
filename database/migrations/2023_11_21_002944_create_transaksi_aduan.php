<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiAduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_aduan', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->bigInteger('id_aduan')->unsigned()->index();
            $table->bigInteger('id_solusi')->unsigned()->index()->nullable();
            $table->bigInteger('id_bakpk')->unsigned()->index();
            $table->string('tindak_lanjut')->nullable();
            $table->timestamps();

            $table->foreign('id_aduan')
            ->references('id_aduan')->on('aduan')
            ->onDelete('cascade');
            $table->foreign('id_solusi')
            ->references('id_solusi')->on('solusi')
            ->onDelete('cascade');
            $table->foreign('id_bakpk')
            ->references('id_bakpk')->on('bakpk')
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
        Schema::dropIfExists('transaksi_aduan');
    }
}
