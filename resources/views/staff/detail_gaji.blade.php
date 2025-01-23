@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Navbar -->
    <div class="d-flex align-items-center justify-content-between">
        <!-- Kiri: Back Button dan Tabs -->
        <div class="d-flex align-items-center">
            <a href="{{ route('staff.dashboard') }}" class="btn btn-link text-decoration-none me-3" style="font-size: 1.5rem;">
                &#8592; <!-- Unicode untuk panah kiri -->
            </a>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('staff.detailGaji', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}">Detail Gaji</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.detailTunjangan', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}">Detail Tunjangan</a>
                </li>
            </ul>
        </div>

        <!-- Kanan: Tombol Export -->
        <div class="d-flex">
            <a href="{{ route('staff.exportGajiExcel', ['bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-success me-2">Export ke Excel</a>
            <a href="{{ route('staff.exportGajiPDF', ['bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-danger">Export ke PDF</a>
        </div>
    </div>

    <!-- Konten Detail Gaji -->
    <div class="mt-4">
        <h1>Detail Gaji Anda</h1>
        <p>Bulan: {{ $bulan }} {{ $tahun }}</p>
        <p>Nama: {{ $dataGaji->Nama }}</p>

        <table class="table">
            <tr>
                <th>Komponen</th>
                <th>Rp</th>
                <th class="text-end">Nominal</th>
            </tr>
            <tr>
                <th>Gaji Bersih</th>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->Gaji_Bersih, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Potongan :</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Angsuran BJB</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->BJB, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Angsuran Bank Jateng</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->Bank_Jateng, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Angsuran BRI</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->BRI, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Angsuran BSI</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->BSI, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Koperasi</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->Koperasi, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Dharma Wanita</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->Dharma_Wanita, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Bazis</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->Bazis, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Dana Setia Kawan</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->Dana_Setia_Kawan, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Lain-lain</td>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->Lain_lain, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Total Potongan</th>
                <td>Rp</td>
                <td class="text-end">{{ number_format($dataGaji->Total_Potongan, 2, ',', '.') }}</td>
            </tr>
        </table>

    </div>
</div>
@endsection
