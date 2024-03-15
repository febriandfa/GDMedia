<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\NotifikasiSeen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiGuruController extends Controller
{
    public function index()
    {
        $notifikasis = Notifikasi::where('oleh', 'murid')->with(['notifikasi_seens'])->get();

        return view('guru.notifikasi.index', compact('notifikasis'));
    }

    public function postPengumuman(Request $request)
    {
        $notifikasis = Notifikasi::create([
            'pesan' => $request->input('pesan'),
            'oleh' => auth()->user()->role,
            'type' => 'pengumuman',
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('dashboard.guru');
    }

    public function markSeen(Request $request)
    {
        $notifikasiSeens = NotifikasiSeen::create([
            'notifikasi_id' => $request->input('notifikasi_id'),
            'user_id' => Auth::user()->id,
            'is_seen' => 'Y',
        ]);

        return redirect()->route('notifikasi-guru.index');
    }
}
