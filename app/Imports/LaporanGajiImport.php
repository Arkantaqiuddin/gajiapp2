<?php
namespace App\Imports;

use App\Models\LaporanGaji;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanGajiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new LaporanGaji([
            'No' => $row['no'] ?? null,
            'nip' => $row['nip'] ?? null,           // Impor kolom nip (NIP lama)
            'nip_baru' => $row['nip_baru'] ?? null, // Impor kolom nip_baru (NIP baru)
            'Nama' => $row['nama'] ?? null,
            'Bulan' => $row['bulan'] ?? null,
            'Tahun' => $row['tahun'] ?? null,
            'Gaji_Bersih' => $row['gaji_bersih'] ?? null,
            'BJB' => $row['bjb'] ?? null,
            'Bank_Jateng' => $row['bank_jateng'] ?? null,
            'BRI' => $row['bri'] ?? null,
            'BSI' => $row['bsi'] ?? null,
            'Koperasi' => $row['koperasi'] ?? null,
            'Dharma_Wanita' => $row['dharma_wanita'] ?? null,
            'Bazis' => $row['bazis'] ?? null,
            'Dana_Setia_Kawan' => $row['dana_setia_kawan'] ?? null,
            'Lain_lain' => $row['lain_lain'] ?? null,
            'Total_Potongan' => $row['total_potongan'] ?? null,
        ]);
    }
}