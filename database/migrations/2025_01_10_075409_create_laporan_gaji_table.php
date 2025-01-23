<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanGajiTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_gaji', function (Blueprint $table) {
            $table->id();
            $table->integer('No')->nullable();
            $table->string('nip')->nullable();
            $table->string('nip_baru')->nullable();
            $table->string('Nama')->nullable();
            $table->string('Bulan')->nullable();
            $table->integer('Tahun')->nullable(); 
            $table->decimal('Gaji_Bersih', 15, 2)->nullable();
            $table->decimal('BJB', 15, 2)->nullable();
            $table->decimal('Bank_Jateng', 15, 2)->nullable();
            $table->decimal('BRI', 15, 2)->nullable();
            $table->decimal('BSI', 15, 2)->nullable();
            $table->decimal('Koperasi', 15, 2)->nullable();
            $table->decimal('Dharma_Wanita', 15, 2)->nullable();
            $table->decimal('Bazis', 15, 2)->nullable();
            $table->decimal('Dana_Setia_Kawan', 15, 2)->nullable();
            $table->decimal('Lain_lain', 15, 2)->nullable();
            $table->decimal('Total_Potongan', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_gaji');
    }
}
