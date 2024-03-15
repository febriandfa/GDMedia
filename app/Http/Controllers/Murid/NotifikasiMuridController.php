<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\NotifikasiSeen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiMuridController extends Controller
{
    public function index()
    {
        $notifikasis = Notifikasi::where('oleh', 'guru')->where('type', 'notifikasi')->with(['notifikasi_seens'])->get();

        return view('murid.notifikasi.index', compact('notifikasis'));
    }

    public function markSeen(Request $request)
    {
        $notifikasiSeens = NotifikasiSeen::create([
            'notifikasi_id' => $request->input('notifikasi_id'),
            'user_id' => Auth::user()->id,
            'is_seen' => 'Y',
        ]);

        return redirect()->route('notifikasi.index');
    }
}
