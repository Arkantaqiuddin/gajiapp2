<!DOCTYPE html>
<html>
<head>
    <title>Detail Tunjangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        .no-border {
            border-right: none;
        }
        .no-left-border {
            border-left: none;
        }
        th {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Detail Tunjangan Anda</h1>
    <p>Bulan: {{ $bulan }} {{ $tahun }}</p>
    <p>Nama: {{ $dataTunjangan->Nama }}</p>

    <table>
        <tr>
            <th>Tunjangan Kinerja Bersih</th>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->TK_Bersih, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th colspan="3">Potongan :</th>
        </tr>
        <tr>
            <td>Dana Sosial</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Dana_Sosial, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Dana Bapor</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Dana_Bapor, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Subsidi Keluarga Outsourching</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Subsidi_Keluarga_Outsourching, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Teknis Atas</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Teknis_Atas, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Produksi</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Produksi, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Sosial</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Sosial, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Dharma Wanita</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Dharma_Wanita, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Bank</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Bank, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Lain-lain</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Lain_lain, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Potongan</th>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataTunjangan->Total_Potongan, 2, ',', '.') }}</td>
        </tr>
    </table>

    <div class="text-right">
        <p>Bendahara Pengeluaran</p>
        <p>BPS Kabupaten Semarang</p>
        <p>ttd</p>
        <p>Dwi Nurwiyanti, A.M
