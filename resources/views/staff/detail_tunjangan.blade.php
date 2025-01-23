@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Navbar -->
    <div class="d-flex justify-content-between align-items-center">
        <!-- Kiri: Back Button dan Tabs -->
        <div class="d-flex align-items-center">
            <a href="{{ route('staff.dashboard') }}" class="btn btn-link text-decoration-none me-3" style="font-size: 1.5rem;">
                &#8592; <!-- Unicode untuk panah kiri -->
            </a>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.detailGaji', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}">Detail Gaji</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('staff.detailTunjangan', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}">Detail Tunjangan</a>
                </li>
            </ul>
        </div>

        <!-- Kanan: Tombol Export -->
        <div class="d-flex">
            <a href="{{ route('staff.exportTunjanganExcel', ['bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-success me-2">Export ke Excel</a>
            <a href="{{ route('staff.exportTunjanganPDF', ['bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-danger">Export ke PDF</a>
        </div>
    </div>

    <!-- Konten Detail Tunjangan -->
    <div class="mt-4">
        <h1>Detail Tunjangan Anda</h1>
        <p>Bulan: {{ $bulan }} {{ $tahun }}</p>
        <p>Nama: {{ $dataTunjangan->Nama }}</p>

        <table class="table">
            <tr>
                <th>Komponen</th>
                <th>Rp</th>
                <th class="text-end">Nominal</th>
            </tr>
            <tr>
                <th>Tunjangan Kinerja Bersih</th>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->TK_Bersih, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Potongan :</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Dana Sosial</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Dana_Sosial, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Dana Bapor</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Dana_Bapor, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Subsidi Keluarga Outsourching</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Subsidi_Keluarga_Outsourching, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Teknis Atas</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Teknis_Atas, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Produksi</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Produksi, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Sosial</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Sosial, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Dharma Wanita</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Dharma_Wanita, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Bank</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Bank, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Lain-lain</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Lain_lain, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Total Potongan</th>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataTunjangan->Total_Potongan, 2, ',', '.') }}</td>
            </tr>
        </table>
        
    </div>
</div>
@endsection
