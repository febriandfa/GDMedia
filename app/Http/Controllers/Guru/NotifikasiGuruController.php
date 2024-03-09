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
        $notifikasis = Notifikasi::where('oleh', 'Murid')->with(['notifikasi_seens'])->get();

        return view('guru.notifikasi.index', compact('notifikasis'));
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
