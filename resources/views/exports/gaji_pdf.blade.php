<!DOCTYPE html>
<html>
<head>
    <title>Detail Gaji</title>
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
        th {
            text-align: left;
        }
        .no-border {
            border-right: none;
        }
        .no-left-border {
            border-left: none;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Detail Gaji Anda</h1>
    <p>Nama: {{ $dataGaji->Nama }}</p>
    <p>Bulan: {{ $bulan }}</p>
    <p>Tahun: {{ $tahun }}</p>

    <table>
        <tr>
            <th>Gaji Bersih</th>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->Gaji_Bersih, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th colspan="3">Potongan :</th>
        </tr>
        <tr>
            <td>Angsuran BJB</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->BJB, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Angsuran Bank Jateng</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->Bank_Jateng, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Angsuran BRI</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->BRI, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Angsuran BSI</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->BSI, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Koperasi</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->Koperasi, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Dharma Wanita</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->Dharma_Wanita, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Bazis</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->Bazis, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Dana Setia Kawan</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->Dana_Setia_Kawan, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Lain-lain</td>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->Lain_lain, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Potongan</th>
            <td class="no-border">Rp.</td>
            <td class="text-right no-left-border">{{ number_format($dataGaji->Total_Potongan, 2, ',', '.') }}</td>
        </tr>
    </table>

    <div class="text-right">
        <p>Bendahara Pengeluaran</p>
        <p>BPS Kabupaten Semarang</p>
        <p>ttd</p>
        <p>Dwi Nurwiyanti, A.Md</p>
    </div>
</body>
</html>
