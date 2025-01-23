@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center text-dark">Detail Gaji Staf</h1>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('staff.detailGaji') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="bulan" class="text-dark">Pilih Bulan</label>
                <select class="form-control" id="bulan" name="bulan" required>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="tahun" class="text-dark">Masukkan Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun (contoh: 2023)" required>
            </div>

            <button type="submit" class="btn btn-dark mt-3">Lihat Detail</button>
        </form>
    </div>
@endsection