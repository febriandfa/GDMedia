<?php

use App\Http\Controllers\Guru\DataSiswaGuruController;
use App\Http\Controllers\Guru\MateriGuruController;
use App\Http\Controllers\Guru\ReferensiGuruController;
use App\Http\Controllers\Guru\TugasGuruController;
use App\Http\Controllers\Guru\TutorialGuruController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Murid\MateriMuridController;
use App\Http\Controllers\Murid\ReferensiMuridController;
use App\Http\Controllers\Murid\TugasMuridController;
use App\Http\Controllers\Murid\TutorialMuridController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Landing Pages Pages
Route::view('/', 'welcome')->name('landing-pages');
Route::view('/layout-siswa', 'layouts\siswaLayout')->name('layout-siswa');
Route::view('/layout-guru', 'layouts\guruLayout')->name('layout-guru');

// Login,Resgiter,Logout (Authentication)
Auth::routes();

// Route Admin
Route::group(['middleware' => 'role:guru'], function () {
    Route::prefix('guru')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'guru'])->name('dashboard.guru');
        Route::resources([
            'data-master' => DataSiswaGuruController::class,
            'materi-guru' => MateriGuruController::class,
            'tugas-guru' => TugasGuruController::class,
            'tutorial-guru' => TutorialGuruController::class,
            'referensi-guru' => ReferensiGuruController::class,
        ]);
    });
});


// Route Murid
Route::group(['middleware' => 'role:murid'], function () {
    Route::prefix('murid')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'murid'])->name('dashboard.murid');
        Route::resources([
            'materi' => MateriMuridController::class,
            'tugas' => TugasMuridController::class,
            'tutorial' => TutorialMuridController::class,
            'referensi' => ReferensiMuridController::class,
        ]);
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
