<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\LaporanGaji;
use App\Models\LaporanTunjangan;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\LaporanGajiImport;
use App\Imports\LaporanTunjanganImport;

class LaporanGajiController extends Controller
{

    public function importLaporan(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048', // Hanya menerima file Excel
        ]);

        try {
            // Proses import file Excel
            Excel::import(new LaporanGajiImport, $request->file('file'));

            return redirect()->back()->with('success', 'Laporan gaji berhasil diunggah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah file: ' . $e->getMessage());
        }
    }

    public function showDetailGaji(Request $request)
    {
        // Validasi input bulan dan tahun
        $request->validate([
            'bulan' => 'required|string',
            'tahun' => 'required|integer',
        ]);

        // Mapping nama bulan ke angka
        $bulanMapping = [
            'Januari' => 1, 'Februari' => 2, 'Maret' => 3, 'April' => 4,
            'Mei' => 5, 'Juni' => 6, 'Juli' => 7, 'Agustus' => 8,
            'September' => 9, 'Oktober' => 10, 'November' => 11, 'Desember' => 12,
        ];

        $bulanAngka = $bulanMapping[$request->input('bulan')];
        $tahun = $request->input('tahun');

        // Ambil NIP dari session
        $nip = Session::get('nip'); // Gunakan NIP dari session

        if (!$nip) {
            return redirect()->route('home')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Cari data gaji berdasarkan NIP, bulan, dan tahun
        $dataGaji = LaporanGaji::where('nip', $nip) // Cari data berdasarkan NIP
                                ->where('Bulan', $bulanAngka)
                                ->where('Tahun', $tahun)
                                ->first();

        if (!$dataGaji) {
            return redirect()->back()->with('error', 'Data gaji tidak ditemukan untuk bulan dan tahun yang dipilih.');
        }

        return view('staff.detail_gaji', [
            'dataGaji' => $dataGaji,
            'bulan' => $request->input('bulan'),
            'tahun' => $tahun,
        ]);
    }
    
    public function importTunjangan(Request $request)
    {
    // Validasi file yang diunggah
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv|max:2048', // Hanya menerima file Excel
    ]);

    try {
        // Proses import file Excel
        Excel::import(new LaporanTunjanganImport, $request->file('file'));

        return redirect()->back()->with('success', 'Laporan tunjangan berhasil diunggah.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah file: ' . $e->getMessage());
    }
    }

    public function showDetailTunjangan(Request $request)
    {
    // Validasi input bulan dan tahun
    $request->validate([
        'bulan' => 'required|string',
        'tahun' => 'required|integer',
    ]);

    // Mapping nama bulan ke angka
    $bulanMapping = [
        'Januari' => 1, 'Februari' => 2, 'Maret' => 3, 'April' => 4,
        'Mei' => 5, 'Juni' => 6, 'Juli' => 7, 'Agustus' => 8,
        'September' => 9, 'Oktober' => 10, 'November' => 11, 'Desember' => 12,
    ];

    $bulanAngka = $bulanMapping[$request->input('bulan')];
    $tahun = $request->input('tahun');

    // Ambil NIP dari session
    $nip = Session::get('nip'); // Gunakan NIP dari session

    if (!$nip) {
        return redirect()->route('home')->with('error', 'Anda harus login terlebih dahulu.');
    }

    // Cari data tunjangan berdasarkan NIP, bulan, dan tahun
    $dataTunjangan = \App\Models\LaporanTunjangan::where('nip', $nip)
        ->where('Bulan', $bulanAngka)
        ->where('Tahun', $tahun)
        ->first();

    if (!$dataTunjangan) {
        return redirect()->back()->with('error', 'Data tunjangan tidak ditemukan untuk bulan dan tahun yang dipilih.');
    }

    // Kirim data bulan dan tahun ke view
    return view('staff.detail_tunjangan', [
        'dataTunjangan' => $dataTunjangan,
        'bulan' => $request->input('bulan'),
        'tahun' => $tahun,
    ]);
    }

    public function exportGajiExcel(Request $request)
{
    $nip = Session::get('nip');
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // Mapping nama bulan ke angka
    $bulanMapping = [
        'Januari' => 1, 'Februari' => 2, 'Maret' => 3, 'April' => 4,
        'Mei' => 5, 'Juni' => 6, 'Juli' => 7, 'Agustus' => 8,
        'September' => 9, 'Oktober' => 10, 'November' => 11, 'Desember' => 12,
    ];
    $bulanAngka = $bulanMapping[$bulan];

    // Ambil data gaji
    $dataGaji = LaporanGaji::where('nip', $nip)
        ->where('Bulan', $bulanAngka)
        ->where('Tahun', $tahun)
        ->first();

    if (!$dataGaji) {
        return redirect()->back()->with('error', 'Data gaji tidak ditemukan.');
    }

    // Data untuk export
    $exportData = [
        ['Nama', $dataGaji->Nama],
        ['Bulan', $bulan],
        ['Tahun', $tahun],
        ['Gaji Bersih', 'Rp. ' . number_format($dataGaji->Gaji_Bersih, 2, ',', '.')],
        ['Potongan', ''],
        ['Angsuran BJB', 'Rp. ' . number_format($dataGaji->BJB, 2, ',', '.')],
        ['Angsuran Bank Jateng', 'Rp. ' . number_format($dataGaji->Bank_Jateng, 2, ',', '.')],
        ['Angsuran BRI', 'Rp. ' . number_format($dataGaji->BRI, 2, ',', '.')],
        ['Angsuran BSI', 'Rp. ' . number_format($dataGaji->BSI, 2, ',', '.')],
        ['Koperasi', 'Rp. ' . number_format($dataGaji->Koperasi, 2, ',', '.')],
        ['Dharma Wanita', 'Rp. ' . number_format($dataGaji->Dharma_Wanita, 2, ',', '.')],
        ['Bazis', 'Rp. ' . number_format($dataGaji->Bazis, 2, ',', '.')],
        ['Dana Setia Kawan', 'Rp. ' . number_format($dataGaji->Dana_Setia_Kawan, 2, ',', '.')],
        ['Lain-lain', 'Rp. ' . number_format($dataGaji->Lain_lain, 2, ',', '.')],
        ['Total Potongan', 'Rp. ' . number_format($dataGaji->Total_Potongan, 2, ',', '.')],
    ];

    // Export ke Excel
    return Excel::download(new \App\Exports\GajiExport($exportData), 'Detail_Gaji.xlsx');
    }

    public function exportGajiPDF(Request $request)
    {
    $nip = Session::get('nip');
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // Mapping nama bulan ke angka
    $bulanMapping = [
        'Januari' => 1, 'Februari' => 2, 'Maret' => 3, 'April' => 4,
        'Mei' => 5, 'Juni' => 6, 'Juli' => 7, 'Agustus' => 8,
        'September' => 9, 'Oktober' => 10, 'November' => 11, 'Desember' => 12,
    ];
    $bulanAngka = $bulanMapping[$bulan];

    // Ambil data gaji
    $dataGaji = LaporanGaji::where('nip', $nip)
        ->where('Bulan', $bulanAngka)
        ->where('Tahun', $tahun)
        ->first();

    if (!$dataGaji) {
        return redirect()->back()->with('error', 'Data gaji tidak ditemukan.');
    }

    // Generate PDF
    $pdf = Pdf::loadView('exports.gaji_pdf', compact('dataGaji', 'bulan', 'tahun'));
    return $pdf->download('Detail_Gaji.pdf');
    }

    public function exportTunjanganExcel(Request $request)
    {
    $nip = Session::get('nip');
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // Mapping nama bulan ke angka
    $bulanMapping = [
        'Januari' => 1, 'Februari' => 2, 'Maret' => 3, 'April' => 4,
        'Mei' => 5, 'Juni' => 6, 'Juli' => 7, 'Agustus' => 8,
        'September' => 9, 'Oktober' => 10, 'November' => 11, 'Desember' => 12,
    ];
    $bulanAngka = $bulanMapping[$bulan];

    // Ambil data tunjangan
    $dataTunjangan = LaporanTunjangan::where('nip', $nip)
        ->where('Bulan', $bulanAngka)
        ->where('Tahun', $tahun)
        ->first();

    if (!$dataTunjangan) {
        return redirect()->back()->with('error', 'Data tunjangan tidak ditemukan.');
    }

    // Data untuk export
    $exportData = [
        ['Nama', $dataTunjangan->Nama],
        ['Bulan', $bulan],
        ['Tahun', $tahun],
        ['Tunjangan Kinerja Bersih', 'Rp. ' . number_format($dataTunjangan->TK_Bersih, 2, ',', '.')],
        ['Potongan', ''],
        ['Dana Sosial', 'Rp. ' . number_format($dataTunjangan->Dana_Sosial, 2, ',', '.')],
        ['Dana Bapor', 'Rp. ' . number_format($dataTunjangan->Dana_Bapor, 2, ',', '.')],
        ['Subsidi Keluarga Outsourching', 'Rp. ' . number_format($dataTunjangan->Subsidi_Keluarga_Outsourching, 2, ',', '.')],
        ['Teknis Atas', 'Rp. ' . number_format($dataTunjangan->Teknis_Atas, 2, ',', '.')],
        ['Produksi', 'Rp. ' . number_format($dataTunjangan->Produksi, 2, ',', '.')],
        ['Sosial', 'Rp. ' . number_format($dataTunjangan->Sosial, 2, ',', '.')],
        ['Dharma Wanita', 'Rp. ' . number_format($dataTunjangan->Dharma_Wanita, 2, ',', '.')],
        ['Bank', 'Rp. ' . number_format($dataTunjangan->Bank, 2, ',', '.')],
        ['Lain-lain', 'Rp. ' . number_format($dataTunjangan->Lain_lain, 2, ',', '.')],
        ['Total Potongan', 'Rp. ' . number_format($dataTunjangan->Total_Potongan, 2, ',', '.')],
    ];

    // Export ke Excel
    return Excel::download(new \App\Exports\TunjanganExport($exportData), 'Detail_Tunjangan.xlsx');
    }

    public function exportTunjanganPDF(Request $request)
    {
    // Ambil NIP dari session
    $nip = Session::get('nip');
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // Mapping nama bulan ke angka
    $bulanMapping = [
        'Januari' => 1, 'Februari' => 2, 'Maret' => 3, 'April' => 4,
        'Mei' => 5, 'Juni' => 6, 'Juli' => 7, 'Agustus' => 8,
        'September' => 9, 'Oktober' => 10, 'November' => 11, 'Desember' => 12,
    ];
    $bulanAngka = $bulanMapping[$bulan];

    // Ambil data tunjangan berdasarkan NIP, bulan, dan tahun
    $dataTunjangan = LaporanTunjangan::where('nip', $nip)
        ->where('Bulan', $bulanAngka)
        ->where('Tahun', $tahun)
        ->first();

    // Jika data tidak ditemukan, kembalikan error
    if (!$dataTunjangan) {
        return redirect()->back()->with('error', 'Data tunjangan tidak ditemukan.');
    }

    // Generate PDF menggunakan view 'exports.tunjangan_pdf'
    $pdf = Pdf::loadView('exports.tunjangan_pdf', [
        'dataTunjangan' => $dataTunjangan,
        'bulan' => $bulan,
        'tahun' => $tahun,
    ]);

    // Unduh file PDF
    return $pdf->download('Detail_Tunjangan.pdf');
    }
}