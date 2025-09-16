<?php

use App\Http\Controllers\HukumanController;
use App\Http\Controllers\JabatanFungsionalController;
use App\Http\Controllers\JabatanStrukturalController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\SkpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect('login');
});

// login & logout
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// halaman setelah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
     
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
    
    Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index');
    Route::get('/pendidikan/{id_dosen}', [PendidikanController::class, 'show'])->name('pendidikan.show');
    Route::get('/pendidikan/{id_dosen}/create', [PendidikanController::class, 'create'])->name('pendidikan.create');
    Route::post('/pendidikan', [PendidikanController::class, 'store'])->name('pendidikan.store');
    Route::get('/pendidikan/{id}/edit', [PendidikanController::class, 'edit'])->name('pendidikan.edit');
    Route::put('/pendidikan/{id}', [PendidikanController::class, 'update'])->name('pendidikan.update');
    Route::delete('/pendidikan/{id}', [PendidikanController::class, 'destroy'])->name('pendidikan.destroy');

    // Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
    // Route::get('/sertifikat/{id_dosen}', [SertifikatController::class, 'show'])->name('sertifikat.show');
    // Route::get('/sertifikat/{id_dosen}/create', [SertifikatController::class, 'create'])->name('sertifikat.create');
    // Route::post('/sertifikat', [SertifikatController::class, 'store'])->name('sertifikat.store');
    // Route::get('/sertifikat/{id}/edit', [SertifikatController::class, 'edit'])->name('sertifikat.edit');
    // Route::put('/sertifikat/{id}', [SertifikatController::class, 'update'])->name('sertifikat.update');
    // Route::delete('/sertifikat/{id}', [SertifikatController::class, 'destroy'])->name('sertifikat.destroy');

    Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index');
    Route::get('/pelatihan/{id_dosen}', [PelatihanController::class, 'show'])->name('pelatihan.show');
    Route::get('/pelatihan/{id_dosen}/create', [PelatihanController::class, 'create'])->name('pelatihan.create');
    Route::post('/pelatihan', [PelatihanController::class, 'store'])->name('pelatihan.store');
    Route::get('/pelatihan/{id}/edit', [PelatihanController::class, 'edit'])->name('pelatihan.edit');
    Route::put('/pelatihan/{id}', [PelatihanController::class, 'update'])->name('pelatihan.update');
    Route::delete('/pelatihan/{id}', [PelatihanController::class, 'destroy'])->name('pelatihan.destroy');
    
    Route::get('/keluarga', [KeluargaController::class, 'index'])->name('keluarga.index');
    Route::get('/keluarga/{id_dosen}', [KeluargaController::class, 'show'])->name('keluarga.show');
    Route::get('/keluarga/{id_dosen}/create', [KeluargaController::class, 'create'])->name('keluarga.create');
    Route::post('/keluarga', [KeluargaController::class, 'store'])->name('keluarga.store');
    Route::get('/keluarga/{id}/edit', [KeluargaController::class, 'edit'])->name('keluarga.edit');
    Route::put('/keluarga/{id}', [KeluargaController::class, 'update'])->name('keluarga.update');
    Route::delete('/keluarga/{id}', [KeluargaController::class, 'destroy'])->name('keluarga.destroy');

    Route::resource('penghargaan', PenghargaanController::class);
    Route::resource('cuti', CutiController::class);
    Route::resource('hukuman', HukumanController::class);
    Route::resource('jabatan-fungsional', JabatanFungsionalController::class);
    Route::resource('jabatan-struktural', JabatanStrukturalController::class);
    Route::resource('skp', SkpController::class);
    // Route::resource('keluarga', KeluargaController::class);
});

Route::middleware(['auth'])->group(function () {
    // Data Dosen
    
});




