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

    Route::resource('sertifikat', SertifikatController::class);
    Route::resource('penghargaan', PenghargaanController::class);
    Route::resource('cuti', CutiController::class);
    Route::resource('pelatihan', PelatihanController::class);
    Route::resource('hukuman', HukumanController::class);
    Route::resource('jabatan-fungsional', JabatanFungsionalController::class);
    Route::resource('jabatan-struktural', JabatanStrukturalController::class);
    Route::resource('skp', SkpController::class);
    Route::resource('keluarga', KeluargaController::class);
});

Route::middleware(['auth'])->group(function () {
    // Data Dosen
    
});




