<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanGaji extends Model
{
    use HasFactory;

    protected $table = 'laporan_gaji';

    protected $fillable = [
        'No', 'nip', 'nip_baru', 'Nama', 'Bulan', 'Tahun', 
        'Gaji_Bersih', 'BJB', 'Bank_Jateng', 'BRI', 'BSI', 'Koperasi',
        'Dharma_Wanita', 'Bazis', 'Dana_Setia_Kawan', 'Lain_lain', 'Total_Potongan',
    ];
}