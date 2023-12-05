<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatLaboratorium extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat_laboratorium', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->date('tgl_masuk')->nullable();
            $table->string('lokasi_gedung');
            $table->string('nama_lab');
            $table->string('ruangan');
            $table->string('kondisi');
            $table->integer('jumlah_alat');
            $table->string('gambar_alat');
            $table->text('spesifikasi_alat');
            $table->text('ket_alat')->nullable();
            $table->string('status_alat');
            $table->double('harga', 8, 2);
            $table->integer('kategori');



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
        Schema::dropIfExists('alat_laboratorium');
    }
}
