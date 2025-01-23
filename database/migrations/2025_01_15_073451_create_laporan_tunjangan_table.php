<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTunjanganTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_tunjangan', function (Blueprint $table) {
            $table->id();
            $table->integer('No')->nullable();
            $table->string('Username')->nullable();
            $table->string('nip')->nullable();
            $table->string('nip_baru')->nullable();
            $table->string('Nama')->nullable();
            $table->integer('Bulan')->nullable();
            $table->integer('Tahun')->nullable();
            $table->decimal('TK_Bersih', 15, 2)->nullable();
            $table->decimal('Dana_Sosial', 15, 2)->nullable();
            $table->decimal('Dana_Bapor', 15, 2)->nullable();
            $table->decimal('Subsidi_Keluarga_Outsourching', 15, 2)->nullable();
            $table->decimal('Teknis_Atas', 15, 2)->nullable();
            $table->decimal('Produksi', 15, 2)->nullable();
            $table->decimal('Sosial', 15, 2)->nullable();
            $table->decimal('Dharma_Wanita', 15, 2)->nullable();
            $table->decimal('Bank', 15, 2)->nullable();
            $table->decimal('Lain_lain', 15, 2)->nullable();
            $table->decimal('Total_Potongan', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_tunjangan');
    }
}