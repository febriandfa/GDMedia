<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::view('/', 'welcome');

// Login,Resgiter,Logout (Authentication)
Auth::routes();

// Route Admin



// Route Siswa


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
