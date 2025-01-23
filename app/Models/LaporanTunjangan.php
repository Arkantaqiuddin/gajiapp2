<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanTunjangan extends Model
{
    use HasFactory;

    protected $table = 'laporan_tunjangan';

    protected $fillable = [
        'No', 'Username', 'nip', 'nip_baru', 'Nama', 'Bulan', 'Tahun',
        'TK_Bersih', 'Dana_Sosial', 'Dana_Bapor', 'Subsidi_Keluarga_Outsourching',
        'Teknis_Atas', 'Produksi', 'Sosial', 'Dharma_Wanita', 'Bank',
        'Lain_lain', 'Total_Potongan',
    ];
}