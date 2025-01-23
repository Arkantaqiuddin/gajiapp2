@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Welcome Admin</h1>
        <p>This is the admin dashboard.</p>

        <!-- Tampilkan pesan sukses atau error hanya sekali di bagian atas -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form untuk Import Laporan Gaji -->
        <h2 class="mt-5">Import Laporan Gaji</h2>
        <form action="{{ route('admin.importLaporan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Pilih File Excel</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form>

        <!-- Form untuk Import Laporan Tunjangan Kinerja -->
        <h2 class="mt-5">Import Laporan Tunjangan Kinerja</h2>
        <form action="{{ route('admin.importTunjangan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Pilih File Excel</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form>
    </div>
@endsection