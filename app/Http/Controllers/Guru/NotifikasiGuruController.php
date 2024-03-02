<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiGuruController extends Controller
{
    public function index()
    {
        $notifikasis = Notifikasi::where('oleh', 'Murid')->get();

        return view('guru.notifikasi.index', compact('notifikasis'));
    }
}
