<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanGajiController;
use Illuminate\Support\Facades\Route;

// Halaman utama (Halaman login)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('home');

// POST request untuk login
Route::post('/postlogin', [AuthController::class, 'postLogin'])->name('postlogin');

// Route untuk logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');})->name('admin.dashboard');


// Dashboard staff
Route::get('/staff/dashboard', function () {
    return view('staff.dashboard');})->name('staff.dashboard');
// Route untuk Dashboard Staff 2
Route::get('/staff/dashboard2', function () {
    return view('staff.dashboard2');})->name('staff.dashboard2');


// Route untuk melihat detail gaji (Staff)
Route::get('/staff/detail-gaji', [LaporanGajiController::class, 'showDetailGaji'])->name('staff.detailGaji');
// Route untuk melihat detail tunjangan (Staff)
Route::get('/staff/detail-tunjangan', [LaporanGajiController::class, 'showDetailTunjangan'])->name('staff.detailTunjangan');

// Route untuk mengunggah laporan gaji (Excel)
Route::post('/admin/import-laporan', [LaporanGajiController::class, 'importLaporan'])->name('admin.importLaporan');

// Route untuk mengunggah laporan tunjangan kinerja (Excel)
Route::post('/admin/import-tunjangan', [LaporanGajiController::class, 'importTunjangan'])->name('admin.importTunjangan');

// Export Gaji ke Excel
Route::get('/staff/export-gaji-excel', [LaporanGajiController::class, 'exportGajiExcel'])->name('staff.exportGajiExcel');

// Export Gaji ke PDF
Route::get('/staff/export-gaji-pdf', [LaporanGajiController::class, 'exportGajiPDF'])->name('staff.exportGajiPDF');

// Export Tunjangan ke Excel
Route::get('/staff/export-tunjangan-excel', [LaporanGajiController::class, 'exportTunjanganExcel'])->name('staff.exportTunjanganExcel');

// Export Tunjangan ke PDF
Route::get('/staff/export-tunjangan-pdf', [LaporanGajiController::class, 'exportTunjanganPDF'])->name('staff.exportTunjanganPDF');