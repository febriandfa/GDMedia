<?php

use App\Http\Controllers\Guru\AbsenGuruController;
use App\Http\Controllers\Guru\DataSiswaGuruController;
use App\Http\Controllers\Guru\MateriGuruController;
use App\Http\Controllers\Guru\NotifikasiGuruController;
use App\Http\Controllers\Guru\ProfileGuruController;
use App\Http\Controllers\Guru\ProgressTugasGuruController;
use App\Http\Controllers\Guru\ReferensiGuruController;
use App\Http\Controllers\Guru\SubmateriGuruController;
use App\Http\Controllers\Guru\SubtugasGuruController;
use App\Http\Controllers\Guru\TugasGuruController;
use App\Http\Controllers\Guru\TutorialGuruController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Murid\KelompokMuridController;
use App\Http\Controllers\Murid\MateriMuridController;
use App\Http\Controllers\Murid\NotifikasiMuridController;
use App\Http\Controllers\Murid\ProfileMuridController;
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



// Login,Resgiter,Logout (Authentication)
Auth::routes();

// Route Admin
Route::group(['middleware' => 'role:guru'], function () {
    Route::prefix('guru')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'guru'])->name('dashboard.guru');
        Route::get('/profil-guru/edit', [ProfileGuruController::class, 'index'])->name('profil-guru.edit');
        Route::post('/profil-guru/edit', [ProfileGuruController::class, 'store'])->name('profil-guru.store');
        Route::resources([
            'data-master' => DataSiswaGuruController::class,
            'materi-guru' => MateriGuruController::class,
            'submateri-guru' => SubmateriGuruController::class,
            'tugas-guru' => TugasGuruController::class,
            'subtugas-guru' => SubtugasGuruController::class,
            'progress-guru' => ProgressTugasGuruController::class,
            'tutorial-guru' => TutorialGuruController::class,
            'referensi-guru' => ReferensiGuruController::class,
            'notifikasi-guru' => NotifikasiGuruController::class,
            'absen-guru' => AbsenGuruController::class,
        ]);
        Route::post('/notifikasi-guru/post-pengumuman', [NotifikasiGuruController::class, 'postPengumuman'])->name('notifikasi-guru.postPengumuman');
        Route::post('/notifikasi-guru/seen', [NotifikasiGuruController::class, 'markSeen'])->name('notifikasi-guru.markSeen');
        Route::get('/progress-guru/{id}/murid', [ProgressTugasGuruController::class, 'indexMurid'])->name('progress-guru.indexMurid');
        Route::get('/export/pdf/{id}', [ProgressTugasGuruController::class, 'exportPdf'])->name('progress-guru.exportPdf');
    });
});


// Route Murid
Route::group(['middleware' => 'role:murid'], function () {
    Route::prefix('murid')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'murid'])->name('dashboard.murid');
        Route::resources([
            'materi' => MateriMuridController::class,
            'submateri' => SubmateriMuridController::class,
            'user-submateri' => UserSubmateriMuridController::class,
            'tugas' => TugasMuridController::class,
            'subtugas' => SubtugasMuridController::class,
            'tugas-answer' => TugasAnswerMuridController::class,
            'tutorial' => TutorialMuridController::class,
            'tutorial-tersimpan' => TutorialTersimpanMuridController::class,
            'referensi' => ReferensiMuridController::class,
            'notifikasi' => NotifikasiMuridController::class,
            'kelompok' => KelompokMuridController::class
        ]);
        Route::post('/notifikasi/seen', [NotifikasiMuridController::class, 'markSeen'])->name('notifikasi.markSeen');
        Route::post('/notifikasi/tandai-lihat-semua', [NotifikasiMuridController::class, 'telahDibacaSemua'])->name('notifikasi.lihatSemua');


        Route::get('/profil/edit', [ProfileMuridController::class, 'index'])->name('profil.edit');
        Route::post('/profil/edit', [ProfileMuridController::class, 'store'])->name('profil.store');

        Route::get('/gabung-kelompok', [TugasMuridController::class, 'joinKelompok'])->name('gabung-kelompok');
        Route::post('/gabung-kelompok-store', [TugasMuridController::class, 'joinKelompokStore'])->name('gabung-kelompok.store');
    });
});
