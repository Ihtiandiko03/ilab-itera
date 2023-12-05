<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPeminjam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_peminjam', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_tiket')->unique();
            $table->integer('id_alat_lab')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('nama');
            $table->string('phone');
            $table->string('instansi')->nullable();
            $table->text('alamat_instansi')->nullable();
            $table->date('tgl_dipinjam')->nullable();
            $table->date('tgl_dikembalikan')->nullable();
            $table->string('status');


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
        Schema::dropIfExists('data_peminjam');
    }
}
