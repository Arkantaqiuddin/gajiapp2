<?php

namespace App\Imports;

use App\Models\LaporanTunjangan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanTunjanganImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new LaporanTunjangan([
            'No' => $row['no'] ?? null,
            'Username' => $row['username'] ?? null,
            'nip' => $row['nip'] ?? null,
            'nip_baru' => $row['nip_baru'] ?? null,
            'Nama' => $row['nama'] ?? null,
            'Bulan' => $row['bulan'] ?? null,
            'Tahun' => $row['tahun'] ?? null,
            'TK_Bersih' => $row['tk_bersih'] ?? null,
            'Dana_Sosial' => $row['dana_sosial'] ?? null,
            'Dana_Bapor' => $row['dana_bapor'] ?? null,
            'Subsidi_Keluarga_Outsourching' => $row['subsidi_keluarga_outsourching'] ?? null,
            'Teknis_Atas' => $row['teknis_atas'] ?? null,
            'Produksi' => $row['produksi'] ?? null,
            'Sosial' => $row['sosial'] ?? null,
            'Dharma_Wanita' => $row['dharma_wanita'] ?? null,
            'Bank' => $row['bank'] ?? null,
            'Lain_lain' => $row['lain_lain'] ?? null,
            'Total_Potongan' => $row['total_potongan'] ?? null,
        ]);
    }
}