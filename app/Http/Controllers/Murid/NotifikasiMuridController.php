<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiMuridController extends Controller
{
    public function index()
    {
        $notifikasis = Notifikasi::where('oleh', 'Guru')->get();

        return view('murid.notifikasi.index', compact('notifikasis'));
    }
}
