<?php

use App\Http\Controllers\Guru\DataSiswaGuruController;
use App\Http\Controllers\Guru\MateriGuruController;
use App\Http\Controllers\Guru\ProgressTugasGuruController;
use App\Http\Controllers\Guru\ReferensiGuruController;
use App\Http\Controllers\Guru\SubmateriGuruController;
use App\Http\Controllers\Guru\SubtugasGuruController;
use App\Http\Controllers\Guru\TugasGuruController;
use App\Http\Controllers\Guru\TutorialGuruController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Murid\MateriMuridController;
use App\Http\Controllers\Murid\ReferensiMuridController;
use App\Http\Controllers\Murid\SubmateriMuridController;
use App\Http\Controllers\Murid\SubtugasMuridController;
use App\Http\Controllers\Murid\TugasAnswerMuridController;
use App\Http\Controllers\Murid\TugasMuridController;
use App\Http\Controllers\Murid\TutorialMuridController;
use App\Http\Controllers\Murid\TutorialTersimpanMuridController;
use App\Http\Controllers\Murid\UserSubmateriMuridController;
use App\Models\Subtugas;

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
// Route::view('/', 'welcome')->name('landing-pages');
Route::view('/', 'auth.login')->name('landing-pages');

Route::view('/gabung-kelompok', 'murid.kelompok.index')->name('gabung-kelompok');
Route::view('/show-tugas', 'murid.tugas.show')->name('lihat-tugas');

Route::view('/tugas/tahap-1', 'murid.tugas.tahap-1')->name('tahap1');
Route::view('/tugas/tahap-2', 'murid.tugas.tahap-2')->name('tahap2');
Route::view('/tugas/tahap-3', 'murid.tugas.tahap-3')->name('tahap3');
Route::view('/tugas/tahap-4', 'murid.tugas.tahap-4')->name('tahap4');

// Login,Resgiter,Logout (Authentication)
Auth::routes();

// Route Admin
Route::group(['middleware' => 'role:guru'], function () {
    Route::prefix('guru')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'guru'])->name('dashboard.guru');
        Route::resources([
            'data-master' => DataSiswaGuruController::class,
            'materi-guru' => MateriGuruController::class,
            'submateri-guru' => SubmateriGuruController::class,
            'tugas-guru' => TugasGuruController::class,
            'subtugas-guru' => SubtugasGuruController::class,
            'progress-guru' => ProgressTugasGuruController::class,
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
            'submateri' => SubmateriMuridController::class,
            'user-submateri' =>UserSubmateriMuridController::class,
            'tugas' => TugasMuridController::class,
            'subtugas' => SubtugasMuridController::class,
            'tugas-answer' => TugasAnswerMuridController::class,
            'tutorial' => TutorialMuridController::class,
            'tutorial-tersimpan' => TutorialTersimpanMuridController::class,
            'referensi' => ReferensiMuridController::class,
        ]);
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
