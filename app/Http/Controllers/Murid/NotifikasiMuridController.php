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

    public function show($id)
    {
        return ' hallo';
    }

    public function telahDibacaSemua()
    {
        $notifikasis = Notifikasi::with('notifikasi_seens')->get();

        $notifikasis->each(function ($notifikasi) {
            // Periksa apakah notifikasi sudah dilihat oleh pengguna
            $alreadySeen = $notifikasi->notifikasi_seens()->where('user_id', auth()->id())->exists();

            // Jika belum dilihat, tandai sebagai dilihat
            if (!$alreadySeen) {
                $notifikasi->notifikasi_seens()->create([
                    'user_id' => auth()->id(),
                    'is_seen' => 'Y',
                ]);
            }
        });

        return redirect()->route('notifikasi.index');
    }
}
